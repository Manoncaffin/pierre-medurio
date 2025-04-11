<h1><?= $page->title() ?></h1>
<p><?= $page->description()->kirbytext() ?></p>
<div class="gallery">
  <?php foreach ($page->galerie()->files() as $image): ?>
    <img src="<?= $image->url() ?>" alt="<?= $page->title() ?>">
  <?php endforeach; ?>
</div>
