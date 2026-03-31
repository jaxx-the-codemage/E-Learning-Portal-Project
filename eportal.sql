create database eportal;
use eportal;

create table admin(adminid int auto_increment primary key, username varchar(45), password varchar(45));
select * from admin;
INSERT INTO `eportal`.`admin` (`username`, `password`) VALUES ('jax', 'jaxx123');
INSERT INTO `eportal`.`admin` (`username`, `password`) VALUES ('lax', 'laxx123');

create table user(userid int auto_increment primary key, username varchar(45), password varchar(45), email varchar(45), cid int, foreign key(cid) references courses(cid) on delete cascade on update cascade);
select * from user;

create table courses(cid int auto_increment primary key, cName varchar(45), days varchar(45), sDate date, eDate date, fees double);
select * from courses;

create table materials(mid int auto_increment primary key, mName varchar(255) not null, fpath varchar(255) not null, cid int not null, foreign key(cid) references courses(cid) on delete cascade on update cascade);
select * from materials;