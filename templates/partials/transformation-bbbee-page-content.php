
<div class="bbbee-transformation-page investor-relations-single">
    <section class="page-content bbbee-transformation">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('first_row_heading') ?></h2>
                        <?php the_field('first_row_text') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="statistics">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('second_row_heading') ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                
                
                <?php $content_blocks = get_field('content_block');
                
                foreach ($content_blocks as $block) { ?>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="content-block">
                            <div class="percentage">
                                <div class="circle" data-percentage="<?php echo 59/100; ?>" data-index="0"></div>
                            </div>
                            <div class="content">
                                <h5><?php echo $block['content_block_heading']; ?></h5>
                                <?php echo $block['content_block_text']; ?>
                            </div>
                        </div>
                    </div>                    
                    
                    
                <?php } ?>


            </div>
        </div>
    </section>
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
    });
</script>
