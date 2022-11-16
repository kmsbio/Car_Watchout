<?php
	//사용자가 데이터를 보낼때 처리하는 페이지다.

	$user_id = $_POST['user_id'];
	$lati = $_POST['lati'];
	$long = $_POST['long'];
	$base64 = $_POST['myimage'];

    if(!isset($base64)) {
        echo "이미지가 호출되지 않았습니다";
    }

    else {
        	require 'other.php'; // 이미지와 관련된 파이썬 소스코드 모음
	        makeTemp($base64);
	        $file_route = string2IMG($user_id);

	        require 'SQL.php'; //SQL 관련 소스코드 모음
	        storeData($user_id,$lati,$long,$file_route);

	        $result = playAI($file_route); //결과 값은 여기서 적힌다.
	        checkOX($result);
        
    }

echo "<script type='text/javascript' src='../function.js'></script>";
echo "<script> window.onload = function () { CallAndroid('$result');}</script>";
?>