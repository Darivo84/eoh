<?php

/* Template Name: SENS */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>


	<?php
		/**
		 * csi_sens_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->display_sens_page_content - 10 
		 */
		do_action('csi_sens_page_content');
	?>

<?php get_footer(); ?>
