    <section class="cta contact-details">
        <div class="heading">
            <h5><?php the_field('contact_row_first_heading') ?></h5>
            <h2><?php the_field('contact_row_second_heading') ?></h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="name"><h4><?php the_field('contact_name') ?></h4></div>
                    <div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php the_field('contact_email') ?>"><?php the_field('contact_email') ?></a></div>
                    <div class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php the_field('contact_number') ?>"><?php the_field('contact_number') ?></a></div>
                </div>
            </div>
        </div>
    </section>