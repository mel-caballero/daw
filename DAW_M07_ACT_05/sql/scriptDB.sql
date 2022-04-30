create database productos;
use productos;

create table categoria (
	id int primary key,
    nombre varchar(50)
);

create table producto (
	id int primary key,
    nombre varchar(50),
    categoria int,
	foreign key (categoria) references categoria (id)
);

insert into categoria(id, nombre) values(1, 'Comida');
insert into categoria(id, nombre) values(2, 'Tecnología');
insert into categoria(id, nombre) values(3, 'Higiene');
insert into categoria(id, nombre) values(4, 'Mascotas');

insert into producto(id, nombre, categoria) values(1, 'Patata', 1);
insert into producto(id, nombre, categoria) values(2, 'Tomate', 1);
insert into producto(id, nombre, categoria) values(3, 'Apio', 1);
insert into producto(id, nombre, categoria) values(4, 'Lechuga', 1);
insert into producto(id, nombre, categoria) values(5, 'Pasta', 1);
insert into producto(id, nombre, categoria) values(6, 'Teclado', 2);
insert into producto(id, nombre, categoria) values(7, 'Ratón', 2);
insert into producto(id, nombre, categoria) values(8, 'Pantalla', 2);
insert into producto(id, nombre, categoria) values(9, 'Portatil', 2);
insert into producto(id, nombre, categoria) values(10, 'Torre', 2);
insert into producto(id, nombre, categoria) values(11, 'Pasta de dientes', 3);
insert into producto(id, nombre, categoria) values(12, 'Cepillos', 3);
insert into producto(id, nombre, categoria) values(13, 'Gel', 3);
insert into producto(id, nombre, categoria) values(14, 'Champú', 3);
insert into producto(id, nombre, categoria) values(15, 'Esponja', 3);
insert into producto(id, nombre, categoria) values(16, 'Arena', 4);
insert into producto(id, nombre, categoria) values(17, 'Comida', 4);
insert into producto(id, nombre, categoria) values(18, 'Juegos', 4);
insert into producto(id, nombre, categoria) values(19, 'Rascador', 4);
insert into producto(id, nombre, categoria) values(20, 'Regalos', 4);

select * from categoria;
select * from producto;
