<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/a-propos.css') ?>">

<main>

    <section class="biography">
        <?php if ($image = $page->portrait()->toFile()): ?>
            <img src="<?= $image->url() ?>" alt="Portrait de Pierre">
        <?php endif; ?>

        <div class="text_biography">
            <p><?= $page->biography()->kirbytext() ?></p>
        </div>
    </section>

</main>

<?php snippet('footer') ?>