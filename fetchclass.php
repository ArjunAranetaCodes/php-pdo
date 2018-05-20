<?php
	// Connection data (server_address, database, name, poassword)
	$hostdb = 'localhost';
	$namedb = 'dbperson';
	$userdb = 'root';
	$passdb = '';

	// Define a class
	class Sites {
	  // Sets properties
	  public $id;
	  public $category;

	  // Method of the class
	  function makeString() {
		// Returns a string with the properties value. Uppercase the first character of each word
		return ucwords($this->id. ' - '. $this->category). '<br />';
	  }
	}

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Selects the "id", and "category" columns
	  $sql = "SELECT `id`, `category` FROM `sites`";
	  $result = $conn->query($sql);
	  $obj = $result->fetchALL(PDO::FETCH_CLASS, 'Sites');      // Apply FETCH_CLASS with Sites class

	  // Traverse the returned data, creating $insSites as instance of the class
	  foreach($obj as $insSites) {
		echo $insSites->makeString();        // Calls the makeString() method
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>