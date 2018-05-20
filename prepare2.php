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

	// Define and prepare an INSERT statement
	$sql = "INSERT INTO `sites` (`name`, `category`, `link`) VALUES (:name, :category, :link)";
	$sqlprep = $conn->prepare($sql);

	// Adds value with bindValue
	$sqlprep->bindValue(':name', 'Ajax Course', PDO::PARAM_STR);
	$sqlprep->bindValue(':category', 'programming', PDO::PARAM_STR);
	$sqlprep->bindValue(':link', 'coursesweb.net/ajax', PDO::PARAM_STR);

	// If the query is succesfully executed, output the value of the last insert id
	if($sqlprep->execute()) echo 'Succesfully added the row with id='. $conn->lastInsertId();

	// Define the variabiles with values to be added to bindParam
	$name = 'Flash Games';
	$category = 'games';
	$link = 'www.marplo.net/games';

	// Adds the variable to the SQL prepared statement
	$sqlprep->bindParam(':name', $name, PDO::PARAM_STR);
	$sqlprep->bindParam(':category', $category, PDO::PARAM_STR);
	$sqlprep->bindParam(':link', $link, PDO::PARAM_STR);

	// If the query is succesfully executed, output the value of the auto inserted id
	if($sqlprep->execute()) echo '<br/>Succesfully added the row with id='. $conn->lastInsertId();

	$conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	echo $e->getMessage();
	}
?>