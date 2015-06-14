<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $query = $this->modelsManager->createBuilder()
            ->from('Stations')
            ->join('LineStations', 'Stations.id_station = ls.id_station', 'ls')
            ->join('Lines', 'l.id_line = ls.id_line', 'l')
            ->columns(array('station_name', 'group_concat(line_number) as lines_num'))
            ->groupBy('Stations.id_station')
            ->orderBy('Stations.station_name');

        $stations = $query->getQuery()->execute();


        $stationsViewModel = array();
        foreach ($stations as $station)
            array_push($stationsViewModel, new StationsViewModel($station->station_name, explode(',', $station->lines_num)));

        $this->view->stations = $stationsViewModel;
    }


}

