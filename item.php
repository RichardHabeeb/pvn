<?php

interface iItem {
	
	public function __construct();
	public function get_json_summary();
	public function load_json_summary($json);
	public function id();
	public function type();
	public function name();
	public function value();
	public function side_requirement();
	
	
}

class Item implements iItem {
	public static $types = array("None" => "None", "Equip" => "Equip", "Single Use" => "Single Use");
	
	private $id, $type, $name, $value, $side_requirement;
	
	public function __construct() {
		$this->id = -1;
		$this->type = Item::$types["None"];
		$this->name = "nameless";
		$this->value = 0;
		$this->side_requirement = Entity::$types["None"];
	}

	public function get_json_summary() {
		return json_encode(array(
			"id" 				=> $this->id,
			"type" 				=> $this->type,
			"name" 				=> $this->name,
			"value" 			=> $this->value,
			"side_requirement"	=> $this->side_requirement
		));
	}
	
	public function load_json_summary($json) {
		$values = json_decode($json, true);
		$this->id 					= $values["id"];
		$this->type 				= $values["type"];
		$this->name 				= $values["name"];
		$this->value 				= $values["value"];
		$this->side_requirement 	= $values["side_requirement"];
	}
	
	public function id() { return $this->id;}
	public function type() { return $this->type;}
	public function name() { return $this->name;}
	public function value() { return $this->value;}
	public function side_requirement() {$this->side_requirement;}
} 

/* End of item.php */