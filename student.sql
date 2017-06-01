use  mysql;
drop database IF EXISTS dbStudent;
create  database dbStudent;
use dbStudent;
create table tbStudent(name varchar(60), phone varchar(20));
insert into tbStudent(name,phone) values("Jane Doe", "555-555-5555"),("Joe Student","555-555-6666");
select * from tbStudent;
