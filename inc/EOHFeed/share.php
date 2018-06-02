<?php

	//$data = file_get_contents("http://eoh_2017.hosted.inet.co.za/other/quicklist/asxml/EOH");
    
    $url = "http://eoh_2017.hosted.inet.co.za/other/quicklist/asxml/EOH";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
	
	echo($data);

?>