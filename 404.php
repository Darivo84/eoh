<?php get_header(); ?>


        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>


	<?php
		/**
		 * 404_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->four_o_four_page_content - 10 
		 */
		do_action('404_page_content');
	?>

<?php get_footer(); ?>