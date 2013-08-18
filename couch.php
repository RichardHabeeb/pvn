<?php
$env = getenv("CLOUDANT_URL");

var_dump($env);
	
if($debug_logging) echo "Couch loaded.\n";

/* End of mongo.php */