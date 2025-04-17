<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- Primary Meta Tags -->
    <title><?= $site->title() ?></title>
    <meta name="title" content="<?= $site->title() ?>" />
    <meta name="description" content="" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $site->url() ?>" />
    <meta property="og:title" content="<?= $site->title() ?>" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?= $site->url() ?>" />
    <meta property="twitter:title" content="<?= $site->title() ?>" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />

    <meta name="<?= $site->title() ?>" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="Photographe, Saint-Étienne" />
    <meta name="Author" content="Pierre Medurio" />
    <meta name="Revisit-After" content="15 days" />
    <meta name="Robots" content="All" />
    <?= css(['assets/css/index.css', '@auto']) ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/imgs/favicon/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/imgs/favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/imgs/favicon/favicon-16x16.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= url('assets/imgs/favicon/android-icon-192x192.png') ?>">
    <meta name="msapplication-TileImage" content="<?= url('assets/imgs/favicon/ms-icon-144x144.png') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="<?= url('assets/imgs/favicon/manifest.json') ?>">
</head>