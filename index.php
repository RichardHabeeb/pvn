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

//$c->pushEntity($player);

//var_dump($player);

echo $player->maxhealth();

?>

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-10">
      <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>



<?php


require_once 'foot.php';
/* End of index.php */
