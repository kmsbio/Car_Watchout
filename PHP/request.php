<?php
	//사용자가 데이터를 보낼때 처리하는 페이지다.

	$user_id = $_POST['user_id'];
	$lati = $_POST['lati'];
	$long = $_POST['long'];
	$base64 = $_POST['myimage'];

	require 'other.php'; // 이미지와 관련된 파이썬 소스코드 모음
	makeTemp($base64);
	$file_route = string2IMG();

	require 'SQL.php'; //SQL 관련 소스코드 모음
	storeData($user_id,$lati,$long,$file_route);

	$result = playAI($file_route); //결과 값은 여기서 적힌다.
	checkOX($result);
?>

<script>
    window.onload = function() {
        postResult();
    }
    
    function postResult() {
        window.Android.callResult(<?php $result ?>);
    }
</script>