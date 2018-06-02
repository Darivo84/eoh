<?php
    $chosen_home_page_latest_news_post_id = esc_attr( get_post_meta( get_the_ID(), 'home_page_latest_news', true ) );
    
    if($chosen_home_page_latest_news_post_id) {
    
        $chosen_home_page_latest_news_post = get_post($chosen_home_page_latest_news_post_id);
        
        if($chosen_home_page_latest_news_post->post_type == 'post') {
            $chosen_home_page_latest_news_post_excerpt = get_the_excerpt($chosen_home_page_latest_news_post_id);
        } else {
           $chosen_home_page_latest_news_post_excerpt = get_field( 'page_excerpt', $chosen_home_page_latest_news_post_id );     
        }
    }
?>

<section class="latest-news">
    <div class="heading">
        <h5>WHAT'S HOT</h5>
        <h2>LATEST news</h2>
    </div>
    <div class="image-banner">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <img src="<?php the_field( 'latest_news_block_image' ); ?>" class="d-block" />
                    <div class="banner-info">
                        <div class="skew">
                            <div class="content">
                                <div class="category"><a href="">Category</a></div>
                                <h2><?php echo $chosen_home_page_latest_news_post->post_title ? $chosen_home_page_latest_news_post->post_title : ''; ?></h2>
                                <h4> <?php echo $chosen_home_page_latest_news_post_excerpt ? $chosen_home_page_latest_news_post_excerpt : ''; ?> </h4>
                                <a href="" class="btn read-more blue">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>