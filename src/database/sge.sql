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



INSERT INTO morador (nome, telefone, endereco) VALUES('JOAO', '3399-6578', 'RUA SETE DE SETEMBRO');
INSERT INTO morador (nome, telefone, endereco) VALUES('MARIA', '7898-4542', 'RUA DO COMERCIO');
INSERT INTO morador (nome, telefone, endereco) VALUES('CARLOS', '9534-1245', 'RUA DAS OLIVEIRAS');
INSERT INTO morador (nome, telefone, endereco) VALUES('MIGUEL', '7234-1945', 'AVENIDA SAO PEDRO');
INSERT INTO morador (nome, telefone, endereco) VALUES('ANA', '0278-6454', '');
INSERT INTO morador (nome, telefone, endereco) VALUES('CAMILA', '1034-7892', 'AVENIDA URUGUAI');
INSERT INTO morador (nome, telefone, endereco) VALUES('LUCAS', '3698-3456', 'RUA SANTO ANTONIO');
INSERT INTO morador (nome, telefone, endereco) VALUES('ABEL', '5478-0547', 'RUA DOS GIRASSOIS');
INSERT INTO morador (nome, telefone, endereco) VALUES('JULIA', '0984-6273', 'RUA 15 DE JULHO');
INSERT INTO morador (nome, telefone, endereco) VALUES('CAROL', '1847-3478', 'RUA SAO PAULO');
INSERT INTO morador (nome, telefone, endereco) VALUES('JOAQUIM', '0394-2564', 'RUA SETE DE SETEMBRO');
	
