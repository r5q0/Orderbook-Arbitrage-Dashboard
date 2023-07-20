<?php

  $url = 'https://api.mexc.com/api/v3/ticker/bookTicker';
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  
 
foreach ($data as $key) {
    if (strpos($key['symbol'], 'USDT') !== false) {

    echo  $key['symbol'] . " bid: " . $key['bidPrice'] . " ask: ".$key['askPrice'].PHP_EOL;

}

  }

    

  

