<?php get_header(); ?>

<?php

$term = get_queried_object();

$posts = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'numberposts' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => $term->taxonomy,
            'field' => 'slug',
            'terms' => $term->slug)
    )
)); ?>

    <section class="content-listing infographic-resources">
        <div class="container">
            <!--<div class="row">

                <?php //if ($posts->have_posts()) : ?>

                    <?php //while ($posts->have_posts()) : $posts->the_post(); ?>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="content-block">
                                <img src="<?php //echo get_the_post_thumbnail_url(); ?>" class="d-block w-100" />
                                <div class="content">
                                    <div class="date"><?php //echo get_the_date(); ?> </div>
                                    <h5><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></h5>
                                    <?php //the_excerpt(); ?>
                                    <a href="<?php //the_permalink(); ?>" class="btn read-more grey">Read More</a>
                                </div>
                            </div>
                        </div>               

                    <?php //endwhile; ?> 

                <?php //endif;  ?> 

            </div>-->
			
			<div class="card-group">
				<div class="row">
                <?php if ($posts->have_posts()) : ?>

                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
					<div class="col-12 col-sm-6 col-md-3">
                        <div class="card">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top d-block w-100" />
							<div class="card-body">
								<div class="date"><?php echo get_the_date(); ?> </div>
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<?php the_excerpt(); ?>
							</div>
							<div class="card-footer"><a href="<?php the_permalink(); ?>" class="btn read-more grey">Read More</a></div>
                        </div>               
					</div>               
                    <?php endwhile; ?> 

                <?php endif;  ?> 
				</div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>