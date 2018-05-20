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

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `sites`";
	  $result = $conn->query($sql);

	  // Parse returned data, and displays them
	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		  echo $row['id']. ' - '. $row['name']. ' - '. $row['category']. ' - '. $row['link']. '<br />';
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>