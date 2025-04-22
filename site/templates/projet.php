<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/projet.css') ?>">

<main>
  <section class="project">
    <div class="description">
      <div class="intro">
        <h1><?= $page->headline()->or($page->title()) ?></h1>
        <?= $page->description()->kt() ?>
      </div>

      <ul>
        <?php foreach ($page->details()->toStructure() as $item): ?>
          <li><strong>Client :</strong> <?= $item->client() ?></li>
          <li><strong>Modèle :</strong> <?= $item->model() ?></li>
          <li><strong>Année :</strong> <?= $item->year() ?></li>
        <?php endforeach ?>
      </ul>
    </div>

    <div class="gallery">
      <?php if ($cover = $page->cover()->toFile()): ?>
        <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->or($cover->niceName()) ?>">
      <?php endif ?>

      <?php foreach ($page->gallery()->toFiles() as $image): ?>
        <img src="<?= $image->url() ?>" alt="<?= $image->alt()->or($image->niceName()) ?>">
      <?php endforeach ?>
    </div>
  </section>

  <?php
  $images = $page->images()->filterBy('type', 'image');
  $imageCount = $images->count();
  ?>

  <p><?= $imageCount ?> image<?= $imageCount > 1 ? 's' : '' ?></p>
</main>

<?php snippet('footer') ?>