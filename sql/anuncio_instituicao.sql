create table anuncio_instituicao(

idanuncio_instituicao INT PRIMARY KEY AUTO_INCREMENT,
idONG INT NOT NULL,
nome VARCHAR(45) NOT NULL,
foto LONGBLOB NOT NULL,
carencia VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL UNIQUE KEY,
telefone INT NOT NULL,
descricao VARCHAR(100) NOT NULL,
data DATE NOT NULL,
endereco VARCHAR(45) NOT NULL,
constraint foreign key (idONG) references ong(idONG)

);