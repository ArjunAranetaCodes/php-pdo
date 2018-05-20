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

	  // changes data in "name" si "link" colummns, where id=3
	  $sql = "UPDATE `sites` SET `name`='Spanish Course', `link`='www.marplo.net/spaniola' WHERE `id`=3";
	  $count = $conn->exec($sql);

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	// If the query is succesfully performed ($count not false)
	if($count !== false) echo 'Affected rows : '. $count;       // Shows the number of affected rows
?>