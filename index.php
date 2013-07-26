<?php
	try {
		# get the mongo db name out of the env
		$mongo_url = parse_url(getenv("MONGOLAB_URI"));
		$dbname = str_replace("/", "", $mongo_url["path"]);
		
		print_r( $mongo_url["path"] . "<br />");
		echo exec("pwd") . "<br />";
		echo exec("ls -l") . "<br />";
		print_r( get_loaded_extensions());
		
		dl("ext/mongo.so");
		dl("mongo.so");
		dl("/app/www/ext/mongo.so");
		
		print_r( get_loaded_extensions());
		/*
		# connect
		$m   = new Mongo(getenv("MONGOLAB_URI"));
		$db  = $m->$dbname;
		$col = $db->access;

		# insert a document
		$visit = array( "ip" => $_SERVER["HTTP_X_FORWARDED_FOR"] );
		$col->insert($visit);

		# print all existing documents
		$data = $col->find();
		foreach($data as $visit) {
		echo "<li>" . $visit["ip"] . "</li>";
		}

		# disconnect
		$m->close();
		*/
	} catch (Exception $e) {
		echo "Exception: ", $e->getMessage(), "\n";
	}
?>