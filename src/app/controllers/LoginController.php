<?php

use Phalcon\Http\Request;
use Phalcon\Http\Response;

use Phalcon\Crypt;

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
                    $this->session->set("token", $user->token);
                    $this->session->set("email", $email);

                    $this->response->redirect();
                }
                else
                {
                    $this->view->errorMsg = 'Mauvais couple email / mot de passe';
                }
            }
            else
            {
                $this->view->errorMsg = 'Mauvais couple email / mot de passe';
            }
        }
    }

    public function oauthAction()
    {

    }

}

