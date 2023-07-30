<?php
$raw = file_get_contents('https://api.bybit.com/v5/market/tickers?category=spot');
$clean = json_decode($raw, true);
$bybit = array();
foreach ($clean['result']['list'] as $key => $value) {
    if (strpos($value['symbol'], 'USDT') == true) {
        $lower = str_replace("USDT", "_USDT", $value['symbol']);
        $symbol = strtolower($lower);
        $bybit[$symbol]['bid'] = $value['bid1Price'];
        $bybit[$symbol]['ask'] = $value['ask1Price'];
    }
}
