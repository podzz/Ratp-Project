<?php

require_once("oauth.php");

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        // Dashboard
    }

    public function logAction()
    {
        $oa = new Oauth();
        $oa->init();
        $oa->insertUser("testclient", "testpass", "http://fake/");
    }

    public function createAction()
    {
        if ($this->request->isPost()) {

            $email = $this->request->getPost("email");
            $pass = $this->request->getPost("password");
            $offer = $this->request->getPost("offer");
            $pass_verif = $this->request->getPost("password_verif");

            if ($pass == $pass_verif) {
                $user = Users::findFirstByEmail($email);
                if ($user) {
                    $this->view->errorMsg = "Ce compte existe déjà";
                } else {
                    $user = new Users();
                    $user->email = $email;
                    $user->password = $pass;
                    $user->token = com_create_guid();
                    $user->save();
                }
            }
            else
            {
                $this->view->errorMsg = "Les mots de passe diffèrent";
            }
        }
    }
}
