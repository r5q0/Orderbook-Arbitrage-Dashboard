<?php

$raw = file_get_contents('https://api.bibox.com/api/v4/marketdata/pairs');

$clean = json_decode($raw, true);

foreach ($clean as $symbol => $value) {
    if (strpos($value['symbol'], 'USDT') !== false) {


        $raw1 = file_get_contents('https://api.bibox.com/api/v4/marketdata/order_book?symbol=' . $value['symbol'] . '&level=1');
        $clean1 = json_decode($raw1, true);
        echo $value['symbol'] . " bid: " . $clean1['b'][0][0] . " ask: " . $clean1['a'][0][0] . PHP_EOL;
    }
}
