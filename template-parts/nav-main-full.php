<?php

/**
 * 
 * Hauptnavigation
 * mit allen Ebenen
 * 
 */
?>

<div class="bars-link-button"><span class="icon-bars"><i class="fas fa-bars"></i></span></div>

<?php
$args = array(
    'theme_location' => 'main_nav',
    'container' => 'nav',
    'container_class' => 'main-nav-full',
    'menu_class' => 'wp-block-sitemap',
    'menu_id' => 'full-main-nav',
    'fallback_cb' => '',
    'depth' => 0,
);

wp_nav_menu($args);
?>