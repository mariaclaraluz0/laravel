create database situaçãoAprendizagem3;
use situaçãoAprendizagem3;

create table producao(
id int auto_increment primary key,
nome varchar(100),
tipo varchar(100),
data_fabricacao date,
quantidade int,
preco varchar(200),
created_at timestamp null,
updated_at timestamp null
);

