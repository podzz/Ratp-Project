<?php

class StationsViewModel
{
    public $name;
    public $lines;

    function StationsViewModel($name , $lines) {
        $this->name = $name;
        $this->lines = $lines;
    }
}