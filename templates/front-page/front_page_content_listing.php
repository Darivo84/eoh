<?php 
    $chosen_excerpt_block_one_post_id   = esc_attr( get_post_meta( get_the_ID(), 'chosen_excerpt_block_one', true ) );
    $chosen_excerpt_block_two_post_id   = esc_attr( get_post_meta( get_the_ID(), 'chosen_excerpt_block_two', true ) );
    $chosen_excerpt_block_three_post_id = esc_attr( get_post_meta( get_the_ID(), 'chosen_excerpt_block_three', true ) ); 

    $chosen_excerpt_block_one_post      = get_post($chosen_excerpt_block_one_post_id);
    $chosen_excerpt_block_two_post      = get_post($chosen_excerpt_block_two_post_id);
    $chosen_excerpt_block_three_post    = get_post($chosen_excerpt_block_three_post_id);
    
 
?>


<section class="content-listing">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col">
                <div class="content-block">
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-12 col-md-5">
                            <div class="content">
                                <div class="category"><a href="">Category</a></div>
                                <h2><?php echo $chosen_excerpt_block_one_post->post_title ? $chosen_excerpt_block_one_post->post_title : ''; ?></h2>
                                <p><?php echo get_the_excerpt( $chosen_excerpt_block_one_post_id ); ?></p>
                                <a href="<?php echo get_permalink($chosen_excerpt_block_one_post_id); ?>" class="btn read-more grey">Read More</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7">
                            <div class="image right d-none d-md-block">
                                <?php if (has_post_thumbnail( $chosen_excerpt_block_one_post_id ) ):  ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $chosen_excerpt_block_one_post_id ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" class="d-block w-100" />
                                <?php endif; ?>                                
                            </div>
                            <div class="extra-content">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="social-media linkendin">
                                            <div class="row no-gutters">
                                                <div class="col-8">
                                                    <div class="content">
                                                        <h3>Lorem ipsum dolor sit amet</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pharetra egestas nunc vitae finibus. </p>
                                                        <a href="" class="btn read-more white">Read More</a>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="image"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/linkedin-logo.png'; ?>" class="d-block w-100" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="article">
                                            <div class="content">
                                                <div class="category"><a href="">Media Release</a></div>
                                                <h4><?php echo $chosen_excerpt_block_two_post->post_title ? $chosen_excerpt_block_two_post->post_title : ''; ?></h4>
                                                <a href="<?php echo get_permalink($chosen_excerpt_block_two_post_id); ?>" class="btn read-more grey">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col">
                <div class="content-block">
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-12 col-md-7">
                            <div class="video">
                                <iframe src="<?php the_field('home_page_video'); ?>" frameborder="0" allow="autoplay; encrypted-media" width="100%" height="470" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5">
                            <div class="extra-content">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="article">
                                            <div class="row no-gutters">
                                                <div class="col-12 col-sm-12 col-md-6">
                                                    <div class="content">
                                                        <div class="category"><a href="">Category</a></div>
                                                        <h4><?php echo $chosen_excerpt_block_three_post->post_title ? $chosen_excerpt_block_three_post->post_title : ''; ?></h4>
                                                        <a href="<?php echo get_permalink($chosen_excerpt_block_three_post_id); ?>" class="btn read-more grey">Read More</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6">
                                                    <div class="image">
                                                        <?php if (has_post_thumbnail( $chosen_excerpt_block_three_post_id ) ):  ?>
                                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $chosen_excerpt_block_three_post_id ), 'single-post-thumbnail' ); ?>
                                                            <img src="<?php echo $image[0]; ?>" class="d-block w-100" />
                                                        <?php endif; ?>                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="social-media twitter">
                                            <div class="row no-gutters">
                                                <div class="col-4">
                                                    <div class="image"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/twitter-logo.png'; ?>" class="d-block w-100" /></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="content">
                                                        <h3>@EOHCloud</h3>
                                                        <p><?php do_action('show_latest_tweet') ?></p>
                                                        <a href="https://twitter.com/EOHCloud" class="btn read-more white">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>