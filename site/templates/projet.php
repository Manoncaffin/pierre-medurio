<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projet.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
              <li><strong>Commanditaire :</strong> <?= $item->client() ?></li>
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
    $siblings = $page->siblings();
    $currentIndex = $siblings->indexOf($page);
    $prevPage = $siblings->nth($currentIndex - 1) ?? $siblings->last();
    $nextPage = $siblings->nth($currentIndex + 1) ?? $siblings->first();
    ?>

    <div class="previous_next">
      <div class="previous">
        <a href="<?= $prevPage->url() ?>">
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Flèche précédente">
          <p>projet précédent</p>
        </a>
      </div>
      <div class="next">
        <a href="<?= $nextPage->url() ?>">
          <p>projet suivant</p>
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Flèche suivante">
        </a>
      </div>
    </div>

    <?php
    // Récupérer toutes les images (couverture + galerie)
    $cover = $page->files()->template('cover')->first();
    $gallery = $page->files()->template('image');

    // Combiner les images en une collection
    $allImages = new Kirby\Cms\Files([]);

    if ($cover) {
      $allImages->append($cover);
    }

    if ($gallery->isNotEmpty()) {
      foreach ($gallery as $image) {
        $allImages->append($image);
      }
    }

    // Tri par le champ "sort" si disponible
    $allImages = $allImages->sortBy('sort', 'asc');

    $imageCount = $allImages->count();
    ?>

    <!-- Galerie de miniatures - toujours visible -->
    <div class="gallery" id="gallery-thumbnails">
      <?php $index = 0; ?>
      <?php foreach ($allImages as $image): ?>
        <div class="thumbnail-item" data-index="<?= $index ?>">
          <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
        </div>
        <?php $index++; ?>
      <?php endforeach ?>
    </div>

    <!-- Modal Carrousel -->
    <div id="carousel-modal" class="modal">
      <div class="modal-close">
        <a href="#" id="modal-close" role="button">
          <img src="<?= url('assets/images/close.svg') ?>" alt="Fermer"></a>
        </a>
      </div>

      <div class="modal-content">
        <!-- Custom Carousel -->
        <div class="custom-carousel">
          <div class="custom-carousel-inner">
            <?php foreach ($allImages as $image): ?>
              <div class="custom-carousel-slide">
                <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
              </div>
            <?php endforeach ?>
          </div>
        </div>

        <!-- Navigation buttons -->
        <button class="custom-carousel-button custom-prev">
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Précédent">
        </button>
        <button class="custom-carousel-button custom-next">
          <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Suivant">
        </button>
      </div>
      <!-- Counter -->
      <div class="custom-carousel-counter">
        <span class="current-slide">1</span>/<span class="total-slides"><?= $imageCount ?></span>
      </div>
    </div>
    <!-- Zoom -->
    <div class="zoom-overlay">
      <img src="" alt="" class="zoomed-image">
      <div class="zoom-close">
      <img src="<?= url('assets/images/close.svg') ?>" alt="Fermer" class="close-icon">
      </div>
      <div class="zoom-navigation">
        <button class="zoom-prev">&larr; Précédente</button>
        <span class="zoom-counter">1 / 1</span>
        <button class="zoom-next">Suivante &rarr;</button>
      </div>
    </div>
  </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= url('assets/js/swiper.js') ?>"></script>
<script src="<?= url('assets/js/gallery.js') ?>"></script>
<script src="<?= url('assets/js/zone.js') ?>"></script>
<script src="<?= url('assets/js/close.js') ?>"></script>
<script src="<?= url('assets/js/toggle.js') ?>"></script>
<script src="<?= url('assets/js/zoom.js') ?>"></script>

<?php snippet('footer') ?>