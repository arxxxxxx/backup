drop database if exists study2;
create database study2;
use study2;
create table study2_table(
user_id int,
user_name varchar(255),
password varchar(255)
);

insert into study2_table values(1,"taro","123");
insert into study2_table values(2,"jiro","456");
insert into study2_table values(3,"hanako","789");