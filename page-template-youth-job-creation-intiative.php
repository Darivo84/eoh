<?php

/* Template Name: Youth Job Creation Initiative */

?>

<?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>

<div class="youth-page">
	<?php
		/**
		 * csi_youth_job_page_content hook.
		 *
		 * @hooked Theme_Creative_Spark->page_youth_job_content_listing - 10 
		 * @hooked Theme_Creative_Spark->page_contact_details_row - 20
                 * @hooked Theme_Creative_Spark->learnships_and_internships_row - 30
                 * @hooked Theme_Creative_Spark->our_partners_row - 40
		 */
		do_action('csi_youth_job_page_content');
	?>
</div>
<?php get_footer(); ?>
