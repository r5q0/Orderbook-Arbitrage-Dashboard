<?php


$result = file_get_contents('https://api.lbkex.com//v2/supplement/ticker/price.do');
$data = json_decode($result, true);

foreach ($data['data'] as $datas) {
    if (strpos($datas['symbol'], 'usdt') == true) {
 $result1 = file_get_contents("https://api.lbkex.com/v2/supplement/ticker/bookTicker.do?symbol=". $datas['symbol']);
    $data1 = json_decode($result1, true);
    echo $datas['symbol'] . " bid: " . $data1['data']['bidPrice'] . " ask: " . $data1['data']['askPrice'] . PHP_EOL;
    }
 
}