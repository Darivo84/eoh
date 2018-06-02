<?php get_header(); ?>

	<?php
		/**
		 * csi_category hook.
		 *
		 * @hooked Theme_Creative_Spark->display_category_image_banner - 10 
		 * @hooked Theme_Creative_Spark->csi_display_category - 20
		 */
		do_action('csi_category');
	?>

<?php get_footer(); ?>