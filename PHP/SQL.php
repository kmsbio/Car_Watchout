<?php
	/*config의 값을 담당하는 SQL 파일*/
	$host = 'localhost';
    $user = '';
    $pw = '';
    $dbName = 'Car_WatchoutDB';

	public $mysql = new mysqli($host, $user, $pw, $dbName);

    if($mysql){
        echo "<br>MySQL 접속 성공";
    }else{
        echo "<br>MySQL 접속 실패";
    }
	


	function storeData($ID,$GPS_X,$GPS_Y) {
		$time = date('m-d-Y h:i:s a', time());
		$num = checkNum();
		$link = checkVideo();
		
		$result = "INSERT INTO Car_WatchoutDB (NUM,ID,EVENT_TIME,GPS_X,GPS_Y,Video_LINK_TEXT,OX) VALUES ( '$num','$ID','$time','$GPS_X','$GPS_Y','$link','?' )";
		return $result;
		}
							 
	function checkNum() {
		$result = 0;
		return $result;
	}

	function checkVideo() {
		$result = 0;
		return $result;
	}
							 
	//mysqli_query( $jb_conn, $jb_sql );
?>