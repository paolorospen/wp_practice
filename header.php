<?php
$rootDir = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1.0, user-scalable=no">
    <?php if( is_page("top") ) : ?>
    <title>wp_practice</title>
    <meta name="description" content="wp_practice" />
    <meta property="og:title" content="wp_practice" />
    <?php endif;?>
    <meta name="keywords" content="wp_practice" />
    <link rel="shortcut icon" href="<?php echo $rootDir; ?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo $rootDir; ?>/assets/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <!-- GSAP -->
    <script src="//cdn.jsdelivr.net/npm/gsap@3.7.0/dist/gsap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/gsap@3.7.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/CustomEase.min.js"></script>
    <!-- Splitting -->
    <link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting.css" />
    <link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting-cells.css" />

    <?php wp_head();?>
</head>

<body>

    <div class="container">
        <div class="header">

        </div>