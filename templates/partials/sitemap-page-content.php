
<div class="sitemap-page">

    <section class="page-content sitemap-links">
        <div class="container">
            <div class="row">

                <?php if($sitemap_links_menus = get_field('sitemap_links_menus')): ?>
                <div class="col-md-6">
                    <div class="row">
                    <?php if(is_array($sitemap_links_menus) && count($sitemap_links_menus)): ?>

                        <?php foreach ($sitemap_links_menus as $menu): ?>

                            <div class="col-md-6">
                                <div class="content">

                                    <h1><?php echo $menu['menu_heading_title']; ?></h1>

                                        <?php if(is_array($menu['menu_links']) && count($menu['menu_links'])): ?>

                                                <?php foreach ($menu['menu_links'] as $post_object): ?>
                                                    <?php if($post_object['article_or_page_link']): ?>
                                                        <a href="<?php the_permalink($post_object['article_or_page_link']->ID); ?>"><?php echo $post_object['article_or_page_link']->post_title; ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                        <?php endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if($knowledge_base = get_field('knowledge_base_links')): ?>
                
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="content knowledge-base-links"> 
                                    
                                    <h1><a href="<?php echo get_home_url() . '/category/knowledge-base/'; ?>">Knowledge Base</a></h1>
                
                                        <?php if(is_array($knowledge_base) && count($knowledge_base)): ?>

                                            <?php foreach ($knowledge_base as $menu): ?>

                                                    <?php if(is_array($menu) && count($menu)): ?>

                                                                <a href="<?php echo $menu['link']; ?>"><?php echo $menu['link_title']; ?></a>

                                                    <?php endif; ?>

                                            <?php endforeach; ?>

                                        <?php endif; ?>

                                </div>
                            </div>                                                    
                
                <?php endif; ?>
                
                
                <?php if($solutions_by_industries_links = get_field('solutions_by_industries_links')): ?>
                
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="content solutions_by_industries_links"> 
                
                                        <?php if(is_array($solutions_by_industries_links) && count($solutions_by_industries_links)): ?>

                                            <?php foreach ($solutions_by_industries_links as $menu): ?>

                                                    <?php if(is_array($menu) && count($menu)): ?>

                                                                <a href="<?php echo $menu['solution_link']; ?>"><?php echo $menu['solution_title']; ?></a>

                                                    <?php endif; ?>

                                            <?php endforeach; ?>

                                        <?php endif; ?>

                                </div>
                            </div>                                                    
                
                <?php endif; ?>                

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- section .page-content .sitemap-links -->

</div><!-- .sitemap-page -->
