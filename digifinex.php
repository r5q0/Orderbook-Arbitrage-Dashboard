<?php
$response = file_get_contents('https://openapi.digifinex.com/v3/ticker');

$clean = json_decode($response, true);



foreach ($clean['ticker'] as $pc) {
    if (strpos($pc['symbol'], 'usdt') !== false && isset($pc['buy'])) {
 echo $pc['symbol'] . " bid: " . $pc['buy'] . " ask: " . $pc['sell'] . PHP_EOL;   
}}