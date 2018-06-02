<section class="image-banner">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <img src="<?php echo get_field('top_banner_image') ? get_field('top_banner_image') : '' ; ?>" class="d-block" />
                    <div class="banner-info">
                        <div class="skew">
                            <div class="content">
                                <?php the_title( '<h1>', '</h1>' ); ?>
                                <?php if($bloginfo = get_bloginfo('description')): ?>     
                                    <h4><?php echo $bloginfo; ?></h4>
                                <?php endif; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php do_action('services_listing'); ?>
</section>