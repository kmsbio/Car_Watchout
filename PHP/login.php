<?php
	//로그인을 하는 상황때 실행하는 페이지
	//post 방식을 데이터를 받는다.

	$ID = $_POST['userID'];
	$PW = $_POST['password'];

	require 'SQL.php';
	$result = checkRegister($ID,$PW);
	
	if($result == 'o') {
        echo "로그인 성공";
    }
    else {
        echo "로그인 실패" .$result;
    }
	
	# ID password 입력값을 받고 일치 하는 경우에 보내준다
?>