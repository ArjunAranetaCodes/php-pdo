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

	  // Selects the rows in which "id" is 2
	  $sql = "SELECT `id`, `name` FROM `sites` WHERE `id`=3";
	  $result = $conn->query($sql);

	  // Parse the result set
	  while($row = $result->fetch(PDO::FETCH_BOTH)) {
		echo $row['id']. '-'. $row['name']. '<br />';      // Display the 'id', and 'name' columns
		echo $row[0]. '-'. $row[1]. '<br />';      // Display the first, and the second column
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>