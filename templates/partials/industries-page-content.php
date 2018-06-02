<?php
    $industries = get_field('the_industries');
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return str_replace('--', '-', $string);
    }
?>

<section class="page-content industry-information">
    <div class="container">
        <div class="row no-gutters">
            <div class="col">
                <div class="content">
                    <h2><?php the_title(); ?></h2>
                    <?php echo get_field('page_content'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if($industries) { ?>
<section class="eoh-content-tabs industry-tabs">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <ul class="nav nav-tabs row no-gutters" id="myTab" role="tablist">
                                <?php $count = 1; ?>
                                <?php foreach ($industries as $industry) { ?>
                                <li class="nav-item col-12">
                                    <a class="nav-link <?php echo $count == 1 ? 'active' : '' ?>" id="<?php echo clean(strtolower($industry['industry_title'])); ?>-tab" data-toggle="tab"
                                       href="#<?php echo clean(strtolower($industry['industry_title'])); ?>" role="tab" aria-controls="<?php echo clean(strtolower($industry['industry_title'])); ?>"
                                       aria-selected="true">
                                        <img src="<?php echo $industry['industry_icon']; ?>" class="d-block"/>
                                        <?php echo $industry['industry_title']; ?>
                                    </a>
                                </li>
                                <?php $count ++; ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <?php $count = 1; ?>
                    <?php foreach ($industries as $industry) { ?>
                    <div class="tab-pane fade show <?php echo $count == 1 ? 'active' : '' ?>" id="<?php echo clean(strtolower($industry['industry_title'])); ?>" role="tabpanel"
                         aria-labelledby="<?php echo clean(strtolower($industry['industry_title'])); ?>-tab">

                        <div class="content-listing">
                            <div class="container-fluid p-0">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <div class="content-block">
                                            <div class="row no-gutters">
                                                <div class="col-12 col-sm-12 col-md-5">
                                                    <div class="image left">
                                                        <img src="<?php echo $industry['industry_image']; ?>" class="d-block w-100"/>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-7">
                                                    <div class="content">
                                                        <h2><?php echo $industry['industry_title']; ?></h2>
                                                        <?php echo $industry['industry_information']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($industry['case_studies']) { ?>
                        <div class="case-studies">
                            <div class="heading">
                                <div class="container p-0">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <h2><?php echo $industry['case_studies_title']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <?php $countPosts = 0; ?>
                                    <?php foreach ($industry['case_studies'] as $case_study) { ?>
                                        <?php $countPosts ++; ?>
                                        <div class="col-12 col-sm-6 col-md-3" style="<?php echo $countPosts < 5 ? 'display:block;' : 'display:none;'; ?>">
                                        <div class="content-block">
                                            <img src="<?php echo get_the_post_thumbnail_url($case_study['select_post']->ID); ?>" class="d-block w-100"/>
                                            <div class="content">
                                                <h5><?php echo $case_study['select_post']->post_title; ?></h5>
                                                <p><?php echo $case_study['select_post']->post_content; ?></p>
                                                <a href="<?php echo get_the_permalink($case_study['select_post']->ID); ?>" class="btn read-more blue">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(count($industry['case_studies']) > 4) { ?>
                                    <div class="col-12">
                                        <div class="view-more-btn">
                                            <span class="btn read-more red">View More Case Studies</span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($industry['the_partners']) { ?>
                        <div class="partners">
                            <div class="heading">
                                <div class="container-fluid p-0">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <h2><?php echo $industry['our_partners_title']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="clients slick">
                                            <?php foreach ($industry['the_partners'] as $partner) { ?>
											<div>
												<div class="col-12 align-middle">
													<img src="<?php echo $partner['partner_image'] ?>" class="d-block"/>
												</div>
											</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($industry['downloads']) { ?>
                        <div class="industry-downloads pdf-downloads">
                            <?php foreach ($industry['downloads'] as $download) { ?>
                            <div class="heading">
                                <div class="container p-0">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <h5><?php echo $download['first_heading']; ?></h5>
                                            <h2><?php echo $download['second_heading']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <div class="downloads">
                                            <?php if($download['first_pdf_downloads']) { ?><a href="<?php echo $download['first_pdf_downloads'] ?>" class="link"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                Download PDF</a><?php } ?>
                                            <?php if($download['second_pdf_download']) { ?><a href="<?php echo $download['second_pdf_download']; ?>" class="link"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                Download PDF</a><?php } ?>
                                            <?php if($download['third_pdf_download']) { ?><a href="<?php echo $download['third_pdf_download']; ?>" class="link"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                Download PDF</a><?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php $count ++; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!--<section class="related-articles">-->
<!--    <div class="heading">-->
<!--        <h2>RELATED ARTICLES</h2>-->
<!--    </div>-->
<!--    <div class="image-banner">-->
<!--        <div class="container-fluid p-0">-->
<!--            <div class="row no-gutters">-->
<!--                <div class="col">-->
<!--                    <img src="images/world.jpg" class="d-block"/>-->
<!--                    <div class="banner-info">-->
<!--                        <div class="skew">-->
<!--                            <div class="content">-->
<!--                                <div class="category"><a href="">THOUGHT LEADERSHIP</a></div>-->
<!--                                <h2>EOH Forges Its Path with Big Data and Analytics</h2>-->
<!--                                <h4>As Big Data grows in popularity, constant innovations are being made to tailor-->
<!--                                    solutions for various industry verticals. And EOH has been innovating and-->
<!--                                    formulating ideas for our own clients in order to bring them into the future with-->
<!--                                    the help of Big Data and Analytics</h4>-->
<!--                                <a href="" class="btn read-more blue">Read More</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<script>
    jQuery(document).ready(function(){

        var visible = jQuery('.case-studies .col-12.col-sm-6').length;
        console.log(jQuery('.case-studies .col-12.col-sm-6').length);

        jQuery(document).on('click','.case-studies .view-more-btn .read-more', function() {

            if (jQuery(this).text() == 'View More Case Studies') {
                jQuery('.case-studies .col-12.col-sm-6:not(":visible"):lt(5)').show();
            }

            var notVisible = jQuery('.case-studies .col-12.col-sm-6:not(":visible")').length;

            if (notVisible == 0 ) {
                jQuery(this).hide();
            }
        });
    });
</script>