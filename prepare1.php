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

	  // Define the SQL statement that will be applied in prepare()
	  $sql = "SELECT `name`, `link` FROM `sites` WHERE `id`= :id OR `category`= :category";
	  $sqlprep = $conn->prepare($sql);        // Prepares and stores the SQL statement in $sqlprep

	  // The array with values that must be added in the SQL instruction (for ':id', and ':category')
	  $ar_val = array('id'=>2, 'category'=>'education');

	  // If the prepared SQL is succesfully executed with execute()
	  if($sqlprep->execute($ar_val)) {
		// gets and displays the data returned by MySQL
		while($row = $sqlprep->fetch()) echo $row['name'].' - '.$row['link'].'<br />';
	  }

		 /* Execute again the prepared SQL, with other values */
	   echo 'The 2nd select<br />';

	  // The array with values that must be added in the prepared SQL (for ':id', and ':category')
	  $ar_val = array('id'=>8, 'category'=>'foreign languages');

	  // Execute the SQL instruction
	  if($sqlprep->execute($ar_val)) {
		// gets and displays the data returned by MySQL
		while($row = $sqlprep->fetch()) echo $row['name'].' - '.$row['link'].'<br />';
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>