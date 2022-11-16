<?php
	$ID = $_POST['userID'];

	require 'SQL.php';
	$result = checkID($ID);
	
	if($result == 0) {
        echo "일치하는 계정이 없습니다";
    }
    else {
        echo "일치하는 계정이 있습니다";
    }
?>