create database SistemaOficina;
use SistemaOficina;

create table Cliente(
	idCliente int not null auto_increment primary key,
	nome varchar(50),
	endereco varchar(50),
	tel varchar(13),
	cpf varchar(11)
);

create table Orcamento(
	idOrcamento int not null auto_increment primary key,
	nome varchar(50),
	nIdentificador int(10),
	data date,
	valor int(10),
	descricao varchar(500)
);

create table ordemServico(
	idOrdemServico int not null auto_increment primary key,
	nome varchar(50),
	nIdentificador int(10),
	dataEntrada date,
	dataSaida date,
	observacao varchar(500),
	fotoAntes varchar(200),
	fotoDepois varchar(200)
);

create table Estoque(
	idEstoque int not null auto_increment primary key,
	nome varchar(50),
	quantidade int(10)
);


