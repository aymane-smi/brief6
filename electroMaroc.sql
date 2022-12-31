DROP DATABASE IF EXISTS electroMaroc;

CREATE DATABASE electroMaroc;

USE electroMaroc;

CREATE TABLE costumer(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE,
    username varchar(30) NOT NULL,
    password varchar(30) NOT NULL,
    full_name varchar(50) NOT NULL,
    phone varchar(20) NOT NULL,
    address varchar(150) NOT NULL,
    city varchar(20) NOT NULL
);


CREATE TABLE admin(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE,
    username varchar(30) NOT NULL,
    password varchar(30) NOT NULL
);

CREATE TABLE category(
    id INT PRIMARY key AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    description varchar(150),
    image varchar(50) NOT NULL
);

CREATE TABLE product(
    id INT PRIMARY KEY AUTO_INCREMENT,
    reference varchar(20) NOT NULL,
    label varchar(20) NOT NULL,
    codeBar varchar(20) NOT NULL,
    image varchar(50) NOT NULL,
    purchase_price NUMERIC(4, 2) NOT NULL,
    offre_price NUMERIC(4, 2) DEFAULT 0,
    final_price NUMERIC(4, 2) NOT NULL,
    category_id INT NOT NULL,
    CONSTRAINT category_id FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE command(
    id INT PRIMARY KEY AUTO_INCREMENT,
    costumer_id INT NOT NULL,
    creationDate Date,
    sentDate Date,
    deliveryDate Date,
    CONSTRAINT FK_cmd_cosid FOREIGN KEY (costumer_id) REFERENCES costumer(id)
);

CREATE TABLE commandItems(
    command_id INT NOT NULL,
    product_id INT NOT NULL,
    qte INT,
    CONSTRAINT FK_commandItem_command FOREIGN KEY (command_id) REFERENCES command(id),
    CONSTRAINT FK_commandItem_product FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE cart(
    costumer_id INT NOT NULL,
    product_id INT NOT NULL,
    qte INT DEFAULT 1,
    CONSTRAINT FK_costumerCart FOREIGN KEY (costumer_id) REFERENCES costumer(id),
    CONSTRAINT FK_productCart FOREIGN KEY (product_id) REFERENCES product(id)
);