<?php snippet('header') ?>

<main>
    <?php foreach ($page->children() as $project): ?>
        <div class="project-card">
            <a href="<?= $project->url() ?>">
                <h1><?= $page->title() ?></h1>
                <?php if ($image = $project->images()->first()): ?>
                    <img src="<?= $image->url() ?>" alt="<?= $project->title() ?>">
                <?php endif; ?>
            </a>
        </div>
    <?php endforeach; ?>
</main>

<?php snippet('footer') ?>