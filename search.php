<?php

/**
 * 
 * Header
 * 
 */

?>

<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
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
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" content="text/css; charset=UTF-8">

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

    <?php
    /**
     *
     * Suchfeld
     *
     */

    get_template_part('template-parts/search-input');

    ?>

    <div class="bloginfo"><i class="bloginfo-icon fab fa-dev"></i><?php bloginfo('name'); ?></div>

    <header>
        <h1>
            Suchergebnisse
            <?php
            /**
             * 
             * Header 
             * 
             */

            #echo trim($title);
            ?>
        </h1>
    </header>


    <main class="page-main">
        <div class="wraper">

            <?php
            foreach ($query_args as $key => $string) {
                $query_split = explode("=", $string);
                $search_query[$query_split[0]] = urldecode($query_split[1]);
            } // foreach

            $the_query = new WP_Query($search_query);
            if ($the_query->have_posts()) :
            ?>
                <!-- the loop -->

                <ul>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>