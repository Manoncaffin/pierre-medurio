<?php
$logo = $site->files()->first('pierre_medurio_logotype_noir.svg');
$navPages = $site->children()->listed()->filter(function ($page) {
    return in_array($page->slug(), ['projets', 'prestations', 'articles', 'à propos', 'contact']);
});
$isHomePage = $page->isHome();
?>
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<header>
    <section class="container_header">
        <nav>
            <?php if ($logo): ?>
                <div class="logo">
                    <a href="<?= url('home') ?>">
                        <img src="<?= $logo->url() ?>" alt="Logo" class="logo_header">
                    </a>
                </div>
            <?php else: ?>
                <p>Logo non trouvé</p>
            <?php endif; ?>
            <ul>
                <?php
                $navPages = $site->children()->listed()->filter(function ($page) {
                    return in_array($page->slug(), ['projets', 'prestations', 'articles', 'a-propos', 'contact']);
                });

                $totalPages = $navPages->count();
                $index = 0;

                foreach ($navPages as $page): ?>
                    <li>
                        <a href="<?= $page->url() ?>" <?= e($page->isOpen(), 'class="active"') ?>>
                            <?= $page->title() ?>
                        </a>
                    </li>
                    <?php if ($index < $totalPages - 1): ?>
                        <div class="separator"></div>
                    <?php endif; ?>
                    <?php $index++; ?>
                <?php endforeach ?>
            </ul>
        </nav>
    </section>
</header>

<style>
    header ul li {
    position: relative; /* Pour pouvoir manipuler l'image SVG avec positionnement */
    padding: 20px 30px; /* Ajuster le padding en fonction de la taille de l'image SVG */
    list-style: none; /* Pour enlever les puces par défaut */
}

header ul li::before {
    content: ''; 
    position: absolute; 
    top: 70%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    width: 150px; 
    height: 80px; 
    background-image: url('<?= url('assets/images/select_medium.svg') ?>'); 
    background-size: contain; 
    background-repeat: no-repeat; 
    opacity: 0; 
    transition: opacity 0.3s ease;
    z-index: -1; 
}

header ul li:hover::before {
    opacity: 1; /* Rendre l'image visible */
}
</style>