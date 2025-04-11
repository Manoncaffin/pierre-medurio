<?php snippet('header') ?>

<main>
    <main>
        <?php snippet('intro') ?>
        <ul class="projects" <?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
            <?php foreach ($page->children()->listed() as $project): ?>
                <li>
                    <a href="<?= $project->url() ?>">
                        <figure>
                            <?= $project->images()->findBy("template", "cover") ?>
                            <figcaption><?= $project->title() ?> <small><?= $project->year() ?></small></figcaption>
                        </figure>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </main>
</main>

<?php snippet('footer') ?>