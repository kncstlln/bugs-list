<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


define('TOKEN', 'SAUTtK3z13qcsJnVQlaj_rbmva9MOUuE');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL . 'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

?>
<hmtl>
    
    <title> IPT10 </title>
    <h1> IPT10 Bugs List </h1>
    <h2><a href = "#"><u> Castillano, Kane Erryl G. </u></a></h2>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Summary</th>
      <th scope="col">Severity</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $bugs_list = json_decode($bugs);
    foreach ($bugs_list->issues as $bug):
    ?>
    <tr>
      <td><?=$bug->id;?></td>
      <td><?=$bug->summary;?></td>
      <td><?=$bug->severity->name;?></td>
      <td><?=$bug->status->name;?></td>
    </tr>
     <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>



