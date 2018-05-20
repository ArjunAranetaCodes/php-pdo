<?php
	// Connection data (server_address, database, name, password)
	$hostdb = 'localhost';
	$namedb = 'db_person';
	$userdb = 'root1';
	$passdb = '';
	
	$search = $_POST['search'];
	echo "<a href='select.php'><- Back</a><br /><br />";
	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `tblname` WHERE firstname like '%".$search."%'";
	  $result = $conn->query($sql);

	  // If the SQL query is succesfully performed ($result not false)
	  if($result !== false) {
		//$cols = $result->columnCount();           // Number of returned columns
		//echo 'Number of returned columns: '. $cols. '<br />';
		// Parse the result set
		foreach($result as $row) {
		  echo $row['id']. ' - '. $row['firstname']. ' - '. 
			$row['lastname'].' - '. '<a href = "edit.php?id='.$row['id'].
												        '&first='.$row['firstname'].
														'&last='.$row['lastname'].'">Edit</a> | <a href="delete.php?idno='.$row['id'].'">Delete</a>'.'<br />';
		}
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>