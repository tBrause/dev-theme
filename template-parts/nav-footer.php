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
    'items_wrap'  => '<nav class="nav-footer"><ul>%3$s</ul></nav>',
    'fallback_cb' => '',
    'depth' => 1,
);

wp_nav_menu($args);

?>


