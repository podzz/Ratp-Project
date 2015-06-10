create database ratp

use ratp

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
token VARCHAR(50) NOT NULL
)

CREATE TABLE offers (
id INT(6) UNSIGNED auto_increment PRIMARY KEY,
name VARCHAR(30) NOT NULL,
max_queries INT(6) UNSIGNED NOT NULL
)

CREATE TABLE comsumption (
user INT(6) UNSIGNED NOT NULL,
offer INT(6) UNSIGNED NOT NULL,
datetimestamp datetime NOT NULL,
FOREIGN KEY (user) REFERENCES users(id),
FOREIGN KEY (offer) REFERENCES offers(id)
)
