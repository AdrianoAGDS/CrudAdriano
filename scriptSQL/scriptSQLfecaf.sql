/***************************************************************
*	Database: Teste
*	Objetivo: Utilizar esse datababase para as aulas de PHP
*	Data: 20/10/2021
*	Autor: Prof. Marcel
*****************************************************************/

#Apaga o database caso já exista
drop database if exists Teste;

#Cria um database no banco de dados
create database Teste;

#Ativa a utilização do database
use Teste;

#Cria a tabela de usuário no database
create table tblusuario (
	idusuario int not null auto_increment primary key,
    nome varchar (80) not null,
    nickname varchar (50) not null,
    login varchar (30) not null,
    senha varchar (50) not null,
    email varchar (50) not null,
	dataCadastro date not null
);

#Insere o primeiro usuário padrão (root) na tabela
insert into tblusuario (nome, nickname, login, senha, email, dataCadastro)
	values ('Administrador', 'admin', 'root', 'root@root', 'root@gmail.com', '2021-10-20');
    
    select * from tblusuario;

    /*Permite ajustar o bug quando o BD rejeita a conexão externa para o root
	site com a descrição do ERRO :https://stackoverflow.com/questions/52364415/php-with-mysql-8-0-error-the-server-requested-authentication-method-unknown-to
*/
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
BY 'senha Do Root';