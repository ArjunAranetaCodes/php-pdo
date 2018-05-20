<?php
	$id = $_GET['id'];
	$first = $_GET['first'];
	$last = $_GET['last'];
	
	echo '
	<form action="update.php" method="post">
		<input type="hidden" name="id" value="'.$id.'"/>
		First Name: <input type="text" name="first" value="'.$first.'"/> <br />
		Last Name: <input type="text" name="last" value="'.$last.'"/> <br />
		<input type="submit" value="Update"/>
	</form>';
?>