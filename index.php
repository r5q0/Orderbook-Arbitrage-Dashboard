<?php
require('bybit.php');
require('xt.php');
require('bitmart.php');
require('mexc.php');
require('tradeogre.php');
require('digifinex.php');
require('kucoin.php');
$exchanges = array('xt' => $xt, 'bitmart' => $bitmart, 'mexc' => $mexc, 'tradeogre' => $tradeogre, 'digifinex' => $digifinex, 'kucoin' => $kucoin, 'bybit' => $bybit);
$eorrotokens = array();
$bids = array();
$asks = array();

foreach ($bybit as $symbol => $value) {
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
            if ($percentageDifference > 0.1 && $percentageDifference < 100 && $highestBidExchange !== $lowestAskExchange ) {
                echo "-------------------------------------------\n";
                echo "Symbol: $symbol\n";
                echo "Highest bid: $highestBid on $highestBidExchange\n";
                echo "Lowest ask: $lowestAsk on $lowestAskExchange\n";
                echo "Percentage Difference: " . number_format($percentageDifference, 2) . "%\n";
            }
        }
    } catch (DivisionByZeroError $e) {

        array_push($eorrotokens, $symbol);
        continue;
    }
}

$answer = readline("want to see the error tokens? (y/n)");

if ($answer == "y") {
    foreach ($eorrotokens as $error) {
        echo $error . "\n";
    }
    echo "coins/tokens that had an errror: " . count($eorrotokens);
}
if ($answer == "n") {
}
