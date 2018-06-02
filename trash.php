    <?php //$id = get_the_ID(); var_dump($id); die; ?>
    
    <?php $post = get_post(get_the_ID()); ?>
    
    <?php //$post_categories = get_the_category($post->ID); ?>
     
    <?php if( $post ): ?>
        <?php if( ($post->post_parent == 62) ): ?>

            <div class="secondary-nav-wrapper">
                <nav class="secondary-nav">
                    <span class="nav-title">Investor Relations</span>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo get_home_url() . '/investor-relations/financial-results/' ?>" class="nav-link <?php echo ($post->post_title == 'Financial Results') ? 'active' : ''  ?>">Financial Results</a>
                        </li>
                        <li>
                            <a href="<?php echo get_home_url() . '/investor-relations/investor-information/' ?>" class="nav-link <?php echo ($post->post_title == 'Investor Information') ? 'active' : ''  ?>">Investor Information</a>
                        </li>
                        <li>
                            <a href="<?php echo get_home_url() . '/investor-relations/sens/' ?>" class="nav-link <?php echo ($post->post_title == 'SENS') ? 'active' : ''  ?>">SENS</a>
                        </li>
                    </ul>
                </nav>
            </div>

        <?php endif; ?>
    <?php endif; ?>

    <?php if( $post ): ?>
        <?php if( ($post->post_parent == 236) ): ?>

            <div class="secondary-nav-wrapper">
                <nav class="secondary-nav">
                    <span class="nav-title">Services</span>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo get_home_url() . '/services/ict/' ?>" class="nav-link <?php echo ($post->post_title == 'ICT') ? 'active' : ''  ?>">ICT</a>
                        </li>
                        <li>
                            <a href="<?php echo get_home_url() . '/services/industrial-technologies/' ?>" class="nav-link <?php echo ($post->post_title == 'Industrial Technologies') ? 'active' : ''  ?>">Industrial Technologies</a>
                        </li>
                        <li>
                            <a href="<?php echo get_home_url() . '/services/bpo/' ?>" class="nav-link <?php echo ($post->post_title == 'BPO') ? 'active' : ''  ?>">BPO</a>
                        </li>
                        <li>
                            <a target="_blank" href="http://eoh.com/" class="nav-link">International</a>
                        </li>                        
                    </ul>
                </nav>
            </div>

        <?php endif; ?>
    <?php endif; ?>  