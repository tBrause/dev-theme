<?php

/**
 * 
 * rechtliche Navigation
 * im Footer
 * 
 */

?>


    <?php


    $args = array(
        'theme_location' => 'footer_nav',
        'fallback_cb' => '',
        'depth' => 1,
    );

    wp_nav_menu($args);

    ?>


