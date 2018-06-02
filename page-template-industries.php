<?php

/* Template Name: Solutions by Industries */

?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; ?>


<?php
/**
 * industries_page_content hook.
 *
 * @hooked Theme_Creative_Spark->display_industries_page_content - 10
 */
do_action('industries_page_content');
?>

<?php get_footer(); ?>
