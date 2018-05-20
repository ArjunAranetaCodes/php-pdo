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

	  // Select the rows in which "id" is 3
	  $sql = "SELECT `id`, `link` FROM `sites` WHERE `id`=3";
	  $result = $conn->query($sql, PDO::FETCH_OBJ);        // Apply query() with a fetch-mode

	  // Parse the result set
	  while($row = $result->fetch()) {
		echo $row->id. '-'. $row->link. '<br />';      // Display the columns "id", and "link"
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>