create table categoria (

nu_categoria int not null auto_increment primary key,
nb_categoria varchar(60) not null unique

);

create table vehiculo (

cod_matricula int not null auto_increment primary key,
nb_vehiculo varchar(50) not null,
de_vehiculo text not null,
va_precio numeric(10) not null,
ca_existencia int not null,
nb_imagen varchar(35) not null,
nu_categoria int not null foreign key,
foreign key (nu_categoria) references categoria (nu_categoria),
unique (nb_vehiculo,nu_categoria),
check (ca_existencia >= 1)

);

create table cliente (

nu_cliente int not null auto_increment primary key,
nb_cliente varchar(50) not null,
nu_cedula int not null unique,
co_correo varchar(40) not null unique,
co_clave varchar(40) not null,

);

create table bolsa (

nu_cliente int not null,
cod_matricula int not null,
fe_registro date not null,
primary key (nu_cliente,cod_matricula),
foreign key (nu_cliente) references cliente (nu_cliente),
foreign key (cod_matricula) references vehiculo (cod_matricula)

);

create table compra(

	nu_compra int not null auto_increment primary key,
	fe_compra date not null,
	nu_cliente int not null,
	in_despacho char(1) not null,
	fe_despacho date,
	check (in_despacho in ('A','C','D')),
	foreign key (nu_cliente) references cliente (nu_cliente)

);

create table detalle_compra(

	nu_detalle int not null auto_increment primary key,
	nu_compra int not null,
	cod_matricula int not null,
	ca_producto int not null,
	fe_registro date not null,
	unique (nu_compra,nu_producto),
	foreign key (nu_compra) references compra (nu_compra),
	foreign key (cod_matricula) references vehiculo (cod_matricula)

);

