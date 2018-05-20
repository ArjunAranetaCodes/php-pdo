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

	  // Sets a method
	  function makeString() {
		// Returns a string with the properties value. Uppercase the first character of each word
		return ucwords($this->id. ' - '. $this->category). '<br />';
	  }
	}

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Selects the columns "id", and "category"
	  $sql = "SELECT `id`, `category` FROM `sites`";
	  $result = $conn->query($sql);

	  // Parse the object instance (of the Sites class) created with fetchObject()
	  while($obj = $result->fetchObject('Sites')) {
		echo $obj->makeString();        // Output the result returned by makeString() method
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
?>