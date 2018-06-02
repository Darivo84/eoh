<?php
/**
 * Declaring widgets
 *
 * @package creativespark
 */

if ( ! function_exists( 'creativespark_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function creativespark_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'First Footer Widget', 'creativespark' ),
			'id'            => 'footer_widget_one',
			'description'   => 'First footer widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => __( 'Second Footer Widget', 'creativespark' ),
			'id'            => 'footer_widget_two',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => __( 'Third Footer Widget', 'creativespark' ),
			'id'            => 'footer_widget_three',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => __( 'Fourth Footer Widget', 'creativespark' ),
			'id'            => 'footer_widget_four',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );

	}
} // endif function_exists( 'creativespark_widgets_init' ).
add_action( 'widgets_init', 'creativespark_widgets_init' );

