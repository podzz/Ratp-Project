<?php
/**
 * Created by PhpStorm.
 * User: Durieux
 * Date: 14/06/15
 * Time: 18:38
 */

$dsn      = 'mysql:dbname=ratp;host=localhost';
$username = 'root';
$password = '';

// TODO remove for production
ini_set('display_errors',1);error_reporting(E_ALL);

require_once('../oauth2-server-php/src/OAuth2/Autoloader.php');
OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));

$server = new OAuth2\Server($storage);
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));