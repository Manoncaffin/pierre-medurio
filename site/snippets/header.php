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
        <li class="<?= e($page->isOpen(), 'active') ?>"> 
            <a href="<?= $page->url() ?>">
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


/* --------------------------------------------------- */
/* --------------------------------------------------- */
/* ------------- MEDIA MIN-WIDTH 1000PX --------------- */
/* ------------------ SUP. OU ÉGALE ------------------ */
/* --------------------------------------------------- */
@media screen and (min-width: 1000px) {
header ul li::before {
    content: '';
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 110px;
    height: 100px;
    background-image: url(http://localhost:8888/pierremedurio/assets/images/select_medium.svg);
    background-size: contain;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}
}

    /* --------------------------------------------------- */
/* --------------------------------------------------- */
/* ------------- MEDIA MIN-WIDTH 1200PX --------------- */
/* ------------------ SUP. OU ÉGALE ------------------ */
/* --------------------------------------------------- */
@media screen and (min-width: 350px) {
    header ul li {
    position: relative; 
    padding: 20px 0; 

}

header ul li::before {
    content: ''; 
    position: absolute; 
    top: 85%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    width: 130px; 
    height: 90px; 
    background-image: url('<?= url('assets/images/select_medium.svg') ?>'); 
    background-size: contain; 
    background-repeat: no-repeat; 
    opacity: 0; 
    transition: opacity 0.3s ease;
    z-index: -1; 
}

header ul li:hover::before,
header ul li.active::before {
    opacity: 1;
}
}
</style>