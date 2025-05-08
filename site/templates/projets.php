<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projets.css') ?>">

<?php

use Kirby\Toolkit\Str;

$tags = ['reportage', 'portrait', 'atelier', 'travail personnel', 'tous les projets'];
?>

<main>
    <section class="all_projects">
    <div id="dropdown" class="dropdown-container">
    <div class="selected-option">
        <span class="selected-text">Filtres</span>
        <img class="filter-icon" src="assets/images/fleche_droite.svg" alt="Sélectionner">
    </div>
    <div id="projectTagsOptions" class="options-container">
        <div class="option" data-category="all">Tous</div>
        <div class="option" data-category="reportage">Reportage</div>
        <div class="option" data-category="portrait">Portrait</div>
        <div class="option" data-category="atelier">Atelier</div>
        <div class="option" data-category="travail-personnel">Travail personnel</div>
    </div>
    <input type="hidden" name="category" value="all">
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