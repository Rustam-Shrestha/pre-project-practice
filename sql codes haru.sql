/* table genrerate vaisako aba matra join garera data line paloo ako xa we will do later  */

//users table

//pkehi mistake nashos vanera maile ni id lai varchar rakhey ra tesle rakhya naam rakhdeko xa

Create table users (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    user_type VARCHAR(50)
);

//product ko table
Create table product (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    price INT,
    image VARCHAR(255),
    product_detail TEXT
);

//cart sanga product ra user relatd hunxa so selena le tyai gareko ho vanne mah sure xu
//tesko code ma afno sql walaa experiece le herda tstai lagxa ra i am sure tetti hola code
Create table cart (
    id VARCHAR(255) PRIMARY KEY,
    user_id VARCHAR(255),
    product_id VARCHAR(255),
    price INT,
    qty INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

//table orders vanne user ra product ma varr parne ho
Create TABLE orders (
    id VARCHAR(255) PRIMARY KEY,
    user_id VARCHAR(255),
    name VARCHAR(255),
    number VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    address_type VARCHAR(255),
    method VARCHAR(255),
    product_id VARCHAR(255),
    price INT,
    qty INT,
    date DATE,
    status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);
//wishlist le pani user ra product ko reference linxa im sure and tesle id rakheko bata thaha paye
Create table wishlist (
    id VARCHAR(255) PRIMARY KEY,
    user_id VARCHAR(255),
    product_id VARCHAR(255),
    price INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

