<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/contact.css') ?>">

<main>
    <section class="contact">
        <article class="form">
            <form id="contactForm" action="<?= $page->url() ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />

                <h1 class="title_contact">Me contacter</h1>
                <p>Mon travail vous intéresse ?</p>
                <p>Parlez moi de vous et de vos envies !</p>
                <div>
                    <label for="contactName">Nom</label>
                    <input type="text" id="contactName" name="contactName" placeholder="Entrez votre nom" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactFirstname">Prénom</label>
                    <input type="text" id="contactFirstname" name="contactFirstname" placeholder="Entrez votre prénom" value="<?= htmlspecialchars($data['firstname'] ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactEmail">Mail</label>
                    <input type="email" id="contactEmail" name="contactEmail" placeholder="exemple@domaine.com" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
                </div>

                <div>
                    <label for="contactPhone">Téléphone</label>
                    <input type="tel" id="contactPhone" name="contactPhone" placeholder="06 00 00 00 00" value="<?= htmlspecialchars($data['phone'] ?? '') ?>">
                </div>

                <div class="custom-select-wrapper">
                    <label for="contactInterest">Intérêt</label>
                    <?php $options = ['Reportage', 'Portrait', 'Atelier', 'Échanger', 'Autre']; ?>
                    <div class="custom-select" id="dropdown">
                        <input type="hidden" name="contactInterest" id="contactInterest" value="<?= htmlspecialchars($data['interest'] ?? '') ?>">
                        <div class="selected-option" tabindex="0" role="button" onclick="toggleDropdown()">
                            <?= $data['interest'] ?? 'Sélectionnez la raison de votre demande' ?>
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
                        class="message-textarea"><?= htmlspecialchars($data['message'] ?? '') ?></textarea>
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
                <form id="newsletterForm" action="<?= $page->url() ?>" method="post">
                    <div class="newsletter_form">
                        <label for="newsletterEmail">S'abonner à la newsletter</label>
                        <input type="email" id="newsletterEmail" name="newsletterEmail" placeholder="contact@exemple.fr" required>
                    </div>
                    <label class="consent_label">
                        <input type="checkbox" id="rgpdConsent" name="rgpdConsent" required>
                        J'accepte de recevoir la newsletter. Je peux me désabonner à tout moment après m'être inscrit·e.
                    </label>
                    <button type="submit" name="subscribe">S'abonner</button>
                </form>

                <?php if (!empty($inscription)): ?>
                    <div class="newsletter-inscription">
                        <p><?= $inscription ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    </section>
</main>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<script src="<?= url('assets/js/dropdown.js') ?>"></script>
<?php snippet('footer') ?>