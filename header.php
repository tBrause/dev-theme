<?php

/**
 * 
 * Header
 * 
 */

?>
<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <?php

    /**
     * 
     * Hol den Titel
     * 
     * @ var string
     * 
     */
    $title = get_the_title();

    /**
     * Selected Title-Tag
     * IS Front-Page
     * OR other Page-Types
     * 
     */
    if (is_front_page()) {
    ?><title><?php bloginfo('name'); ?></title>
    <?php
    } else {
    ?><title><?php echo trim($title); ?></title>
    <?php
    }
    ?>

    <!-- CSS -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- JS -->
    <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/defer.js"></script>

    <!-- Favicon -->


    <?php
    /**
     * Developer Console Start
     * only WP-Admin
     * 
     */
    if (is_user_logged_in() === 1) {
        wp_head();
    }
    ?>
</head>

<body>
    <?php
    /**
     *
     * Hauptnavigation
     * mit allen Ebenen
     *
     */
    get_template_part('template-parts/nav-main-full');
    ?>

    <?php
    /**
     *
     * Hauptnavigation
     * nur Menüpunkte auf Ebene 1
     *
     */
    get_template_part('template-parts/nav-main');
    ?>

    <div class="bloginfo"><i class="bloginfo-icon fab fa-dev"></i><?php bloginfo('name'); ?></div>

    <header>
        <h1>
            <?php
            /**
             * 
             * Header 
             * 
             */

            echo trim($title);
            ?>
        </h1>
        <?php
        /**
         * 
         * Header Bild
         * 
         */
        if (get_header_image() !== false) {
        ?>
            <img src="<?php esc_url(header_image()); ?>">
        <?php
        }
        ?>
    </header>

    <?php
    /**
     *
     * Unternavigation
     *
     */

    get_template_part('template-parts/sub-nav-main');
    ?>

    <?php
    /**
     *
     * Suchfeld
     *
     */

    get_template_part('template-parts/search-input');

    ?>