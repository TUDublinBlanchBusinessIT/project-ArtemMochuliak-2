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

    public function getSummary()
    {
        return "Service: " . $this->type . 
               " | Cost: €" . $this->cost . 
               " | Date: " . $this->date;
    }
}
