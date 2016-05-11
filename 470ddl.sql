create table users(
id int NOT NULL AUTO_INCREMENT,
fname varchar(50),
lname varchar(50),
dob datetime,
username varchar(50),
email varchar(50),
password varchar(50),
phone varchar(50),
CONSTRAINT users_pk PRIMARY KEY(id)
);

create table orders(
oid int NOT NULL AUTO_INCREMENT,
userID INT,
date DATE,
menu_menuid,
quantity INT,
CONSTRAINT orders_pk PRIMARY KEY(oid),
CONSTRAINT orders_fk FOREIGN KEY(menu_menuid) REFERENCES menu(menuid)
ON DELETE CASCADE ON UPDATE CASCADE
);

create table menu(
menuid int,
foodName varchar(50),
description varchar(200),
price double,
point int,
menutype varchar(50),
category varchar(50),
CONSTRAINT menu_pk PRIMARY KEY(menuid)
);