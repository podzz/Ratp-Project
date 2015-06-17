<?php
/**
 * Created by PhpStorm.
 * User: Durieux
 * Date: 14/06/15
 * Time: 18:38
 */

use OAuth2\Autoloader;

class Oauthorize {
    public $dsn      = 'mysql:dbname=ratp;host=127.0.0.1;port=3306';
    public $username = 'root';
    public $password = '';
    private $server;

    public function __construct() {
        Autoloader::register();

        $storage = new OAuth2\Storage\Pdo(array('dsn' => $this->dsn, 'username' => $this->username, 'password' => $this->password));

        $this->server = new OAuth2\Server($storage);
        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
        $this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
    }

    // Returns a new token for the user given in the request head.
    public function getNewToken($email)
    {
        $res = $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals());

        $token = $res->getParameters()["access_token"];
        $expiration = new DateTime();

        $expiration->add(new DateInterval("P1Y"));
        $user = Users::findFirstByEmail($email);
        $user->token = $token;
        $user->expiration = $expiration->format('Y-m-d');
        $user->save();

        return json_encode(array("token" => $token, "expiration" => $user->expiration));
    }

    // Insert client in oAuth DB for further authentification
    public function registerUser($username, $secret, $redirectUri) {
        $username       = $this->sanitize($username);
        $secret         = $this->sanitize($secret);
        $redirectUri    = $this->sanitize($redirectUri);

        $db = new PDO($this->dsn, $this->username, $this->password);
        $db->exec('INSERT INTO oauth_clients (client_id, client_secret, redirect_uri) VALUES ("'.$username.'", "'.$secret.'", "'.$redirectUri.'");');
    }

    public function checkToken()
    {
        return $this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals());
    }

    /**
     * Clean String variable for request String
     *
     * @return String cleaned !
     */
    public static function sanitize($string)
    {
        $string = stripslashes($string);

        $realescaped = @mysql_real_escape_string($string);
        if ($realescaped) {
            return $realescaped;
        } else {
            return str_replace(array('\\', "\0", "'", '"', "\x1a"), array('\\\\', '\\0', "\\'", '\\"', '\\Z'), $string);
        }
    }
}