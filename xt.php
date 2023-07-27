<?php

$response = file_get_contents('https://sapi.xt.com/v4/public/ticker');
$clean = json_decode($response, true);

$xt = array();

foreach ($clean['result'] as $array) {
    if (strpos($array['s'], 'usdt') !== false) {
            $symbol = $array['s'];
            $xt[$symbol]['bid'] = $array['bp'];
            $xt[$symbol]['ask'] = $array['ap'];
    }
}

