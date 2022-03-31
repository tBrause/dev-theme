<?php

/**
 * 
 * Unternavigation
 * 
 */

?>

<?php
if (empty($wp_query->post->post_parent)) {
    $parent = $wp_query->post->ID;
} else {
    $parent = $wp_query->post->post_parent;
}

if (wp_list_pages("title_li=&child_of=$parent&echo=0")) :
    echo '<nav class="sub-main-nav"><div><ul>';
    wp_list_pages("title_li=&child_of=$parent&depth=1");
    echo '</ul></div></nav>';
endif;

?>