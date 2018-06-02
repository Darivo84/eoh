<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package creativespark
 */

?>

<footer class="site-footer">

    <section class="footer-navigation">

        <div class="container">
            <div class="container">

                <div class="col-md-12 col-sm-12 col-12">
                    <a id="eoh-logo" href="<?php echo get_home_url(); ?>">
                        <img alt="image" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-logo.png'; ?>">
                    </a>
                </div>

            </div>
            <div class="container-footer-navigation">
                <div class="row no-gutters">


                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="footer-nav" >
                            <nav>
                                <?php dynamic_sidebar( 'footer_widget_one' ); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="footer-nav">
                            <nav>
                                <?php dynamic_sidebar( 'footer_widget_two' ); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="footer-nav">
                            <nav>
                                <?php dynamic_sidebar( 'footer_widget_three' ); ?>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="footer-nav">
                            <h5>Contact</h5>
                            <nav>
                                <ul>
                                    <li><p id="contactp">
                                            <strong>Head Office</strong> <br>EOH Business Park, Gillooly’s View, <br> Osborne Lane, Bedfordview, 2007
                                        </p>
                                        <p id="contactp">
                                            <span><i class="fa fa-phone" aria-hidden="true"></i></span>&nbsp;&nbsp; +27 (11) 607 8100
                                            <br>
                                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>&nbsp;&nbsp; info@eoh.co.za
                                        </p></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="site-copyright">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-sm-12 col-8">
                    <nav class="copyright-menu">
                        <ul>
                            <li><?php echo '© ' . date("Y") . ' EOH Holdings (Pty) Ltd. All Rights Reserved'; ?></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 col-4 order-sm-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="social-icons" id="red-banner">
                                <ul>
                                    <li><a href="https://www.linkedin.com/company/15814/" style="z-index: 99;"><img alt="image" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/ic-linkedin.png'; ?>"></a>
                                        <a href="https://twitter.com/eohtech" style="z-index: 99;"><img alt="image" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/ic-twitter.png'; ?>"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>


<?php wp_footer(); ?>

</body>

</html>

