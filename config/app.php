<?php

return 
[
  'connection'  => env('DB_CONNECTION'),
  'host'    =>  env('DB_HOST'),
  'dbname'  =>  env('DB_NAME'),
  'username'=>  env('DB_USER'),
  'password'=>  env('DB_PASS'),
  'options' =>  [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ],
];