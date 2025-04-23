<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projet.css') ?>">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<main>
  <section class="project">
    <div class="description_projet">
      <div class="title_projet">
        <h1><?= $page->headline()->or($page->title()) ?></h1>
      </div>

      <div class="text_projet">
        <?= $page->description()->kt() ?>
        <ul>
          <?php foreach ($page->details()->toStructure() as $item): ?>
            <?php if ($item->client()->isNotEmpty()): ?>
              <li><strong>Client·e :</strong> <?= $item->client() ?></li>
            <?php endif ?>

            <?php if ($item->model()->isNotEmpty()): ?>
              <li><strong>Modèle :</strong> <?= $item->model() ?></li>
            <?php endif ?>

            <?php if ($item->year()->isNotEmpty()): ?>
              <li><strong>Année :</strong> <?= $item->year() ?></li>
            <?php endif ?>
          <?php endforeach ?>
        </ul>
      </div>
    </div>

    <?php
    // Récupérer toutes les pages sœurs (les autres projets)
    $siblings = $page->siblings();

    // Trouver l'index de la page actuelle dans la liste des pages sœurs
    $currentIndex = $siblings->indexOf($page);

    // Déterminer les pages précédente et suivante
    $prevPage = $siblings->nth($currentIndex - 1) ?? $siblings->last();
    $nextPage = $siblings->nth($currentIndex + 1) ?? $siblings->first();
    ?>

    <div class="previous_next">
      <div class="previous">
        <a href="<?= $prevPage->url() ?>">
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Flèche précédente">
          <p>page précédente</p>
        </a>
      </div>
      <div class="next">
        <a href="<?= $nextPage->url() ?>">
          <p>page suivante</p>
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Flèche suivante">
        </a>
      </div>
    </div>

    <div class="gallery">
      <?php if ($cover = $page->files()->template('cover')->first()): ?>
        <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
      <?php else: ?>
        <p>Aucune image de couverture trouvée.</p>
      <?php endif ?>

      <?php
      $gallery = $page->files()->template('image');
      if ($gallery->isNotEmpty()):
        foreach ($gallery as $image): ?>
          <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
        <?php endforeach ?>
      <?php else: ?>
        <p>Aucune image de galerie trouvée.</p>
      <?php endif ?>
    </div>

    <div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
    ...
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>
  </section>

  <?php
  $images = $page->images()->filterBy('type', 'image');
  $imageCount = $images->count();
  ?>

  <p><?= $imageCount ?> image<?= $imageCount > 1 ? 's' : '' ?></p>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= url('assets/js/swiper.js') ?>"></script>
<script src="<?= url('assets/js/dropdown.js') ?>"></script>
<?php snippet('footer') ?>