DROP DATABASE IF EXISTS sge;
CREATE database sge;

connect sge;

CREATE TABLE imobiliaria (

	id 		INT 		NOT NULL AUTO_INCREMENT,	
	nome 	VARCHAR(50) NOT NULL,
	cpf 	VARCHAR(14) NOT NULL UNIQUE,
	senha 	VARCHAR(8) 	NOT NULL,
	PRIMARY KEY (id)	
);
	
CREATE TABLE morador (
	
	id 			INT 			NOT NULL AUTO_INCREMENT,	
	nome 		VARCHAR(50) 	NOT NULL,
	cpf 		VARCHAR(14)	 	NOT NULL UNIQUE,
	telefone 	VARCHAR(20)		NOT NULL,
	endereco	VARCHAR(100)	NOT NULL,
	recebe 		INT 			NOT NULL,
	excluido 	INT 			NOT NULL,
	senha 		VARCHAR(8) 		NOT NULL,
	PRIMARY KEY (id)	
);

CREATE TABLE encomenda (
	
	id 						INT 		NOT NULL AUTO_INCREMENT,
	nome 					VARCHAR(50) NOT NULL,
	cadastrada_morador_id 	INT 		NOT NULL,
	entregador_id 			INT 		NOT NULL,	
	data_cadastro 			TIMESTAMP 	NOT NULL,
	previsao_data_entrega 	TIMESTAMP 	NULL,
	foi_entregue 			INT 		NOT NULL,
	entregador_pegou 		INT 		NOT NULL,
	excluido 				INT 		NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (cadastrada_morador_id) REFERENCES morador (id),
	FOREIGN KEY (entregador_id) 		REFERENCES morador (id)	
);

CREATE TABLE historico_entrega (
	
	id 					INT 		NOT NULL AUTO_INCREMENT,	
	morador_entrega_id 	INT 		NOT NULL,
	morador_recebe_id 	INT 		NOT NULL,	
	encomenda_id 		INT 		NOT NULL UNIQUE,
	data_entrega 		TIMESTAMP 	NOT NULL,
	cod_entrega 		VARCHAR(50) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (morador_entrega_id) 	REFERENCES morador (id),
	FOREIGN KEY (morador_recebe_id) 	REFERENCES morador (id),
	FOREIGN KEY (encomenda_id) 			REFERENCES encomenda (id)
);

CREATE TABLE entrega_realizada (

	id 					INT		NOT NULL AUTO_INCREMENT,
	morador_entrega_id 	INT 	NOT NULL,
	qnt_entregas 		INT 	NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (morador_entrega_id) 	REFERENCES morador (id)
);
	
CREATE TABLE valor_entrega (

	id 						INT				NOT NULL AUTO_INCREMENT,
	valor_base_por_entrega	DECIMAL(18,2) 	NOT NULL,
	PRIMARY KEY (id)
);
