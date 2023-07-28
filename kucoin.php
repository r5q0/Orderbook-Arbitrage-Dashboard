<?php

$response = file_get_contents('https://api.kucoin.com/api/v1/market/allTickers');
$clean = json_decode($response, true);
$kucoin = array();
foreach ($clean['data']['ticker'] as $key => $value) {
    if (strpos($value['symbol'], 'USDT') !== false) {
        $raqobasedgod = str_replace("-", "_", $value['symbol']);
        $symbol = strtolower($raqobasedgod);
        $kucoin[$symbol]['bid'] = $value['sell'];
        $kucoin[$symbol]['ask'] = $value['buy'];
    }
}
