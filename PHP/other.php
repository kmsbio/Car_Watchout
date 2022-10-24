<?php
	function playAI($img) {
		//AI를 돌린뒤 해당 결과에 따라 문제가 있나 없나 판단하는 함수
		$result = exec("python ../python/findObj.py $img");
		echo "결과 : $result <br>";
		if($result == "검출X") {
			return 'x';
		}
		else {
			return 'o';
		}
	}
?>