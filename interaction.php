<?php

require_once 'includes.php';


if(isset($_GET['ping'])) 
{	
	echo "pong";	
	return;
}


if(isset($_GET['user']))
{
	echo $c->getEntity($_GET['user'])->get_json_summary();
	return;	
}


echo "Command failed.";
