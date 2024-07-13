<?php
ob_start();
require_once(PHP_SESSION_MANAGE);
custom_session_start();
require_once(CONN);
require_once(LOGIN_CHECK);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/public/site.webmanifest">
    <link rel="icon" href="/public/favicon.ico" type="image/ico">
    <link rel="icon" href="/public/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="icon" href="/public/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="icon" href="/public/android-chrome-192x192.png" type="image/png" sizes="192x192">
    <link rel="icon" href="/public/android-chrome-512x512.png" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="/public/apple-touch-icon.png" sizes="180x180">
    <link rel="manifest" href="/public/site.webmanifest">
    <title><?php echo $browser_title; ?></title>
    <?php require_once(HEADER_SRCS); ?>
    <?php
    //custom styles
    //HEADER_SRCS are default srcs used by all pages, if you need a page specifc src, add with the $custom_styles array
    if(isset($custom_styles) && !empty($custom_styles)) {
        foreach($custom_styles as $link) {
            echo "<link rel='stylesheet' href='$link'>";
        }
    }
    //custom srcs
    //HEADER_SRCS are default srcs used by all pages, if you need a page specifc src, add with the $custom_styles array
    if(isset($custom_srcs) && !empty($custom_srcs)) {
        foreach($custom_srcs as $src) {
            echo "<script defer src='$src'></script>";
        }
    }
    ?>
</head>
<body>
<div> <!-- Overall Page Container -->

<?php require_once(NAVBAR); ?>

<div id="page-content-wrapper"> <!-- Page Content Wrapper -->

<div class="container-fluid" id="page-header"> <!-- Page Header -->
    <?php echo $page_header; ?>
    <hr id="page-header-hr"></span>
</div>

<div class="container-fluid" id="page-content"> <!-- Main Page Content -->