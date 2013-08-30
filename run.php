<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>phpsessions example runner</title>
  </head>
  <body>

    <div>
  <?php
	  ini_set('display_errors', true);
	
	  require 'lib/CouchSessionStore.php';
	  require_once 'lib/Sag.php';
	
		$env = getenv("CLOUDANT_URL");
		$path = parse_url($env);
		$sag = new Sag($path['host'], '5984');
		$sag->login($path['user'], $path['pass']);
		$sag->setDatabase("dev", true);
	  CouchSessionStore::setSag($sag);
	
	  session_start();
	  var_dump($_SESSION);
	  echo "<br/>";
	
	  if(!$_SESSION['userID'])
	  {
	    //Get user's info from the database ... or just hardcode it.
	$_SESSION['userID'] = 100;
	$_SESSION['firstName'] = "Sam";
	  }
	
	  printf("Welcome back %s (#%s)!<br/>\n", $_SESSION['firstName'], $_SESSION['userID']);
	
	  $_SESSION['time'] = time();
	
	  var_dump($_SESSION);
	  ?>
    </div>
  </body>
</html>
