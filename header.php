<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">

  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      -webkit-tap-highlight-color: transparent;
    }

    body {
      font-family: 'Nunito Sans', 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
      margin: 0;
      line-height: 1.5;
      min-height: 100%;
      font-synthesis: none;
      text-rendering: optimizeLegibility;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      -webkit-text-size-adjust: 100%;
      background-color: #0f0029;
      color: #fff;
    }
  </style>

  <?php wp_head(); ?>
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

</head>

<body <?php body_class(); ?>>
  <div class="backdrop"></div>
  <?php wp_body_open(); ?>
  <div id="wrapper" class="page-wrap">

    <?php get_template_part('partials/components/header/header') ?>

    <main role="main">