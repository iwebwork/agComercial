* Lógico_agComercial: */

CREATE TABLE evento (
    Campo int not null UNIQUE,
    texto varchar(50),
    data_inicio date-time not null,
    data_termino date-time,
    id_usuario int not null
);

CREATE TABLE usuarios (
    id int not null PRIMARY KEY UNIQUE,
    nome varchar(30),
    email varchar(50),
    senha varchar(32)
);
 
ALTER TABLE evento ADD CONSTRAINT id_usuario
    FOREIGN KEY (id_usuario???)
    REFERENCES usuarios (id);