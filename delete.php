<?php
	$idname = $_GET['id'];
	
	// Connection data (server_address, database, name, password)
	$hostdb = 'localhost';
	$namedb = 'db_person';
	$userdb = 'root1';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Delete rows in "sites", according to the value of "category" column
	  $sql = "DELETE FROM `tblname` WHERE `id` = ".$idname;
	  $count = $conn->exec($sql);

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	// If the query is succesfully performed ($count not false)
	if($count !== false) echo 'Affected rows: '. $count;       // Shows the number of aAffected rows
	
	header("Location:select.php");
?>