# -*- coding: utf-8 -*-
# 인공지능을 담당하는 파일
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


# model costom
model = torch.hub.load('ultralytics/yolov5', 'custom', path='/workspace/CarWatchoutCPU/python/ai/realLast/best.pt')


# 변수 선언
person = 0
accident = 0
elk = 0
dog = 0
cat = 0
bird = 0
box = 0
other = 0


img = sys.argv[1]

# 객체선언
results = model(img)
result = results.pandas().xyxy[0]
cl = result['class'].to_list()
ra = result.__array__()


if ra is not None:
    for count in range(len(ra)):
        if (ra[count][6] == 'person'):
            person = person + 1
        elif (ra[count][6] == 'traffic accident'):
            accident = accident + 1
        elif (ra[count][6] == 'animal - elk'):
            elk = elk + 1
        elif (ra[count][6] == 'animal - dog'):
            dog = dog + 1
        elif (ra[count][6] == 'animal - cat'):
            cat = cat + 1
        elif (ra[count][6] == 'animal - bird'):
            bird = bird + 1
        elif (ra[count][6] == 'object - box'):
            box = box + 1
        elif (ra[count][6] == 'object'):
            other = other + 1
        else:
            pass
    #검출 갯수 변수
    sum = person+accident+elk+dog+cat+bird+box+other
    re_txt = []
    if sum==0:
        re_txt = "검출X"
    elif person >0:
        re_txt.append("사람 %d명, " % (person))
    elif accident > 0:
        re_txt.append("교통사고 발생, ")
    elif elk > 0:
        re_txt.append("사슴 %d마리, " % (elk))
    elif dog > 0:
        re_txt.append("개 %d마리, " % (dog))
    elif cat > 0:
        re_txt.append("고양이 %d마리, " % (cat))
    elif bird > 0:
        re_txt.append("새 %d마리, " % (bird))
    elif box > 0:
        re_txt.append("상자 %d개, " % (box))
    elif other>0:
        re_txt.append("객채 탐지")
    else:
        print("ERROR")
    
    print(re_txt)


#결과이미지 저장
results.save(save_dir='/workspace/CarWatchoutCPU/upload/result')
