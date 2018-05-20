<?php
	// Connection data (server_address, database, username, password)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root';
	$passdb = '';

	// Display message if successfully connect, otherwise retains and outputs the potential error
	try {
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  echo 'Connected to database';
		   /* Instructions for working with $conn object */

	  $conn = null;         // Close the connection
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>