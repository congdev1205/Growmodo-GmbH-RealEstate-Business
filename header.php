<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Estatein — Discover your dream property. Browse handpicked real estate listings, connect with trusted agents, and find the home that matches your dreams.">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="hero-zone">

<header class="site-header">

  <div class="announcement-bar">
    <p>✨ Discover Your Dream Property with Estatein <a href="#">Learn More</a></p>
    <button class="announcement-close" aria-label="Close announcement">&times;</button>
  </div>

  <div class="header-main">
    <div class="logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>">
      </a>
    </div>

    <button class="mobile-nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="primary-nav" aria-label="Primary">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'nav-menu',
          'fallback_cb'    => false,
        ));
      ?>
    </nav>

    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="btn btn-primary header-cta">Contact Us</a>
  </div>

</header>