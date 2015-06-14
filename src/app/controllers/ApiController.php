<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 11/06/15
 * Time: 19:39
 */

class ApiController extends \Phalcon\Mvc\Controller
{

    public function linesAction()
    {
        $this->response->setContentType('text/json');
        $lines = Lines::find();
        $rows = array();
        foreach ($lines as $line)
            array_push($rows, $line);
        echo json_encode($rows);
    }

    public function stationsAction()
    {
        $this->response->setContentType('text/json');
        $stations = Stations::find();
        $rows = array();
        foreach ($stations as $station)
            array_push($rows, $station);
        echo json_encode($rows);
    }

    public function linestationsAction()
    {
        $this->response->setContentType('text/json');
        $stations = LineStations::find();
        $rows = array();
        foreach ($stations as $station) {
            array_push($rows, $station);
        }
        echo json_encode($rows);
    }

    public function stationslinesAction()
    {
        $query = $this->modelsManager->createBuilder()
            ->from('Stations')
            ->join('LineStations', 'Stations.id_station = ls.id_station', 'ls')
            ->join('Lines', 'l.id_line = ls.id_line', 'l')
            ->columns(array('station_name', 'group_concat(line_number) as lines_num'))
            ->groupBy('Stations.id_station')
            ->orderBy('Stations.station_name');

        $stations = $query->getQuery()->execute();

        $rows = array();
        foreach ($stations as $station) {
            array_push($rows, new StationsViewModel($station->station_name, explode(',', $station->lines_num)));
        }
        echo json_encode($rows);
    }
}