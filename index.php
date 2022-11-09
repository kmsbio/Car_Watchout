<html>
	<head>
		<script type="text/javascript" src="./function.js"></script>
		<title>자동차 신속대응 시스템</title>
	</head>
	
	<body>
		<h1>자동차 신속대응 시스템</h1>

		<form enctype='multipart/form-data' action="/PHP/request.php" method='post'>
			ID : <input type="text" name="user_id"/><br>
			위도(X축) : <input type="number" name="lati" step="0.0000001"/><br>
			경도(Y축) : <input type="number" name="long" step="0.0000001"/><br>
			이미지 파일 : <input type="text" name="myimage" onchange="readURL(this);"/><br>
			<input type="submit" name="submit" value="submit"/><br>
			<img id="preview">
    	</form>
	</body>
</html>