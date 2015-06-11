<?php

class LineStations extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_station;

    /**
     *
     * @var integer
     */
    public $id_line;


    public function validation()
    {
        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasOne("id_line","Lines","id_line");
        $this->hasOne("id_station","Stations","id_station");
    }

    public function afterFetch()
    {
        $this->stations;
        $this->lines;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'line_station';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
