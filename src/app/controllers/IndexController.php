<?php

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
    }
}

