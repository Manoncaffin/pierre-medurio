<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/article.css') ?>">

<main">
    <article class="all_article">
        <div class="article">
            <h1><?= $page->title()->html() ?></h1>
            <div class="article-meta">
                <?php if ($page->published()->isNotEmpty()): ?>
                    <time datetime="<?= $page->published()->toDate('c') ?>">
                        Publié le <?= $page->published()->toDate('d/m/Y') ?>
                    </time>
                <?php endif ?>

                <?php if ($page->author()->isNotEmpty()): ?>
                    <span class="article_author">
                        par <?= $page->author()->html() ?>
                    </span>
                <?php endif ?>
            </div>
        </header>

        <?php if ($image = $page->imageArticle()->toFile()): ?>
            <figure class="article_image">
                <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
                <?php if ($page->legend()->isNotEmpty()): ?>
                    <figcaption><?= $page->legend()->kirbytext() ?></figcaption>
                <?php endif ?>
            </figure>
        <?php endif ?>

        <div class="article_content">
            <?php if ($page->description()->isNotEmpty()): ?>
                <div class="article_description">
                    <?= $page->description()->kirbytext() ?>
                </div>
            <?php endif ?>

            <?php if ($page->text()->isNotEmpty()): ?>
                <div class="article_text">
                    <?= $page->text()->kirbytext() ?>
                </div>
            <?php endif ?>
        </div>

        <footer class="article_footer">
            <a href="<?= $page->parent()->url() ?>" class="back-link">&larr; Retour aux articles</a>
        </footer>
    </article>
</main>

<?php snippet('footer') ?>