create table mensagem(

idMensagem INT PRIMARY KEY AUTO_INCREMENT,
idDoador INT,
data DATE NOT NULL,
texto VARCHAR(250) NOT NULL
constraint foreign key (idDoador) references doador(idDoador)

);