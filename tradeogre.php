<?php

$response = file_get_contents('https://tradeogre.com/api/v1/markets');
$data = json_decode($response, true);

$tradeogre = array();


foreach ($data as $market) {
  foreach ($market as $pair => $details) {
    if (strpos($pair, 'USDT') !== false) {


      $lower = strtolower($pair);
      $symbol = str_replace("-", "_", $lower);


      $tradeogre[$symbol]['bid'] = $details['bid'];
      $tradeogre[$symbol]['ask'] = $details['ask'];
    }
  }
}
