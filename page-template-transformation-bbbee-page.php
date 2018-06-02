<?php

/* Template Name: Transformation and BBBEE */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>


	<?php
		/**
		 * bbbee_transformation_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->load_bbbee_transformation_page_content - 10 
		 */
		do_action('bbbee_transformation_page_content');
	?>

<?php get_footer(); ?>
