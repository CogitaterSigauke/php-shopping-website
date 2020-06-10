
DROP DATABASE IF EXISTS rcdb;

CREATE DATABASE rcdb;         

USE rcdb;     

CREATE TABLE Buyer (
	bid INTEGER NOT NULL AUTO_INCREMENT,
	pwd VARCHAR(256) NOT NULL,
	name VARCHAR(256) NOT NULL,
    uname VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
	PRIMARY KEY (bid)
);

CREATE TABLE Seller (
	sid INTEGER NOT NULL AUTO_INCREMENT,
	pwd VARCHAR(256) NOT NULL,
	name VARCHAR(256) NOT NULL,
    uname VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
	PRIMARY KEY (sid)
);

CREATE TABLE Accounts (
	aid INTEGER NOT NULL,
	balance DOUBLE NOT NULL,
	PRIMARY KEY (aid)
);

CREATE TABLE Products(
    pid INTEGER NOT NULL,
    price DOUBLE NOT NULL,
    description VARCHAR(256) NOT NULL,
    image VARCHAR(256) NOT NULL,
    name VARCHAR(256) NOT NULL,
    percentageDiscount DOUBLE NOT NULL,
    numProductsForDiscount INTEGER NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE Shoes(
    pid INTEGER NOT NULL,
    size DOUBLE NOT NULL,
    gender VARCHAR(256) NOT NULL,
    model VARCHAR(256) NOT NULL,
    brand VARCHAR(256) NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE Accessories(
    pid INTEGER NOT NULL ,
    type VARCHAR(256) NOT NULL,
    brand VARCHAR(256) NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE Clothing(
    pid INTEGER NOT NULL,
    size DOUBLE NOT NULL,
    gender VARCHAR(256) NOT NULL,
    maker VARCHAR(256) NOT NULL,
    type VARCHAR(256) NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE OrderTable(
    oid INTEGER NOT NULL,
    price DOUBLE NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    quantity INTEGER NOT NULL,
    status VARCHAR(256) NOT NULL,
    PRIMARY KEY (oid)
);


CREATE TABLE Cart(
    cid INTEGER NOT NULL AUTO_INCREMENT,
    pid INTEGER NOT NULL,
    bid INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    PRIMARY KEY (pid, bid, quantity)
);

CREATE TABLE Address(
    aid INTEGER NOT NULL AUTO_INCREMENT,
    uid  INTEGER NOT NULL,
    accType VARCHAR(256) NOT NULL,
    country VARCHAR(256) NOT NULL,
    city VARCHAR(256) NOT NULL,
    street VARCHAR(256) NOT NULL,
    PRIMARY KEY (aid)
);


CREATE TABLE Transaction(
    tid INTEGER NOT NULL AUTO_INCREMENT,
    amount DOUBLE NOT NULL,
    dateTime DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    uid VARCHAR(256) NOT NULL,
    transactionType VARCHAR(256) NOT NULL,
    PRIMARY KEY (tid)
);

CREATE TABLE HasOrder(
    bid INTEGER NOT NULL,
    oid INTEGER NOT NULL,
    PRIMARY KEY (bid,oid)
);

CREATE TABLE Comment(
    cid INTEGER NOT NULL AUTO_INCREMENT,
    bid INTEGER NOT NULL,
    textBody VARCHAR(256) NOT NULL,
    pid VARCHAR(256) NOT NULL,
    PRIMARY KEY (cid)
);

CREATE TABLE Post(
    pid INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(256) NOT NULL,
    postDate VARCHAR(256) NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE HasTrans(
    tid INTEGER NOT NULL,
    aid INTEGER NOT NULL,
    PRIMARY KEY (tid, aid)
);

CREATE TABLE HasProd(
    pid INTEGER NOT NULL,
    sid INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    PRIMARY KEY (pid, sid)
);

CREATE TABLE OrderOf(
    oid INTEGER NOT NULL,
    pid INTEGER NOT NULL,
    PRIMARY KEY (oid, pid)
);

CREATE TABLE HasAcc(
    sid INTEGER NOT NULL,
    aid INTEGER NOT NULL,
    PRIMARY KEY (sid, aid)
);

CREATE TABLE FromSeller(
    oid INTEGER NOT NULL,
    sid INTEGER NOT NULL,
    PRIMARY KEY (oid, sid)
);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (1200001, 1053200, "This is a good shoe", "no shoe image", "shoes", 10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (1200002, 205500,  "This is a good shoe", "no shoe image", "shoes", 11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (1200003, 62053200,"This is a good shoe", "no shoe image", "shoes", 12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (1200004, 8045200, "This is a good shoe", "no shoe image", "shoes", 13, 5);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (21200001, 1053200, "This is a good Accessories", "no image", "accessories",  10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (21200002, 205500,  "This is a good Accessories", "no image", "accessories",  11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (21200003, 62053200,"This is a good Accessories", "no image", "accessories",  12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (21200004, 8045200, "This is a good Accessories", "no image", "accessories",  13, 5);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (31200001, 1053200, "This is a good product", "no image", "clothing", 10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (31200002, 205500,  "This is a good product", "no image", "clothing", 11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (31200003, 62053200,"This is a good product", "no image", "clothing", 12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (31200004, 8045200, "This is a good product", "no image", "clothing", 13, 5);

INSERT INTO Seller (pwd, name, uname, email) VALUES ("laruiglRBLUI", "HP",    "HP3",     "hp@gmail.com"    );
INSERT INTO Seller (pwd, name, uname, email) VALUES ("larfarfafabd", "IBM",   "IBM3",    "ibm@gmail.com"   );
INSERT INTO Seller (pwd, name, uname, email) VALUES ("laruiglRfara", "LENOVO","LENOVO3", "lenovo@gmail.com");
INSERT INTO Seller (pwd, name, uname, email) VALUES ("laruiaerbryw", "APPLE", "APPLE3",  "apple@gmail.com" );

INSERT INTO Buyer (pwd, name, uname, email) VALUES ("larRBLUI", "Tatenda",   "Tatenda7",   "tatenda@gmail.com"  );
INSERT INTO Buyer (pwd, name, uname, email) VALUES ("larafabd", "Rediet",    "Rediet3",    "rediet@gmail.com"   );
INSERT INTO Buyer (pwd, name, uname, email) VALUES ("larRfara", "Cogitater", "Cogitater7", "cogitater@gmail.com");
INSERT INTO Buyer (pwd, name, uname, email) VALUES ("larrbryw", "Rooney",    "Rooney3",    "rooney@gmail.com"   );

INSERT INTO Post (title, postDate) VALUES ("new products",  "2010-03-10T02:00:00Z");
INSERT INTO Post (title, postDate) VALUES ("tech products", "2020-03-10T02:00:00Z");
INSERT INTO Post (title, postDate) VALUES ("tech products", "2019-12-10T02:00:00Z");
INSERT INTO Post (title, postDate) VALUES ("new products",  "2020-01-10T02:00:00Z");


DROP USER IF EXISTS 'grader'@'%';

-- ===========MY SQL===========

CREATE USER 'grader'@'%' IDENTIFIED BY 'allowme'; 
GRANT ALL PRIVILEGES ON rcdb.* to 'grader'@'%';
ALTER USER 'grader'@'%' IDENTIFIED WITH mysql_native_password BY "allowme";

