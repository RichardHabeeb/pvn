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
	
	public function _id();
	public function _rev();
	public function type();
	public function name();
	public function health();
	public function maxhealth();
	public function loot();
	public function moxie();
	public function pepper();
	public function fortitude();
	public function weapon();
	public function armor();
	public function &items();
	public function &buffs();
	
	public function set_id($val);
	public function set_rev($val);
	public function set_type($val);
	public function set_name($val);
	public function adjust_health($amount);
	public function adjust_loot($amount);
	public function adjust_moxie($amount);
	public function adjust_pepper($amount);
	public function adjust_fortitude($amount);
	public function add_buff(Buff $buff);
	public function add_item(iItem $item);
	public function equip_item($item_id);
	
}

class Entity implements iEntity {
	public static $types = array("None" => "None" , "Pirate" => "Pirate",  "Ninja" => "Ninja", "Monster" => "Monster");
	
	private $_id, $_rev, $type, $name, $health, $maxhealth, $loot, $moxie,  $pepper,  $fortitude, $items, $buffs, $weapon_id, $armor_id;
	
	public function __construct($type = "None", $name = "Entity", $health = 10, $loot = 0, $moxie = 0, $pepper = 0, $fortitude = 0, $items = array(), $buffs= array(), $_id = -1, $_rev = -1) {	
		$this->_id 				= $_id;
		$this->_rev				= $_rev;
		$this->type 			= Entity::$types[$type];
		$this->name 			= $name;
		$this->health 			= $health;
		$this->maxhealth 		= $health;
		$this->loot 			= $loot;
		$this->moxie 			= $moxie;
		$this->pepper 			= $pepper;
		$this->fortitude 		= $fortitude;
		$this->items 			= $items;
		$this->buffs 			= $buffs;
		$this->weapon_id 		= -1;
		$this->armor_id 		= -1;
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
		$this->weapon_id		= $values["weapon_id"];
		$this->armor_id			= $values["armor_id"];		
		//load items and buffs from couch
	}
	
	public function get_json_summary($get_id = true, $get_rev = true) {
		
		$json_buff_ids = array();
		foreach($this->buffs as $key => $value) {
			array_push($json_buff_ids, $key);
		}
		
		$json_item_ids = array();
		foreach($this->buffs as $key => $value) {
			array_push($json_item_ids, $key);
		}
		
		if($get_id) {
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
				"items"				=> $json_item_ids,
				"buffs"				=> $json_buff_ids,
			));
		} else {
			return json_encode(array(
				"type" 				=> $this->type,
				"name" 				=> $this->name,
				"health" 			=> $this->health,
				"maxhealth" 		=> $this->maxhealth,
				"loot" 				=> $this->loot,
				"moxie" 			=> $this->moxie,
				"pepper" 			=> $this->pepper,
				"fortitude" 		=> $this->fortitude,
				"items"				=> $json_item_ids,
				"buffs"				=> $json_buff_ids,
			));
		}
	}
	
	public function _id() 				{return $this->_id;}
	public function _rev() 				{return $this->_rev;}
	public function type() 				{return $this->type;}
	public function name() 				{return $this->name;}
	public function loot() 				{return $this->loot;}
	public function health() 			{return $this->health;}
	
	public function maxhealth() {
		$maxhealth = $this->maxhealth;
		$arr = $this->get_all_buffs();
		
		foreach($arr as $key => $value) {
			$maxhealth += $value->maxhealth();
		}
		
		return $maxhealth;
	}
	
	public function moxie() {
		return $this->moxie;
	}
	
	public function pepper() {
		return $this->pepper;
	}
	
	public function fortitude() {
		return $this->foritude;
	}
	
	public function weapon() {
		if($this->weapon_id != -1) 
			return $this->items[$this->weapon_id];
		else
			return null;
	}
	
	public function armor() {
		if($this->weapon_id != -1) 
			return $this->items[$this->armor_id];
		else
			return null;
	}
	
	public function &items() {
		return $this->items;
	}
	
	public function &buffs() {
		return $this->buffs;
	}
	
	public function get_all_buffs() {
		$arr = array_merge(array(), $this->buffs);
		if($this->weapon_id != -1 && array_key_exists($this->weapon_id, $this->items))
			$arr = array_merge($arr, $this->weapon()->buffs());
	    if($this->armor_id != -1 && array_key_exists($this->armor_id, $this->items))
			$arr = array_merge($arr, $this->armor()->buffs());
		return $arr;
		
	}
	
	
	
	public function set_id($val) {
		$this->_id = $val;
		return $this;
	}
	
	public function set_rev($val) {
		$this->_rev = $val;
		return $this;
	}
	
	public function set_type($val) {
		$this->type = $val;
		return $this;
	}
	
	public function set_name($val) {
		$this->name = $val;
		return $this;
	}
	
	public function adjust_health($amount) {
		$this->health = max(min($this->maxhealth(), $this->health+$amount), 0);
		return $this;
	}
	
	public function adjust_maxhealth($amount) {
		$this->maxhealth = max($this->maxhealth+$amount, 0);
		return $this;
	}
	
	public function adjust_loot($amount) {
		$this->loot = max($this->loot+$amount, 0);
		return $this;
	}
	
	public function adjust_moxie($amount) {
		$this->moxie = max($this->moxie+$amount, 0);
		return $this;
	}
	
	public function adjust_pepper($amount) {
		$this->pepper = max($this->pepper+$amount, 0);
		return $this;
	}
	
	public function adjust_fortitude($amount) {
		$this->fortitude = max($this->fortitude+$amount, 0);
		return $this;
	}
	
	public function add_buff(Buff $buff) {
		$this->buffs[$buff->_id()] = $buff;
		return $this;
	}
	
	public function add_item(iItem $item) {
		$this->items[$item->_id()] = $item;
		return $this;
	}
	
	public function equip_item($item_id) {
		if($item_id != -1 && array_key_exists($item_id, $this->items)) {
			if(get_class($this->items[$item_id]) == "Weapon") {
				$this->weapon_id = $item_id;
			}
			
			if(get_class($this->items[$item_id]) == "Armor") {
				$this->armor_id = $item_id;
			}
		}
		return $this;
	}
	
}

/* End of entity.php */