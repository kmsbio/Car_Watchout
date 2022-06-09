
<?php
	
	$lati = isset($_POST['lati']) ? $_POST['lati'] : "";
	$long = isset($_POST['long']) ? $_POST['long'] : "";
	
	
	echo "lati: " .$lati ."<br>";
	echo "long: " .$long;

	require('SQL.php');
?>
