<?php

$debug_logging = true;
if($debug_logging) echo "PVN Start.\n";


require_once 'couch.php';
require_once 'entity.php';
require_once 'item.php';

$c = new CouchDatabase("CLOUDANT_URL");
$c->setDB("dev");

$player = new Entity();
$c->pushEntity($player);

var_dump($player);



if($debug_logging) echo "\nPVN End.";


 
/* End of index.php */