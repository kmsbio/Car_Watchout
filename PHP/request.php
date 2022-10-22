<?php
	date_default_timezone_set('Asia/Seoul');

	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
	$lati = isset($_POST['lati']) ? (float) $_POST['lati'] : "";
	$long = isset($_POST['long']) ? (float) $_POST['long'] : "";
	
	echo "ID: " .$user_id ."<br>";
	echo "lati: " .$lati ."<br>";
	echo "long: " .$long ."<br>";

	require 'upload_image.php'; //이미지 관련 처리 부분 저장
	
	require 'SQL.php'; //SQL 관련 함수 저장
	storeData($user_id,$lati,$long,$file_route);

	require 'other.php'; //yolo모델을 돌릴수 있는 연결 저장
	playAI($file_route);
?>
