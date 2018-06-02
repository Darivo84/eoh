<?php

/* Template Name: About EOH */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>
<div class="about-page">

	<?php
		/**
		 * csi_about_page_content hook.
		 *
                 * @hooked Theme_Creative_Spark->display_about_page_content - 10
		 */
		do_action('csi_about_page_content');
	?>

<?php get_footer(); ?>

</div>    