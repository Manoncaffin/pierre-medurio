<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/prestations.css') ?>">

<main>
    <section class="portrait">
        <div class="title_border">
            <h2>Portrait</h2>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->portrait()->toStructure() as $item): ?>
            <div class="qa">
                <h3><?= $item->question() ?></h3>
                <div class="border_question"></div>
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

            <div class="image-portrait">
                <?php if ($image2 = $page->image($page->photoText2()->image2()->value())): ?>
                    <img src="<?= $image2->url() ?>" alt="">
                <?php endif ?>
            </div>
            <p><?= $page->photoText2()->text2()->kt() ?></p>
        </div>
    </section>

    <section class="reportage">
        <div class="title_border">
            <h2>Reportage</h2>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->reportage()->toStructure() as $item): ?>
            <div class="qa">
                <h3><?= $item->question() ?></h3>
                <div class="border_question"></div>
                <p><?= $item->answer()->kt() ?></p>
            </div>
        <?php endforeach ?>

        <div class="image-text_reportage">
        <p><?= $page->text3()->kt() ?></p>


            <div class="gallery reportage-gallery">
                <?php foreach ($page->photoText4()->toFiles() as $image): ?>
                    <img src="<?= $image->url() ?>" alt="">
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="atelier">
        <div class="title_border">
            <h2>Atelier</h2>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->atelier()->toStructure() as $item): ?>
            <div class="qa">
                <h3><?= $item->question() ?></h3>
                <div class="border_question"></div>
                <p><?= $item->answer()->kt() ?></p>
            </div>
        <?php endforeach ?>

        <div class="image-text_atelier">
            <p><?= $page->text5()->kt() ?></p>

            <div class="gallery atelier-gallery">
                <?php foreach ($page->photoText5()->toFiles() as $image): ?>
                    <img src="<?= $image->url() ?>" alt="">
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <script src="<?= url('assets/js/answer.js') ?>"></script>
    <?php snippet('footer') ?>