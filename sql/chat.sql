create table chat(

idChat INT PRIMARY KEY AUTO_INCREMENT,
idTransmissor INT,
idReceptor INT,
constraint foreign key (idTransmissor) references doador(idDoador),
constraint foreign key (idReceptor) references doador(idDoador)

);