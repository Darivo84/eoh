        <form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>">
            <button class="btn-search my-2 my-sm-0" id="searchbutton" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            <p id="follow">Follow us</p>
            <input name="s" value="<?php echo get_search_query() ?>" id="bottomsearch" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <span>|&nbsp;&nbsp;<a href="https://www.linkedin.com/company/15814/"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/ic-linkedin.svg'; ?>" alt="linkedin"></a>&nbsp;<a href="https://twitter.com/CreativeSparkSA"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/ic-twitter.svg'; ?>" alt="twitter"></a></span>
        </form> 