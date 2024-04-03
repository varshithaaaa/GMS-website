<?php


require 'C:\xampp\htdocs\phpmongodb\vendor/autoload.php';

$client= new MongoDB\Client("mongodb://localhost:27017");

$Gardendb = $client ->Gardendb;
$result1= $Gardendb ->createCollection('empcollection');

var_dump($result1);

foreach($client->listdatabases() as $db)

{
    var_dump ($db);
}
?>