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
	  //IN(1,3) means the value of id
	  $sql = "SELECT * FROM `sites` WHERE `id` IN(1, 3)";
	  $result = $conn->query($sql);

	  // If the SQL query is succesfully performed ($result not false)
	  if($result !== false) {
		$cols = $result->columnCount();           // Number of returned columns

		echo 'Number of returned columns: '. $cols. '<br />';

		// Parse the result set
		foreach($result as $row) {
		  echo $row['id']. ' - '. $row['name']. ' - '. $row['category']. ' - '. $row['link']. '<br />';
		}
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>