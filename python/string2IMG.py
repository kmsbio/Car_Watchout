#-*- coding: utf-8 -*-
#base64로 받은 이미지를 파일로 만들어줍니다.
import base64
import os
import sys

def base64_Decoding(incode_str):
    base64_str = incode_str
    str_bytes = base64.b64decode(base64_str)
    #init_str = str_bytes.decode('utf-8')
    #print(init_str)
    return str_bytes

#변수지정
imgNum = 0

#디렉토리 위치 변경
os.chdir('../upload')

#데이터 받기 및 해석
data = open('temp.txt', 'rb').read()
rev_data =base64_Decoding(data)

#폴더에 사진 중복 방지 확인
while 1:
    if os.path.isfile("./" + str(imgNum) + ".png"):
    	imgNum = imgNum + 1
    else:
        break
        
#파일 저장 및 경로 저장
e=open(str(imgNum) + ".png",'wb') 
e.write(rev_data)
e.close()

#print("내맘대로 할꺼야")
print("../upload/" + str(imgNum) + ".png")