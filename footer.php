<?php

/**
 *
 * extra navigation
 * für weitere Themenseiten
 *
 */

get_template_part('template-parts/nav-extern');
?>

<?php
/**
 * 
 * Footer
 * 
 */
?>
<footer>
    <div class="footer-container">
        <?php
        /**
         * 
         * Theme Details
         * 
         */
        ?>
        <div class="wp-theme-info">
            <!--<i class="bloginfo-icon fab fa-dev"></i>--><?php bloginfo('description'); ?> @ lllllllllllllllllllll Torsten Brause
        </div>

        <?php
        /**
         *
         * rechtliche Navigation
         * mit <nav>
         *
         */

        get_template_part('template-parts/nav-footer');
        ?>
    </div>
</footer>


<?php
/**
 * Developer Console End
 * only WP-Admin
 * 
 */
if (is_user_logged_in() === 1) {
    wp_footer();
}
?>
</body>

</html>