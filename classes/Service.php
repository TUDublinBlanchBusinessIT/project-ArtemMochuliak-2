<?php

class Service
{
    private $type;
    private $cost;
    private $date;

    public function __construct($type, $cost, $date)
    {
        $this->type = $type;
        $this->cost = $cost;
        $this->date = $date;
    }

    public function getServiceType()
    {
        return $this->type;
    }

    public function getServiceCost()
    {
        return $this->cost;
    }

    public function getServiceDate()
    {
        return $this->date;
    }

}
