<?php
	//로그인을 하는 상황때 실행하는 페이지
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
	# 아닌경우에는 아니라 toast 해주는 자바스크립트 파일을 실행한다.
?>