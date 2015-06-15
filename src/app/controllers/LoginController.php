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

                // Admin
                if ($user->type == 2)
                {
                    if ($user->password == $pass)
                    {
                        $this->session->set("token", $user->token);
                        $this->session->set("email", $email);
                        $this->session->set("admin", true);

                        $this->response->redirect();
                    }
                    else
                    {
                        $this->view->errorMsg = 'Mauvais couple email / mot de passe';
                    }
                }
                else
                {
                    // Common users
                    if ($this->security->checkHash($pass, $user->password)) {
                        $this->session->set("token", $user->token);
                        $this->session->set("email", $email);
                        $this->session->set("admin", false);

                        $this->response->redirect();
                    }
                    else
                    {
                        $this->view->errorMsg = 'Mauvais couple email / mot de passe';
                    }
                }
            }
            else
            {
                $this->view->errorMsg = 'Mauvais couple email / mot de passe';
            }
        }
    }

    public function disconnectAction()
    {
        $this->session->destroy();
        $this->response->redirect();
    }

    public function oauthAction()
    {

    }

}

