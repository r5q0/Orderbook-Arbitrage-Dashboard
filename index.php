<?php
require('xt.php');
require('bitmart.php');
require('mexc.php');
require('tradeogre.php');
require('digifinex.php');
require('kucoin.php');
$exchanges = array('xt' => $xt, 'bitmart' => $bitmart, 'mexc' => $mexc, 'tradeogre' => $tradeogre , 'digifinex' => $digifinex , 'kucoin' => $kucoin);

$bids = array();
$asks = array();

foreach ($kucoin as $symbol => $value) {
    foreach ($exchanges as $name => $exchange) {
        if (isset($exchange[$symbol])) {
            $bids[$symbol][$name] = $exchange[$symbol]['bid'];
            $asks[$symbol][$name] = $exchange[$symbol]['ask'];
        }
    }
}

foreach ($bids as $symbol => $symbolBids) {
    $highestBid = max($symbolBids);
    $highestBidExchange = array_search($highestBid, $symbolBids);

    $lowestAsk = min($asks[$symbol]);
    $lowestAskExchange = array_search($lowestAsk, $asks[$symbol]);

    try {
        if ($lowestAsk !== 0 || $highestBid !== 0) {
            $percentageDifference = (($highestBid - $lowestAsk) / $lowestAsk) * 100;
            if ($percentageDifference > 7 && $percentageDifference < 60) {
                echo "-------------------------------------------\n";
                echo "Symbol: $symbol\n";
                echo "Highest bid: $highestBid on $highestBidExchange\n";
                echo "Lowest ask: $lowestAsk on $lowestAskExchange\n";
                echo "Percentage Difference: " . number_format($percentageDifference, 2) . "%\n";
            }
        }
    } catch (DivisionByZeroError $e) {
        continue;
    }
}
