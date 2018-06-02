
<?php 

    $chosen_excerpt_block_one_post_id   = esc_attr( get_post_meta( get_option('page_on_front'), 'chosen_excerpt_block_one', true ) );
    $chosen_excerpt_block_two_post_id   = esc_attr( get_post_meta( get_option('page_on_front'), 'chosen_excerpt_block_two', true ) );
    $chosen_excerpt_block_three_post_id = esc_attr( get_post_meta( get_option('page_on_front'), 'chosen_excerpt_block_three', true ) ); 

    $chosen_excerpt_block_one_post      = get_post($chosen_excerpt_block_one_post_id);
    $chosen_excerpt_block_two_post      = get_post($chosen_excerpt_block_two_post_id);
    $chosen_excerpt_block_three_post    = get_post($chosen_excerpt_block_three_post_id);
 
?>

<div class="error-page">

    <section class="content-listing error-information">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="content">
                        <h1>404</h1>
                        <h2>We looked everywhere<br />
                        and could not find what you were looking for.</h2>
                        <div class="return">
                            <a href="<?php echo home_url();  ?>" class="btn read-more grey">Home</a>
                            <a href="<?php echo home_url() . '/sitemap';  ?>" class="btn read-more grey">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="more-articles">
    <div class="heading">
        <h3>You might like the following:</h3>
    </div>
    <div class="content-listing">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="content">
                                    <div class="category"><a href="">Category</a></div>
                                    <h2><?php echo $chosen_excerpt_block_one_post->post_title ? $chosen_excerpt_block_one_post->post_title : ''; ?></h2>
                                    <p><?php the_field( 'page_excerpt', $chosen_excerpt_block_one_post_id ); ?></p>
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
    </div>
    </section>

</div>

