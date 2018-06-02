    <?php
	function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return str_replace('--', '-', $string);
    }
	?>
	<section class="content-listing service-infomation">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="image left">
                                    <img src="<?php the_field('first_row_image') ?>" class="d-block w-100" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="content">
                                    <h2><?php the_field('first_row_heading') ?></h2>
                                        <?php the_field('first_row_text') ?>
                                    <a href="" class="btn read-more grey">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="eoh-content-tabs service-tabs">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <ul class="nav nav-tabs row no-gutters" id="myTab" role="tablist">
                                    
                                    <?php if($services = get_field('services')):
                                        $counter = 0;
                                        foreach ($services as $service) { ?>

                                        <li class="nav-item col-12">
                                            <a class="nav-link <?php echo ($counter == 0) ? 'active' : ''; ?>" id="<?php echo clean(strtolower($service['services_name'])); ?>-tab" data-toggle="tab" href="#<?php echo clean(strtolower($service['services_name'])); ?>" role="tab" aria-controls="<?php echo clean(strtolower($service['services_name'])); ?>" aria-selected="<?php echo ($counter == 0) ? 'true' : 'false'; ?>">
                                                <img src="<?php echo $service['service_icon_image'] ?>" class="d-block"/>
                                                <?php echo $service['services_name'] ?>
                                            </a>
                                        </li>                                    
                                        
                                        <?php $counter++; } ?> 
                                    <?php endif; ?> 
                                        
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">

                            <?php if($services = get_field('services')):
                                $counter = 0;
                                foreach ($services as $service) { ?>

                                    <div class="tab-pane fade show <?php echo ($counter == 0) ? 'active' : ''; ?>" id="<?php echo clean(strtolower($service['services_name'])); ?>" role="tabpanel" aria-labelledby="<?php echo clean(strtolower($service['services_name'])); ?>-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="content">
                                                        <h2><?php echo $service['services_name'] ?></h2>
                                                        <p><?php echo $service['service_text'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                 

                                <?php $counter++; } ?>
                            <?php endif; ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="service-downloads pdf-downloads">
        <div class="heading">
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <h5><?php the_title(); ?> Services</h5>
                        <h2>Downloads</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="downloads">
                        
                            <?php if($pdf = get_field('pdf')):
                                foreach ($pdf as $file_info) { ?>
                                    <a href="<?php echo $file_info['pdf_download'] ?>" class="link"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php echo $file_info['pdf_title'] ?></a>                                
                                <?php } ?>                         
                            <?php endif; ?>   
                    </div>
                </div>
            </div>
        </div>
    </section>   
    
<?php
    global $wpdb;
    $bawmrp_options = get_option( 'bawmrp' );
    $id = (int)get_post_meta(get_the_ID(), '_yyarpp', true );
    $related_post = get_post($id);
    $related_post_banner_image = get_field('top_banner_image', $id);
    $categories = get_the_category( $id);
?>

    <section class="related-articles">
        <div class="heading">
            <h2>RELATED ARTICLES</h2>
        </div>
        <div class="image-banner">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <img src="<?php echo $related_post_banner_image; ?>" class="d-block" />
                        <div class="banner-info">
                            <div class="skew">
                                <div class="content">
                                    <div class="category"><a href=""><?php echo $categories[0]->name; ?></a></div>
                                    <h2><?php echo $related_post->post_title; ?></h2>
                                    <h4><?php echo get_the_excerpt( $id ); ?></h4>
                                    <a href="<?php echo get_the_permalink($id); ?>" class="btn read-more blue">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


