
<div class="investor-info-page investor-relations-single">

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="content">
                        <h2><?php the_field('first_row_heading') ; ?></h2>
                        <h4><?php the_field('first_row_text') ; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-listing investor-information">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-5">
                    <iframe src="https://edge.inetbfa.com/embedded/charts/MjAxMy0xMC0xMSAwNjo1NDo1OCBVVEMxODY4ZW1iZWRkZWRfaGFzaDAw" width="450" height="400"></iframe>
                </div> 
                
                <div class="col-12 col-sm-6 col-md-5">
                    <div class="eoh-jse-data">
                        <div class="data-heading"><h3>EOH</h3></div>
                        <div class="data-body">
                            <div class="row" id="Shares">

                            </div>
                        </div>                
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="cta contact-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2><?php the_field('contact_details_heading'); ?></h2>
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
                                    <div class="position"><h5><?php echo $contact['contact_position']; ?></h5></div>
                                    <div class="name"><h4><?php echo $contact['contact_name']; ?></h4></div>
                                    <div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo $contact['contact_email']; ?>"><?php echo $contact['contact_email']; ?></a></div>
                                    <div class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo $contact['contact_number']; ?>"><?php echo $contact['contact_number']; ?></a></div>
                                </div>
                
                            <?php endforeach; ?>                    
                        <?php endif; ?>  
                    <?php endif; ?> 

            </div>
        </div>
    </section>

<?php
    global $wpdb;
    $bawmrp_options = get_option( 'bawmrp' );
    $id = (int)get_post_meta(get_the_ID(), '_yyarpp', true );
    $related_post = get_post($id);
    $related_post_banner_image = get_field('top_banner_image', $id);

    $categories = get_the_category( $id);
    
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

 <script type="text/javascript">
jQuery(document).ready(function()
        {
            /* Sens */
            var period = jQuery("#Period");
            var rangeFrom = jQuery("#RangeFrom");
            var rangeTo = jQuery("#RangeTo");
            var filterButton = jQuery("#FilterButton");
            var shares = jQuery("#Shares");

            // UI binding
            period.bind("change", function()
            {
                rangeFrom.val("From");
                rangeTo.val("To");
            });

            rangeFrom.bind("change", function()
            {
                period.val("select");
            });

            rangeTo.bind("change", function()
            {
                period.val("select");
            });

            filterButton.bind("click", function(e)
            {
                e.preventDefault();

                var query = {};

                if (period.val() != "select")
                {
                    var to_date = new Date();
                    var from_date = new Date();

                    if (period.val() == "yesterday")
                        from_date.setDate(from_date.getDate() - 1);
                    else if (period.val() == "one_week")
                        from_date.setDate(from_date.getDate() - 7);
                    else if (period.val() == "one_month")
                        from_date.setDate(from_date.getDate() - 31);
                    else if (period.val() == "three_months")
                        from_date.setDate(from_date.getDate() - 93);
                    else if (period.val() == "six_months")
                        from_date.setDate(from_date.getDate() - 186);
                    else if (period.val() == "one_year")
                        from_date.setDate(from_date.getDate() - 365);
                    else if (period.val() == "five_years")
                        from_date.setDate(from_date.getDate() - 1825);

                    query = {
                        code: 627,
                        period_range: "Period",
                        from_todate: from_date.getFullYear() + "-" + ("0" + (from_date.getMonth() + 1)).slice(-2) + "-" + ("0" + from_date.getDate()).slice(-2),
                        from_date: from_date.getFullYear() + "-" + ("0" + (from_date.getMonth() + 1)).slice(-2) + "-" + ("0" + from_date.getDate()).slice(-2),
                        to_date: to_date.getFullYear() + "-" + ("0" + (to_date.getMonth() + 1)).slice(-2) + "-" + ("0" + to_date.getDate()).slice(-2),
                    };
                }
                else
                {
                    query = {
                        code: 627,
                        period_range: "Range",
                        from_todate: "2012-5-30",
                        from_date: "2012-5-30",
                        to_date: "2017-6-29"
                    }
                }

                jQuery.ajax({
                    url: "/wp-content/themes/creativespark/inc/EOHFeed/sens.php",
                    type: "POST",
                    dataType: "html",
                    data: query
                })
                .done(function(data)
                {
                    renderSens(data)
                })
                .fail(function()
                {
                })
                .always(function()
                {
                });
            });

            // Share
            jQuery.ajax({
                url: "/wp-content/themes/creativespark/inc/EOHFeed/share.php",
                type: "GET",
                dataType: "xml"
            })
            .done(function(data)
            {
                renderShare(data)
            })
            .fail(function()
            {
            })
            .always(function()
            {
            });

            // Private methods
            function renderSens(data)
            {
                var needle = "&quot;";
                var table = jQuery(data).filter("#myTable").get(0);
                var rows = [];
                var results = jQuery("#Results");
                var resultsHtml = "";

                if (jQuery(table).children("tbody").children("tr").length == 1)
                    resultsHtml = "No results for the specified period";
                else
                {
                    jQuery(table).children("tbody").children("tr").each(function(i)
                    {
                        var date = jQuery(this).children("td").eq(0).text().substring(0, 10);
                        var html = jQuery(this).children("td").eq(1).html();
                        var title = jQuery(html).children("a").text();
                        var uid = html.substr(html.indexOf(needle) + needle.length);
                        uid = uid.substring(0, uid.indexOf(needle));

                        rows.push([date, title, uid]);
                    });

                    resultsHtml = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">" +
                            "<thead><tr><th>Publication Date</th><th>Title</th></thead>" +
                            "<tbody>";

                    for (var i = 0; i < rows.length; i++)
                        resultsHtml += "<tr><td>" + rows[i][0] + "</td><td><button data-uid=\"" + rows[i][2] + "\">" + rows[i][1] + "</button></td></tr>";

                    resultsHtml += "</tbody></table>";
                }

                results.html(resultsHtml);

                results.find("button").bind("click", function(e)
                {
                    e.preventDefault();

                    window.open("http://eoh_2017.hosted.inet.co.za/inews/news/story/" + jQuery(this).data("uid") + "/withrelated/1", "", "width=1000,height=600");
                });
            }

            function renderShare(data)
            {
                var close = jQuery(data).find("close").text();
                var previousLastTrade = jQuery(data).find("ptrade").text();
                var bid = jQuery(data).find("bid").text();

                var ask = jQuery(data).find("close").text();

                var high = jQuery(data).find("hi").text();
                var low = jQuery(data).find("lo").text();
                var oneYearHigh = jQuery(data).find("hi12val").text();
                var oneYearLow = jQuery(data).find("lo12val").text();

                var move = jQuery(data).find("close").text();

                var percentageMove = jQuery(data).find("perc").text();
                var numberOfTrades = jQuery(data).find("num_trd").text();
                var volume = jQuery(data).find("vol_trd").text();

                var vwap = jQuery(data).find("close").text();

                var valueTraded = jQuery(data).find("val_trd").text();
                var priceEarningsRatio = jQuery(data).find("pearn_y").text();
                var _yield = jQuery(data).find("eyld").text();
                var dividendYield = jQuery(data).find("dyld").text();

                var marketCap = jQuery(data).find("close").text();
                
                
var sharesHtml = '<div class="col-6 col-sm-6 col-md-4"><p>Close</p><h5>' + close + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Prev. Last TRade</p><h5>' + previousLastTrade + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>1 Year High*</p><h5>' + oneYearHigh + '</h5></div>' + 
'<div class="col-6 col-sm-6 col-md-4"><p>1 Year Low*</p><h5>' + oneYearLow + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>VWAP*</p><h5>' + vwap + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Value Traded*</p>' +
'<h5>R6671</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Bid</p><h5>' + bid + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Ask</p><h5>' + ask + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Low</p><h5>' + low + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>High</p><h5>' + high + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Move</p><h5>' + move + '</h5></div>' +
'<div class="col-6 col-sm-6 col-md-4"><p>No of Trades</p><h5>' + numberOfTrades + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Yield*</p><h5>' + _yield + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Dividend Yield*</p>' +
'<h5>' + dividendYield + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Market Cap*</p><h5>' + marketCap + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>% Move</p><h5>' + percentageMove + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Move</p><h5>' + move + '</h5></div>' +
'<div class="col-6 col-sm-6 col-md-4"><p>Volume</p><h5>' + volume + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>VWAP*</p><h5>' + vwap + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Value Traded*</p><h5>' + valueTraded + '</h5></div><div class="col-6 col-sm-6 col-md-4"><p>Price/Earnings Ratio*</p><h5>' + priceEarningsRatio + '</h5></div>';

                shares.html(sharesHtml);
            }

            // Init
            var to_date = new Date();
            var from_date = new Date();

            from_date.setDate(from_date.getDate() - 186);

            var query = {
                code: 627,
                period_range: "Period",
                from_todate: from_date.getFullYear() + "-" + ("0" + (from_date.getMonth() + 1)).slice(-2) + "-" + ("0" + from_date.getDate()).slice(-2),
                from_date: from_date.getFullYear() + "-" + ("0" + (from_date.getMonth() + 1)).slice(-2) + "-" + ("0" + from_date.getDate()).slice(-2),
                to_date: to_date.getFullYear() + "-" + ("0" + (to_date.getMonth() + 1)).slice(-2) + "-" + ("0" + to_date.getDate()).slice(-2),
            };

            jQuery.ajax({
                url: "/wp-content/themes/creativespark/inc/EOHFeed/sens.php",
                type: "POST",
                dataType: "html",
                data: query
            })
            .done(function(data)
            {
                renderSens(data)
            })
            .fail(function()
            {
            })
            .always(function()
            {
            });
        });
</script>    
    
</div>