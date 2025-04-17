<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/home.css') ?>">

<body>
    <main class="main_home">
        <?php
        $images = $page->images();

        if ($images->count() > 0):
            $image = $images->shuffle()->first();

            if ($image): ?>
                <div class="image_home">
                    <img src="<?= $image->url() ?>" alt="Image d’accueil" class="home-image" style="max-width: 100%; height: auto;">
                </div>
            <?php else: ?>
                <p>Image introuvable.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>Aucune image n’est disponible pour la page d’accueil.</p>
        <?php endif; ?>
    </main>
</body>