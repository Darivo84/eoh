    <section class="partners">
        <div class="heading">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <h2>our Partners</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="clients slick">
                        <?php 
                        $images = get_field('our_partners_gallery');
                        if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <div>
										<div class="col-12">
											<img src="<?php echo $image['url']; ?>" class="d-block" />
										</div>
                                    </div>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>