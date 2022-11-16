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
# model = torch.hub.load('./', 'custom', path='./best.pt', source='local')
model = torch.hub.load('ultralytics/yolov5', 'custom', path='/workspace/CarWatchoutCPU/python/ai/realLast/best.pt')
#모델 성능 컨트롤
model.conf = 0.35  # NMS confidence threshold
#       iou = 0.45  # NMS IoU threshold
#       agnostic = False  # NMS class-agnostic
#       multi_label = False  # NMS multiple labels per box
#       classes = None  # (optional list) filter by class, i.e. = [0, 15, 16] for COCO persons, cats and dogs
#       max_det = 1000  # maximum number of detections per image
#       amp = False  # Automatic Mixed Precision (AMP) inference

# 변수 선언
person = 0
accident = 0
elk = 0
dog = 0
cat = 0
bird = 0
box = 0
other = 0


# '/workspace/Car_Watchout/upload/13.jpg'
img = 'C:/Users/rlawl/YOLOv5/yolov5-master/data/testdata/box.jpg'

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
    re_txt = "결과: "
    if sum==0:
        re_txt = "검출X"
    elif person >0:
        re_txt = re_txt + ("사람 %d명, " % (person))
    elif accident > 0:
        re_txt= re_txt +("교통사고 발생, ")
    elif elk > 0:
        re_txt= re_txt +("사슴 %d마리, " % (elk))
    elif dog > 0:
        re_txt= re_txt +("개 %d마리, " % (dog))
    elif cat > 0:
        re_txt= re_txt +("고양이 %d마리, " % (cat))
    elif bird > 0:
        re_txt= re_txt +("새 %d마리, " % (bird))
    elif box > 0:
        re_txt= re_txt +("상자 %d개, " % (box))
    elif other>0:
        re_txt= re_txt +("객채 탐지")
    else:
        print("ERROR")

    print(re_txt)
    #문자열 출력




#결과이미지 저장
results.save(save_dir='/workspace/CarWatchoutCPU/upload/result')
#결과이미지 출력
#results.show()