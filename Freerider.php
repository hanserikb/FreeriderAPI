<?php
require_once(dirname(__FILE__) . '/interface/iFreerider.php');

class Freerider //implements iFreerider
{
    public $destination = null;
    public $origin = null;
    public $startDate = null;
    public $endDate = null;
    public $carModel = null;

    public function __construct($origin, $destination, $startDate, $endDate, $carModel)
    {
        $this->destination = $destination;
        $this->origin = $origin;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->carModel = $carModel;
    }

    public function get_departure()
    {
        throw new NotImplementedException("Not yet available");
    }

    public function get_destination()
    {
        throw new NotImplementedException("Not yet available");
    }

    public function get_start_date()
    {
        throw new NotImplementedException("Not yet available");
    }

    public function get_end_date()
    {
        throw new NotImplementedException("Not yet available");
    }

    public function get_car_model()
    {
        throw new NotImplementedException("Not yet available");
    }
}
