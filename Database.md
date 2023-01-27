# Database
Car_WatchoutDB (MySQL)


# Table
### Process Table
	Create Table Service (
		NUM Int Primary Key,
		foreign key (ID) references Register(ID),
		EVENT_TIME Datetime,
		GPS_X Float(12),
		GPS_Y Float(12),
		Image_LINK_TEXT Varchar(256),
		OX Varchar(1)
	);
### Register Table
	Create Table Register (
		ID Varchar(24) Primary Key,
		Name Varchar(10),
    	Birthday Date,
    	PW Varchar(24),
    	Email Varchar(30)
	);