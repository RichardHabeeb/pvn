<?php

/**
 * Session
 * 
 * @author Richard
 */
class Session {
	/**
	 * @var unknown_type - tell whether the session is logged in.
	 */
	private $logged_in = false;
	
	/**
	 * @var unknown_type - reference the logged in user
	 */
	private $user = null;
	
	/**
	 * __construct()
	 * 
	 * Build a new session.
	 * @return void
	 */
	function __construct() {
		session_start();
		session_regenerate_id(true);
		
		if($this->LoggedInSessionExists()) {
			$this->logged_in = true;
			//GET USER OBJECT
		}
	}
	
	
	function RestartSession() {
		if(!isset($_SESSION)) session_start();
		$_SESSION = array();
		session_destroy();
		$logged_in = false;
		$user = null;
		session_start();
		session_regenerate_id(true);
	}
	
	function LoggedInSessionExists() {
		return (isset($_SESSION) && isset($_SESSION['logged_in']) && isset($_SESSION['user_id']) && $_SESSION['logged_in']);
	}
	
	
	
	
}

?>