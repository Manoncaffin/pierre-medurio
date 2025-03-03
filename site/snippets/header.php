<body>
    <div class="header-wrapper">
        <header class="container_header">

            <nav>
                <ul>
                    <?php foreach ($site->children()->listed() as $page): ?>
                        <li>
                            <a href="<?= $page->url() ?>" <?= e($page->isOpen(), 'class="active"') ?>>
                                <?= $page->title() ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>

        </header>
    </div>