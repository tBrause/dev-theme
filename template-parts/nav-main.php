<?php

/**
 * 
 * Hauptnavigation
 * mit nur Menüpunkte auf Ebene 1
 * 
 */

?>

<nav class="main-nav">

    <?php


    $args = array(
        'theme_location' => 'main_nav',
        'fallback_cb' => '',
        'depth' => 1,
    );

    wp_nav_menu($args);

    ?>


</nav>