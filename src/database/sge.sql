CREATE database sge;

connect sge;

CREATE TABLE morador (
	
	id INT NOT NULL AUTO_INCREMENT,	
	nome VARCHAR(50) NOT NULL,
	telefone VARCHAR(20),
	endereco VARCHAR(100),
	PRIMARY KEY (id)	
);

CREATE TABLE encomenda (
	
	id INT NOT NULL AUTO_INCREMENT,
	morador_id INT NOT NULL, 
	num_pedido INT NOT NULL,
	cod_rastreamento INT NOT NULL, 
	data_entrega TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY (morador_id) REFERENCES morador (id)
);
	
CREATE TABLE recebedor (
	
	id INT NOT NULL AUTO_INCREMENT,
	encomenda_id INT NOT NULL,
	nome VARCHAR(50) NOT NULL,
	telefone VARCHAR(20),
	PRIMARY KEY (id),
	FOREIGN KEY (encomenda_id) REFERENCES encomenda (id)
);
