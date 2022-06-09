<html>
	<head>
		<script type="text/javascript" src="function.js"></script>
		<title>자동차 신속대응 시스템</title>
	</head>
	
	<body>
		<h1>자동차 신속대응 시스템</h1>

		<form action="/PHP/request.php" method='post'>
			위도(X축) : <input type="number" name="lati"/><br>
			경도(Y축) : <input type="number" name="long"/><br>
			비디오 파일 : <input type="file" name="video" accept="video/*"/><br>
        <input type="submit" value="submit"/>
    	</form>
		
		<form enctype='multipart/form-data' action='/PHP/upload_video.php' method='post'>
			<input type='file' name='myfile'>
			<button>보내기</button>
		</form>

	</body>
</html>