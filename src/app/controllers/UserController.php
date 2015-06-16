<?php

use Phalcon\Crypt;

class UserController extends \Phalcon\Mvc\Controller
{
    public function getTokenAction()
    {
        $oa = new Oauthorize();
        //Check if the variable is defined
        if ($this->session->has("email")) {
            $oa->getNewToken($this->session->get("email"));
        }
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

                    $user->offer = $offer;
                    $user->type = 1;
                    $user->save();

                    // oAuth 2 registration
                    $oa = new Oauthorize();
                    $oa->registerUser($user->email, $user->password, "");

                    $this->response->redirect();
                }
            }
            else
                $this->view->errorMsg = "Les données entrées sont invalides";
        }
    }
}
