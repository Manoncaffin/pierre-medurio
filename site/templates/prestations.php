<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/prestations.css') ?>">

<main>
    <section class="portrait">
        <div class="title_border">
            <h1>Portrait</h1>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->portrait()->toStructure() as $item): ?>
            <div class="qa">
                <div class="question_arrow">
                    <p class="question"><?= $item->question() ?></p>
                    <img src="<?= url('assets/images/plus_noir.svg') ?>" alt="dérouler vers le bas" class="arrow">
                </div>
                <div class="border_question"></div>
                <p class="answer"><?= $item->answer()->kt() ?></p>
                <div class="border_answer"></div>
            </div>
        <?php endforeach ?>

        <div class="image-text">
            <div class="image-portrait">
                <?php if ($image1 = $page->photoText1_image()->toFile()): ?>
                    <img src="<?= $image1->url() ?>" alt="<?= $image1->alt() ?>">
                <?php endif ?>
                <div class="text_1">
                    <?= $page->photoText1_text()->kt() ?>
                </div>
            </div>

            <div class="image-portrait">
                <?php if ($image2 = $page->photoText2_image()->toFile()): ?>
                    <img src="<?= $image2->url() ?>" alt="<?= $image2->alt() ?>">
                <?php endif ?>
                <div class="text_2">
                    <?= $page->photoText2_text()->kt() ?>
                </div>
            </div>
        </div>
    </section>

    <section class="reportage">
        <div class="title_border">
            <h2>Reportage</h2>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->reportage()->toStructure() as $item): ?>
            <div class="qa">
                <div class="question_arrow">
                    <p class="question"><?= $item->question() ?></p>
                    <img src="<?= url('assets/images/plus_noir.svg') ?>" alt="dérouler vers le bas" class="arrow">
                </div>
                <div class="border_question"></div>
                <p class="answer"><?= $item->answer()->kt() ?></p>
                <div class="border_answer"></div>
            </div>
        <?php endforeach ?>

        <div class="image-text_reportage">
            <?= $page->text3()->kt() ?>
            <div class="gallery reportage-gallery">
                <?php foreach ($page->photoText3()->toFiles() as $image): ?>
                    <img src="<?= $image->url() ?>" alt="">
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="atelier">
        <div class="title_border">
            <h2>Cours et ateliers de photographie</h2>
            <div class="border_portrait"></div>
        </div>

        <?php foreach ($page->atelier()->toStructure() as $item): ?>
            <div class="qa">
                <div class="question_arrow">
                    <p class="question"><?= $item->question() ?></p>
                    <img src="<?= url('assets/images/plus_noir.svg') ?>" alt="dérouler vers le bas" class="arrow">
                </div>
                <div class="border_question"></div>
                <p class="answer"><?= $item->answer()->kt() ?></p>
                <div class="border_answer"></div>
            </div>
        <?php endforeach ?>

        <div class="image-text_atelier">
            <?= $page->text5()->kt() ?>
            <?= $page->text6()->kt() ?>

            <div class="gallery atelier-gallery">
                <?php foreach ($page->photoText5()->toFiles() as $image): ?>
                    <img src="<?= $image->url() ?>" alt="">
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <script src="<?= url('assets/js/answer.js') ?>"></script>
    <?php snippet('footer') ?>