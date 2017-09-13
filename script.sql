create database agencia;
create user agenciaAdmin with password '123';
grant all privileges on database agencia to agenciaAdmin;
create user empleado with password '456';
grant select, insert, delete, update on Paquetes, Hotels, Reservaciones to empleado;
grant select, update on Usuarios to empleado;
create table Hotels (
  Codigo serial primary key,
  Nombre Text not null
);

create table Aerolineas (
  Codigo char(3) primary key,
  Nombre Text not null,
  IP varchar(15)
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
  Username text unique,
  correo text unique,
  password text,
  active boolean
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

insert into Aerolineas values('IDC','INDRES', 'LOCALHOST');
insert into Aerolineas values('GAL','GUATE', 'LOCALHOST');
insert into Aerolineas values('LMA','LAMDA', 'LOCALHOST');
