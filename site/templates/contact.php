<?php snippet('header') ?>

<main>
    <h1><?= $page->title() ?></h1>
    <h1><?= $page->contactHeadline() ?></h1>

    <form method="post" action="<?= $page->url() ?>">
        <!-- Autres champs du formulaire -->

        <div>
            <label for="newsletterEmail">Adresse e-mail pour la newsletter:</label>
            <input type="email" id="newsletterEmail" name="newsletterEmail" value="<?= $page->newsletterEmail() ?>" required>
            <button type="submit" name="subscribe">S'abonner</button>
        </div>
    </form>

    <h2><?= $page->pageSettingsHeadline() ?></h2>
    <ul>
        <?php foreach ($page->networks()->toStructure() as $network): ?>
            <li><a href="<?= $network->link() ?>"><?= $network->network() ?></a></li>
        <?php endforeach; ?>
    </ul>

</main>

<?php snippet('footer') ?>