<?php

/**
 * 
 * Beitragsseite
 * 
 */

?>

<?php get_header(); ?>

<main class="single-main">
    <mark>single.php</mark>

    <div class="wraper">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <section class="single-section">

                    <h2><?php the_title(); ?></h2>
                    <!--
                    <?php the_post_thumbnail('theme-slug-single-post', array('class' => 'single-post-image')); ?>
                    -->

                    <figure>
                        <?php the_post_thumbnail('blog-beitrag-image'); ?>
                        <figcaption><?php the_title(); ?></figcaption>
                    </figure>

                    <div class="single-content"><?php the_excerpt(); ?></div>

		<div class="single-content"><?php the_content(); ?></div>

                    <ul class=single-infos>
                        <li><?php the_author(); ?></li>
                        <li><?php the_time('d. F Y'); ?></li>
                    </ul>

                    <ul class=single-nav-prev-next>
                        <?php
                        previous_post_link('<li>%link</li>');
                        next_post_link('<li>%link</li>')
                        ?>
                    </ul>
                </section>

            <?php endwhile;
        else : ?>

            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>