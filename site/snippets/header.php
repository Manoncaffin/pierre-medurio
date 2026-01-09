<?php
$logo = $site->files()->first();
$navPages = $site->children()->listed()->filter(function ($page) {
    return in_array($page->slug(), ['photographies', 'prestations', 'articles', 'a-propos', 'contact']);
});
$isHomePage = $page->isHomePage();
?>
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<body>
    <?php if ($isHomePage): ?>
        <!-- Header pour la page d'accueil -->
        <header class="header_home">
            <section class="container_header">
                <nav class="nav_first">
                    <?php if ($logo): ?>
                        <div class="logo">
                            <a href="<?= url('home') ?>">
                                <img src="<?= $logo->url() ?>" alt="Telma Medurio | Photographe" class="logo_header">
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

                        foreach ($navPages as $navPage): ?>
                            <li class="<?= e($navPage->isOpen(), 'active') ?>">
                                <a href="<?= $navPage->url() ?>" class="header_open">
                                    <?= $navPage->title() ?>
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
                        <div class="logo_other" id="mobile_logo">
                            <a href="<?= url('home') ?>">
                                <img src="<?= $logo->url() ?>" alt="Telma Medurio | Photographe" class="logo_other_page">
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

                        foreach ($navPages as $navPage): ?>
                            <li class="<?= e($navPage->isOpen(), 'active') ?>">
                                <a href="<?= $navPage->url() ?>" class="li_burger">
                                    <?= $navPage->title() ?>
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
        /* ------------- MEDIA MIN-WIDTH 1200PX --------------- */
        /* ------------------ SUP. OU ÉGALE ------------------ */
        @media screen and (min-width: 1200px) {
            header ul li::before {
                content: '';
                position: absolute;
                top: 120%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 160px;
                height: 100px;
                background-image: url('<?= url('assets/images/select_medium.svg') ?>');
                background-size: contain;
                background-repeat: no-repeat;
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: -1;
            }

            header ul li:hover::before {
                opacity: 1;
            }
        }
    </style>