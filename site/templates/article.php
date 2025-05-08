<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/article.css') ?>">

<main>
    <article class="all_article">
        <div class="title_container">
            <h1><?= $page->title()->html() ?></h1>
            <div class="article-meta">
                <?php if ($page->published()->isNotEmpty()): ?>
                    <time datetime="<?= $page->published()->toDate('c') ?>">
                        Publié le <?= $page->published()->toDate('d/m/Y') ?>
                    </time>
                <?php endif ?>
            </div>
            <?php if ($page->intro()->isNotEmpty()): ?>
                <div class="article_intro">
                    <?= $page->intro()->kt() ?>
                </div>
            <?php endif ?>
        </div>

        <?php if ($image = $page->imageArticle()->toFile()): ?>
            <figure class="article_image">
                <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
                <?php if ($page->legend()->isNotEmpty()): ?>
                    <figcaption><?= $page->legend()->kt() ?></figcaption>
                <?php endif ?>
            </figure>
        <?php endif ?>

        <div class="article_content">
            <?php if ($page->description()->isNotEmpty()): ?>
                <div class="article_description">
                    <?= $page->description()->kt() ?>
                </div>
            <?php endif ?>

            <?php if ($page->text()->isNotEmpty()): ?>
                <div class="article_text">
                    <?= $page->text()->kt() ?>
                </div>
            <?php endif ?>
        </div>

        <a href="<?= $page->parent()->url() ?>" class="back_link">
            <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Retour aux articles" class="back-arrow-icon">Retour aux articles
        </a>
    </article>
</main>

<?php snippet('footer') ?>