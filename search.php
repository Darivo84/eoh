<?php
/**
 * The template for displaying search results pages.
 *
 * @package creativespark
 */

get_header();?>

<div class="search-page">

    <?php if ( have_posts() ) : ?>
    <div class="heading">
        <div class="container">
            <div class="col-12">
                <header class="page-header">
                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: " %s "', 'understrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
    </div>

    <section class="content-listing search-results-listing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-row">
                        <div class="row">
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="content-block">
                                        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_field('top_banner_image') ? get_field('top_banner_image') : get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : ''; ?>" class="d-block w-100" /></a>
                                        <div class="content">
                                            <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo the_title(); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
        <div class="heading">
            <div class="container">
                <div class="col-12">
                    <header class="page-header">
                        <h1 class="page-title"><?php printf( esc_html__( 'No results found for: " %s "', 'understrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                </div>
            </div>
        </div>
        <?php do_action('csi_sitemap_page_content'); ?>

    <?php endif; ?>

<?php get_footer(); ?>

