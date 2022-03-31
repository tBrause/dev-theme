<?php

/**
 * Funktionen des Themes:
 * Haupt-Navigation anmelden
 * Footer-Navigation anmelden
 * HTML5 Support bereitstellen
 * Bildgrößen sperren
 * Widget-Bereiche definieren
 * 
 */

$lv_path = __DIR__ . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "customizer.php";
#require_once($lv_path);

if (!function_exists('theme_my_first_setup')) :

    function theme_my_first_setup()
    {

        /**
         * 
         * Haupt-Navigation freigeben
         * 
         */
        register_nav_menu('main_nav', 'Position Haupt-Navigation');

        /**
         * 
         * Footer-Navigation freigeben
         * 
         */
        register_nav_menu('footer_nav', 'Position Footer-Navigation');

        /**
         * 
         * weitere Themen-Seiten-Navigation freigeben
         * 
         */
        register_nav_menu('extern_nav', 'weitere Themen-Seiten');

        /**
         * 
         * HTML5 Support
         * 
         */
        $args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        );
        add_theme_support('html5', $args);

        /**
         * 
         * Deactive large size
         * 
         */
        // disable generated image sizes
        // https://perishablepress.com/disable-wordpress-generated-images/#disable-medium-large
        function shapeSpace_disable_image_sizes($sizes)
        {
            unset($sizes['medium_large']); // disable medium-large size
            unset($sizes['1536x1536']);    // disable 2x medium-large size
            unset($sizes['2048x2048']);    // disable 2x large size

            return $sizes;
        }
        add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');

        // disable scaled image size
        add_filter('big_image_size_threshold', '__return_false');

        /**
         * 
         * Widget-Bereiche definieren
         * 
         */
        function widget_bereiche()
        {
            register_sidebar(array(
                'name'          => 'Suchbox',
                'id'            => 'suchbox',
                'description'   => 'Widget-Bereich für Suchbox',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            ));
        }
        add_action('widgets_init', 'widget_bereiche');
    }
endif;

/**
 * 
 * Funktion 'theme_my_first_setup' ausführen
 * 
 */
add_action('after_setup_theme', 'theme_my_first_setup');
