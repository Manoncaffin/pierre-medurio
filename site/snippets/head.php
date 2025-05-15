<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
<?php
$title = $page->metaTitle()->isNotEmpty() ? $page->metaTitle() : $page->title();
$title .= ' | ' . $site->title();

$description = $page->metaDescription()->isNotEmpty() ? $page->metaDescription() : $site->description();
?>
<title><?= $title ?></title>
<meta name="description" content="<?= $description->esc() ?>">

    <meta property="og:description" content="<?= $description ?>" />
    <meta property="twitter:description" content="<?= $description ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="twitter:title" content="<?= $title ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $site->url() ?>" />
    <meta property="og:title" content="<?= $site->title() ?>" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?= $site->url() ?>" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Pierre Medurio" />
    <meta name="Revisit-After" content="15 days" />
    <?= css(['assets/css/index.css', '@auto']) ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/images/favicon/apple-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/images/favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/images/favicon/favicon-16x16.png') ?>">
    <link rel="shortcut icon" href="<?= url('favicon.ico') ?>" type="image/x-icon">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
</head>