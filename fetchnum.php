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

	  // Gets and displays data of each row
	  while($row = $result->fetch(PDO::FETCH_NUM)) {
		echo $row[0]. '-'. $row[1]. '<br />';      // Output data from the first and second column
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>