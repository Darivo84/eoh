
<div class="financial-results-page investor-relations-single">

    <section class="page-content about-eoh">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('first_row_heading'); ?></h2>
                        <p><?php the_field('first_row_text'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviewed-results">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <h2><?php the_field('second_row_heading'); ?></h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                
                <?php if($condensed_consolidated_results = get_field('condensed_consolidated_results')): ?>
                    <?php if(is_array($condensed_consolidated_results) && count($condensed_consolidated_results)): ?>
                        <?php foreach ($condensed_consolidated_results as $result): ?> 
                           
                            <div class="col-12 col-sm-6 col-md-2">
                                <div class="content-block">
                                    <div class="percentage">
                                        <div class="circle" data-percentage="<?php echo 21/100; ?>"></div>
                                    </div>
                                    <div class="content">
                                        <h5><?php echo $result['result_title']; ?></h5>
                                        <p><?php echo $result['result_information']; ?></p>
                                    </div>
                                </div>
                            </div>
                
                        <?php endforeach; ?>    
                    <?php endif; ?>  
                <?php endif; ?>                 

            </div>
        </div>
    </section>
    
    <section class="annual-reviewed-results">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <h2><?php the_field('third_row_heading'); ?></h2>
                </div>
            </div>
        </div>

     
    <?php if($annual_reviewed_condensed_consolidated_results = get_field('annual_reviewed_condensed_consolidated_results')): ?>
        
        <?php if(is_array($annual_reviewed_condensed_consolidated_results) && count($annual_reviewed_condensed_consolidated_results)): ?>
        
        <?php
            $years_array = array();
            foreach($annual_reviewed_condensed_consolidated_results as $result) {
                $years_array[] = (int)$result['year'];
            }
            $years_array = array_unique($years_array);
            rsort($years_array);
        ?>        

        <div class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <select class="years" id="years" data-id="<?php echo get_the_ID(); ?>">
                            <?php foreach ($years_array as $year): ?> 
                                <option><?php echo $year ?></option>
                             <?php endforeach; ?>    
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!--<div class="row" id="results_row">

                        <?php //foreach ($annual_reviewed_condensed_consolidated_results as $result): ?> 
                
                            <?php //if((int)$result['year'] < (int)$years_array[0] ) {
                                //continue;
                            //} ?>
                           
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="content-block">
                                    <div class="image">
                                        <img src="<?php //echo $result['result_image']; ?>" class="d-block w-100"/>
                                    </div>
                                    <div class="content">
                                        <div class="category"><a href=""><?php //echo $result['result_type']; ?></a></div>
                                        <h5><?php //echo $result['result_title']; ?></h5>
                                        <p><?php //echo $result['result_text']; ?></p>
                                        <a href="<?php //echo $result['pdf_link']; ?>" class="btn blue">view</a>
                                    </div>
                                </div>
                            </div>
                
                        <?php //endforeach; ?>    
                    <?php //endif; ?>  
                <?php //endif; ?>                 
      
            </div>-->
            <div class="card-deck" id="results_row">

                        <?php foreach ($annual_reviewed_condensed_consolidated_results as $result): ?> 
                
                            <?php if((int)$result['year'] < (int)$years_array[0] ) {
                                continue;
                            } ?>
                           
                            <div class="card">
                                <!--<div class="content-block">-->
                                    <div class="image">
                                        <img src="<?php echo $result['result_image']; ?>" class="card-img-top d-block w-100"/>
                                    </div>
                                    <div class="card-body">
                                        <div class="category"><a href=""><?php echo $result['result_type']; ?></a></div>
                                        <h5><?php echo $result['result_title']; ?></h5>
                                        <p><?php echo $result['result_text']; ?></p>
                                    </div>
									<div class="card-footer">
										<a href="<?php echo $result['pdf_link']; ?>" class="btn blue">view</a>
									</div>
                                <!--</div>-->
                            </div>
                
                        <?php endforeach; ?>    
                    <?php endif; ?>  
                <?php endif; ?>                 
      
            </div>
        </div>
    </section>

    <section class="cta contact-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2><?php the_field('contact_row_first_heading'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">

                <?php if($contact_details = get_field('contact_details')): ?>
                    <?php if(is_array($contact_details) && count($contact_details)): ?>
                        <?php foreach ($contact_details as $contact): ?> 
                           
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="position"><h5><?php echo $contact['contact_position'] ?></h5></div>
                                <div class="name"><h4><?php echo $contact['contact_name'] ?></h4></div>
                                <div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo $contact['contact_email'] ?>"><?php echo $contact['contact_email'] ?></a></div>
                                <div class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo $contact['contact_number'] ?>"><?php echo $contact['contact_number'] ?></a></div>
                            </div>
                
                        <?php endforeach; ?>    
                    <?php endif; ?>  
                <?php endif; ?> 

            </div>
        </div>
    </section
    
    
<?php
    global $wpdb;
    $bawmrp_options = get_option( 'bawmrp' );
    $id = (int)get_post_meta(get_the_ID(), '_yyarpp', true );
    $related_post = get_post($id);
    $related_post_banner_image = get_field('top_banner_image', $id);

    $categories = get_the_category( $id);
    if($related_post):
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
 <?php endif; ?> 
</div>

<script>
    jQuery(document).ready(function () {
        
        /* progress bar */
        jQuery('.percentage .circle').each( function (index, element) {

            var bar = new ProgressBar.Circle(element, {
                color: '#0d2d6d',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 5,
                trailWidth: 5,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#a9112c', width: 5 },
                to: { color: '#a9112c', width: 5 },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + '%');
                    }

                }
            });
            bar.text.style.fontFamily = '"AauxNext-Bold", Helvetica, sans-serif';
            bar.text.style.fontSize = '28px';

            bar.animate(jQuery(element).data('percentage'));  // Number from 0.0 to 1.0
        });
        
        
        jQuery( "#years" ).change(function() {
            
            var post_id = jQuery(this).data('id');
           
            jQuery.ajax({
                url : csiAjax.ajax_url,
                type : 'post',
                data : {
                        action : 'get_financial_results_by_ajax',
                        post_id : post_id
                },
                success : function( response ) {
                    
                        jQuery('#results_row').html( response );
                }
            });
        });  
  

        
        
        
        
        
    });
</script>
