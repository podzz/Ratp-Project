<?php

use Phalcon\Crypt;

class UserController extends \Phalcon\Mvc\Controller
{
    public function getTokenAction()
    {
        $oa = new Oauthorize();
        echo $oa->getNewToken($_SERVER['PHP_AUTH_USER']);
    }

     public function createAction()
    {
        if ($this->request->isPost()) {

            $email = $this->request->getPost("email");
            $pass = $this->request->getPost("password");
            $offer = $this->request->getPost("offer");

            if (strlen($email) != 0 && strlen($pass) != 0)
            {
                $user = Users::findFirstByEmail($email);
                if ($user)
                {
                    $this->view->errorMsg = "Ce compte existe déjà";
                }
                else
                {
                    $user = new Users();
                    $user->email = $email;

                    $user->password = $this->security->hash($pass);
                    $user->offer = $offer;
                    $user->type = 1;
                    $user->token_pass = uniqid();

                    $oa = new Oauthorize();
                    $oa->registerUser($user->email, $user->token_pass, "");

                    $user->save();
                    $this->response->redirect();
                }
            }
            else
                $this->view->errorMsg = "Les données entrées sont invalides";
        }
    }
}
