#필요에 따라 제작을 진행할 생각입니다.

import pymysql

#초기 설정하는 파일
conn = pymysql.connect(host='localhost', user='seobi', password='qhdks10!', db='Car_WatchoutDB', charset='utf8')
cur = conn.cursor()


sql = 'insert into departments values(280, "depth test", null, 1700)'
cur.execute(sql)