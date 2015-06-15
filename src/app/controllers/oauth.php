<?php
/**
 * Created by PhpStorm.
 * User: Durieux
 * Date: 14/06/15
 * Time: 18:38
 */

// require_once($_SERVER['DOCUMENT_ROOT'].'/oauth2-server-php/src/OAuth2/Autoloader.php');

class Oauth {
    public $dsn      = 'mysql:dbname=ratp;host=localhost';
    public $username = 'root';
    public $password = '';
    private $server;

    public function init() {
        // TODO remove for production
        ini_set('display_errors',1);error_reporting(E_ALL);
        OAuth2\Autoloader::register();

        $storage = new OAuth2\Storage\Pdo(array('dsn' => $this->dsn, 'username' => $this->username, 'password' => $this->password));

        $this->server = new OAuth2\Server($storage);
        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
        $this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
    }

    public function getNewToken($username, $secret, $redirectUri)
    {
        $this->init();
        $username       = $this->sanitize($username);
        $secret         = $this->sanitize($secret);
        $redirectUri    = $this->sanitize($redirectUri);

        $db = new PDO($this->dsn, $this->username, $this->password);
        $db->exec('INSERT INTO oauth_clients (client_id, client_secret, redirect_uri) VALUES ("'.$username.'", "'.$secret.'", "'.$redirectUri.'");');
        $res = $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals());
        return $res->getParameters()["access_token"];
    }

    public function checkToken()
    {
        $this->init();
        return $this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals());
    }

    public function saveToken($token) {
        $nowDate = new DateTime();

        $nowDate->add(new DateInterval("PT60M"));

        $this->session->set("token", $token);
        $this->session->set("token_exp", $nowDate->format("Y/m/d m:i:s"));
    }

    public function checkTokenExpiration() {
        if ($this->session->has("token_exp")) {
            $expDate = $this->session->get("token_exp");
            return isExpired($expDate);
        }
        return true;
    }

    function isExpired(DateTime $date)
    {
        $now = new DateTime();
        return $now > $date;
    }

    public function getToken() {
        //Check if the variable is defined
        if ($this->session->has("token")) {
            return $this->session->get("token");
        }
        return false;
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