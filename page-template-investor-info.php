<?php

/* Template Name: Investor Information */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>


	<?php
		/**
		 * csi_investor_info_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->display_investor_info_page_content - 10 
		 */
		do_action('csi_investor_info_page_content');
	?>

<?php get_footer(); ?>
