<?php
    /*
     * Class: Eoh_Options
     * Description: Provide post level abilities to target posts on the front-end.
     * Version: 1.0.0
     */

    if(!class_exists('Eoh_Options')) {
        class Eoh_Options
            {
            

            private static $csi_theme_instance = null;
            
            /*
             * Constructor
             */
                public function __construct()
                {
                    
                    self::$csi_theme_instance = creative_spark_theme();
                    
                    if(is_admin()) {
                        add_action('load-post.php', array( &$this, 'setup_meta_box'));
                        add_action('load-post-new.php', array( &$this, 'setup_meta_box' ));                       
                    }
                }

            /*
             * Bind admin hooks
             */
                public function setup_meta_box() {
                    add_action('add_meta_boxes', array( &$this, 'add_post_meta_boxes'));
                    add_action('save_post', array( &$this, 'save_front_page_excerpt_meta_boxes' ), 10, 2);
                    add_action('save_post', array( &$this, 'save_front_page_latest_news_meta' ), 10, 2);
                }

            /*
             * Bind post edit box
             */
                public function add_post_meta_boxes() {
                    global $post;
                    if($post->ID == (int) get_option( 'page_on_front' )) {
                        add_meta_box('home_page_post_excerpts', esc_html('Front Page Post Excerpt Categories'), array( $this, 'admin_display_home_page_post_excerpts_meta' ), 'page', 'advanced', 'high');
                        add_meta_box('home_page_latest_news', esc_html('Front Page Latest News'), array( $this, 'admin_display_home_page_latest_news_meta' ), 'page', 'advanced', 'high');                        
                    }

                }

                
                public function save_front_page_excerpt_meta_boxes ( $post_id, $post ) {
                    
                        if ( !isset( $_POST['chosen_excerpt_block_one'] ) ||  !isset( $_POST['chosen_excerpt_block_two'] ) || !wp_verify_nonce( $_POST['csi_home_page_post_excerpts_nonce'], basename( __FILE__ ) ) ) {
                            return $post_id;
                        } else {
                            $keys = []; 
                            $keys[] = 'chosen_excerpt_block_one';
                            $keys[] = 'chosen_excerpt_block_two';
                            $keys[] = 'chosen_excerpt_block_three';
                        }
                          
                        $post_type = get_post_type_object( $post->post_type );
                        if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
                             return $post_id;
                        }
                        
                        foreach ($keys as $meta_key) {
                            
                            $new_chosen_excerpt_block_value = ( isset( $_POST[$meta_key] ) ? sanitize_html_class( $_POST[$meta_key] ) : '' );                          
                            $meta_value = get_post_meta( $post_id, $meta_key, true );
                            if ( $new_chosen_excerpt_block_value && '' == $meta_value ) {
                                add_post_meta( $post_id, $meta_key, $new_chosen_excerpt_block_value, true );
                            }  elseif ( $new_chosen_excerpt_block_value && $new_chosen_excerpt_block_value != $meta_value ) {
                                update_post_meta( $post_id, $meta_key, $new_chosen_excerpt_block_value );
                            }                              
                        }
                    
                }
                
                public function admin_display_home_page_post_excerpts_meta($post) {
                    
                    if($post->ID == (int) get_option( 'page_on_front' )) {
                        $chosen_excerpt_block_one = esc_attr( get_post_meta( $post->ID, 'chosen_excerpt_block_one', true ) );
                        $chosen_excerpt_block_two = esc_attr( get_post_meta( $post->ID, 'chosen_excerpt_block_two', true ) );
                        $chosen_excerpt_block_three = esc_attr( get_post_meta( $post->ID, 'chosen_excerpt_block_three', true ) );
                        
                        wp_nonce_field( basename( __FILE__ ), 'csi_home_page_post_excerpts_nonce' ); 
                        
                        $args = array(
                                'post_type' => array( 'post', 'page' ),
                                'post_status' => 'publish',
                                'posts_per_page'=>-1
                        );
                        $post_query = new WP_Query( $args );
                        
                        if ( $post_query->have_posts() ) {
                            ?> 
                                <p>
                                  <label for="chosen_excerpt_block_one"><?php _e( "Choose the page from which you would like to display the excerpt in the first block.", 'example' ); ?></label>
                                  <select id="chosen_excerpt_block_one" name="chosen_excerpt_block_one" style="float: right; width: 45%;margin-right: 10%;">
                                  <br />
                                    <?php 
                                        while ( $post_query->have_posts() ) {
                                            $post_query->the_post();
                                            ?>
                                              <option class="widefat" <?php echo $chosen_excerpt_block_one == get_the_ID() ? 'selected' : '' ;   ?> value="<?php the_ID() ?>"><?php the_title() ?></option>
                                            <?php 
                                        }
                                    ?>
                                   </select>
                                </p>
                              
                            <?php wp_reset_postdata(); ?> 
                            
                                <p>
                                    <label for="chosen_excerpt_block_two"><?php _e( "Choose the page from which you would like to display the excerpt in the second block.", 'example' ); ?></label>
                                    <select id="chosen_excerpt_block_two" name="chosen_excerpt_block_two" style="float: right; width: 45%;margin-right: 10%;">
                                    <br />
                                    <?php 
                                        while ( $post_query->have_posts() ) {
                                            $post_query->the_post();
                                            ?>
                                              <option class="widefat" <?php echo $chosen_excerpt_block_two == get_the_ID() ? 'selected' : '' ;   ?> value="<?php the_ID() ?>"><?php the_title() ?></option>
                                            <?php 
                                        }
                                    ?>
                                    </select>
                                </p>
                            <?php  wp_reset_postdata(); ?>                                 
                               
                                <p>
                                    <label for="chosen_excerpt_block_three"><?php _e( "Choose the page from which you would like to display the excerpt in the third block.", 'example' ); ?></label>
                                    <select id="chosen_excerpt_block_three" name="chosen_excerpt_block_three" style="float: right; width: 45%;margin-right: 10%;">
                                    <br />
                                    <?php 
                                        while ( $post_query->have_posts() ) {
                                            $post_query->the_post();
                                            ?>
                                              <option class="widefat" <?php echo $chosen_excerpt_block_three == get_the_ID() ? 'selected' : '' ;   ?> value="<?php the_ID() ?>"><?php the_title() ?></option>
                                            <?php 
                                        }
                                    ?>
                                    </select>
                                </p>
                            <?php  wp_reset_postdata();                                
                                
                        }
                        
                    }
                }
                
                public function admin_display_home_page_latest_news_meta($post) {
                    
                    if($post->ID == (int) get_option( 'page_on_front' )) {
                        $chosen_home_page_latest_news = esc_attr( get_post_meta( $post->ID, 'home_page_latest_news', true ) );
                        
                        wp_nonce_field( basename( __FILE__ ), 'home_page_latest_news_nonce' ); 
                        
                        $args = array(
                                'post_type' => array( 'post', 'page' ),
                                'post_status' => 'publish',
                                'posts_per_page'=>-1
                        );
                        $post_query = new WP_Query( $args ); 
           
                        if ( $post_query->have_posts() ) {
                            ?> 
                                <p>
                                  <label for="home_page_latest_news"><?php _e( "Choose the page/post from which you would like to display the news excerpt in the Latest News section.", 'example' ); ?></label>
                                  <select id="home_page_latest_news" name="home_page_latest_news" style="float: right; width: 45%;margin-right: 10%;">
                                  <br />
                                    <?php 
                                        while ( $post_query->have_posts() ) {
                                            $post_query->the_post();
                                            ?>
                                              <option class="widefat" <?php echo $chosen_home_page_latest_news == get_the_ID() ? 'selected' : '' ;   ?> value="<?php the_ID() ?>"><?php the_title() ?></option>
                                            <?php 
                                        }
                                    ?>
                                   </select>
                                </p>

                            <?php  wp_reset_postdata();                                
                                
                        }
                        
                    }                    
                    
                }
                
                public function save_front_page_latest_news_meta ( $post_id, $post ) {
                    
                        if ( !isset( $_POST['home_page_latest_news'] ) || !wp_verify_nonce( $_POST['home_page_latest_news_nonce'], basename( __FILE__ ) ) ) {
                            return $post_id;
                        } 
                          
                        $post_type = get_post_type_object( $post->post_type );
                        if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
                             return $post_id;
                        }

                        $new_meta_value = ( isset( $_POST['home_page_latest_news'] ) ? sanitize_html_class( $_POST['home_page_latest_news'] ) : '' );     
                        
                        $saved_meta_value = get_post_meta( $post_id, 'home_page_latest_news', true );
                        if ( $new_meta_value && '' == $saved_meta_value ) {
                            add_post_meta( $post_id, 'home_page_latest_news', $new_meta_value, true );
                        }  elseif ( $new_meta_value && $new_meta_value != $saved_meta_value ) {
                            update_post_meta( $post_id, 'home_page_latest_news', $new_meta_value );
                        }                              
                  
                }
     
                
            }

        /*
         * Initialise
         */
  
        $eoh_Options = new Eoh_Options();
    }