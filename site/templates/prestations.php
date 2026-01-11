<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/prestations.css') ?>">

<main>
    <section class="prestations">
        <div class="images-column">
            <?php if ($image1 = $page->image1()->toFile()): ?>
                <div class="image-prestations">
                    <img src="<?= $image1->url() ?>" alt="<?= $image1->alt() ?>">
                </div>
            <?php endif ?>

            <?php if ($image2 = $page->image2()->toFile()): ?>
                <div class="image-prestations">
                    <img src="<?= $image2->url() ?>" alt="<?= $image2->alt() ?>">
                </div>
            <?php endif ?>

            <?php if ($image3 = $page->image3()->toFile()): ?>
                <div class="image-prestations">
                    <img src="<?= $image3->url() ?>" alt="<?= $image3->alt() ?>">
                </div>
            <?php endif ?>
        </div>

        <div class="text-prestations">
            <?= $page->prestations_text()->kirbytext() ?>
        </div>
    </section>

    <script src="<?= url('assets/js/toggle.js') ?>"></script>
    <script src="<?= url('assets/js/answer.js') ?>"></script>
</main>

<?php snippet('footer') ?>