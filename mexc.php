<?php

$url = 'https://api.mexc.com/api/v3/ticker/bookTicker';
$response = file_get_contents($url);
$data = json_decode($response, true);
$mexc = array();

foreach ($data as $key) {
  if (strpos($key['symbol'], 'USDT') !== false) {
    $usdt = Str_Replace("USDT", "_usdt", $key['symbol']);
    $symbol = strtolower($usdt);
    $mexc[$symbol]['bid'] = $key['bidPrice'];
    $mexc[$symbol]['ask'] = $key['askPrice'];
  }
}
