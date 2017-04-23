drop database jamiehay;
create database jamiehay;

drop user 'jamiehay'@'localhost';
create user 'jamiehay'@'localhost' identified by 'Jfje39Fh39f8hF';
grant all privileges on jamiehay.* to 'jamiehay'@'localhost';

use jamiehay;

create table