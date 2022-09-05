
<?php
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
	$lati = isset($_POST['lati']) ? (float) $_POST['lati'] : "";
	$long = isset($_POST['long']) ? (float) $_POST['long'] : "";
	
	echo "ID: " .$user_id ."<br>";
	echo "lati: " .$lati ."<br>";
	echo "long: " .$long;
	
?>

<?php
	require 'SQL.php';
	storeData($user_id,$lati,$long);

	exec('../python/main.py')
?>
