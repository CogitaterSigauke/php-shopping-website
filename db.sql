
DROP DATABASE IF EXISTS rcdb;

CREATE DATABASE rcdb;         

USE rcdb;     

CREATE TABLE Buyer (
	bid INTEGER NOT NULL,
	pwd VARCHAR(256) NOT NULL,
	name VARCHAR(256) NOT NULL,
    uname VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
	PRIMARY KEY (bid)
);

CREATE TABLE Seller (
	sid INTEGER NOT NULL,
	pwd VARCHAR(256) NOT NULL,
	name VARCHAR(256) NOT NULL,
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
    pid INTEGER NOT NULL,
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

CREATE TABLE Oder(
    oid INTEGER NOT NULL,
    date VARCHAR(256) NOT NULL,
    quantity INTEGER NOT NULL,
    status VARCHAR(256) NOT NULL,
    PRIMARY KEY (oid)
);

CREATE TABLE Address(
    aid INTEGER NOT NULL,
    Country VARCHAR(256) NOT NULL,
    City VARCHAR(256) NOT NULL,
    street VARCHAR(256) NOT NULL,
    PRIMARY KEY (aid)
);

CREATE TABLE LivesIn(
    uid INTEGER NOT NULL,
    accType VARCHAR(256) NOT NULL,
    aid INTEGER NOT NULL,
    PRIMARY KEY (uid,accType)
);

CREATE TABLE HasOrder(
    bid INTEGER NOT NULL,
    oid INTEGER NOT NULL,
    PRIMARY KEY (bid,oid)
);

CREATE TABLE Comment(
    cid INTEGER NOT NULL,
    bid INTEGER NOT NULL,
    textBody VARCHAR(256) NOT NULL,
    pid VARCHAR(256) NOT NULL,
    PRIMARY KEY (cid)
);

CREATE TABLE Post(
    pid INTEGER NOT NULL,
    title VARCHAR(256) NOT NULL,
    postDate VARCHAR(256) NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE HasTrans(
    tid INTEGER NOT NULL,
    aid INTEGER NOT NULL,
    postDate VARCHAR(256) NOT NULL,
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


CREATE TABLE Transaction(
    tid INTEGER NOT NULL,
    amount DOUBLE NOT NULL,
    dateTime VARCHAR(256) NOT NULL,
    uid VARCHAR(256) NOT NULL,
    transactionType VARCHAR(256) NOT NULL,
    PRIMARY KEY (tid)
);


-- CREATE USER 'grader'@'%' IDENTIFIED BY 'allowme'; 
-- GRANT ALL PRIVILEGES ON rcdb.* to 'grader'@'%';
-- ALTER USER 'grader'@'%' IDENTIFIED WITH mysql_native_password BY "allowme";

CREATE USER 'shopingweb'@'%' identified by 'shop4Me@'; 
grant all privileges on rcdb.* to 'shopingweb'@'%';