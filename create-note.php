<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
$client = new Client();
$headers = [
  'Authorization' => 'SAUTtK3z13qcsJnVQlaj_rbmva9MOUuE',
  'Content-Type' => 'application/json'
];
$body = '{
  "text": "castillano.kaneerryl@auf.edu.ph",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/issues/17/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();