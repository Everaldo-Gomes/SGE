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

CREATE TABLE area_do_site(
	
	id 					INT				NOT NULL AUTO_INCREMENT,
	nome_pagina			VARCHAR(255)	NOT NULL,
	ativa				INT				NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE autorizacao_usuario(
	morador_id			INT		NOT NULL,
	area_do_site_id		INT		NOT NULL,
	FOREIGN KEY (morador_id) 		REFERENCES morador (id),
	FOREIGN KEY (area_do_site_id) 	REFERENCES area_do_site (id)
);


INSERT INTO morador (id, nome, cpf, telefone, endereco, recebe, excluido, senha) VALUES (1, '1 recebedor', 1, 1, 1, 1, 0, 1);
INSERT INTO morador (id, nome, cpf, telefone, endereco, recebe, excluido, senha) VALUES (2, '2 recebedor', 2, 2, 2, 1, 0, 2);
INSERT INTO morador (id, nome, cpf, telefone, endereco, recebe, excluido, senha) VALUES (3, '3 morador', 3, 3, 3, 0, 0, 3);
INSERT INTO morador (id, nome, cpf, telefone, endereco, recebe, excluido, senha) VALUES (4, '4 morador', 4, 4, 4, 0, 0, 4);




INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (1, 'encomenda somente cadastrada 1', 3, 3, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (11, 'encomenda somente cadastrada 3', 1, 1, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (2, 'encomenda somente cadastrada 2', 4, 4, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (12, 'encomenda somente cadastrada 4', 2, 2, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (3, 'encomenda entregador pegou 1', 4, 1, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (4, 'encomenda entregador pegou 2', 3, 2, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (5, 'encomenda excluida 1', 3, 2, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (6, 'encomenda excluida 2', 4, 1, current_timestamp(), '2021-11-30 20:46:16', 0, 0, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (7, 'encomenda entregue 1', 4, 1, current_timestamp(), '2021-11-30 20:46:16', 0, 1, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (8, 'encomenda entregue 1', 3, 2, current_timestamp(), '2021-11-30 20:46:16', 0, 1, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (9, 'entregue recebedorTorecebedor 1', 1, 2, current_timestamp(), '2021-11-30 20:46:16', 0, 1, 0);
INSERT INTO encomenda (id, nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido) VALUES (10, 'entregue recebedorTorecebedor 2', 2, 1, current_timestamp(), '2021-11-30 20:46:16', 0, 1, 0);


INSERT INTO valor_entrega (id, valor_base_por_entrega) VALUES (1, 1.00);
