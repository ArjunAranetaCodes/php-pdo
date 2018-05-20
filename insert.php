<?php
	// Connection data (server_address, database, name, poassword)
	$hostdb = 'localhost';
	$namedb = 'db_person';
	$userdb = 'root1';
	$passdb = '';
	
	$first = $_POST['first'];
	$last = $_POST['last'];

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define an insert query
	  $sql = "INSERT INTO `tblname` (`firstname`, `lastname`) VALUES ('".$first."','".$last."')";
	  $count = $conn->exec($sql);

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	// If data added ($count not false) displays the number of rows added
	if($count !== false) echo 'Number of rows added: '. $count;
	
	header("Location:select.php");
?>