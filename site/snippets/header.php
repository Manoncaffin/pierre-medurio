<?php
$logo = $site->files()->first('pierre_medurio_logotype_noir.svg');
$navPages = $site->children()->listed()->filter(function ($page) {
    return in_array($page->slug(), ['projets', 'prestations', 'articles', 'à propos', 'contact']);
});
$isHomePage = $page->isHomePage();
?>
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<body>
    <?php
    $logo = $site->files()->first('pierre_medurio_logotype_noir.svg');
    $navPages = $site->children()->listed()->filter(function ($page) {
        return in_array($page->slug(), ['projets', 'prestations', 'articles', 'a-propos', 'contact']);
    });
    $isHomePage = $page->isHomePage();
    ?>

    <link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

    <body>
        <?php if ($isHomePage): ?>
            <!-- Header pour la page d'accueil -->
            <header class="header_home">
                <section class="container_header">
                    <nav class="first">
                        <?php if ($logo): ?>
                            <div class="logo">
                                <a href="<?= url('home') ?>">
                                    <img src="<?= $logo->url() ?>" alt="Logo" class="logo_header">
                                </a>
                            </div>
                        <?php else: ?>
                            <p>Logo non trouvé</p>
                        <?php endif; ?>

                        <!-- Menu desktop -->
                        <ul>
                            <?php
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

        <?php else: ?>

            <!-- Header pour les autres pages -->
            <header class="header_other">
                <section class="container_header_other">
                    <nav class="nav_other">
                        <?php if ($logo): ?>
                            <div class="logo" id="mobile_logo">
                                <a href="<?= url('home') ?>">
                                    <img src="<?= $logo->url() ?>" alt="Logo" class="logo_other_page">
                                </a>
                            </div>
                        <?php else: ?>
                            <p>Logo non trouvé</p>
                        <?php endif; ?>

                        <!-- Menu burger -->
                        <div class="burger-menu">
                            <img src="<?= url('assets/images/burger.svg') ?>" alt="Menu" id="burger-icon">
                            <img src="<?= url('assets/images/close.svg') ?>" alt="Fermer" id="close-icon" style="display: none;">
                        </div>

                        <!-- Menu desktop -->
                        <ul>
                            <?php
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
        <?php endif; ?>



        <style>
            /* --------------------------------------------------- */
            /* --------------------------------------------------- */
            /* ------------- MEDIA MIN-WIDTH 350PX --------------- */
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
                    top: 10%;
                    left: 55%;
                    transform: translate(-50%, -50%);
                    width: 600px;
                    height: 190px;
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


            /* --------------------------------------------------- */
            /* --------------------------------------------------- */
            /* ------------- MEDIA MIN-WIDTH 1000PX --------------- */
            /* ------------------ SUP. OU ÉGALE ------------------ */
            /* --------------------------------------------------- */
            @media screen and (min-width: 1000px) {
                header ul li::before {
                    content: '';
                    position: absolute;
                    top: 20%;
                    left: 70%;
                    transform: translate(-50%, -50%);
                    width: 600px;
                    height: 170px;
                    background-image: url(http://localhost:8888/pierremedurio/assets/images/select_medium.svg);
                    background-size: contain;
                    background-repeat: no-repeat;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                    z-index: -1;
                }
            }
        </style>