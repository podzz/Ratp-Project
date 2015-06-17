<?php

use Phalcon\Crypt;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $stations = DatabaseService::linesstations($this->modelsManager->createBuilder());

        $stationsViewModel = array();
        foreach ($stations as $station)
        {
            $lines = explode(',', $station->lines_num);
            sort($lines);
            array_push($stationsViewModel, new StationsViewModel($station->station_name, $lines));
        }
        $this->view->stations = $stationsViewModel;


        if ($this->session->has("email")) {

            $this->view->email = $this->session->get("email");
            $this->view->admin = $this->session->get("admin");
            $user = Users::findFirstByEmail($this->session->get("email"));

            if ($this->session->get("admin"))
            {
                // Admin mode
                $usersQueries = $this->modelsManager->createBuilder()
                    ->from('Users')
                    ->join('Offers', 'Users.offer = o.id', 'o')
                    ->columns('Users.id as userId, Users.email as UserEmail, o.max_queries as maxusage')
                    ->getQuery()->execute();
                $usersData = [];

                $date =  (new DateTime())->format('Y-m-d');
                foreach($usersQueries as $query)
                {
                    $userVM = new UserConsoViewModel();
                    $userVM->mail = $query->UserEmail;
                    $userConso = Comsumption::query()
                        ->where("user = :userId: AND datestamp = :datestamp:")
                        ->bind(array("userId" => $query->userId, "datestamp" => $date))
                        ->columns('conso')
                    ->execute();
                    if ($userConso == null || count($userConso) == 0)
                        $userVM->conso = 0;
                    else
                        $userVM->conso = $userConso[0]->conso;
                    $userVM->maxconso = $query->maxusage;
                    array_push($usersData, $userVM);
                }
                $this->view->users = $usersData;
            }
            else
            {
                $conso = $this->modelsManager->createBuilder()
                    ->from('Comsumption')
                    ->join('Users', 'u.id = Comsumption.user', 'u')
                    ->join('Offers', 'o.id = u.offer', 'o')
                    ->where('Comsumption.datestamp = DATE(NOW()) AND u.email = \'' . $this->session->get("email") . '\'')
                    ->columns('Comsumption.id as id, o.max_queries as maxqueries, u.expiration as expiration')
                    ->getQuery()->execute();

                if ($conso != null && count($conso) > 0)
                {
                    $comsum = Comsumption::findFirst($conso[0]->id);
                    $actualConso = $comsum->conso;
                }
                else
                {
                    $actualConso = 0;
                }

                $this->view->token = $user->token;
                $this->view->token_pass = $user->token_pass;
                $this->view->actualConso = $actualConso;
                $offer = Offers::findFirst($user->offer);
                $this->view->quota = $offer->max_queries;
                $this->view->expiration = $user->expiration;
            }

        }
    }
}

