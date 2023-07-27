<?php
require('digifinex.php');
require('xt.php');
$exchanges = array('digifinex' => $digifinex, 'xt' => $xt);


foreach ($digifinex as $symbol => $value) {
    
    echo "-------------------------------------------\n";
    echo $symbol . PHP_EOL;
    foreach ($exchanges as $name => $exchange) {
        if (isset($exchange[$symbol])) {
            echo $name . " " . $exchange[$symbol]['bid'] . " " . $exchange[$symbol]['ask'] . PHP_EOL;

        }
    }
}
