<?php

/**
 * 
 * weitere Themen-Seiten
 * 
 */

?>

<?php
$args = array(
    'theme_location' => 'extern_nav',
    'items_wrap'  => '<nav class="sub-main-extern"><ul class="theme-sites-nav">%3$s</ul></nav>',
    'link_before' => '<i class="bloginfo-icon fab fa-dev"></i>',
    'fallback_cb' => '',
);

wp_nav_menu($args);

?>