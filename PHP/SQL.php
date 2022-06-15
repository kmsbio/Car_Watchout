<?php
	/*config의 값을 담당하는 SQL 파일*/
	$host = 'localhost';
    $user = '';
    $pw = '';
    $dbName = 'Car_WatchoutDB';
	
	function storeData($ID,$GPS_X,$GPS_Y) {
		global $host, $user, $pw, $dbName;
		//global $user;
		//global $pw;
		//global $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);
		if($mysql){
        	echo "<br>MySQL 접속 성공";
    	}else{
        	echo "<br>MySQL 접속 실패";
    	}
		$num = checkNum();
		$link = checkVideo();
		
		$sql = "INSERT INTO Service (NUM,ID,EVENT_TIME,GPS_X,GPS_Y,Video_LINK_TEXT,OX) VALUES ( '$num','$ID',now(),'$GPS_X','$GPS_Y','$link','?' );";
		echo "<br> 가능해요?";
		mysqli_query($mysql,$sql);
		mysqli_close($mysql);
		}
							 
	function checkNum() {
		$sql = "SELECT count(*) FROM Service;";
		$result = 0;
		return $result;
	}

	function checkVideo() {
		$result = 0;
		return $result;
	}
?>