<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Load custom WordPress nav walker.
 */
include_once dirname( __FILE__ ) . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Creativespark custom WordPress nav walker.
 */
include_once dirname( __FILE__ ) . '/inc/class-creativespark-submenu-wp-navwalker.php';

/**
 * Custom functions that act independently of the theme templates.
 */
include_once dirname( __FILE__ ) . '/inc/extras.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';


// Include the main Theme_Creative_Spark class.
if ( ! class_exists( 'Theme_Creative_Spark' ) ) {
	include_once dirname( __FILE__ ) . '/inc/class-theme-creative-spark.php';
}


// Include the Options class.
if ( ! class_exists( 'Eoh_Options' ) ) {
	include_once dirname( __FILE__ ) . '/inc/class-eoh-options.php';
}

function creative_spark_theme() {
        return Theme_Creative_Spark::instance();
}

//Let's go!
creative_spark_theme(); 


