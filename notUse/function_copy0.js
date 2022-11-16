function readURL(input) {
	//파일로 받은 사진을 미리보기로 만든 함수 
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById('preview').src = e.target.result;
		};
    	reader.readAsDataURL(input.files[0]);
  		} 
		else {
			document.getElementById('preview').src = "";
  		}
	}

function inputValue(user_id_input, lati_input, long_input, myimage) {
	//해당 함수를 통하여 웹앱에 데이터를 넣으면 됩니다.
	document.getElementsByName('user_id')[0].value = user_id_input;
	document.getElementsByName('lati')[0].value = lati_input;
	document.getElementsByName('long')[0].value = long_input;
	document.getElementsByName('myimage')[0].value = myimage;
}

function submitData() {
	//해당 함수를 이용해서 전달된 값을 전할 수 있다.
	document.getElementsByName('submit')[0].click();
}

function CallAndroid(result){
    //해당 함수를 통하여 안드로이드에 호출 할 수 있다.
        var broswerInfo = navigator.userAgent;	
        if(broswerInfo.indexOf("Android")>-1) {
            window.HybridApp.callResult(result);
        }
}