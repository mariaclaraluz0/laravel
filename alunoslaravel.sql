create database alunosLaravel;
use alunosLaravel;

CREATE TABLE alunos(
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(100),
     email VARCHAR(100),
     created_at timestamp null,
     updated_at timestamp null
);

CREATE TABLE turmas(
id INT auto_increment primary key,
numSala int(100),
serie varchar(100),
created_at timestamp null,
updated_at timestamp null
);

