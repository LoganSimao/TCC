# TCC
projeto de Site e-comerce 

## tabela do bd

CREATE table cadastro_cliente (id INT NOT NULL AUTO_INCREMENT, nome VARCHAR(100), CPF VARCHAR(14), email VARCHAR(100), senha VARCHAR(255), cep VARCHAR(9), endereco VARCHAR(100), bairro VARCHAR(100),cidade TEXT(100), estado TEXT(2),complemento VARCHAR(100),numero VARCHAR(10), telefone VARCHAR(20), PRIMARY KEY (id));


##mudar o id do pet pra token

CREATE table pets(id int NOT NULL AUTO_INCREMENT, id_cliente int, nome VARCHAR(20), raca VARCHAR(20), sexo VARCHAR(8), idade int, porte VARCHAR(10), cor VARCHAR(25), PRIMARY KEY(id), FOREIGN KEY(id_cliente) references cadastro_cliente(id);
