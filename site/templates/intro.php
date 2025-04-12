<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/index.css"> 
    <meta http-equiv="refresh" content="3; url=<?= url('home') ?>"> 
</head>

<body>
    <?php
    $logo = $site->files()->first();
    ?>

    <section class="container_intro">
        <?php if ($logo): ?>
            <div class="logo fade">
                <a href="<?= url('home') ?>">
                    <img src="<?= $logo->url() ?>" alt="Logo" class="logo_intro">
                </a>
            </div>
        <?php else: ?>
            <p>Logo non trouvé</p>
        <?php endif; ?>
    </section>

</body>
<script src="<?= url('assets/js/intro.js') ?>"></script>
</html>