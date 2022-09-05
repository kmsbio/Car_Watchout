us<?php
	date_default_timezone_set('Asia/Seoul');
	/*config의 값을 담당하는 SQL 파일*/
	$host = 'localhost';
    $user = 'root';
    $pw = 'qhdks05!';
    $dbName = 'Car_WatchoutDB';
	
	function storeData($ID,$GPS_X,$GPS_Y) {
		global $host, $user, $pw, $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);

		$num = checkNum($mysql);
		$link = checkVideo();
		
		$sql = "INSERT INTO Service (NUM,ID,EVENT_TIME,GPS_X,GPS_Y,Video_LINK_TEXT,OX) VALUES ('$num','$ID',now(),'$GPS_X','$GPS_Y','$link','?');";
		mysqli_query($mysql,$sql);
		mysqli_close($mysql);
		}
							 
	function checkNum($mysql) {
		$sql = "SELECT count(NUM) FROM Service;";
		//$result = mysqli_query($mysql,$sql);
		$result = 0;
		return $result;
	}

	function checkVideo() {
		$result = 0;
		return $result;
	}
?>