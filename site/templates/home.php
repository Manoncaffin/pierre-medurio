<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/home.css') ?>">

<main class="main_home">
    <?php
    $images = $page->images();

    if ($images->count() > 0):
        $image = $images->shuffle()->first();

        if ($image): ?>
            <div class="image_home">
                <div class="image_wrapper">
                    <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>" class="home-image">
                    <?php
                    $alt = $image->alt()->isNotEmpty() ? $image->alt()->html() : '';
                    $year = $image->year()->isNotEmpty() ? $image->year()->html() : '';
                    ?>

                    <div class="legend">
                        <span class="project-name"><em><?= $alt ?></em></span>
                        <?php if ($year): ?>
                            <span class="project-year"><?= $year ?></span> 
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Image introuvable.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Aucune image n'est disponible pour la page d'accueil.</p>
    <?php endif; ?>
</main>

