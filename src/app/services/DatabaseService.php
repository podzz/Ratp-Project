<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 14/06/15
 * Time: 13:35
 */

class DatabaseService {
    public static function linesstations($builder)
    {
        $query = $builder
            ->from('Stations')
            ->join('LineStations', 'Stations.id_station = ls.id_station', 'ls')
            ->join('Lines', 'l.id_line = ls.id_line', 'l')
            ->columns(array('station_name', 'group_concat(line_number) as lines_num'))
            ->groupBy('Stations.id_station')
            ->orderBy('Stations.station_name, line_number');

        return $query->getQuery()->execute();
    }
}