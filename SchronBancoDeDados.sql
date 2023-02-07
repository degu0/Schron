create database Schron;
use Schron;

create table Usuario (
	id int auto_increment,
    login varchar(50) not null,
    senha varchar(200) not null,
    NomeInstituicao varchar(50) not null,
    
    primary key(id)
);


create table Dia (
	id int auto_increment,
    Dias enum('Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta'),
    
    primary key(id)
);


create table Ensino (
	id int auto_increment,
    Ensino varchar(50) not null, 
    Aula int not null,
    
    primary key(id)
);

create table Tabela (
	id int auto_increment,
    Curso varchar(50) not null,
    Serie varchar(20) not null,
    FK_id_Ensino int,
    turma char(1) not null,
    
    primary key(id)
);

create table Professor (
	id int auto_increment,
    Nome varchar(50) not null,
    Cor char(50) not null,
    Carga int not null,
    
    primary key(id)
);

create table disciplina_turma_Professor(
	id int auto_increment,
	Nome varchar(255) not null,
	FK_id_Turma int,
	FK_id_Professor int,

	primary key (id),
	foreign key (FK_id_Turma) references Turma(id) ON DELETE CASCADE,
	foreign key (FK_id_Professor) references Professor(id) ON DELETE CASCADE
);

create table Professor_dias (
	FK_id_Professor int,
    FK_id_Dias int,
    
    primary key (FK_id_Professor,FK_id_Dias),
	foreign key (FK_id_Professor) references Professor(id) ON DELETE CASCADE,
	foreign key (FK_id_Dias) references Dia(id)
);

create table Horario (
	id int auto_increment,
    horario_inicio time, 
    horario_fim time,
    Dias enum('Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'),
    FK_id_Disciplina int,
    
    primary key (id),
	foreign key (FK_id_Disciplina) references disciplina_turma_professor(id) ON DELETE CASCADE
);



