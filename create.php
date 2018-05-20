<?php
	// Connection data (server_address, database, name, poassword)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root1';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Create the table
	  $sql = "CREATE TABLE `sites` (
	  `id` int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	  `name` varchar(70) NOT NULL DEFAULT '',
	  `category` varchar(25),
	  `link` varchar(100)
	  ) CHARACTER SET utf8 COLLATE utf8_general_ci";
	  if($conn->exec($sql) !== false) 
		echo 'The sites table is created';       // If the result is not false, display confirmation
		

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>