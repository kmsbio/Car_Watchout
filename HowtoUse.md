# MySQL 사용방법
시작 : service mysql start
#
종료 : service mysql stop
#
Database : Car_WatchoutDB (MySQL)
#
Create Table Service (
	NUM Int Primary Key,
	ID Varchar(20),
	EVENT_TIME Datetime,
	GPS_X Float(7),
	GPS_Y Float(7),
	Video_LINK_TEXT Varchar(64),
	OX Varchar(1)
);

#
# 다운로드 패키지
php-mysql
phppyadmin
