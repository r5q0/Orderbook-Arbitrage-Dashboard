<?php
$raw = file_get_contents('https://api.bitforex.com/api/v1/market/symbols');
$clean = json_decode($raw, true);

foreach ($clean['data'] as $symbol) {
    if (strpos($symbol['symbol'], 'usdt') == true) {
        $raw1 = file_get_contents('https://api.bitforex.com/api/v1/market/depth?symbol=' . $symbol['symbol'] . '&size=1');
        $clean1 = json_decode($raw1, true);
        echo $symbol['symbol'] . " bid: " . $clean1['data']['bids'][0]['price'] . " ask: " . $clean1['data']['asks'][0]['price'] . PHP_EOL;
    }
}
