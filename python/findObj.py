import torch
import cv2 as cv
import numpy as np
import sys
from PIL import Image

def resultNUM(x):
    x = int(x)
    if x == 0:
        return 0
    else:
    	return 1
    

#model costom
model = torch.hub.load('./', 'custom', path='./weights/best.pt', source='local')

#변수 선언
person = 0
bus = 0

#'/workspace/Car_Watchout/upload/13.jpg'
img = sys.argv[1]

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
    if person == 0 & bus == 0:
    	print("검출X")
    else:
    	print(f"사람 {person}명, 버스 {bus}개 검출")