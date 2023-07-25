<?php
    $endpoint = "https://api.coinex.com/v1/market/list";

    $response = file_get_contents($endpoint);
    $response1 = json_decode($response, true);



    foreach ($response1['data'] as $pair) {
      
        if (strpos($pair, 'USDT') !== false) {

        $result = file_get_contents("https://api.coinex.com/v1/market/depth?market=" . $pair . "&merge=0.1&limit=1");
        $response1 = json_decode($result, true);

        
        echo $pair. " buy " . $response1['data']['bids'][0][0] . " Asks " . $response1['data']['asks'][0][0] . PHP_EOL;
    }}

