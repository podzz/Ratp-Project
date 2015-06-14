<?php
/**
 * Created by PhpStorm.
 * User: Durieux
 * Date: 14/06/15
 * Time: 18:38
 */

class Oauth {
    public $dsn      = 'mysql:dbname=ratp;host=localhost';
    public $username = 'root';
    public $password = '';

    public function init() {
        // TODO remove for production
        ini_set('display_errors',1);error_reporting(E_ALL);

        require_once('../oauth2-server-php/src/OAuth2/Autoloader.php');
        OAuth2\Autoloader::register();

        $storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));

        $server = new OAuth2\Server($storage);
        $server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
        $server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
    }

    public function insertUser($username, $secret, $redirectUri)
    {
        $db = new PDO($this->dsn, $this->username, $this->password);
        foreach($db->query('INSERT INTO oauth_clients (client_id, client_secret, redirect_uri) VALUES ("testclient", "testpass", "http://fake/")') as $row) {
            echo $row['field1'].' '.$row['field2']; //etc...
        }
    }
}