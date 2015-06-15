<?php

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 11/06/15
 * Time: 19:39
 */
require_once("oauth.php");

class ApiController extends \Phalcon\Mvc\Controller
{
    private function verifyOauth() {
        $oa = new Oauth();
        return $oa->checkToken();
    }

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

    /**
     * Core route. Pick next_metro for given station
     * @post This route can be use with POST request
     *
     * @param (example)
     * JSON :
     *          {
     *              "linesNumber":"[1,2,3]",
     *              "station_name":"Opéra"
     *          }
     */
    public function nextMetroAction()
    {
        $this->response->setContentType('text/json');
        $input = $this->request->getJsonRawBody();

        $linesNumber = json_decode($input->linesNumber);
        $station_name = $input->station_name;

        $output = array("serviceStatus" => RatpService::IsServiceUp() ? "Up" : "Down",
                "stationName" => $station_name,
                "requestLines" => json_decode($input->linesNumber),
                "lines" => array());

            foreach ($linesNumber as $line) {
                $output["lines"][$line] = array();
                array_push($output["lines"][$line], array(
                        'Aller' => RatpService::GetNextMetroCached(Lines::findFirst("line_number='" . $line . "'")->line_number, $station_name, 'A'),
                        'Retour' => RatpService::GetNextMetroCached(Lines::findFirst("line_number='" . $line . "'")->line_number, $station_name, 'R')
                    )
                );
            }

        echo json_encode($output);


    }

    public function stationslinesAction()
    {
        $stations = DatabaseService::linesstations($this->modelsManager->createBuilder());

        $rows = array();
        foreach ($stations as $station) {
            $lines = explode(',', $station->lines_num);
            sort($lines);
            array_push($stationsViewModel, new StationsViewModel($station->station_name, $lines));
        }
        echo json_encode($rows);
    }
}