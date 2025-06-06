<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/articles.css') ?>">

<main>
    <section class="all_articles">
        <ul class="articles" <?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
            <?php foreach ($page->children()->listed() as $article): ?>
                <li class="article-item">
                    <div class="article-header">
                        <a href="<?= $article->url() ?>" class="title_article">
                            <div class="title_container">
                                <h1><?= $article->title()->html() ?></h1>
                            </div>
                            <small>
                                <?php $year = $article->published('Y');
                                echo $year->isEmpty() ? 'Date non définie' : 'Publié le ' . $year; ?>
                            </small>
                        </a>
                    </div>

                    <div class="article-content">
                        <div class="image-container">
                            <figure class="image_article">
                                <?php if ($imageArticle = $article->imageArticle()->toFile()): ?>
                                    <img src="<?= $imageArticle->url() ?>" alt="<?= $imageArticle->alt()->html() ?>">
                                <?php endif ?>
                            </figure>
                            <?php if ($legend = $article->legend()->isNotEmpty()): ?>
                                <div class="legend"><?= $article->legend()->kirbytext() ?></div>
                            <?php endif ?>
                        </div>

                        <div class="text-container">
                            <p class="excerpt">
                                <?php if ($article->description()->length() > 500): ?>
                                    <?= $article->description()->excerpt(500) ?>
                                    <a href="<?= $article->url() ?>" class="read-more">Lire la suite</a>
                                <?php else: ?>
                                    <?= $article->description() ?>
                                <?php endif ?>
                            </p>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<?php snippet('footer') ?>