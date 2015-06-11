<?php


include('../models/Stations.php');

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $lineStations = LineStations::find();


        foreach($lineStations as $ls)
        {
            
        }
        $station1 = new StationFront();
        $station1->name = "Bonne nouvelle";
        $station1->lines = array(8,9);

        $station2 = new StationFront();
        $station2->name = "Balard";
        $station2->lines = array(8);

        $station3 = new StationFront();
        $station3->name = "La Motte-Picquet - Grenelle";
        $station3->lines = array(6, 8, 10);
        $this->view->stations = array($station1, $station2, $station3);
    }

}

