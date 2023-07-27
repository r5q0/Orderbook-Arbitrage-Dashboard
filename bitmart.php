<?php
$result = file_get_contents("https://api-cloud.bitmart.com/spot/v1/ticker");
$data = json_decode($result, true);

$bitmart = array();
foreach ($data['data']['tickers'] as $datas) {
    if (strpos(strtolower($datas['symbol']), 'usdt') !== false) {
        $symbol = strtolower($datas['symbol']);
        $bitmart[$symbol]['bid'] = $datas['best_bid'];
        $bitmart[$symbol]['ask'] = $datas['best_ask'];
    }
}
