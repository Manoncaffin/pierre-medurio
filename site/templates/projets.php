<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projets.css') ?>">

<?php

use Kirby\Toolkit\Str;

$tags = ['reportage', 'portrait', 'atelier', 'travail personnel', 'tous les projets'];
?>

<main>
    <style>
        .filters-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 6px 60px 6px 10px;
            font-size: 1rem;
            border: 1px solid black;
            background-color: white;
            background-image: url('<?= url('assets/images/fleche_black_end.svg') ?>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px 20px;
        }
    </style>
    <section class="all_projects">
        <!-- <div class="custom-select-wrapper">
            <select class="filters-select" id="project-filter">
                <option value="all">tous les projets</option>
                <option value="reportage">reportage</option>
                <option value="portrait">portrait</option>
                <option value="atelier">atelier</option>
                <option value="travail-personnel">travail personnel</option>
            </select>
        </div>  -->

        <!-- <div class="tags-mobile mobile-dropdown">
            <input type="checkbox" id="dropdown-toggle" class="dropdown-checkbox">
            <label for="dropdown-toggle" class="all">tous les projets</label>

            <div class="dropdown-menu">
                <button class="tag-mobile" data-category="reportage">reportage</button>
                <button class="tag-mobile" data-category="portrait">portrait</button>
                <button class="tag-mobile" data-category="atelier">atelier</button>
                <button class="tag-mobile" data-category="travail-personnel">travail personnel</button>
                <button class="tag-mobile" data-category="all">tous</button>
            </div>
        </div> -->
        <div class="custom-select-wrapper" id="dropdown">
            <input type="hidden" name="projectTags" id="projectTagsInput">

            <div class="selected-option" tabindex="0" role="button">
                Filtres
            </div>

            <div class="select-options" id="projectTagsOptions">
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
                                <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->or($project->title()) ?>">
                            <?php endif ?>
                            <figcaption><?= $project->title() ?>
                                <small>
                                    <?php
                                    $year = $project->details()->toStructure()->first()->year();
                                    echo $year->isEmpty() ? 'Date non définie' : $year;
                                    ?>
                                </small>
                        </figure>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>

<script src="<?= url('assets/js/filtres.js') ?>"></script>
<?php snippet('footer') ?>