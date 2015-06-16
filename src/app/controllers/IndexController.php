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

        if ($this->session->has("email") && $this->session->has("token")) {

            $this->view->email = $this->session->get("email");
            $this->view->token =  $this->session->get("token");
            $this->view->admin = $this->session->get("admin");
            $user = Users::findFirstByEmail($this->session->get("email"));

            if ($this->session->get("admin"))
            {
                $myDate = new \DateTime('-1 day');
                // Admin mode
                $usersQueries = $this->modelsManager->createBuilder()
                    ->from('Users')
                    ->join('Comsumption', 'c.user = Users.id', 'c')
                    ->join('Offers', 'Users.offer = o.id', 'o')
                    ->columns('Users.email as mail, count(c.datetimestamp) as usage, o.max_queries as maxusage')
                    ->where('c.datetimestamp BETWEEN \'' . $myDate->format('Y-m-d H:i:s') . '\' AND NOW()')
                    ->getQuery()->execute();
                $usersData = [];

                foreach($usersQueries as $query)
                {
                    $userVM = new UserConsoViewModel();
                    $userVM->mail = $query->mail;
                    $userVM->conso = $query->usage;
                    $userVM->maxconso = $query->maxusage;
                    array_push($usersData, $userVM);
                }
                $this->view->users = $usersData;
            }
            else
            {
                //$offerMax = Offers::findFirstById($user->offer);
                //$this->view->maxQueries = $offerMax;

                /*$userActualQueries = $this->modelsManager->createBuilder()
                                    ->from('Comsumption')
                                    ->where('Comsumption.user = ' . $user->id . ' AND (datetimestamp > NOW() - (INTERVAL 1 DAY))')
                                    ->columns('datetimestamp')
                                    ->getQuery()->execute();*/

                $actualQueries = [];

                $this->view->actualQueries = $actualQueries;
            }

        }
    }
}

