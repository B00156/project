CREATE DATABASE books;
use books;
CREATE TABLE user (
                      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      firstname VARCHAR(30) NOT NULL,
                      lastname VARCHAR(30) NOT NULL,
                      email VARCHAR(50) NOT NULL,
                      age INT(3),
                      password VARCHAR(50) NOT NULL,
                      date TIMESTAMP
);

CREATE TABLE products (
                      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      bookname VARCHAR(30) NOT NULL,
                      author VARCHAR(30) NOT NULL,
                      genre VARCHAR(50) NOT NULL,
                      price INT(3)

);