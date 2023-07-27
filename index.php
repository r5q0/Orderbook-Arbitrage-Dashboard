<?php
require('digifinex.php');
require('xt.php');
require('bitmart.php');

$exchanges = array('digifinex' => $digifinex, 'xt' => $xt , 'bitmart' => $bitmart);


foreach ($digifinex as $symbol => $value) {
    
    echo "-------------------------------------------\n";
    echo $symbol . PHP_EOL;
    foreach ($exchanges as $name => $exchange) {
        if (isset($exchange[$symbol])) {
            echo $name . " " . $exchange[$symbol]['bid'] . " " . $exchange[$symbol]['ask'] . PHP_EOL;

        }
    }
}
