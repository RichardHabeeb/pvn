<?php

$debug_logging = true;

if($debug_logging) echo "PVN Start.\n";

require_once 'mongo.php';
require_once 'entity.php';

$player = new Entity();
print_r($player);

if($debug_logging) echo "\nPVN End.";
/* End of index.php */