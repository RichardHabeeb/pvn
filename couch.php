<?php

error_reporting(0);
require_once('lib/Sag.php');



class CouchDatabase {
	
	private $env;
	
	public $sag;
	
	function __construct($env) {
		$this->env = getenv($env);
		$path = parse_url($this->env);
		$this->sag = new Sag($path['host'], '5984');
		$this->sag->login($path['user'], $path['pass']);
	}
	
	function setDB($db) {
		$this->sag->setDatabase($db, true);
		
	}
	
	
	function getNewID() {
		return $this->sag->generateIDs(1)->body->uuids[0];
	}
	
	function pushEntity(Entity $entity) {
		if($entity->id() == -1 || $entity->id() == null) {
			$entity->set_id($this->getNewID());
			
			
			//var_dump($this->sag->put($entity->id(), $entity->get_json_summary()));
		}
		
	}
	
}



	
if($debug_logging) echo "Couch loaded.\n";

/* End of mongo.php */