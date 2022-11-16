<?php
	//이미지와 AI를 돌리는 방법에 관한 함수들 모음이다.

	function string2IMG($userid) {
        //base64를 이미지로 바꾸어주는 함수 입니다.
        $result = exec("python3 ../python/string2IMG.py '$userid'");
        return $result;
    }

    function makeTemp($base64) {
        //txt파일에 base64 소스코드를 넣습니다. (매개변수 오류)
        $myfile = fopen("../upload/temp.txt", "w");
		fwrite($myfile, $base64);
        fclose($myfile);
    }

	function playAI($img) {
		//AI를 돌린뒤 해당 결과에 따라 문제가 있나 없나 판단하는 함수
		$result = exec("python3 ../python/findObj.py '$img'");
        //exec("echo", $result);
		echo "$result";
        return $result;
	}
?>