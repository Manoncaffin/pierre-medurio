<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/articles.css') ?>">

<main>
    <section class="all_articles">
        <ul class="articles" <?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
            <?php foreach ($page->children()->listed() as $article): ?>
                <li class="article-item">
                    <a href="<?= $article->url() ?>" class="title_article">
                        <figcaption><?= $article->title()->html() ?>
                            <small>
                                <?php
                                $year = $article->published('Y');
                                echo $year->isEmpty() ? 'Date non définie' : $year;
                                ?>
                            </small>
                        </figcaption>
                        <figure class="image_article">
                            <?php if ($imageArticle = $article->imageArticle()->toFile()): ?>
                                <img src="<?= $imageArticle->url() ?>" alt="<?= $imageArticle->alt()->html() ?>">
                            <?php endif ?>
                        </figure>
                    </a>
                    <?php if ($legend = $article->legend()->isNotEmpty()): ?>
                        <div class="legend"><?= $article->legend()->kirbytext() ?></div>
                    <?php endif ?>
                    <p class="excerpt"><?= $article->description()->excerpt(150) ?> <a href="<?= $article->url() ?>">Lire la suite...</a></p>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<?php snippet('footer') ?>