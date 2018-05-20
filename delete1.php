<?php
	// Connection data (server_address, database, name, password)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Delete rows in "sites", according to the value of "category" column
	  $sql = "DELETE FROM `sites` WHERE `category` IN('education', 'programming')";
	  $count = $conn->exec($sql);

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	// If the query is succesfully performed ($count not false)
	if($count !== false) echo 'Affected rows: '. $count;       // Shows the number of aAffected rows
?>