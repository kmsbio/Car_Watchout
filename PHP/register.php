<?php
	//사용자가 계정을 생성할때 들어가는 페이지다.
	//POST 방식으로 데이터를 받습니다.

	$ID = $_POST['userID'];
	$Password = $_POST['password'];
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Birth = $_POST['birth'];

	require 'SQL.php';
	
	storeRegister($ID,$Password,$Name,$Email,$Birth);
	echo "생성 완료";
?>