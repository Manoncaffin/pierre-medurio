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
    // Collection des images
    $cover = $page->files()->template('cover')->first();
    $gallery = $page->files()->template('image');
    $allImages = new Kirby\Cms\Files([$cover]);

    if ($gallery->isNotEmpty()) {
      foreach ($gallery as $image) {
        $allImages->append($image);
      }
    }

    $imageCount = $allImages->count();
    ?>

    <?php if ($cover): ?>
      <!-- Galerie de miniatures - toujours visible -->
      <div class="gallery" id="gallery-thumbnails">
        <!-- Cover image -->
        <div class="thumbnail-item" data-index="0">
          <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
        </div>

        <!-- Images de la galerie -->
        <?php if ($gallery->isNotEmpty()): ?>
          <?php $index = 1; ?>
          <?php foreach ($gallery as $image): ?>
            <div class="thumbnail-item" data-index="<?= $index ?>">
              <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
            </div>
            <?php $index++; ?>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    <?php endif ?>

    <!-- Modal Carrousel -->
    <div id="carousel-modal" class="modal">
      <div class="modal-close">
        <a href="#" id="modal-close" role="button">
          <img src="<?= url('assets/images/close.svg') ?>" alt="Fermer"></a>
        </a>
      </div>

      <div class="modal-content">
        <!-- Swiper -->
        <div class="swiper carousel-swiper">
          <div class="swiper-wrapper">
            <?php if ($cover): ?>
              <div class="swiper-slide">
                <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
              </div>
            <?php endif ?>

            <?php if ($gallery->isNotEmpty()): ?>
              <?php foreach ($gallery as $image): ?>
                <div class="swiper-slide">
                  <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>

          <!-- Navigation buttons -->
          <div class="swiper-button-prev">
            <div class="custom-prev">
              <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Précédent">
            </div>
          </div>
          <div class="swiper-button-next custom-next">
            <div class="custom-next">
              <img src="<?= url('assets/images/fleche_droite.svg') ?>" alt="Suivant">
            </div>
          </div>

          <div class="hover-zone left-zone"></div>
          <div class="hover-zone right-zone"></div>
        </div>


        <!-- Counter -->
        <div class="swiper-counter">
          <span class="current-slide">1</span>/<span class="total-slides"><?= $imageCount ?></span>
        </div>
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

<?php snippet('footer') ?>