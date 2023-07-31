<?php
$raw = file_get_contents('https://api.gateio.ws/api/v4/spot/tickers');
$clean = json_decode($raw, true);
$gateio = array();
foreach ($clean as $data) {
    if (strpos($data['currency_pair'], 'USDT') && $data['lowest_ask'] != "") {
        $symbol = str_replace('USDT', 'usdt', $data['currency_pair']);
        $symbol = strtolower($symbol);
        $gateio[$symbol]['ask'] = $data['lowest_ask'];
        $gateio[$symbol]['bid'] = $data['highest_bid'];
    }
}
