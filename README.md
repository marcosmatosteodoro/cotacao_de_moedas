
Necessário ter um bd em MySQL com login "root" e senha ""

Execute no SQL

CREATE DATABASE IF NOT EXISTS logs_user;
use logs_user;
CREATE TABLE IF NOT EXISTS usuario(
	id int(5) unsigned not null auto_increment,
    login varchar(100) not null,
    senha varchar (100) not null,
    PRIMARY KEY (id)
)