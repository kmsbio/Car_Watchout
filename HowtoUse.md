# MySQL 사용방법
시작 : service mysql start
종료 : service mysql stop

Database : Car_WatchoutDB (MySQL)
# SQL 제작리스트
Create Table Service (
	NUM Int Primary Key,
	ID Varchar(24),
	EVENT_TIME Datetime,
	GPS_X Float(12),
	GPS_Y Float(12),
	Image_LINK_TEXT Varchar(256),
	OX Varchar(1)
);
#
Create Table Register (
	ID Int Primary Key,
	PW Varchar(12),
	Nickname Varchar(12)
);

전체 확인
select * from Service;

#
# 다운로드 패키지
php-mysql
phppyadmin
--