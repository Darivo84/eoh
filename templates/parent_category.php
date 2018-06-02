<?php get_header(); ?>

<div class="knowledge-base-page">
    <section class="content-listing knowledge-base">
        <div class="container">
            <div class="row">
                <?php
                $term = get_queried_object();
                $children = get_terms(array(
                    'taxonomy' => $term->taxonomy,
                    'parent' => $term->term_id,
                    'hide_empty' => false
                        ));

                foreach ($children as $child) {

                    $posts = new WP_Query(array(
                        'post_type' => 'post',
                        'orderby' => 'menu_order',
                        'numberposts' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => $term->taxonomy,
                                'field' => 'slug',
                                'terms' => $child->slug)
                        )
                    ));
                    if ($posts->have_posts()) : ?>

                        <div class="col-12">
                            <div class="content-row opinion-pieces">
                                <div class="row">                
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="content-block base-category">
                                            <div class="content">
                                                <h4><?php echo $child->name; ?></h4>
                                                <a href="<?php echo get_category_link( $child->term_id ); ?>" class="btn read-more grey">View All</a>
                                            </div>
                                        </div>
                                    </div>                

                                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="content-block">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block w-100" />
                                                <div class="content">
                                                    <div class="date"><?php echo get_the_date(); ?> </div>
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>               

                                    <?php endwhile; ?> 

                                </div>
                            </div>
                        </div> 
                    <?php endif; } ?>                

            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>