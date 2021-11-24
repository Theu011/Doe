create table mensagem(

idMensagem INT PRIMARY KEY AUTO_INCREMENT,
idChat INT,
idDoador INT,
data DATE NOT NULL,
texto VARCHAR(250) NOT NULL,
constraint foreign key (idDoador) references doador(idDoador),
constraint foreign key (idChat) references chat(idChat)

);