<?php
$env = getenv("CLOUDANT_URL");
$path = parse_url($env);


require_once('lib/Sag.php');
$sag = new Sag($path['host'], '5984');
$sag->login($path['user'], $path['pass']);
$sag->setDatabase('dev', true);

var_dump($path);
var_dump($sag);



	
if($debug_logging) echo "Couch loaded.\n";

/* End of mongo.php */