<?php
$raw = file_get_contents('https://api.kraken.com/0/public/Ticker');
$clean = json_decode($raw, true);
$kraken = array();
foreach ($clean['result'] as $symbol => $value) {

    if (strpos($symbol, 'USDT') == true) {
        $symbol = str_replace("USDT", "_USDT", $symbol);
        $symbol = str_replace("XBT", "BTC", $symbol);
        $symbol = strtolower($symbol);
        $kraken[$symbol]['ask'] = $value['a'][0];
        $kraken[$symbol]['bid'] = $value['b'][0];
    }
}
