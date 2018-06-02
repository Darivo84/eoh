<?php

/* Template Name: Sitemap */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>


	<?php
		/**
		 * csi_sitemap_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->display_sitemap_page_content - 10 
		 */
		do_action('csi_sitemap_page_content');
	?>

<?php get_footer(); ?>
