<?php

$debug_logging = true;
if($debug_logging) echo "PVN Start.\n";


require_once 'couch.php';
require_once 'buff.php';
require_once 'item.php';
require_once 'entity.php';


$c = new CouchDatabase("CLOUDANT_URL");
$c->setDB("dev");


$player = new Entity();

$player->add_buff(new Buff("Blight Curse", 2, 3, 4, 5));

$sword = new Weapon("Sword", 3);
$sword->add_buff(new Buff("Sword", 5, 1, 2, 5));
$sword->set_id($c->getNewID());

$player->add_item($sword);
$player->equip_item($sword->_id());

$c->pushEntity($player);

var_dump($player);

echo $player->maxhealth();



if($debug_logging) echo "\nPVN End.";


 
/* End of index.php */