DROP DATABASE IF EXISTS instafood;
CREATE DATABASE instafood;

DROP USER IF EXISTS 'instafood'@'localhost';
CREATE USER 'instafood'@'localhost' IDENTIFIED BY 'instafood';
GRANT ALL PRIVILEGES ON instafood.* TO 'instafood'@'localhost';

USE instafood;

CREATE TABLE usuarios (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    senha varchar(300) NOT NULL,
    adm tinyint(1) NOT NULL DEFAULT 0
);

CREATE TABLE posts (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    texto varchar(400) NOT NULL,
    img varchar(200),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE comentarios (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    id_post int NOT NULL,
    texto varchar(200) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_post) REFERENCES posts(id)
);

CREATE TABLE curtidas (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    id_post int,
    id_comentario int,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_post) REFERENCES posts(id),
    FOREIGN KEY (id_comentario) REFERENCES comentarios(id)
);