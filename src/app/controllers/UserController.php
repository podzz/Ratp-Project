<?php

use Phalcon\Crypt;
//require_once("oauth.php");

class UserController extends \Phalcon\Mvc\Controller
{
    public function getTokenAction()
    {
        $oa = new Oauthorize();
        $oa->getNewToken("testclient", "testpass", "http://fake/");
    }
    public function testAction()
    {
        $oa = new Oauthorize();
        $oa->checkToken();
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
                if ($user) {
                    $this->view->errorMsg = "Ce compte existe déjà";
                } else {
                    $user = new Users();
                    $user->email = $email;

                    $user->password = $this->security->hash($pass);
                    $user->token = uniqid();

                    $user->offer = $offer;
                    $user->type = 1;
                    $user->save();
                    $this->response->redirect();
                }
            }
            else
                $this->view->errorMsg = "Les données entrées sont invalides";
        }
    }
}
