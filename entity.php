<?php

/**
 * Interface: iEntity 
 * 
 * @author	Richard Habeeb
 */
interface iEntity {
	
	
	public function __construct();
	public function __construct($json);
	public function __construct($id, $class, $name, $health, $maxhealth, $mastery, $exp, $loot, $moxie, $impetus, $guts);
	
	public function get_json_summary();
	
	public function gain_health($amount);
	public function take_damage($amount);
	public function gain_exp($amount);
	public function gain_loot($amount);
	public function gain_moxie($amount);
	public function gain_impetus($amount);
	public function gain_guts($amount);

}

class Entity implements iEntity {
	public static $classes = array("None" => "None" , "Pirate" => "Pirate",  "Ninja" => "Ninja");
	
	private $id, $class, $name, $health, $maxhealth, $mastery, $exp, $loot, $moxie, $impetus, $guts;
	
	public function __construct() {
		this::$id = 0;
		this::$class = $classes["None"];
		this::$health = 10;
		this::$maxhealth = 10;
		this::$mastery = 1;
		this::$exp = 0;
		this::$loot = 0;
		this::$moxie = 1;
		this::$impetus = 1;
		this::$guts = 1;
		
	}
	
	public function __construct($json);
	public function __construct($id, $class, $health, $maxhealth, $mastery, $exp, $loot, $moxie, $impetus, $guts);
	
	public function get_json_summary();
	
	public function gain_health($amount);
	public function take_damage($amount);
	public function gain_exp($amount);
	public function gain_loot($amount);
	public function gain_moxie($amount);
	public function gain_impetus($amount);
	public function gain_guts($amount);
}

/* End of entity.php */