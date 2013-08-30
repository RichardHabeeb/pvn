<?php


require_once('lib/CouchSessionStore.php');
require_once('lib/Sag.php');



class CouchDatabase {
	
	private $env;
	
	public $sag;
	
	function __construct($env) {
		$this->env = getenv($env);
		$path = parse_url($this->env);
		$this->sag = new Sag($path['host'], '5984');
		$this->sag->login($path['user'], $path['pass']);
		$this->sag->decode(False);
	}
	
	function setDB($db) {
		$this->sag->setDatabase($db, true);
		
	}
	
	
	function getNewID() {
		return $this->sag->generateIDs(1)->body->uuids[0];
	}
	
	
	function pushEntity(Entity &$entity) {
		if($entity->_id() == -1 || $entity->_id() == null) {
			
			$this->setDB("entity");
			$result = $this->sag->post($entity->get_json_summary(false))->body;
			
			if(!$result->ok) {
				//error handle
			}
			
			
			return $entity->set_id($result->id)->set_rev($result->rev);
					
		}
		
	}
	
	
	function getEntity($_id) {
		
		try{
			$this->setDB("entity");
			$entity = new Entity(); 
			$entity->load_json_summary($this->sag->get($_id)->body);
			
			//get items and buffs
			
			return $entity;
		}
		catch(SagCouchException $e) {
			return $e->__toString();
		}
	}
	
}

/* End of couch.php */