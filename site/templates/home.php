<?php snippet('header') ?>
<body>
<main class="main_home">
<?php
$images = $page->images();

if ($images->count() > 0):
    $hour = date('G'); // Heure actuelle (0 à 23)
    $imageIndex = $hour % $images->count();
    $image = $images->nth($imageIndex);

    if ($image): ?>
    <div class="image_home">
        <img src="<?= $image->url() ?>" alt="Image d’accueil" class="home-image" style="max-width: 100%; height: auto;">
    <?php else: ?>
        <p>Image introuvable à l’index <?= $imageIndex ?>.</p>
    <?php endif; ?>
    </div>
<?php else: ?>
    <p>Aucune image n’est disponible pour la page d’accueil.</p>
<?php endif; ?>
</main>
</body>

