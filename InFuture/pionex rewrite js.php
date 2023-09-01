<?php

  $url = 'https://api.pionex.com/api/v1/market/tickers';
  $response = file_get_contents($url);



  $data = json_decode($response, true);
  

  foreach ($data['data']['tickers'] as $datas => $details) {

    if (strpos($details['symbol'], 'USDT') !== false) {
 
        




        $url = 'https://api.pionex.com/api/v1/market/depth?symbol='.$details['symbol'].'&limit=1';
        $response = file_get_contents($url);
      
      
      
        $data = json_decode($response, true);

       
      echo $details['symbol']. " bids: ". $data['data']['bids'][0][0]. " asks: ". $data['data']['asks'][0][0]."\n";
      

        









    }
  }