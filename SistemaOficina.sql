create database SistemaOficina;
use SistemaOficina;

create table Cliente(
	idCliente int not null auto_increment primary key,
	nome varchar(50) UNIQUE,
	endereco varchar(50),
	tel varchar(13),
	cpf varchar(11)
);

create table Orcamento(
	idOrcamento int not null auto_increment primary key,
	nome varchar(50),
	nIdentificador int(10) UNIQUE,
	data date,
	valor int(10),
	descricao varchar(500)
);

create table ordemServico(
	idOrdemServico int not null auto_increment primary key,
	nome varchar(50),
	nIdentificador int(10) UNIQUE,
	dataEntrada date,
	dataSaida date,
	observacao varchar(500),
	fotoAntes varchar(200),
	fotoDepois varchar(200),
	idCliente int not null,
	FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente)
);

create table Estoque(
	idEstoque int not null auto_increment primary key,
	nome varchar(500) UNIQUE,
	quantidade varchar(500)
);

create table Usuarios(
	idUsuario int not null auto_increment primary key,
	nome varchar(50),
	senha varchar(100),
	acesso bool
);

create table Caixa(
	idCaixa int not null auto_increment primary key,
	valor decimal(10,2),
	tipo ENUM('Fisico', 'Banco', 'Cartao'),
	data date,
	idUsuario int not null,
	FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario)
);

create table Agenda(
	idAgenda int not null auto_increment primary key,
	data date,
	nomeCliente varchar(50),
	idOrcamento int,
	FOREIGN KEY (idOrcamento) REFERENCES Orcamento(idOrcamento),
	idOrdemServico int,
	FOREIGN KEY (idOrdemServico) REFERENCES ordemServico(idOrdemServico),
	concluido bool
);

insert into SistemaOficina.Usuarios(nome, senha, acesso) values('Admin', '$2y$10$xAP5xM50ULz23PutlxYdbesjpRZBUhXV18drKtzVKikGIL0VxNux2', TRUE);

