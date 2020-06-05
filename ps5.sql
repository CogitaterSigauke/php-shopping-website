DROP DATABASE IF EXISTS ctsps5;

CREATE DATABASE ctsps5;         

USE ctsps5;                             

CREATE TABLE Products(              
    maker VARCHAR(256) NOT NULL,
    model INTEGER NOT NULL,
    type VARCHAR(256) NOT NULL, 
    PRIMARY KEY(model)              
);                                  

CREATE TABLE PCs(
    model INTEGER NOT NULL, 
    speed DOUBLE NOT NULL, 
    ram DOUBLE NOT NULL, 
    hd INTEGER NOT NULL, 
    price DOUBLE NOT NULL,
    PRIMARY KEY(model)
);

CREATE TABLE Laptops(
    model INTEGER NOT NULL,
    speed DOUBLE NOT NULL,
    ram DOUBLE NOT NULL,
    hd INTEGER NOT NULL,
    price DOUBLE NOT NULL,
    weight DOUBLE NOT NULL,
    PRIMARY KEY(model)  
);

CREATE TABLE Printers(
    model INTEGER NOT NULL, 
    color VARCHAR(256), 
    type VARCHAR(256), 
    price DOUBLE NOT NULL,
    PRIMARY KEY(model)
);


INSERT INTO Products (maker, model, type) VALUES ("HP", 00, "PC");
INSERT INTO Products (maker, model, type) VALUES ("HP", 01, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("IBM", 02, "Printer");
INSERT INTO Products (maker, model, type) VALUES ("LENOVO", 03, "PC");
INSERT INTO Products (maker, model, type) VALUES ("LENOVO", 04, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("APPLE", 05, "Printer");
INSERT INTO Products (maker, model, type) VALUES ("HP",06, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("APPLE", 07, "PC");
INSERT INTO Products (maker, model, type) VALUES ("IBM", 08, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("LENOVO", 09, "Printer");
INSERT INTO Products (maker, model, type) VALUES ("HP", 10, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("LENOVO", 11, "PC");
INSERT INTO Products (maker, model, type) VALUES ("IBM", 12, "Laptop");
INSERT INTO Products (maker, model, type) VALUES ("LENOVO", 13, "Printer");

INSERT INTO PCs (model, speed, ram, hd, price) VALUES (00, 1.20, 8, 1000, 1200);
INSERT INTO PCs (model, speed, ram, hd, price) VALUES (03, 3.24, 16, 650, 1500);
INSERT INTO PCs (model, speed, ram, hd, price) VALUES (07, 1.33, 8, 200, 2500);
INSERT INTO PCs (model, speed, ram, hd, price) VALUES (11, 2.41, 4, 500, 3200);


INSERT INTO Printers (model, color, type, price) VALUES (02, "true", "ink-jet", 2920);
INSERT INTO Printers (model, color, type, price) VALUES (05, "false", "ink-jet", 1020);
INSERT INTO Printers (model, color, type, price) VALUES (09, "true", "laser", 2920);
INSERT INTO Printers (model, color, type, price) VALUES (13, "false", "laser", 920);

INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (01, 2.20, 8, 1000, 3920, 1.7);
INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (04, 1.20, 4, 500, 2020, 1.3);
INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (06, 3.20, 32, 1000, 3920, 2);
INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (08, 1.20, 4, 200, 920, 1.3);
INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (10, 3.20, 32, 1000, 2920, 2);
INSERT INTO Laptops (model, speed, ram, hd, price, weight) VALUES (12, 1.20, 4, 200, 920, 1.4);

CREATE USER 'grader'@'%' IDENTIFIED BY 'allowme'; 
GRANT ALL PRIVILEGES ON ctsps5.* to 'grader'@'%';
ALTER USER 'grader'@'%' IDENTIFIED WITH mysql_native_password BY "allowme";