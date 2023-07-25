<?php
// Function to fetch data from the API
function fetchData() {
  $url = 'https://tradeogre.com/api/v1/markets';
  $response = file_get_contents($url);

  if ($response === false) {
    return null;
  }

  $data = json_decode($response, true);
  return $data;
}

// Function to check if the pair is a USDT pair
function isUSDTpair($pair) {
  return strpos($pair, 'USDT') !== false;
}


$data = fetchData();
if ($data) {
  foreach ($data as $market) {
    foreach ($market as $pair => $details) {
      if (isUSDTpair($pair)) {
        echo "Pair: " . $pair . "\n";
        echo "Volume: " . $details['volume'] . "\n";
        echo "Bid: " . $details['bid'] . "\n";
        echo "Ask: " . $details['ask'] . "\n";
        echo "\n";
      }
    }
  }
} else {
  echo "Error fetching data\n";
}

