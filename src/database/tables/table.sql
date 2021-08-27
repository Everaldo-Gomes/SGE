DROP DATABASE IF EXISTS sge;
CREATE database sge;

connect sge;

CREATE TABLE morador (
	
	id INT NOT NULL AUTO_INCREMENT,	
	nome VARCHAR(50) NOT NULL,
	cpf VARCHAR(14) NOT NULL,
	telefone VARCHAR(20),
	endereco VARCHAR(100),
	recebe INT NOT NULL,
	excluido INT NOT NULL,
	PRIMARY KEY (id)	
);

CREATE TABLE encomenda (
	
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	cadastrada_morador_id INT NOT NULL,
	data_cadastro TIMESTAMP NOT NULL,
	previsao_data_entrega TIMESTAMP NULL,
	foi_entregue INT NOT NULL,
	excluido INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (cadastrada_morador_id) REFERENCES morador (id)
);

CREATE TABLE historico_entrega (
	
	id INT NOT NULL AUTO_INCREMENT,	
	morador_entraga_id INT NOT NULL,
	morador_recebe_id INT NOT NULL,	
	encomenda_id INT NOT NULL,
	data_entraga TIMESTAMP NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (morador_entraga_id) REFERENCES morador (id),
	FOREIGN KEY (morador_recebe_id) REFERENCES morador (id),
	FOREIGN KEY (encomenda_id) REFERENCES encomenda (id)
);
