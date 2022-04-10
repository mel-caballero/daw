/*
Crear una base de datos en MySQL con las siguientes tablas:
	USUARIO
		dni varchar(9), llave primaria
		apellido varchar(50),
		tipo_usuario tinyint (0 para administradores, 1 para usuarios normales)
	ASIGNATURA
		identificador int, llave primaria
		nombre varchar(30)
	NOTA
		alumno varchar(9), llave primaria, llave secundaria de USUARIO
		asignatura int, llave primaria, llave secundaria de ASIGNATURA
		nota int
*/

create database escuela;
use escuela;

create table usuario (
	dni varchar(9) primary key,
    apellido varchar(50),
    tipo_usuario tinyint(1)
);

create table asignatura (
	identificador int primary key,
    nombre varchar(30)
);

create table nota (
	alumno varchar (9),
	foreign key (alumno) references usuario (dni),
	asignatura int,
	foreign key (asignatura) references asignatura (identificador),
	primary key (alumno, asignatura),
	nota int
);

insert into usuario(dni, apellido, tipo_usuario) values('12345678A', 'Caballero', 0);