CREATE TABLE roomlist (
id int(11) not null PRIMARY KEY AUTO_INCREMENT,
name varchar(255) not null,
description varchar(1000) not null,
location varchar(255) not null,
price numeric(9, 2) not null
);    