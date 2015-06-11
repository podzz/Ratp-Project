<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $stations = Stations::find();
        $stationsViewModel = array();
        foreach ($stations as $station)
        {
            $lines = LineStations::findById_station($station->id);

            $linesVm = array();
            foreach ($lines as $line)
            {
               array_push($linesVm, Lines::findById($line->id_line));
            }
            $stationVM = new StationsViewModel();
            $stationVM->name = $station->station_name;
            $stationVM->lines = [8,9,10];
            array_push($stationsViewModel, $stationVM);
        }

        $this->view->stations = $stationsViewModel;
    }

}

