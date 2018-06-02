<?php

$current_term = get_queried_object();
$term_id = $current_term->term_id;
$taxonomy_image_url = get_option('z_taxonomy_image'.$term_id);

?>

<section class="image-banner">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col">
                    <img src="<?php echo $taxonomy_image_url; ?>" class="d-block" />
                    <div class="banner-info">
                        <div class="skew">
                            <div class="content">
                                <h1><?php echo $current_term->name; ?></h1>
                                <h4><?php echo $current_term->category_description; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>