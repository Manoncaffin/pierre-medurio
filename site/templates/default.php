<?php if ($page->template() != 'intro'): ?>
    <?php snippet('header') ?>
<?php endif; ?>

<main>
    <?= $slot ?>
</main>

<?php if ($page->template() != 'intro'): ?>
    <?php snippet('footer') ?>
<?php endif; ?>