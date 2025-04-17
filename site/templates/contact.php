<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/contact.css') ?>">

<main>
    <section class="contact">
        <article class="form">
            <?php
            // Traitement du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['contactName'] ?? '';
                $firstname = $_POST['contactFirstname'] ?? '';
                $email = $_POST['contactEmail'] ?? '';
                $phone = $_POST['contactPhone'] ?? '';
                $interest = isset($_POST['contactInterest']) ? implode(', ', $_POST['contactInterest']) : '';
                $message = $_POST['contactMessage'] ?? '';

                // Validation simple
                $errors = [];
                if (empty($name)) $errors[] = 'Le nom est obligatoire.';
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'L\'email est invalide.';
                if (empty($message)) $errors[] = 'Le message ne peut pas être vide.';

                if (empty($errors)) {
                    // Envoi de l'email
                    $to = 'client@example.com'; 
                    $subject = "Message de $firstname $name via le formulaire de contact";
                    $body = "Nom: $name\nPrénom: $firstname\nEmail: $email\nTéléphone: $phone\nIntérêt: $interest\n\nMessage:\n$message";
                    $headers = "From: $email\r\n" .
                        "Reply-To: $email\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                    if (mail($to, $subject, $body, $headers)) {
                        echo "<p>Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.</p>";
                    } else {
                        echo "<p>Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer.</p>";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                }
            }
            ?>

            <form id="contactForm" action="contact" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />

                <h1 class="title_contact">Me contacter</h1>
                <p>Mon travail vous intéresse ?</p>
                <p>Parlez moi de vous et de vos envies !</p>
                <div>
                    <label for="contactName">Nom</label>
                    <input type="text" id="contactName" name="contactName" placeholder="Entrez votre nom" value="<?= htmlspecialchars($name ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactFirstname">Prénom</label>
                    <input type="text" id="contactFirstname" name="contactFirstname" placeholder="Entrez votre prénom" value="<?= htmlspecialchars($firstname ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactEmail">Mail</label>
                    <input type="email" id="contactEmail" name="contactEmail" placeholder="exemple@domaine.com" value="<?= htmlspecialchars($email ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactPhone">Téléphone</label>
                    <input type="tel" id="contactPhone" name="contactPhone" placeholder="06 00 00 00 00" value="<?= htmlspecialchars($phone ?? '') ?>">
                </div>

                <div class="custom-select-wrapper">
                    <label for="contactInterest">Intérêt</label>
                    <?php $options = ['Reportage', 'Portrait', 'Atelier', 'Échanger', 'Autre']; ?>
                    <div class="custom-select" id="dropdown">
                        <input type="hidden" name="contactInterest" id="contactInterest" value="<?= htmlspecialchars($interest ?? '') ?>">
                        <div class="selected-option" tabindex="0" role="button" onclick="toggleDropdown()">
                            <?= $interest ?? 'Sélectionnez la raison de votre demande' ?>
                        </div>
                        <div class="select-options" id="selectOptions">
                            <?php foreach ($options as $option): ?>
                                <div class="option" data-value="<?= $option ?>"><?= $option ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label for="contactMessage" class="label-message">Message</label>
                    <textarea id="contactMessage" name="contactMessage" required
                        placeholder="Écrivez votre message ici..."
                        class="message-textarea"><?= htmlspecialchars($message ?? '') ?></textarea>
                </div>
                <div>
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </article>

        <article class="newsletter">
            <h2 class="title_contact">Me suivre</h2>
            <ul>
                <?php foreach ($page->networks()->toStructure() as $network): ?>
                    <li class="contact_networks"><a href="<?= $network->link() ?>"><?= $network->network() ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="newsletter_email">
                <label for="newsletterEmail">S'abonner à la newsletter</label>
                <input type="email" id="newsletterEmail" name="newsletterEmail" value="<?= $page->newsletterEmail() ?>" required>
                <button type="submit" name="subscribe">S'abonner</button>
            </div>
        </article>
    </section>
</main>
<script src="<?= url('assets/js/dropdown.js') ?>"></script>
<?php snippet('footer') ?>