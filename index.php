<?php

require_once 'includes.php';
require_once 'head.php';





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




require_once 'foot.php';
/* End of index.php */
