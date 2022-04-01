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
    'items_wrap'  => '<ul class="footer-nav">%3$s</ul>',
    'fallback_cb' => '',
    'depth' => 1,
);

wp_nav_menu($args);

?>


