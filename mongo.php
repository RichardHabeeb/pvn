<?php


# get the mongo db name out of the env
$mongo_url = parse_url(getenv("MONGOLAB_URI"));
$dbname = str_replace("/", "", $mongo_url["path"]);


# connect
$m   = new Mongo(getenv("MONGOLAB_URI"));
$db  = $m->$dbname;
$col = $db->access;

/* End of mongo.php */