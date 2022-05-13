create database locales;
use locales;

create table local (
	id int primary key AUTO_INCREMENT,
    nombre varchar(50),
    coordenadas varchar(100),
    poblacion varchar(50),
    tipo varchar(50)
);

insert into local(nombre, coordenadas, poblacion, tipo) values('Julivert Meu', '{lat:41.38429,lng:2.17024}', 'Barcelona', 'Restaurante');
insert into local(nombre, coordenadas, poblacion, tipo) values('Hotpot de Sichuan', '{lat: 41.39411, lng: 2.17520}', 'Barcelona', 'Restaurante');
insert into local(nombre, coordenadas, poblacion, tipo) values('Ovella Negra Marina', '{ lat: 41.39621, lng: 2.19031 }', 'Barcelona', 'Bar');
insert into local(nombre, coordenadas, poblacion, tipo) values('Hoppiness', '{ lat: 41.39806, lng: 2.20055 }', 'Barcelona', 'Bar');
insert into local(nombre, coordenadas, poblacion, tipo) values('Razzmatazz', '{ lat: 41.39775, lng: 2.19114 }', 'Barcelona', 'Discoteca');
insert into local(nombre, coordenadas, poblacion, tipo) values('Sala Salamandra', '{ lat: 41.36019, lng: 2.10939 }', 'Barcelona', 'Discoteca');

select * from local;
