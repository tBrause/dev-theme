<?php

/**
 * 
 * Hauptnavigation als Sitemap
 * 
 */

?>

<nav class="main-nav-home">

    <?php


    $args = array(
        'theme_location' => 'main_nav',
        'menu_class' => 'wp-block-sitemap',
        'fallback_cb' => '',
        'depth' => 0,
    );

    wp_nav_menu($args);

    ?>


</nav>