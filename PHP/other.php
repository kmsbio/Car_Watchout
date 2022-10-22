<?php
	function playAI($img) {
		echo "<b>한번 확인해보세요</b> : $img <br>";
		$result = exec("python ../yolo/findObj.py $img");
		return $result;
	}
?>