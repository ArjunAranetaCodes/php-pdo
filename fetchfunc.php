<?php
	// Connection data (server_address, database, name, poassword)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root';
	$passdb = '';

	// Define a function
	function test($id, $name) {
	  // Returns a string with the parameter values, in uppercase
	  return strtoupper($id.'-'.$name);
	}

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT `id`, `name` FROM `sites`";
	  $result = $conn->query($sql);
	  $ar_row = $result->fetchALL(PDO::FETCH_FUNC, 'test');       // Apply FETCH_FUNC with test() function

	  var_export($ar_row);        // Output the structure of the returned Array

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>