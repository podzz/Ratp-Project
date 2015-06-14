<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $stations = DatabaseService::linesstations($this->modelsManager->createBuilder());

        $stationsViewModel = array();
        foreach ($stations as $station)
            array_push($stationsViewModel, new StationsViewModel($station->station_name, explode(',', $station->lines_num)));

        $this->view->stations = $stationsViewModel;
    }


}

