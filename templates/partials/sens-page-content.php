<div class="sens-page investor-relations-single">

    <div class="filter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-6 col-md-4">
                    <label>Period</label>
                    <select class="years" id="Period">
                        <option value="select">Select</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="one_week">1 Week</option>
                        <option value="one_month">1 Month</option>
                        <option value="three_months">3 Months</option>
                        <option value="six_months">6 Months</option>
                        <option value="one_year">1 Year</option>
                        <option value="five_years">5 Years</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <label>Date Range</label>
                    <input id="RangeFrom" type="text" value="From" /> -
                    <input id="RangeTo" type="text" value="To" />
                </div>
                <div class="col-12 col-sm-6 col-md-4">
				<label></label>
                    <button class="btn blue years" id="FilterButton" type="button" value="Filter">
                        Apply
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content-listing sens-articles">
        <div class="container">
            <div class="card-group" id="Results">
				<div class="row" id="Results">

				</div>
            </div>
        </div>
    </section>
    
    
    
    

    <section class="cta contact-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2><?php the_field('contact_row_first_heading'); ?></h2>
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
                                <div class="position"><h5><?php echo $contact['contact_position'] ?></h5></div>
                                <div class="name"><h4><?php echo $contact['contact_name'] ?></h4></div>
                                <div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo $contact['contact_email'] ?>"><?php echo $contact['contact_email'] ?></a></div>
                                <div class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo $contact['contact_number'] ?>"><?php echo $contact['contact_number'] ?></a></div>
                            </div>
                
                        <?php endforeach; ?>    
                    <?php endif; ?>  
                <?php endif; ?> 

            </div>
        </div>
    </section

<?php
    global $wpdb;
    $bawmrp_options = get_option( 'bawmrp' );
    $id = (int)get_post_meta(get_the_ID(), '_yyarpp', true );
    $related_post = get_post($id);
    
    $related_post_banner_image = get_field('top_banner_image', $id);

    $categories = get_the_category( $id);
    if($related_post):
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
 <?php endif; ?> 

</div>

<script type="text/javascript">
jQuery(document).ready(function()
        {
console.log('start');
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

                    for (var i = 0; i < rows.length; i++) {
                        var row_date = rows[i][0];
                        var row_title = rows[i][1];
                        var row_link = rows[i][2];
                        resultsHtml += '<div class="col-12 col-sm-6 col-md-3"><div class="card"><div class="card-body"><div class="date">'+row_date+'</div><h5>EOH Holdings Limited Financial</h5><p>'+row_title+'</p></div><div class="card-footer"><a href="" data-uid="'+row_link+'" class="btn read-more blue">View</a></div></div></div>';
                    }

                    
                }

                results.html(resultsHtml);

                results.find("a.read-more").bind("click", function(e)
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

                console.log(data);
                console.log('eoh feed');

                var sharesHtml = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">" +
                    "<thead><tr><th>EOH</th><th>Currency ZAR cents</th></thead>" +
                    "<tbody>" +
                    "<tr><td>Close</td><td>" + close + "</td>" +
                    "<tr><td>Prev. Last Trade</td><td>" + previousLastTrade + "</td>" +
                    "<tr><td>Bid</td><td>" + bid + "</td>" +
                    "<tr><td>Ask</td><td>" + ask + "</td>" +
                    "<tr><td>High*</td><td>" + high + "</td>" +
                    "<tr><td>Low*</td><td>" + low + "</td>" +
                    "<tr><td>1 Year High*</td><td>" + oneYearHigh + "</td>" +
                    "<tr><td>1 Year Low*</td><td>" + oneYearLow + "</td>" +
                    "<tr><td>Move</td><td>" + move + "</td>" +
                    "<tr><td>% Move</td><td>" + percentageMove + "</td>" +
                    "<tr><td>No of Trades</td><td>" + numberOfTrades + "</td>" +
                    "<tr><td>Volume</td><td>" + volume + "</td>" +
                    "<tr><td>VWAP*</td><td>" + vwap + "</td>" +
                    "<tr><td>Value Traded*</td><td>" + valueTraded + "</td>" +
                    "<tr><td>Price/Earnings Ratio*</td><td>" + priceEarningsRatio + "</td>" +
                    "<tr><td>Yield*</td><td>" + _yield + "</td>" +
                    "<tr><td>Dividend Yield*</td><td>" + dividendYield + "</td>" +
                    "<tr><td>Market Cap*</td><td>" + marketCap + "</td>" +
                    "</tbody></table>";

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

