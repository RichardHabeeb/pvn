<?php

/**
 * Interface: iEntity
 * 
 * @author	Richard Habeeb
 */
interface iEntity {
	
	
	public function __construct();
	
	public function get_json_summary();
	public function load_json_summary($json);
	
	public function id();
	public function rev();
	public function type();
	public function name();
	public function health();
	public function maxhealth();
	public function loot();
	public function moxie();
	public function pepper();
	public function fortitude();
	public function buff_maxhealth();
	public function buff_moxie();
	public function buff_pepper();
	public function buff_fortitude();
	
	public function set_id($val);
	public function set_rev($val);
	public function set_type($val);
	public function set_name($val);
	public function adjust_health($amount);
	public function adjust_loot($amount);
	public function adjust_moxie($amount);
	public function adjust_pepper($amount);
	public function adjust_fortitude($amount);
	public function adjust_buff_maxhealth($amount);
	public function adjust_buff_moxie($amount);
	public function adjust_buff_pepper($amount);
	public function adjust_buff_fortitude($amount);
	
}

class Entity implements iEntity {
	public static $types = array("None" => "None" , "Pirate" => "Pirate",  "Ninja" => "Ninja", "Monster" => "Monster", "NPC" => "NPC");
	
	private $_id, $_rev, $type, $name, $health, $maxhealth, $loot, $moxie,  $pepper,  $fortitude, $buff_maxhealth, $buff_moxie, $buff_pepper, $buff_fortitude;
	
	public function __construct() {	
		$this->_id = -1;
		$this->_rev = -1;
		$this->type = Entity::$types["None"];
		$this->name = "nameless";
		$this->health = 10;
		$this->maxhealth = 10;
		$this->loot = 0;
		$this->moxie = 0;
		$this->pepper = 0;
		$this->fortitude = 0;
		$this->buff_maxhealth = 0;
		$this->buff_moxie = 0;
		$this->buff_pepper = 0;
		$this->buff_fortitude = 0;

	}
	
	public function load_json_summary($json) {
		$values = json_decode($json, true);
		$this->_id 				= $values["_id"];
		$this->_rev				= $values["_rev"];
		$this->type 			= $values["type"];
		$this->name 			= $values["name"];
		$this->health 			= $values["health"];
		$this->maxhealth 		= $values["maxhealth"];
		$this->loot 			= $values["loot"];
		$this->moxie 			= $values["moxie"];
		$this->pepper 			= $values["pepper"];
		$this->fortitude 		= $values["fortitude"];
		$this->buff_maxhealth	= $values["buff_maxhealth"];
		$this->buff_moxie 		= $values["buff_moxie"];
		$this->buff_pepper 		= $values["buff_pepper"];
		$this->buff_fortitude 	= $values["buff_fortitude"];
	}
	
	public function get_json_summary() {
		return json_encode(array(
			"_id" 				=> $this->_id,
			"_rev"				=> $this->_rev,
			"type" 				=> $this->type,
			"name" 				=> $this->name,
			"health" 			=> $this->health,
			"maxhealth" 		=> $this->maxhealth,
			"loot" 				=> $this->loot,
			"moxie" 			=> $this->moxie,
			"pepper" 			=> $this->pepper,
			"fortitude" 		=> $this->fortitude,
			"buff_maxhealth"	=> $this->buff_maxhealth,
			"buff_moxie" 		=> $this->buff_moxie,
			"buff_pepper" 		=> $this->buff_pepper,
			"buff_fortitude" 	=> $this->buff_fortitude,
		));
	}
	
	public function id() 				{return $this->_id;}
	public function rev() 				{return $this->_rev;}
	public function type() 				{return $this->type;}
	public function name() 				{return $this->name;}
	public function health() 			{return $this->health;}
	public function maxhealth() 		{return $this->maxhealth+$this->buff_maxhealth;}
	public function loot() 				{return $this->loot;}
	public function moxie() 			{return $this->moxie+$this->buff_moxie;}
	public function pepper() 			{return $this->pepper+$this->buff_pepper;}
	public function fortitude() 		{return $this->fortitude+$this->buff_fortitude;}
	public function buff_maxhealth()	{return $this->buff_maxhealth;}
	public function buff_moxie() 		{return $this->buff_moxie;}
	public function buff_pepper() 		{return $this->buff_pepper;}
	public function buff_fortitude() 	{return $this->buff_fortitude;}
	
	
	public function set_id($val) {
		$this->_id = $val;
	}
	
	public function set_rev($val) {
		$this->_rev = $val;
	}
	
	public function set_type($val) {
		$this->type = $val;
	}
	
	public function set_name($val) {
		$this->name = $val;
	}
	
	public function adjust_health($amount) {
		$this->health = max(min($this->maxhealth(), $this->health+$amount), 0);
	}
	
	public function adjust_maxhealth($amount) {
		$this->maxhealth = max($this->maxhealth+$amount, 0);
	}
	
	public function adjust_loot($amount) {
		$this->loot = max($this->loot+$amount, 0);
	}
	
	public function adjust_moxie($amount) {
		$this->moxie = max($this->moxie+$amount, 0);
	}
	
	public function adjust_pepper($amount) {
		$this->pepper = max($this->pepper+$amount, 0);
	}
	
	public function adjust_fortitude($amount) {
		$this->fortitude = max($this->fortitude+$amount, 0);
	}
	
	public function adjust_buff_maxhealth($amount) {
		$this->buff_maxhealth += $amount;
	}
	
	public function adjust_buff_moxie($amount) {
		$this->buff_moxie += $amount;
	}
	
	public function adjust_buff_pepper($amount) {
		$this->buff_pepper += $amount;
	}
	
	public function adjust_buff_fortitude($amount) {
		$this->buff_fortitude += $amount;
	}
	
	
}

/* End of entity.php */