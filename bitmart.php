<?php

$result = file_get_contents("https://api-cloud.bitmart.com/spot/v1/ticker");

$data = json_decode($result, true);


foreach ($data['data']['tickers'] as $datas) {
    if (strpos($datas['symbol'], 'USDT') !== false) {

    echo $datas['symbol'] . " bid: " . $datas['best_bid'] . " ask: " . $datas['best_ask'] . PHP_EOL;
}}
