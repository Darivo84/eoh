<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Theme_Creative_Spark {

                /**
                 * The single instance of the class.
                 *
                 * @var Theme_Creative_Spark
                 */
                protected static $_instance = null;    

                /**
                 * Theme_Creative_Spark Constructor.
                 */
                public function __construct() {
                        $this->init_hooks();
                }

                /**
                 * Main Theme Instance.
                 *
                 * Ensures only one instance of Theme is loaded or can be loaded.
                 *
                 * @static
                 * @see creative_spark_theme()
                 * @return Theme_Creative_Spark - Main instance.
                 */
                public static function instance() {
                        if ( is_null( self::$_instance ) ) {
                                self::$_instance = new self();
                        }
                        return self::$_instance;
                }        

                /**
                 * Hook into actions and filters.
                 */
                private function init_hooks() {
                        //add_action( 'wp_enqueue_scripts', array( $this, 'creative_spark_remove_scripts' ), 20 );
                        add_action( 'wp_enqueue_scripts', array( $this, 'creative_spark_enqueue_styles_and_scripts' ) ); 
                        
                        

                        
                        //All Pages
                        add_filter( 'the_content', array( $this, 'display_top_page_image_banner' ), 10 );
                        add_filter( 'wp_nav_menu', array( $this, 'add_search_and_social_to_menu_container' ), 50, 2 );
                        add_action( 'above_header_navbar', array( $this, 'display_eoh_share_ticker' ) ); 
                        
                        //Front Page
                        add_filter( 'the_content', array( $this, 'front_page_display_tagline' ), 20 ); 
                        add_filter( 'the_content', array( $this, 'front_page_display_content_listing' ), 30 );
                        add_filter( 'the_content', array( $this, 'front_page_display_latest_news_block' ), 50 ); 
                        add_action( 'show_latest_tweet', array( $this, 'get_latest_tweet' ) );
                        add_action( 'services_listing', array( $this, 'front_page_display_services_listing' ), 20 ); 
                        
                        
                        add_action( 'after_setup_theme', array( $this, 'creativespark_setup' ) );
                        
                        //csi_youth_job_page_content
                        add_action( 'csi_youth_job_page_content', array( $this, 'page_youth_job_content_listing' ), 10 );
                        add_action( 'csi_youth_job_page_content', array( $this, 'page_contact_details_row' ), 20 );
                        add_action( 'csi_youth_job_page_content', array( $this, 'learnships_and_internships_row' ), 30 ); 
                        add_action( 'csi_youth_job_page_content', array( $this, 'our_partners_row' ), 40 ); 
                        
                        //ict_page_content
                        add_action( 'bbbee_transformation_page_content', array( $this, 'bbbee_transformation_page' ), 10 ); 
                        
                        //404_page_content
                        add_action( '404_page_content', array( $this, 'four_o_four_page_content' ), 10 );

                        //category and sub-category pages
                        add_action( 'csi_category', array( $this, 'display_category_image_banner' ), 10 );
                        add_action( 'csi_category', array( $this, 'csi_display_category' ), 20 );

                        //services template/pages
                        add_action( 'services_page_content', array( $this, 'load_services_page_content' ), 10 );
                        
                        //about page
                        add_action( 'csi_about_page_content', array( $this, 'display_about_page_content' ), 10 );
                        
                        //leadership page
                        add_action( 'csi_leadership_page_content', array( $this, 'display_leadership_page_content' ), 10 );
                        
                        //investor info page
                        add_action('csi_investor_info_page_content', array( $this, 'display_investor_info_page_content' ), 10 );
                        
                        //single infographic article
                        add_action('the_content', array( $this, 'display_infographic_article_content' ), 20 );
                        
                        add_action('csi_sitemap_page_content', array( $this, 'display_sitemap_page_content' ), 20 );
                        
                        add_action('csi_financial_results_page_content', array( $this, 'display_financial_results_page_content' ), 20 );
                        
                        add_action('csi_sens_page_content', array( $this, 'display_sens_page_content' ), 20 );
						
			//solutions by industries template/pages
                        add_action( 'industries_page_content', array( $this, 'load_industries_page_content' ), 10 );
                        
                        add_action( 'wp_ajax_nopriv_get_financial_results_by_ajax', array( $this, 'get_financial_results_by_ajax' ), 10 );
                        add_action( 'wp_ajax_get_financial_results_by_ajax', array( $this, 'get_financial_results_by_ajax' ), 10 );                        
                        
                }
                
                
                public function creativespark_setup() {

                        register_nav_menus( array(
                                'primary' => __( 'Primary Menu', 'creativespark' ),
                                'servicesmenu' => __( 'Services Menu', 'creativespark' ),
                                'investorrelationsmenu' => __( 'Investor Relations Menu', 'creativespark' ),
                                'knowledgebasemenu' => __( 'Knowledge Base Menu', 'creativespark' ),
                        ) );

                        /*
                         * Switch default core markup for search form, comment form, and comments
                         * to output valid HTML5.
                         */
                        add_theme_support( 'html5', array(
                                'search-form',
                                'comment-form',
                                'comment-list',
                                'gallery',
                                'caption',
                        ) );

                        /*
                         * Adding Thumbnail basic support
                         */
                        add_theme_support( 'post-thumbnails' );

                        /*
                         * Enable support for Post Formats.
                         * See http://codex.wordpress.org/Post_Formats
                         */
                        add_theme_support( 'post-formats', array(
                                'aside',
                                'image',
                                'video',
                                'quote',
                                'link',
                        ) );

                        // Set up the WordPress Theme logo feature.
                        add_theme_support( 'custom-logo' );

                }               
                
                
                public function add_search_and_social_to_menu_container( $nav_menu, $args ) {
                    
                    if($args->menu->name == "Main Menu") {
                        $search_form = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/search-form.php' ) . '</div>';
                       $nav_menu = str_replace( '</div>', $search_form, $nav_menu );
                    }
                    return $nav_menu;    
                }

                /**
                 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
                 */        
                public function creative_spark_remove_scripts() {
                        wp_dequeue_style( 'understrap-styles' );
                        wp_deregister_style( 'understrap-styles' );

                        wp_dequeue_script( 'understrap-scripts' );
                        wp_deregister_script( 'understrap-scripts' );
                }

                /**
                 * Enqueue styles and scripts.
                 */                 
                public function creative_spark_enqueue_styles_and_scripts() {
                        // Get the theme data
                        $the_theme = wp_get_theme();
                        
                        wp_enqueue_style( 'bootstrap-styles', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css' );
                        wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), $the_theme->get( 'Version' ) );
                        wp_enqueue_style( 'media-styles', get_stylesheet_directory_uri() . '/assets/css/media.css' );
                        wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
                        wp_enqueue_script( 'jquery');
                        wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('jquery'), false);
                                               
                        wp_enqueue_style( 'slick_styles', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
                        wp_enqueue_script( 'slick_slider_js', get_stylesheet_directory_uri() . '/assets/js/slick.js', array('jquery'), true);
                        
                        wp_enqueue_script( 'bootstrap_js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), true);
                        wp_enqueue_script( 'progressbar_js', get_stylesheet_directory_uri() . '/assets/js/progressbar.js', array('jquery'), true);
                       
                        wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/assets/js/theme.js', array('slick_slider_js'), true);
                        wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/assets/js/cs_mapgen.js', array('slick_slider_js'), true);
                        
                        wp_enqueue_script( 'isotope_js', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), true);
                        
                }
                
                
                /**
                 * Enqueue styles and scripts.
                 */                
                public function display_google_map() {
                    
                    $url = get_field('google_map_url');
                    if($url) {
                        echo $url;
                    }
                    
                }


                /**
                 * gets the date by timezone.
                 */  
                private function _date($format="r", $timestamp=false, $timezone=false) {

                    $defaultTimeZone='UTC';
                    if(date_default_timezone_get()!=$defaultTimeZone) {
                        date_default_timezone_set($defaultTimeZone);
                    }

                    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                    $gmtTimezone = new DateTimeZone('GMT');
                    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
                    $offset = $userTimezone->getOffset($myDateTime);
                    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
                }                
                
                
                
                /**
                 * Displays the share price ticker above header
                 */                    
                public function display_eoh_share_ticker() {
                        
                    $quote = file_get_contents('https://finance.google.com/finance?q=JSE:EOH&output=json');

                    //Remove CR's from ouput - make it one line
                    $json = str_replace("\n", "", $quote);

                    //Remove //, [ and ] to build qualified string  
                    $data = substr($json, 4, strlen($json) -5);

                    //decode JSON data
                    $json_output = json_decode($data, true);
                    
                    include_once dirname(dirname( __FILE__ ))  . '/templates/front-page/eoh_share_ticker.php';
                    
                }
                
                
                /**
                 * Displays the "Services" pages with their links and excerpts on the Home page Master-slider
                 */                  
                public function front_page_display_services_listing() {

                    if(is_front_page()) {
                        $services_listing = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/front-page/services_listing.php' );
                        echo $services_listing;
                    }

                }
                
                /**
                 * Include a PHP file into a string using output buffering: http://php.net/manual/en/function.include.php
                 */    
                public function get_include_contents($filename) {
                    if (is_file($filename)) {
                        ob_start();
                        include $filename;
                        return ob_get_clean();
                    }
                    return false;
                }
                
                public function front_page_display_tagline($content) {
                    if (is_front_page()) {
                        $home_page_tagline = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/front-page/home_page_tagline.php' );
                        $content .= $home_page_tagline;
                    }
                    return $content;  
                }
                
                public function front_page_display_content_listing($content) {
                    if (is_front_page()) {
                        $home_page_excerpt_row_one = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/front-page/front_page_content_listing.php' );
                        $content .= $home_page_excerpt_row_one;
                    }
                    return $content;  

                }                
                
                public function front_page_display_latest_news_block($content) {
                    if (is_front_page()) {
                        $home_page_latest_news = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/front-page/front_page_latest_news.php' );
                        $content .= $home_page_latest_news;
                    }
                    return $content;  
                } 


                public function display_top_page_image_banner($content) {
                    
                    if(is_front_page()) {
                        $image_banner = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/home-page-slider.php' );
                    } else {
                        $image_banner = $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/image-banner.php' );
                    }
                     $content .= $image_banner;
                     return $content;  
                }
               
                
                public function get_latest_tweet() {

                    require_once( dirname(dirname( __FILE__ )). '/src/twitter-api-php/TwitterAPIExchange.php');
                    
                    $settings = array(
                        'oauth_access_token'        => "388101255-b5pCWvunJW1ECrD6tQTvUmaQs3jLoFMxWXpb8atT",
                        'oauth_access_token_secret' => "4NvDBKeKsmlyv3u2rLMPdCdYAq6RrgAyZxfF0xUlZyIEm",
                        'consumer_key'              => "8zad1R3iRm5U22HaR09hnpzXO",
                        'consumer_secret'           => "oksb6rAJ6s88uKbdhmmNomMiLl4H5vhzw8fQI42znz8nqt7maT"
                    );

                    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
                    $requestMethod = "GET";
                    
                    $getfield = '?screen_name=eohtech';

                    $twitter = new TwitterAPIExchange($settings);
                    $twitter_array = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());                    
                    
                    echo $twitter_array[0]->text;

                } 
                
                
                public function page_youth_job_content_listing() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/youth-job-content-listing.php' );
                }
                
                public function page_contact_details_row() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/page-contact-details-row.php' );
                }

                public function learnships_and_internships_row() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/learnships-and-internships-row.php' );
                } 
                
                public function our_partners_row() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/our-partners-row.php' );
                }
                
                public function bbbee_transformation_page() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/transformation-bbbee-page-content.php' );
                }
                
                public function four_o_four_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/404-page-content.php' );
                }
                        
                public function csi_display_category( ) {
                    
                    $cat = get_queried_object();
                    
                    $children = get_terms( $cat->taxonomy, array(
                        'parent'    => $cat->term_id,
                        'hide_empty' => false
                    ) );
                    
                    if( ( $cat->category_parent == 0 ) && $children ) {
                        $this->load_parent_category_template($cat);
                    } else  {
                        $this->load_category_template($cat);
                    } 

                }
                
                private function load_parent_category_template($cat) {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/parent_category.php' );
                }
                
                private function load_category_template($cat) {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/category.php' );
                }

                public function display_category_image_banner() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/category-image-banner.php' );
                } 
                
                public function load_services_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/services-page-content.php' );
                } 

                public function display_infographic_article_content($content) {
                    if(is_single() && in_category( 'infographics' )) {
                        $content .=  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/infographic-article-content.php' );
                    }
                    
                    return $content;
                    
                }
                public function display_about_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/about-page-content.php' );
                }
                
                public function display_leadership_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/leadership-page-content.php' );
                }
                
                public function display_investor_info_page_content() {
                     echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/investor-info-page-content.php' );
                }
                
                public function display_sitemap_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/sitemap-page-content.php' );
                }
                
                public function display_financial_results_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/financial-results-page-content.php' );
                }
                
                public function display_sens_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/sens-page-content.php' );
                }
                
                public function load_industries_page_content() {
                    echo  $this->get_include_contents( dirname(dirname( __FILE__ ))  . '/templates/partials/industries-page-content.php' );
                }
                
                public function get_financial_results_by_ajax() {
 
                    if($post_id = $_POST['post_id']) {
                      
                        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
                               
                            $annual_reviewed_condensed_consolidated_results = get_field('annual_reviewed_condensed_consolidated_results', $post_id);
                            
                            echo $annual_reviewed_condensed_consolidated_results;
                            
                            wp_die();
                        }                        
                        
                    }
                    die;
                }
                
}
