<?php


error_reporting(0);
require_once 'couch.php';
require_once 'buff.php';
require_once 'item.php';
require_once 'entity.php';

$c = new CouchDatabase("CLOUDANT_URL");
$c->setDB("dev");



