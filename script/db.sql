DROP DATABASE IF EXISTS ratp;
CREATE DATABASE ratp;

USE ratp;

CREATE TABLE offers (
id INT(6) UNSIGNED auto_increment PRIMARY KEY,
name VARCHAR(30) NOT NULL,
max_queries INT(6) UNSIGNED NOT NULL
);

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(256) NOT NULL,
token VARCHAR(256) NOT NULL,
offer INT(6) UNSIGNED NOT NULL,
type INT UNSIGNED NOT NULL,
FOREIGN KEY(offer) REFERENCES offers(id)
);

ALTER TABLE `users` ADD `expiration` DATETIME NOT NULL AFTER `id`;

CREATE TABLE line (
id_line INT(6) UNSIGNED PRIMARY KEY,
line_number VARCHAR(4) NOT NULL,
line_name VARCHAR(100) NOT NULL
);

CREATE TABLE station (
id_station INT(6) UNSIGNED PRIMARY KEY,
station_name VARCHAR(100) NOT NULL
);

CREATE TABLE line_station(
id_line INT(6) UNSIGNED NOT NULL,
id_station INT(6) UNSIGNED NOT NULL,
FOREIGN KEY(id_line) REFERENCES line(id_line),
FOREIGN KEY(id_station) REFERENCES station(id_station)
);

CREATE TABLE comsumption (
user INT(6) UNSIGNED NOT NULL,
line INT(6) UNSIGNED NOT NULL,
station INT(6) UNSIGNED NOT NULL,
datetimestamp datetime NOT NULL,
FOREIGN KEY (user) REFERENCES users(id),
FOREIGN KEY (line) REFERENCES line(id_line),
FOREIGN KEY (station) REFERENCES station(id_station)
);

CREATE TABLE oauth_clients (client_id VARCHAR(80) NOT NULL, client_secret VARCHAR(80) NOT NULL, redirect_uri VARCHAR(2000) NOT NULL, grant_types VARCHAR(80), scope VARCHAR(100), user_id VARCHAR(80), CONSTRAINT clients_client_id_pk PRIMARY KEY (client_id));
CREATE TABLE oauth_access_tokens (access_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT access_token_pk PRIMARY KEY (access_token));
CREATE TABLE oauth_authorization_codes (authorization_code VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), redirect_uri VARCHAR(2000), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code));
CREATE TABLE oauth_refresh_tokens (refresh_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token));
CREATE TABLE oauth_users (username VARCHAR(255) NOT NULL, password VARCHAR(2000), first_name VARCHAR(255), last_name VARCHAR(255), CONSTRAINT username_pk PRIMARY KEY (username));
CREATE TABLE oauth_scopes (scope TEXT, is_default BOOLEAN);
CREATE TABLE oauth_jwt (client_id VARCHAR(80) NOT NULL, subject VARCHAR(80), public_key VARCHAR(2000), CONSTRAINT jwt_client_id_pk PRIMARY KEY (client_id));

ALTER SCHEMA `ratp`  DEFAULT COLLATE utf8_general_ci ;
