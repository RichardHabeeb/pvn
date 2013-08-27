<?php


class Buff {
	private $_id, $_rev, $name, $maxhealth,  $moxie,  $pepper,  $fortitude;
	

	
	public function __construct($name = "", $maxhealth = 0, $moxie = 0, $pepper = 0, $fortitude = 0, $_id = -1, $_rev = -1) {
		$this->_id = $_id;
		$this->_rev = $_rev;
		$this->name = $name;
		$this->maxhealth = $maxhealth;
		$this->moxie = $moxie;
		$this->pepper = $pepper;
		$this->fortitude = $fortitude;
	}

	public function get_json_summary() {
		return json_encode(array(
			"_id" 				=> $this->_id,
			"_rev" 				=> $this->_rev,
			"name" 				=> $this->name,
			"maxhealth" 		=> $this->maxhealth,
			"moxie" 			=> $this->moxie,
			"pepper" 			=> $this->pepper,
			"fortitude" 		=> $this->fortitude,
		));
	}
	
	public function load_json_summary($json) {
		$values = json_decode($json, true);
		$this->_id 					= $values["_id"];
		$this->_rev 				= $values["_rev"];
		$this->name 				= $values["name"];
		$this->maxhealth 			= $values["maxhealth"];
		$this->moxie 				= $values["moxie"];
		$this->pepper 				= $values["pepper"];
		$this->fortitude 			= $values["fortitude"];
	}
	
	public function _id() 				{ return $this->_id;}
	public function _rev() 				{ return $this->_rev;}
	public function name() 				{ return $this->name;}
	public function maxhealth() 		{ return $this->maxhealth;}
	public function moxie() 			{ return $this->moxie;}
	public function pepper() 			{ return $this->pepper;}
	public function fortitude() 		{ return $this->fortitude;}
	
	public function set_id($val) {
		$this->_id = $val;
	}
	
	public function set_rev($val) {
		$this->_rev = $val;
	}
} 

/* End of item.php */