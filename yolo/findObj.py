import torch
import cv2 as cv
import numpy as np
import sys

#model costom
model = torch.hub.load('ultralytics/yolov5','yolov5s',pretrained=True)

#변수 선언
person = 0
bus = 0

#'/workspace/Car_Watchout/upload/13.jpg'
img = sys.argv[0]


#객체선언
results = model(img)
result = results.pandas().xyxy[0]
cl = result['class'].to_list()
ra = result.__array__()

if ra is not None:
    for count in range(len(ra)):
        if(ra[count][6]=='person'):
            person = person + 1
        elif(ra[count][6] == 'bus'):
            bus = bus + 1
    print(f"사람 {person}명, 버스 {bus}개 검출")

else:
    print("검출 안됨")