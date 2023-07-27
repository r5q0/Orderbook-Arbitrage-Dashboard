<?php

$response = file_get_contents('https://openapi.digifinex.com/v3/ticker');
$clean = json_decode($response, true);

$digifinex = array();

foreach ($clean['ticker'] as $pc) {
    if (strpos($pc['symbol'], 'usdt') !== false && isset($pc['buy'])) {
        $symbol = $pc['symbol'];
        $digifinex[$symbol]['bid'] = $pc['buy'];
        $digifinex[$symbol]['ask'] = $pc['sell'];
    }
}




