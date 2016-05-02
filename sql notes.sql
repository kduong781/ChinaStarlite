
CREATE TABLE users( `id` INT NOT NULL AUTO_INCREMENT , 
					`fname` VARCHAR(100) NOT NULL , 
					`lname` VARCHAR(100) NOT NULL , 
					`dob` DATE , 
					`username` VARCHAR(100) NOT NULL , 
					`password` VARCHAR(100) NOT NULL , 
					`email` VARCHAR(100) NOT NULL , 
					`phone` VARCHAR(20) NOT NULL,
					PRIMARY KEY (`id`)) ENGINE = InnoDB;


INSERT INTO users(`id`, `fname`, `lname`, `dob`, `username`, `password`, `email`,`phone`) VALUES (NULL, 'admin', 'user', '2016-04-16', 'admin', 'password', 'admin@adminuser.com','5623918225');


DELETE FROM users WHERE id=2; -- delete users

---------------------------------------------------------------------------------------------------------------------------
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
orderid int NOT NULL AUTO_INCREMENT,
usersid int,
CONSTRAINT orders_pk PRIMARY KEY(orderid),
CONSTRAINT orders_fk FOREIGN KEY(usersid) REFERENCES users(id)
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

create table orders_menu(
orders_orderid int,
menu_menuid int,
quantity int,
CONSTRAINT orders_mennu_pk PRIMARY KEY(orders_orderid, menu_menuid),
CONSTRAINT orders_menu_fk FOREIGN KEY(orders_orderid) REFERENCES orders(orderid),
CONSTRAINT menu_orders_fk FOREIGN KEY(menu_menuid) REFERENCES menu(menuid)
ON DELETE CASCADE ON UPDATE CASCADE
);


----ALTER TABLE lab13users AUTO_INCREMENT=1001; 