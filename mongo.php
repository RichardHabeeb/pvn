<?php

$mongo_url = parse_url(getenv("MONGOLAB_URI"));
echo getenv("MONGOLAB_URI");

if (!isset($mongo_url["path"]) || trim($mongo_url["path"]) == "") {
	$mongo_url = parse_url("mongodb://test:test@ds037698.mongolab.com:37698/heroku_app17126981");
}

$dbname = str_replace("/", "", $mongo_url["path"]);

try {
	$m   = new Mongo(getenv("MONGOLAB_URI"));
	$db = $m->$dbname;
	$col = $db->access;
} catch(exception $e) {
	print_r($e);
}
	
if($debug_logging) echo "Mongo loaded. ";

/* End of mongo.php */