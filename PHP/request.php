
<?php
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
	$lati = isset($_POST['lati']) ? $_POST['lati'] : "";
	$long = isset($_POST['long']) ? $_POST['long'] : "";
	
	echo "ID: " .$user_id ."<br>";
	echo "lati: " .$lati ."<br>";
	echo "long: " .$long;

	require('SQL.php');
?>
