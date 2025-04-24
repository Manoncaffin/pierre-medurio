<?php snippet('header') ?>
<link rel="stylesheet" href="<?= url('assets/css/templates/mentions-legales.css') ?>">

<main>
  <div class="legal_notice_grid">
    <div class="col">
      <h1 class="title_contact">Mentions légales</h1>
      <?= $page->column1()->kti() ?>
      
      <h2 class="little_title_contact">Propriété intellectuelle</h2>
      <?= $page->column1_row2()->kt() ?>
    </div>

    <div class="col">
      <h2 class="title_contact">Crédits</h2>
      <?= $page->column2()->kt() ?>
    </div>
  </div>
</main>

<script src="<?= url('assets/js/toggle.js') ?>"></script>
<?php snippet('footer') ?>