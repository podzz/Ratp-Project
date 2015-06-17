# Reste Assis T'es Posé
Service Web proposant les horaires des stations de métro de manière simple et intuitive.

Réalisé par : 
> - Jimmy Lanclume
> - François Boiteux
> - Edouard Durieux

Installation
============

Ce projet fonctionne grâce à plusieurs outils :
- PHP <= 5.6.7
- Phalcon PHP (Last Release)
- MySQL (Last Release)
- bshaffer/oauth2-server-php
- Nginx
- Ubuntu Server 15.04

Configuration de la base de données :

La base de données doit être paramétrée comme ceci :
>        'host'        => '127.0.0.1',
>        'port'        => '3306',
>        'username'    => 'root',
>        'password'    => ' ',
>        'dbname'      => 'ratp',

Executez les scripts suivants :
> - mysql -u root -p < script/db.sql
> - mysql -u root -p < script/data.sql