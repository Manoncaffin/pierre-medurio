<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/contact.css') ?>">

<main>
    <section class="contact">
        <article class="form">
            <?php
            // Initialisation des variables
            $success = false;
            $errors = [];
            $name = '';
            $firstname = '';
            $email = '';
            $phone = '';
            $interest = '';
            $message = '';

            // Traitement du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contactName'])) {
                $name = $_POST['contactName'] ?? '';
                $firstname = $_POST['contactFirstname'] ?? '';
                $email = $_POST['contactEmail'] ?? '';
                $phone = $_POST['contactPhone'] ?? '';
                $interest = $_POST['contactInterest'] ?? '';
                $message = $_POST['contactMessage'] ?? '';

                // Si 'interest' n'est pas un tableau, le convertir en tableau
                if (!is_array($interest)) {
                    $interest = [$interest];
                }

                // Convertir le tableau 'interest' en chaîne de caractères
                $interest = implode(', ', $interest);

                // Validation simple
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
                        $success = true;
                    } else {
                        $errors[] = "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer.";
                    }
                }
            }


            // Traitement du formulaire d'inscription à la newsletter
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe'])) {
                $newsletterEmail = $_POST['newsletterEmail'] ?? '';

                // Validation simple
                if (empty($newsletterEmail) || !filter_var($newsletterEmail, FILTER_VALIDATE_EMAIL)) {
                    $newsletterErrors[] = 'L\'email est invalide.';
                } else {
                    // Enregistrement de l'email dans la base de données ou un fichier
                    // Exemple : ajouter l'email à un fichier CSV
                    $file = 'newsletter_subscribers.csv';
                    $existingEmails = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                    if (in_array($newsletterEmail, $existingEmails)) {
                        $newsletterErrors[] = 'Cet email est déjà inscrit à la newsletter.';
                    } else {
                        file_put_contents($file, $newsletterEmail . PHP_EOL, FILE_APPEND | LOCK_EX);
                        $newsletterSuccess = true;
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
                    <input type="text" id="contactName" name="contactName" placeholder="Entrez votre nom" value="<?= htmlspecialchars($name) ?>" required>
                </div>

                <div>
                    <label for="contactFirstname">Prénom</label>
                    <input type="text" id="contactFirstname" name="contactFirstname" placeholder="Entrez votre prénom" value="<?= htmlspecialchars($firstname) ?>" required>
                </div>

                <div>
                    <label for="contactEmail">Mail</label>
                    <input type="email" id="contactEmail" name="contactEmail" placeholder="exemple@domaine.com" value="<?= htmlspecialchars($email) ?>" required>
                </div>

                <div>
                    <label for="contactPhone">Téléphone</label>
                    <input type="tel" id="contactPhone" name="contactPhone" placeholder="06 00 00 00 00" value="<?= htmlspecialchars($phone) ?>">
                </div>

                <div class="custom-select-wrapper">
                    <label for="contactInterest">Intérêt</label>
                    <?php $options = ['Reportage', 'Portrait', 'Atelier', 'Échanger', 'Autre']; ?>
                    <div class="custom-select" id="dropdown">
                        <input type="hidden" name="contactInterest" id="contactInterest" value="<?= htmlspecialchars($interest) ?>">
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
                        class="message-textarea"><?= htmlspecialchars($message) ?></textarea>
                </div>
                <div>
                    <button type="submit">Envoyer</button>
                </div>
            </form>

            <?php if ($success): ?>
                <div class="success-message">
                    <p>Merci, votre message a bien été transféré !</p>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <?php foreach ($errors as $error): ?>
                    <p class="error-message"><?= $error ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

        </article>

        <article class="newsletter">
            <h2 class="title_contact">Me suivre</h2>
            <ul>
                <?php foreach ($page->networks()->toStructure() as $network): ?>
                    <li class="contact_networks"><a href="<?= $network->link() ?>"><?= $network->network() ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="newsletter_email">
            <form id="newsletterForm" action="contact" method="post">
                <label for="newsletterEmail">S'abonner à la newsletter</label>
                <input type="email" id="newsletterEmail" name="newsletterEmail" value="<?= $page->newsletterEmail() ?>" required>
                <button type="submit" name="subscribe">S'abonner</button>
            </form>
            </div>
        </article>
    </section>
</main>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<script src="<?= url('assets/js/dropdown.js') ?>"></script>
<?php snippet('footer') ?>
