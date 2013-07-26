<?php
$env = getenv("MONGOLAB_URI");

if (!$env) {
	$env = "mongodb://heroku_app17126981:cd2ctno8ip80ajgm9sokrd4lfp@ds037698.mongolab.com:37698/heroku_app17126981";
}

$mongo_url = parse_url($env);
$dbname = str_replace("/", "", $mongo_url["path"]);

$m   = new Mongo($env);
$db = $m->$dbname;
$col = $db->access;

	
if($debug_logging) echo "Mongo loaded.\n";

/* End of mongo.php */