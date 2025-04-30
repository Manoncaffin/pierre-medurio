<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projets.css') ?>">

<?php

use Kirby\Toolkit\Str;

$tags = ['reportage', 'portrait', 'atelier', 'travail personnel', 'tous les projets'];
?>

<main>
    <section class="all_projects">
        <div class="custom-select-wrapper" id="dropdown">
            <input type="hidden" name="projectTags" id="projectTagsInput">
            <div class="selected-option" tabindex="0" role="button">
                <span class="selected-text">Filtres</span>
                <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Filter Icon" class="filter-icon">
            </div>
            <div class="select-options" id="projectTagsOptions">
                <div class="option" data-category="all">Tous</div>
                <div class="option" data-category="reportage">Reportage</div>
                <div class="option" data-category="portrait">Portrait</div>
                <div class="option" data-category="atelier">Atelier</div>
                <div class="option" data-category="travail-personnel">Travail personnel</div>
            </div>
        </div>

        <ul class="projects" <?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
            <?php foreach ($page->children()->listed() as $project): ?>
                <?php
                $category = $project->categorie()->isNotEmpty() ? Str::slug($project->categorie()) : 'no-category';
                ?>
                <li class="project-item <?= $category ?>">
                    <a href="<?= $project->url() ?>" class="title_project">
                        <figure>
                            <?php if ($cover = $project->images()->findBy("template", "cover")): ?>
                                <img src="<?= $cover->url() ?>" alt="<?= $cover->alt() ?>">
                            <?php endif ?>
                            <figcaption><?= $project->title() ?>
                                <small>
                                    <?php
                                    $year = $project->details()->toStructure()->first()->year();
                                    echo $year->isEmpty() ? 'Date non définie' : $year;
                                    ?>
                                </small>
                            </figcaption>
                        </figure>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<script src="<?= url('assets/js/dropdown-projects.js') ?>"></script>
<?php snippet('footer') ?>