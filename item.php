<?php

interface iItem {
	
	public function __construct($name = "Item", $value = 0, $side_requirement = "None", $buffs = array(), $_id = -1, $_rev = -1);
	public function get_json_summary();
	public function load_json_summary($json);
	public function _id();
	public function _rev();
	public function name();
	public function value();
	public function side_requirement();
	public function &buffs();
	public function set_id($val);
	public function set_rev($val);
	public function add_buff(Buff $buff);
}

class Item implements iItem {
	
	private $_id, $_rev, $name, $value, $side_requirement, $buffs;
	
	public function __construct($name = "Item", $value = 0, $side_requirement = "None", $buffs = array(), $_id = -1, $_rev = -1) {
		$this->_id = $_id;
		$this->_rev = $_rev;
		$this->name = $name;
		$this->value = 0;
		$this->side_requirement = "None";
		$this->buffs = array();
	}

	public function get_json_summary() {
		
		$json_buff_ids = array();
		foreach($this->buffs as $key => $value) {
			array_push($json_buff_ids, $key);
		}
		
		return json_encode(array(
			"_id" 				=> $this->_id,
			"_rev" 				=> $this->_rev,
			"name" 				=> $this->name,
			"value" 			=> $this->value,
			"side_requirement"	=> $this->side_requirement,
			"buffs"				=> $json_buff_ids,
		));
	}
	
	public function load_json_summary($json) {
		$values = json_decode($json, true);
		$this->id 					= $values["id"];
		$this->type 				= $values["type"];
		$this->name 				= $values["name"];
		$this->value 				= $values["value"];
		$this->side_requirement 	= $values["side_requirement"];
		//buffs need to be decoded by couchdb
	}
	
	public function _id() { return $this->_id;}
	public function _rev() { return $this->_rev;}
	public function name() { return $this->name;}
	public function value() { return $this->value;}
	public function side_requirement() {$this->side_requirement;}
	public function &buffs() { return $this->buffs;}
	
	public function set_id($val) {
		$this->_id = $val;
	}
	
	public function set_rev($val) {
		$this->_rev = $val;
	}
	
	public function add_buff(Buff $buff) {
		$this->buffs[$buff->_id()] = $buff;		
	}
}

Class Weapon extends Item implements iItem {}

Class Armor extends Item implements  iItem {}

/* End of item.php */