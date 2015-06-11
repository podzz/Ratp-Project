<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->users = Users::find();
    }

    public function showAction($userId)
    {
        $this->view->user = Users::findFirst($userId);
    }

    public function tokenizeAction($userId)
    {
        $user = Users::findFirst($userId);
        $user->token = rand(100000,9999999);
        $user->save();

        return $this->dispatcher->forward(array(
                'action' => 'show',
                'params' => array (
                    $userId
                )
            )
        );
    }

}

