# Reste Assis T'es Posé
Service Web proposant les horaires des stations de métro de manière simple et intuitive.

Demo : http://rapt.ml:6969

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
>        'password'    => '',
>        'dbname'      => 'ratp',

Executez les scripts suivants :
> - mysql -u root -p < script/db.sql
> - mysql -u root -p < script/data.sql

Exemple d'utilisation de l'API :
![Capture d’écran 2015-06-17 à 23.21.57.png](https://bitbucket.org/repo/KAGAdq/images/4279627785-Capture%20d%E2%80%99%C3%A9cran%202015-06-17%20%C3%A0%2023.21.57.png)

access_token : Votre token utilisateur
linesNumber : Les lignes de métro auxquelles vous voulez accéder
station_name : Nom de la station à laquelle vous voulez accéder


Exemple de retour de l'API pour la ligne 3 à la station "Opéra"

```
#!json
{
    "serviceStatus": "up",
    "stationName": "Opéra",
    "requestLines": [
        3
    ],
    "lines": {
        "3": [
            {
                "a_way": {
                    "next": [
                        {
                            "terminus": "Pont de Levallois Bécon",
                            "delay": "Train a quai"
                        },
                        {
                            "terminus": "Pont de Levallois Bécon",
                            "delay": "7 mn"
                        },
                        {
                            "terminus": "Pont de Levallois Bécon",
                            "delay": "14 mn"
                        },
                        {
                            "terminus": "Pont de Levallois Bécon",
                            "delay": "22 mn"
                        }
                    ]
                },
                "r_way": {
                    "next": [
                        {
                            "terminus": "Gallieni",
                            "delay": "3 mn"
                        },
                        {
                            "terminus": "Gallieni",
                            "delay": "11 mn"
                        },
                        {
                            "terminus": "Gallieni",
                            "delay": "19 mn"
                        },
                        {
                            "terminus": "Gallieni",
                            "delay": "27 mn"
                        }
                    ]
                }
            }
        ]
    }
}


```