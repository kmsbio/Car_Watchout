<?php
	//SQL에 관련된 함수들 모음

	date_default_timezone_set('Asia/Seoul');
	/*config의 값을 담당하는 SQL 파일*/
	$host = 'localhost';
    $user = 'seobi';
    $pw = 'qhdks10!';
    $dbName = 'Car_WatchoutDB';

	function storeData($ID,$GPS_X,$GPS_Y,$link) {
		//데이터를 insert로 쌓는 함수 입니다.
		global $host, $user, $pw, $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);
        
		$num = checkNum($mysql);
		$sql = "INSERT INTO Service (NUM,ID,EVENT_TIME,GPS_X,GPS_Y,Image_LINK_TEXT,OX) VALUES ('$num','$ID',now(),'$GPS_X','$GPS_Y','$link','?');";	
		mysqli_query($mysql,$sql);
		mysqli_close($mysql);
	}
							 
	function checkNum($mysql) {
		//슈퍼키를 숫자로 지정하기 위해 계산합니다.
		$sql = "SELECT count(num) FROM Service;";
		$query = mysqli_query($mysql,$sql);
		$result = mysqli_fetch_row($query);
		return $result[0];
	}

	function checkOX($result) {
		//인공지능으로 결과가 나온 것을 SQL OX 부분에 전달하는 역할입니다.
        
        global $host, $user, $pw, $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);
        
		$num = checkNum($mysql) - 1;
		$sql = "UPDATE Service set OX='$result' where NUM='$num';";
		mysqli_query($mysql,$sql);
		mysqli_close($mysql);
	}

    function findGPS() {
        //사고가 일어난 모든 위치를 table로 표시합니다.
        global $host, $user, $pw, $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);
        
        $sql = "SELECT GPS_X, GPS_Y from Service where OX == 'o'";
		mysqli_query($mysql,$sql);
        $result = mysqli_fetch_row($query);
		mysqli_close($mysql);
        echo "$result <br>";
        return $result[0];
    }

	function testSQL() {
		//모듈테스트를 할때 SQL 작동 여부를 확인합니다.
        global $host, $user, $pw, $dbName;
		$mysql = new mysqli($host, $user, $pw, $dbName);
        
		if($mysql){
    		echo "MySQL 접속 성공";    	
		}
		else{
    		echo "MySQL 접속 실패";
    	}
    }
?>
