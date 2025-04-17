<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/prestations.css') ?>">

<main>
    <section class="portrait">
        <h2>Portrait</h2>

        <?php foreach ($page->portrait()->toStructure() as $item): ?>
            <div class="qa">
                <h3><?= $item->question() ?></h3>
                <p><?= $item->answer()->kt() ?></p>
            </div>
        <?php endforeach ?>

        <div class="image-text">
            <div class="image-portrait">
                <?php if ($image1 = $page->image($page->photoText1()->image1()->value())): ?>
                    <img src="<?= $image1->url() ?>" alt="">
                <?php endif ?>
            </div>

            <p><?= $page->photoText1()->text1()->kt() ?></p>
        </div>

        <div class="image-text">
        <div class="image-portrait">
            <?php if ($image2 = $page->image($page->photoText2()->image2()->value())): ?>
                <img src="<?= $image2->url() ?>" alt="">
            <?php endif ?>
            </div>
            <p><?= $page->photoText2()->text2()->kt() ?></p>
        </div>
    </section>

    <section class="reportage">
        <h2>Reportage</h2>

        <?php foreach ($page->reportage()->toStructure() as $item): ?>
            <div class="qa">
                <h3><?= $item->question() ?></h3>
                <p><?= $item->answer()->kt() ?></p>
            </div>
        <?php endforeach ?>

        <div class="image-text">
            <p><?= $page->photoText3()->text3()->kt() ?></p>
        </div>

        <div class="gallery reportage-gallery">
            <?php foreach ($page->photoText4()->toFiles() as $image): ?>
                <img src="<?= $image->url() ?>" alt="">
            <?php endforeach ?>
        </div>
    </section>

    <section class="atelier">
        <h2>Atelier</h2>


        <?php snippet('footer') ?>