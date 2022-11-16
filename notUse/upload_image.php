<?php
// 설정
$uploads_dir = '../upload';
$allowed_ext = array('jpg','jpeg','png','gif');
 
// 변수 정리
$error = $_FILES['myimage']['error'];
$name = $_FILES['myimage']['name'];
$ext = array_pop(explode('.', $name));
$file_route = "/workspace/Car_Watchout/upload/$name"; //해당함수는 파이썬 파일을 기준으로 적었습니다.

// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}

// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "허용되지 않는 확장자입니다.";
	exit;
}

// 파일 이동 및 이름 변경
move_uploaded_file( $_FILES['myimage']['tmp_name'], "$uploads_dir/$name");

exec("python3 ../python/string2IMG.py '$name' '$user_id'"); //id를 인식하여 이름을 바꾸어주는 함수

	function IMGRename($name,$userid) {
        //base64를 이미지로 바꾸어주는 함수 입니다.
        $result = exec("python3 ../python/string2IMG.py '$name' '$user_id'");
        return $result;
    }
?>