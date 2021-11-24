create table anuncio_doador(

idanuncio_doador INT PRIMARY KEY AUTO_INCREMENT,
idDoador INT NOT NULL,
titulo VARCHAR(45) NOT NULL,
foto LONGBLOB NOT NULL,
tamanho VARCHAR(45),
tipo VARCHAR(45),
data DATE NOT NULL,
descricao VARCHAR(100) NOT NULL,
endereco VARCHAR(45) NOT NULL,
constraint foreign key (idDoador) references doador(idDoador)

);