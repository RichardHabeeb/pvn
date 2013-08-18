<?php

$debug_logging = true;
if($debug_logging) echo "PVN Start.\n";
error_reporting(0);
require_once 'couch.php';
require_once 'entity.php';
require_once 'item.php';



$player = new Entity();
var_dump($player);



if($debug_logging) echo "\nPVN End.";


 
/* End of index.php */