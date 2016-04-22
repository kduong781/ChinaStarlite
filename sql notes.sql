
CREATE TABLE users( `id` INT NOT NULL AUTO_INCREMENT , 
					`fname` VARCHAR(100) NOT NULL , 
					`lname` VARCHAR(100) NOT NULL , 
					`dob` DATE , 
					`username` VARCHAR(100) NOT NULL , 
					`password` VARCHAR(100) NOT NULL , 
					`email` VARCHAR(100) NOT NULL , 
					PRIMARY KEY (`id`)) ENGINE = InnoDB;


INSERT INTO users(`id`, `fname`, `lname`, `dob`, `username`, `password`, `email`) VALUES (NULL, 'admin', 'user', '2016-04-16', 'admin', 'password', 'admin@adminuser.com');
