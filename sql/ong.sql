create table ong(

idONG INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(45) NOT NULL,
imagem LONGBLOB NOT NULL,
endereco VARCHAR(100) NOT NULL,
email VARCHAR(45) NOT NULL UNIQUE KEY,
data DATE NOT NULL,
sobre VARCHAR(180) NOT NULL,
telefone INT NOT NULL,
cnpj VARCHAR(45) NOT NULL UNIQUE KEY,
senha VARCHAR(45) NOT NULL

);