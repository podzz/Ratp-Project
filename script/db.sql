DROP DATABASE IF EXISTS ratp;
CREATE DATABASE ratp;

USE ratp;

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
token VARCHAR(50) NOT NULL
);

CREATE TABLE offers (
id INT(6) UNSIGNED auto_increment PRIMARY KEY,
name VARCHAR(30) NOT NULL,
max_queries INT(6) UNSIGNED NOT NULL
);

CREATE TABLE comsumption (
user INT(6) UNSIGNED NOT NULL,
offer INT(6) UNSIGNED NOT NULL,
datetimestamp datetime NOT NULL,
FOREIGN KEY (user) REFERENCES users(id),
FOREIGN KEY (offer) REFERENCES offers(id)
);

CREATE TABLE line (
id_line INT(6) UNSIGNED PRIMARY KEY,
line_number VARCHAR(3) NOT NULL,
line_name VARCHAR(50) NOT NULL
);

CREATE TABLE station (
id_station INT(6) UNSIGNED PRIMARY KEY,
station_name VARCHAR(50) NOT NULL
);

CREATE TABLE line_station(
id_line INT(6) UNSIGNED NOT NULL,
id_station INT(6) UNSIGNED NOT NULL,
FOREIGN KEY(id_line) REFERENCES line(id_line),
FOREIGN KEY(id_station) REFERENCES station(id_station)
);
