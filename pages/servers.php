<?php

$db = new App\Db();

$servers = $db->getRows('select * from serveur');

$json = json_encode($servers);

echo $json;

