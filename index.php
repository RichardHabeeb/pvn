<?php

$debug_logging = true;

if($debug_logging) echo "PVN Start.<br>";

require_once 'mongo.php';
require_once 'entity.php';

$player = new Entity();
print_r($player);

if($debug_logging) echo "PVN End.";
/* End of index.php */