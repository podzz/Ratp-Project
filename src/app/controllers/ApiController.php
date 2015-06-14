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
        $stations = DatabaseService::linesstations($this->modelsManager->createBuilder());

        $rows = array();
        foreach ($stations as $station) {
            array_push($rows, new StationsViewModel($station->station_name, explode(',', $station->lines_num)));
        }
        echo json_encode($rows);
    }
}