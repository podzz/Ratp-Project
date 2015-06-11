<?php

class Lines extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_line;

    /**
     *
     * @var string
     */
    public $line_number;

    /**
     *
     * @var string
     */
    public $line_name;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
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
        $this->hasMany('id', 'Comsumption', 'user', array('alias' => 'Comsumption'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'line';
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
