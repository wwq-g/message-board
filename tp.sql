
drop database if exists think5;
create database think5  default character set utf8;
use think5;
CREATE TABLE user (
user_id int(11) not null primary key AUTO_INCREMENT,
username VARCHAR(20) not null ,
password VARCHAR(20) not null
) ;

INSERT INTO user VALUES (1,'tp','111');



CREATE TABLE message (
id int(11) not null primary key AUTO_INCREMENT,
message_title VARCHAR(50) not null ,
message_content tinytext not null ,
lastdate timestamp not null
) ;
insert into message values(1,"赵帅","加油","2017-04-27");


