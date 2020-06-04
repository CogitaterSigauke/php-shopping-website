
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
    email VARCHAR(256) NOT NULL,
	PRIMARY KEY (sid)
);

CREATE TABLE Accounts (
	aid INTEGER NOT NULL AUTO_INCREMENT,
	balance DOUBLE NOT NULL,
	PRIMARY KEY (aid)
);

CREATE TABLE Products(
    pid INTEGER NOT NULL AUTO_INCREMENT,
    price DOUBLE NOT NULL,
    description VARCHAR(256) NOT NULL,
    image VARCHAR(256) NOT NULL,
    name VARCHAR(256) NOT NULL,
    percentageDiscount DOUBLE NOT NULL,
    numProductsForDiscount INTEGER NOT NULL,
    PRIMARY KEY (pid)
);

CREATE TABLE Shoes(
    pid INTEGER NOT NULL AUTO_INCREMENT,
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

CREATE TABLE Oder(
    oid INTEGER NOT NULL AUTO_INCREMENT,
    date VARCHAR(256) NOT NULL,
    quantity INTEGER NOT NULL,
    status VARCHAR(256) NOT NULL,
    PRIMARY KEY (oid)
);

CREATE TABLE Address(
    aid INTEGER NOT NULL AUTO_INCREMENT,
    Country VARCHAR(256) NOT NULL,
    City VARCHAR(256) NOT NULL,
    street VARCHAR(256) NOT NULL,
    PRIMARY KEY (aid)
);


CREATE TABLE Transaction(
    tid INTEGER NOT NULL AUTO_INCREMENT,
    amount DOUBLE NOT NULL,
    dateTime VARCHAR(256) NOT NULL,
    uid VARCHAR(256) NOT NULL,
    transactionType VARCHAR(256) NOT NULL,
    PRIMARY KEY (tid)
);



CREATE TABLE LivesIn(
    uid INTEGER NOT NULL ,
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


INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000001, 52003,   "This is a good product", "no image", "PC",     80, 55);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000002, 10520,   "This is a good product", "no image", "Laptop",  01, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000003, 15203,   "This is a good product", "no image", "Printer", 02, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000004, 145200,  "This is a good product", "no image", "PC",      03, 3);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000005, 1052300, "This is a good product", "no image", "Laptop",  04, 3);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000007, 72030,   "This is a good product", "no image", "Printer", 05, 7);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000008, 75200,   "This is a good product", "no image", "Laptop",  06, 7);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000009, 60500,   "This is a good product", "no image", "PC",      07, 7);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000010, 202300,  "This is a good product", "no image", "Laptop",  08, 3);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000011, 526004,  "This is a good product", "no image", "Printer", 09, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000012, 1053200, "This is a good product", "no image", "Laptop",  10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000013, 205500,  "This is a good product", "no image", "PC",      11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000014, 62053200,"This is a good product", "no image", "Laptop",  12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000015, 8045200, "This is a good product", "no image", "Printer", 13, 5);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000016, 1053200, "This is a good shoe", "no shoe image", "shoes", 10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000017, 205500,  "This is a good shoe", "no shoe image", "shoes", 11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000018, 62053200,"This is a good shoe", "no shoe image", "shoes", 12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000019, 8045200, "This is a good shoe", "no shoe image", "shoes", 13, 5);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000112, 1053200, "This is a good Accessories", "no image", "accessories",  10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000113, 205500,  "This is a good Accessories", "no image", "accessories",  11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000114, 62053200,"This is a good Accessories", "no image", "accessories",  12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000115, 8045200, "This is a good Accessories", "no image", "accessories",  13, 5);

INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000212, 1053200, "This is a good product", "no image", "clothing", 10, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000213, 205500,  "This is a good product", "no image", "clothing", 11, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000214, 62053200,"This is a good product", "no image", "clothing", 12, 5);
INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (0000000215, 8045200, "This is a good product", "no image", "clothing", 13, 5);

INSERT INTO Seller (sid, pwd, name, email) VALUES (100000001, "laruiglRBLUI", "HP",     "hp@gmail.com"    );
INSERT INTO Seller (sid, pwd, name, email) VALUES (100000002, "larfarfafabd", "IBM",    "ibm@gmail.com"   );
INSERT INTO Seller (sid, pwd, name, email) VALUES (100000003, "laruiglRfara", "LENOVO", "lenovo@gmail.com");
INSERT INTO Seller (sid, pwd, name, email) VALUES (100000004, "laruiaerbryw", "APPLE",  "apple@gmail.com" );

INSERT INTO Buyer (bid, pwd, name, uname, email) VALUES (200000001, "larRBLUI", "Tatenda",   "Tatenda7",   "tatenda@gmail.com"  );
INSERT INTO Buyer (bid, pwd, name, uname, email) VALUES (200000002, "larafabd", "Rediet",    "Rediet3",    "rediet@gmail.com"   );
INSERT INTO Buyer (bid, pwd, name, uname, email) VALUES (200000003, "larRfara", "Cogitater", "Cogitater7", "cogitater@gmail.com");
INSERT INTO Buyer (bid, pwd, name, uname, email) VALUES (200000004, "larrbryw", "Rooney",    "Rooney3",    "rooney@gmail.com"   );

INSERT INTO Accounts (aid, balance) VALUES (300000001, 20003200);
INSERT INTO Accounts (aid, balance) VALUES (300000002, 5003200 );
INSERT INTO Accounts (aid, balance) VALUES (300000003, 7003200 );
INSERT INTO Accounts (aid, balance) VALUES (300000004, 40003200);


INSERT INTO Shoes (pid, size, gender, model, brand) VALUES (0000000016, 53, "male",   "nike2", "nike"  );
INSERT INTO Shoes (pid, size, gender, model, brand) VALUES (0000000017, 55, "female", "nike3", "nike"  );
INSERT INTO Shoes (pid, size, gender, model, brand) VALUES (0000000018, 05, "female", "adidas3", "adidas");
INSERT INTO Shoes (pid, size, gender, model, brand) VALUES (0000000019, 45, "male",   "adidas3", "adidas");

INSERT INTO Accessories (pid, type, brand) VALUES (0000000112, "typeA", "nike"  );
INSERT INTO Accessories (pid, type, brand) VALUES (0000000113, "typeB", "nike"  );
INSERT INTO Accessories (pid, type, brand) VALUES (0000000114, "typeB", "adidas");
INSERT INTO Accessories (pid, type, brand) VALUES (0000000115, "typeA", "adidas");

INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (0000000212, 53, "male",   "nike"  , "typeA");
INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (0000000213, 55, "female", "nike"  , "typeB");
INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (0000000214, 05, "female", "adidas", "typeB");
INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (0000000215, 45, "male",   "adidas", "typeA");

INSERT INTO Order (oid, date, quantity, status) VALUES (0000002212, "2020-03-10T02:00:00Z", 53, "shipped"  );
INSERT INTO Order (oid, date, quantity, status) VALUES (0000002213, "2020-04-10T02:00:00Z", 55, "delivered" );
INSERT INTO Order (oid, date, quantity, status) VALUES (0000002214, "2020-02-10T02:00:00Z", 15, "delivered" );
INSERT INTO Order (oid, date, quantity, status) VALUES (0000002215, "2020-01-10T02:00:00Z", 45, "shipped"  );


INSERT INTO Address (aid, country, street) VALUES (00000202212, "South Korea",  "Incheon",    "My Street");
INSERT INTO Address (aid, country, street) VALUES (00000202213, "Zimbabwe",     "Mutare",     "My Street");
INSERT INTO Address (aid, country, street) VALUES (00000202214, "Ethiopia",     "Adis Ababa", "My Street");
INSERT INTO Address (aid, country, street) VALUES (00000202215, "South Korea",  "Seoul",      "My Street");

INSERT INTO Transaction (tid, amount, dateTime, uid, transactionType) VALUES (00200202212, 1053200,  "2020-03-10T02:00:00Z", 200000001, "deposite");
INSERT INTO Transaction (tid, amount, dateTime, uid, transactionType) VALUES (00200202213, 205500,   "2020-04-10T02:00:00Z", 200000002, "deposite");
INSERT INTO Transaction (tid, amount, dateTime, uid, transactionType) VALUES (00200202214, 62053200, "2020-02-10T02:00:00Z", 100000003, "withdraw");
INSERT INTO Transaction (tid, amount, dateTime, uid, transactionType) VALUES (00200202215, 8045200,  "2020-01-10T02:00:00Z", 200000004, "deposite");

INSERT INTO LivesIn (uid, accType, aid) VALUES (100000001, "buyer",  00000202212);
INSERT INTO LivesIn (uid, accType, aid) VALUES (100000002, "buyer",  00000202213);
INSERT INTO LivesIn (uid, accType, aid) VALUES (200000003, "seller", 00000202214);
INSERT INTO LivesIn (uid, accType, aid) VALUES (200000004, "seller", 00000202215);

INSERT INTO HasOrder (bid, oid) VALUES (100000001, 200000001);
INSERT INTO HasOrder (bid, oid) VALUES (100000002, 200000002);
INSERT INTO HasOrder (bid, oid) VALUES (100000003, 200000003);
INSERT INTO HasOrder (bid, oid) VALUES (100000004, 200000004);

INSERT INTO Comment (cid, bid, textBody, pid) VALUES (77000001, 100000001,"I love this product", 0000000007);
INSERT INTO Comment (cid, bid, textBody, pid) VALUES (77000002, 100000002,"I love this product", 0000000008);
INSERT INTO Comment (cid, bid, textBody, pid) VALUES (77000003, 100000003,"I love this product", 0000000009);
INSERT INTO Comment (cid, bid, textBody, pid) VALUES (77000004, 100000004,"I love this product", 0000000010);

INSERT INTO Post (pid, title, postDate) VALUES (2077000001, "new products",  "2010-03-10T02:00:00Z");
INSERT INTO Post (pid, title, postDate) VALUES (2077000002, "tech products", "2020-03-10T02:00:00Z");
INSERT INTO Post (pid, title, postDate) VALUES (2077000003, "tech products", "2019-12-10T02:00:00Z");
INSERT INTO Post (pid, title, postDate) VALUES (2077000004, "new products",  "2020-01-10T02:00:00Z");

INSERT INTO HasTrans (tid, aid) VALUES (00200202212, 300000001);
INSERT INTO HasTrans (tid, aid) VALUES (00200202213, 300000002);
INSERT INTO HasTrans (tid, aid) VALUES (00200202214, 300000003);
INSERT INTO HasTrans (tid, aid) VALUES (00200202215, 300000004);

INSERT INTO HasProd (pid, sid, quantity) VALUES (0000000012, 100000001, 32433);
INSERT INTO HasProd (pid, sid, quantity) VALUES (0000000013, 100000002, 52343);
INSERT INTO HasProd (pid, sid, quantity) VALUES (0000000014, 100000003, 32423);
INSERT INTO HasProd (pid, sid, quantity) VALUES (0000000015, 100000004, 72143);

INSERT INTO OrderOf (oid, pid) VALUES (0000002212, 0000000007);
INSERT INTO OrderOf (oid, pid) VALUES (0000002213, 0000000008);
INSERT INTO OrderOf (oid, pid) VALUES (0000002214, 0000000009);
INSERT INTO OrderOf (oid, pid) VALUES (0000002215, 0000000010);


INSERT INTO HasAcc (sid, aid) VALUES (100000001, 300000001);
INSERT INTO HasAcc (sid, aid) VALUES (100000002, 300000002);
INSERT INTO HasAcc (sid, aid) VALUES (100000003, 300000003);
INSERT INTO HasAcc (sid, aid) VALUES (100000004, 300000004);

INSERT INTO FromSeller (sid, aid) VALUES (0000002212, 100000001);
INSERT INTO FromSeller (sid, aid) VALUES (0000002213, 100000002);
INSERT INTO FromSeller (sid, aid) VALUES (0000002214, 100000003);
INSERT INTO FromSeller (sid, aid) VALUES (0000002215, 100000004);

CREATE USER 'grader'@'%' IDENTIFIED BY 'allowme'; 
GRANT ALL PRIVILEGES ON rcdb.* to 'grader'@'%';
ALTER USER 'grader'@'%' IDENTIFIED WITH mysql_native_password BY "allowme";