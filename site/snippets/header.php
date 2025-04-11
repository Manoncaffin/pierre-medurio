<?php
$logo = $site->files()->first('pierre_medurio_logotype_noir.svg');
$navPages = $site->children()->listed()->filter(function ($page) {
    return in_array($page->slug(), ['projets', 'prestations', 'articles', 'à propos', 'contact']);
});
?>
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<body>
    <header>
        <section class="container_header">
        <input type="checkbox" id="menu-toggle" class="menu-toggle" />

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
    </div>