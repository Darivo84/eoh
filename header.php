<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package creativespark
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <?php do_action('above_header_navbar'); ?>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <?php the_custom_logo(); ?>

        <button class="search"><i id="topicon" class="fa fa-search" aria-hidden="true"></i></button>
            <input id="topsearch" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span id="line">| &nbsp;&nbsp;</span>
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php wp_nav_menu(
                array(
                        'theme_location'  => 'primary',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'navbarSupportedContent',
                        'menu_class'      => 'navbar-nav mr-auto',
                        'fallback_cb'     => '',
                        'menu_id'         => 'main-menu',
                        'walker'          => new Creativespark_WP_Bootstrap_Navwalker(),
                )
        ); ?>
          
    </nav><!-- .navbar -->

    <?php //$id = get_the_ID(); var_dump($id); die; ?>
    
    <?php $post = get_post(get_the_ID()); ?>
    
    <?php $postcategories = get_the_category( $post->ID ); ?>

    
    <?php //$post_categories = get_the_category($post->ID); ?>
     
    <?php if( $post ): ?>
        <?php if( ($post->post_parent == 236) || ($post->ID == 236)  ): ?>
     
            <div class="secondary-nav-wrapper">
                <nav class="secondary-nav">
                    <?php wp_nav_menu(
                            array(
                                    'theme_location'  => 'servicesmenu',
                                    'container_class' => 'secondary-nav-wrapper',
                                    'container_id'    => 'services-menu',
                                    'menu_class'      => 'menu',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'services-sub-menu',
                                    'walker'          => new Creativespark_WP_Submenu_Navwalker(),
                            )
                    ); ?>   
                </nav>
            </div>
    
        <?php endif; ?>
    <?php endif; ?>

    <?php if( $post ): ?>
        <?php if( ($post->post_parent == 62) || ($post->ID == 62)  ): ?>
     
            <div class="secondary-nav-wrapper">
                <nav class="secondary-nav">
                    <?php wp_nav_menu(
                            array(
                                    'theme_location'  => 'investorrelationsmenu',
                                    'container_class' => 'secondary-nav-wrapper',
                                    'container_id'    => 'investorrelations-menu',
                                    'menu_class'      => 'menu',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'investorrelations-sub-menu',
                                    'walker'          => new Creativespark_WP_Submenu_Navwalker(),
                            )
                    ); ?>   
                </nav>
            </div>
    
        <?php endif; ?>
    <?php endif; ?>  

    <?php 
    
        if (!empty($postcategories)) {
            $categories = array();
            foreach ($postcategories as $wp_term_object) {
                $categories[] = $wp_term_object->cat_name;
            } ?>
            
                <div class="secondary-nav-wrapper">
                    <nav class="secondary-nav">
                        <?php wp_nav_menu(
                                array(
                                        'theme_location'  => 'knowledgebasemenu',
                                        'container_class' => 'secondary-nav-wrapper',
                                        'container_id'    => 'investorrelations-menu',
                                        'menu_class'      => 'menu',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'knowledgebasemenu-sub-menu',
                                        'walker'          => new Creativespark_WP_Submenu_Navwalker(),
                                )
                        ); ?>   
                    </nav>
                </div>            
            
            
        <?php }  ?>    