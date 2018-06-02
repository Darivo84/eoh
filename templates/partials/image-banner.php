<section class="image-banner">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <img src="<?php the_field('top_banner_image') ; ?>" class="d-block" />
                    <div class="banner-info">
                        <div class="skew">
                            <div class="content">
                                <h1><?php the_title(); ?></h1>
                                <h4><?php echo the_field('page_excerpt'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
