<?php

/**
 * 
 * Startseite
 * 
 */

require('inc/ini.php');

?>

<?php get_header(); ?>



<main class="index-main">
    <mark>index.php</mark>

    <?php
    /**
     * 
     * Auflistung der Beiträge
     * 
     */
    ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php
            /**
             * 
             * Beginn des Abschnitt
             * 
             */
            ?>

            <article>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!--<p><?php the_author(); ?></p>-->
                <!--<p><?php the_time('d. F Y'); ?></p>-->
                <p><?php the_excerpt(); ?></p>

                <?php

                /**
                 * 
                 * Diese Bildgröße wird verwendet: blog-vorschau-image
                 * 
                 * Werte stehen in der: inc/ini.php
                 * 
                 * $size_used
                 * @var string
                 * 
                 */
                $size_used = $size_preview;
                #$size_used = 'medium';

                /**
                 * 
                 * srcset
                 * 
                 * $srcset_used
                 * @var string
                 * 
                 */
                $srcset_used = 'blog-vorschau-image';


                // ID des Bild
                $image_id = get_post_thumbnail_id();

                if ($image_id !== 0) {

                    /**
                     * 
                     * Bildquelle
                     * 
                     */
                    $image_src = wp_get_attachment_image_url($image_id, $size_used);


                    /**
                     * 
                     * SRCSET
                     * 
                     */
                    $image_srcset = wp_get_attachment_image_srcset($image_id, '' . $srcset_used . '');


                    /**
                     * 
                     * SIZES
                     */

                    $image_sizes = wp_get_attachment_image_sizes($image_id, $size_used);


                    /**
                     * 
                     * Alt-Tag des Bild
                     * 
                     */
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);


                    /**
                     * 
                     * Titel des Bild
                     * 
                     */
                    $image_title = get_the_title($image_id);


                    /**
                     * 
                     * Höhe und Breite des Bild für das Img-Tag
                     * 
                     */
                    $image_width_height = getimagesize($image_src)[3];


                    /**
                     * 
                     * Ausgabe 
                     * 
                     */

                    $view_image = '<figure>';

                    $view_image .= '<img ';
                    $view_image .= 'class="' . $size_used . '" ';
                    $view_image .= 'src="' . $image_src . '" ';
                    $view_image .= 'alt="' . $image_alt . '" ';
                    $view_image .= 'title="' . $image_title . '" ';
                    $view_image .= $image_width_height . ' ';
                    $view_image .= 'loading="lazy" ';
                    $view_image .= 'srcset="' . $image_srcset . '" ';
                    $view_image .= 'sizes="' . $image_sizes . '" ';
                    #$view_image .= 'style="" ';
                    $view_image .= '>';

                    $view_image .= '<figcaption>' . $image_title . '</figcaption>';
                    $view_image .= '</figure>';

                    echo $view_image . '<br>';

                ?>

                    <figure>
                        <?php echo $image_id; ?>
                        <figcaption><?php echo $image_title; ?></figcaption>
                    </figure>

                <?php
                }
                ?>

                <?php


                #$size_image_array = array('blog-beitrag-image', 'blog-vorschau-image');



                /**
                 * 
                 * Alle Bildgrößen
                 * 
                 */
                $get_intermediate_image_sizes = get_intermediate_image_sizes();

                /**
                 * 
                 * Benutzerdefinierte Größen
                 * 
                 */
                $wp_additional_image_sizes = wp_get_additional_image_sizes();

                #var_dump($wp_additional_image_sizes);

                #var_dump($get_intermediate_image_sizes);
                $sizes = array();
                // Create the full array with sizes info
                foreach ($get_intermediate_image_sizes as $_size) {

                    #echo $_size . '<br>';
                    /*if (in_array($_size, array('thumbnail', 'medium', 'large'))) {
                        $sizes[$_size]['width'] = get_option($_size . '_size_w');
                        $sizes[$_size]['height'] = get_option($_size . '_size_h');
                    } elseif (isset($wp_additional_image_sizes[$_size])) {
                        $sizes[$_size] = array(
                            'width' => $wp_additional_image_sizes[$_size]['width'],
                            'height' => $wp_additional_image_sizes[$_size]['height']
                        );
                    }*/
                }

                #echo '<ul>';
                foreach ($sizes as $key => $image_size) {
                    #echo $key . ' key<br>';
                    #echo $image_size['width'] . ' width<br>';
                    #echo $image_size['height'] . ' height<br>';

                    $muster = "/[0-9]/";

                    if (!preg_match($muster, $key)) {
                        #echo  '<li>' . $key . ' ' . $image_size['width'] . ' x ' . $image_size['height'] . '</li>';
                    }
                }
                #echo '</ul>';

                #echo '<br><br>';
                ?>
                <?php
                if ($image_id !== 0) {
                    // Größen 
                    $image_src_view = wp_get_attachment_image_src($image_id, $size_view)[0];
                    #echo $image_src_view . " blog-beitrag-image<br>";

                    $image_src_preview = wp_get_attachment_image_src($image_id, $size_preview)[0];
                    #echo $image_src_preview . " blog-vorschau-image<br>";


                    $img_srcset = wp_get_attachment_image_srcset($image_id, 'medium');
                    echo $img_srcset . " vfvgfv<br>";

                    $img_size4 = wp_get_attachment_image_sizes($image_id, 'large');
                    #echo $img_size4 . " large<br>";

                    $img_size4 = wp_get_attachment_image_sizes($image_id, 'thumbnail');
                    #echo $img_size4 . " thumbnail<br>";

                    $img_size3 = wp_get_attachment_image_sizes($image_id, 'medium');
                    #echo $img_size3 . " medium<br>";

                    $img_size = wp_get_attachment_image_sizes($image_id, 'blog-beitrag-image');
                    #echo $img_size . " blog-beitrag-image<br>";

                    $img_size2 = wp_get_attachment_image_sizes($image_id, 'blog-vorschau-image');
                    #echo $img_size2 . " blog-vorschau-image<br>";
                }

                #echo wp_get_attachment_image_srcset($image_id, 'medium');

                #echo wp_get_attachment_image($image_id);

                #echo get_the_post_thumbnail($image_id);
                ?>

            </article>

            <?php
            /**
             * 
             * Ende des Abschnitt
             * 
             */
            ?>
        <?php endwhile;
    else : ?>
        <?php
        /**
         * 
         * Hinweis
         * 
         */
        ?>
        <p><?php esc_html_e('Keine Artikel vorhanden.'); ?></p>
    <?php endif; ?>

</main>
asaSAs
<!--
    <?php get_sidebar(); ?>
-->

<?php get_footer(); ?>