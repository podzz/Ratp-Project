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
            $this->view->token = "SUPERTOKEN-MODAFUCKA";//$this->session->get("token");
            $this->view->admin = $this->session->get("admin");
            $user = Users::findFirstByEmail($this->session->get("email"));

            if ($this->session->get("admin"))
            {
                // Admin mode
                $usersQueries = $this->modelsManager->createBuilder()
                    ->from('Users')
                    ->join('Comsumption', 'c.user = Users.id', 'c')
                    ->join('Offers', 'Users.offer = o.id', 'o')
                    ->columns('Users.email as mail, c.conso as conso, o.max_queries as maxusage')
                    ->where('c.datestamp = DATE(NOW())')
                    ->getQuery()->execute();
                $usersData = [];

                foreach($usersQueries as $query)
                {
                    $userVM = new UserConsoViewModel();
                    $userVM->mail = $query->mail;
                    $userVM->conso = $query->conso;
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
                    ->columns('Comsumption.id as id, o.max_queries as maxqueries')
                    ->getQuery()->execute();

                if ($conso != null && count($conso) > 0)
                    $actualConso = Comsumption::findFirst($conso[0]->id)->conso;
                else
                    $actualConso = 0;
                $this->view->actualConso = $actualConso;
                $offer = Offers::findFirst($user->offer);
                $this->view->quota = $offer->max_queries;
            }

        }
    }
}

