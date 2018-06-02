<?php
    $overview_listing_blocks = get_field('overview_listing_blocks');
    $industry_division_blocks = get_field('industry_division_blocks');
    $our_partners_image_blocks = get_field('our_partners_image_blocks');
?>





    <section class="page-content about-eoh">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('first_row_heading'); ?></h2>
                        <?php the_field('first_row_text'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="overview-listing">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    
                    <?php foreach ($overview_listing_blocks as $block): ?> 
                    
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="content-block">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="image">
                                            <img src="<?php echo $block['block_icon_image']; ?>" class="d-block" />
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="content">
                                            <h5><?php echo $block['block_title']; ?></h5>
                                            <p><?php echo $block['block_text']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    
                    <?php endforeach; ?>
      
                </div>
            </div>
        </div>
    </section>

    <section class="eoh-divisions">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('industry_division_heading'); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="eoh-divisions-strip">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    
                    
                    <?php if(is_array($industry_division_blocks)): ?>
                        <?php foreach ($industry_division_blocks as $block): ?> 

                            <div class="col-6 col-sm-6 col-md-3">
                                <div class="division-block">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="image">
                                                <img src="<?php echo $block['industry_division_icon']; ?>" class="d-block" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="content">
                                                <h5><?php echo $block['industry_division_heading']; ?></h5>
                                                <p><?php echo $block['industry_division_text']; ?></p>
                                                <a href="<?php echo $block['learn_more_url_link']; ?>" class="btn learn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                   
                        <?php endforeach; ?>                    
                    <?php endif; ?>   

                </div>
            </div>
        </div>
    </section>

    <section class="operating-model">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('operating_model_heading'); ?></h2>
                        <?php the_field('operating_model_text'); ?>
                        <img src="<?php the_field('operating_model_image'); ?>" class="d-block w-100" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="eoh-at-glance">
        <div class="heading">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col">
                        <h2 class="text-left"><?php the_field('eoh_at_a_glance_text'); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="glance slick">
                        
                        <?php if($eoh_at_a_glance_content_blocks = get_field('eoh_at_a_glance_content_blocks')): ?>
                            <?php if(is_array($eoh_at_a_glance_content_blocks) && count($eoh_at_a_glance_content_blocks)): ?>
                                <?php foreach ($eoh_at_a_glance_content_blocks as $block): ?> 

                                    <div class="col-12">
                                        <div class="content-block">
                                            <img src="<?php echo $block['block_image']; ?>" class="d-block w-100" />
                                            <div class="content">
                                                <h5><?php echo $block['block_title']; ?></h5>
                                                <p><?php echo $block['block_text'] ? $block['block_text'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>                    
                            <?php endif; ?>  
                        <?php endif; ?>                         

                    </div>
                </div>
            </div>
    </section>    

    <section class="partners">
        <div class="heading">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <h2><?php the_field('our_partners_heading'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="clients slick">
                        
                    <?php if(is_array($our_partners_image_blocks)): ?>
                        <?php foreach ($our_partners_image_blocks as $block): ?> 

                            <div class="col-12">
                                <a target="_blank" href="<?php echo $block['partner_link'] ? $block['partner_link'] : ''; ?>"><img src="<?php echo $block['partner_image'] ? $block['partner_image'] : ''; ?>" class="d-block" /></a>
                            </div>
                        
                        <?php endforeach; ?>                    
                    <?php endif; ?>                        

                    </div>
                </div>
            </div>
        </div>
    </section>
