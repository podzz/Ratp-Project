<?php

class Comsumption extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user;

    /**
     *
     * @var string
     */
    public $datestamp;

    /**
     *
     * @var integer
     */
    public $conso;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user', 'Users', 'id', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'comsumption';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comsumption[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comsumption
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
