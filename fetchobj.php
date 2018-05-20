<?php
	// Connection data (server_address, database, name, poassword)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Selects the rows in which "id" lower than 3
	  $sql = "SELECT `id`, `name` FROM `sites` WHERE `id`< 5";
	  $result = $conn->query($sql);

	  // Parse data
	  while($row = $result->fetch(PDO::FETCH_OBJ)) {
		echo $row->id. '-'. $row->name. '<br />';      // Output data from the columns 'id', and 'name'
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>