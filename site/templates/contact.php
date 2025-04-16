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
                    $to = 'client@example.com'; // Adresse email du destinataire
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
                    <input type="text" id="contactName" name="contactName" value="<?= htmlspecialchars($name ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactFirstname">Prénom</label>
                    <input type="text" id="contactFirstname" name="contactFirstname" value="<?= htmlspecialchars($firstname ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactEmail">Mail</label>
                    <input type="email" id="contactEmail" name="contactEmail" value="<?= htmlspecialchars($email ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactPhone">Téléphone</label>
                    <input type="tel" id="contactPhone" name="contactPhone" value="<?= htmlspecialchars($phone ?? '') ?>">
                </div>

                <div>
                    <label for="contactInterest">Intérêt</label>
                    <fieldset>
                        <?php
                        $options = ['Reportage', 'Portrait', 'Atelier', 'Échanger', 'Autre'];
                        foreach ($options as $option): ?>
                            <label>
                                <input type="checkbox" name="contactInterest[]" value="<?= $option ?>" <?= isset($interest) && in_array($option, explode(', ', $interest)) ? 'checked' : '' ?>>
                                <?= $option ?>
                            </label><br>
                        <?php endforeach; ?>
                    </fieldset>
                </div>

                <div>
                    <label for="contactMessage">Message</label>
                    <textarea id="contactMessage" name="contactMessage" required><?= htmlspecialchars($message ?? '') ?></textarea>
                </div>

                <div>
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </article>

        <article class="newsletter">
            <h1 class="title_contact">Me suivre</h1>
            <ul>
                <?php foreach ($page->networks()->toStructure() as $network): ?>
                    <li class="contact_networks"><a href="<?= $network->link() ?>"><?= $network->network() ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div>
                <label for="newsletterEmail">Adresse mail pour la newsletter</label>
                <input type="email" id="newsletterEmail" name="newsletterEmail" value="<?= $page->newsletterEmail() ?>" required>
                <button type="submit" name="subscribe">S'abonner</button>
            </div>
        </article>
    </section>
</main>

<?php snippet('footer') ?>