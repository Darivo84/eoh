<?php
    $our_partners_image_blocks = get_field('our_partners_image_blocks');
?>
    <section class="content-listing youth-articles">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <div class="content-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="image left">
                                    <img src="<?php the_field('first_row_image'); ?>" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="content">
                                    <h2><?php the_field('first_row_heading') ?></h2>
                                    <p><?php the_field('first_row_text'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <div class="content-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5 order-1 order-md-2">
                                <div class="image right">
                                    <img src="<?php the_field('second_row_image'); ?>" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 order-2 order-md-1">
                                <div class="content">
                                    <h2><?php the_field('second_row_heading') ?></h2>
                                    <p><?php the_field('second_row_text'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <div class="content-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="image left">
                                    <img src="<?php the_field('third_row_image'); ?>" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="content">
                                    <h2><?php the_field('third_row_heading') ?></h2>
                                    <p><?php the_field('third_row_text'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
