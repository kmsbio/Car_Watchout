<?php
    	$host = 'localhost';
    	$user = 'dalseobi';
    	$pw = 'qhdks05!';
    	$dbName = 'Car_WatchoutDB';

    	$mysql = new mysqli($host, $user, $pw, $dbName);

    	if($mysql){
    	    echo "MySQL 접속 성공";
    	}else{
    	    echo "MySQL 접속 실패";
    	}

?>