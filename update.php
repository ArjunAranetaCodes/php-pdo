<?php
	$id = $_POST['id'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	
	//echo $id."<br />";
	//echo $first."<br />";
	//echo $last."<br />";
	
	// Connection data (server_address, database, name, password)
	$hostdb = 'localhost';
	$namedb = 'db_person';
	$userdb = 'root1';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  $sql = "UPDATE `tblname` SET firstname = '".$first."', lastname='".$last."' WHERE `id` = ".$id;
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