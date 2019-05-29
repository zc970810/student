-- 建库
create database student;

-- user表

create table user(
	id int unsigned primary key auto_increment,
	name varchar(30) not null,
	`number` int unique key,
	email varchar(100),
	`money` decimal(8,2),
	face varchar(200) default "dirname(__FILE__).'upload/12.jpg'",
	info text
)engine=innodb charset=utf8;