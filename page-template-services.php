<?php

/* Template Name: Services */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>

<div class="service-page">
	<?php
		/**
		 * csi_youth_job_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->load_services_page_content - 10 
		 */
		do_action('services_page_content');
	?>
</div>
<?php get_footer(); ?>