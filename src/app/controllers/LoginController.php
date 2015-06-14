<?php

use Phalcon\Http\Request;
use Phalcon\Http\Response;

class LoginController extends ControllerBase
{

    public function indexAction()
    {
        if ($this->request->isPost()) {

            $email = $this->request->getPost("email");
            $pass = $this->request->getPost("password");

            $user = Users::findFirstByEmail($email);
            if ($user) {
                if ($this->security->checkHash($pass, $user->password)) {
                    // Connected
                }
            }

            // Or nah
        }
    }

    public function oauthAction()
    {

    }

}

