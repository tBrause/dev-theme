<?php

/**
 * 
 * Seite
 * 
 */

?>
<?php get_header(); ?>

<main class="page-main">
    <div class="wraper">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <section><?php esc_html_e(the_content()); ?></section>

            <?php endwhile;

        else : ?>

            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>
    </div>
</main>

<!--
<?php get_sidebar(); ?>
        -->

<?php get_footer(); ?>