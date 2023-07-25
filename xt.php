<?php

$response = file_get_contents('https://sapi.xt.com/v4/public/ticker');
$clean = json_decode($response, true);


foreach ($clean['result'] as $array) {
    if (strpos($array['s'], 'usdt') == true) {

        echo $array['s'] . " bid: " . $array['bp'] . " ask: " . $array['ap'] . PHP_EOL;
    }
}
