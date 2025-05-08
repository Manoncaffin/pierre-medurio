<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/a-propos.css') ?>">

<main>
    <section class="biography">
        <?php if ($image = $page->portrait()->toFile()): ?>
            <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php endif; ?>

        <div class="text_biography">
            <?= $page->biography()->kirbytext() ?>
        </div>
    </section>
</main>

<script src="<?= url('assets/js/toggle.js') ?>"></script>
<?php snippet('footer') ?>