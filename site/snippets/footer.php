<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<footer>
    <div class="end">
        <p class="networks">
        <span class="default-text">Me suivre</span>
        <span class="social-links">
            <a href="https://www.instagram.com/pierre.medurio/" target="_blank">Instagram</a>
        </span>
        </p>
        <a href="<?= url('cgv') ?>">CGV</a>
        <a href="<?= url('mentions-legales') ?>">Mentions légales</a>
        <p><?= $site->footer_credit()->or('telma medurio © ' . date('Y')) ?></p>
    </div>
</footer>
</body>
</html>