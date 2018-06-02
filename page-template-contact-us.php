<?php /* Template Name: Contact Us */ ?>
<?php get_header(); ?>

<div class="contact-page">
    <section class="image-banner">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php $meta = get_post_meta(get_the_ID()); ?>
                        <?php echo $meta['google_map_url'][0] ?>
                    <?php endwhile; // end of the loop. ?>
                    <div class="banner-info">
                        <div class="skew">
                            <div class="content">
                                <h1><?php echo the_title(); ?></h1>
                                <h4>Get in touch.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-content contact-form">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="eoh-locations">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="content-block">
                        <div class="content">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php $meta = get_post_meta(get_the_ID()); ?>
                                <?php echo $meta['johannesburg_information'][0]; ?>
                            <?php endwhile; // end of the loop. ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="content-block">
                        <div class="content">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php $meta = get_post_meta(get_the_ID()); ?>
                                <?php echo $meta['cape_town_information'][0]; ?>
                            <?php endwhile; // end of the loop. ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="content-block">
                        <div class="content">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php $meta = get_post_meta(get_the_ID()); ?>
                                <?php echo $meta['durban_information'][0]; ?>
                            <?php endwhile; // end of the loop. ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
