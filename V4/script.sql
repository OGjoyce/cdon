create user agenciaAdmin with password '123';
create database agencia;
grant all privileges on database agencia to agenciaAdmin;
create table Hotels (
  Codigo serial primary key,
  Nombre Text not null
);

create table Aerolineas (
  Codigo char(3) primary key,
  Nombre Text not null,
  IP text,
  extension text,
  formato text
);

create table Paquetes(
  id_paquete serial,
  nombre varchar(50),
  descripcion text,
  id_hotel integer,
  id_aerolinea char(3),
  dias int,
  precio money,
  primary key (id_paquete),
  foreign key (id_hotel) references hotels,
  foreign key (id_aerolinea) references aerolineas
);

create table Usuarios(
  id_usuario serial primary key,
  username text unique,
  correo text unique,
  password text
);

create table Reservaciones(
  --num_Reservacion serial,
  id_usuario int,
  id_paquete int,
  recibo serial unique,
  primary key (recibo),
  foreign key (id_usuario) references Usuarios,
  foreign key (id_paquete) references Paquetes
);

insert into hotels values (DEFAULT, 'NO HOTEL');

insert into usuarios values('1','agenciaadmin', 'dongju.baek@galileo.edu', '123');
