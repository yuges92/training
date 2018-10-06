<?php

return array(
  /** set your paypal credential **/
  'client_id' => env('PAYPAL_CLIENT_ID',''),
  'secret' => env('PAYPAL_SECRET',''),
  /**
  * SDK configuration
  */
  'settings' => array(
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => env('PAYPAL_MODE','sandbox'),
    /**
    * Specify the max request time in seconds
    */
    'http.ConnectionTimeOut' => 1000,
    /**
    * Whether want to log to a file
    */
    'log.LogEnabled' => true,
    /**
    * Specify the file that want to write on
    */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
    * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
    *
    * Logging is most verbose in the 'FINE' level and decreases as you
    * proceed towards ERROR
    */
    'log.LogLevel' => 'FINE',
    'http.Proxy' => 'http://access5.cws.sco.cisco.com:8080'

  ),
);


// return [
//     'client_id' => env('PAYPAL_CLIENT_ID',''),
//     'secret' => env('PAYPAL_SECRET',''),
//     'settings' => array(
//         'mode' => env('PAYPAL_MODE','sandbox'),
//         'http.ConnectionTimeOut' => 300,
//         'log.LogEnabled' => true,
//         'log.FileName' => storage_path() . '/logs/paypal.log',
//         'log.LogLevel' => 'ERROR',
//         'http.Proxy' => 'https://access5.cws.sco.cisco.com:8080',
//     ),
// ];
