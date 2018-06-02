<?php

	$period_range = $_POST["period_range"];
	$from_todate = $_POST["from_todate"];
	$from_date = $_POST["from_date"];
	$to_date = $_POST["to_date"];

	//$data = file_get_contents("http://eoh_2017.hosted.inet.co.za/inews/news/news_filter/1?code=627&period_range=" . $period_range . "&from_todate=" . $from_todate . "&from_date=" . $from_date . "&to_date=" . $to_date);
    
    $url = "http://eoh_2017.hosted.inet.co.za/inews/news/news_filter/1?code=627&period_range=" . $period_range . "&from_todate=" . $from_todate . "&from_date=" . $from_date . "&to_date=" . $to_date;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
	
	echo($data);

?>