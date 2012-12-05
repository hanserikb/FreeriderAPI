<?php
require_once(dirname(__FILE__) . "/backend/freeriderBackend.php");
require_once(dirname(__FILE__) . "/interface/iFreeriderAPI.php");

class freeriderAPI implements iFreeriderAPI {

    private $backend = null;

    public function __construct(){
        $this->backend = new freeriderBackend();
    }

    /**
     * Search current bookable routes by their city/station of destination
     * @param string $searchQuery - City/station name
     * @return Array of iFreerider objects
     */
    public function get_by_destination($searchQuery)
    {
        return $this->backend->get_by_destination($searchQuery);
    }

    /**
     * Search curret bookable routes by their city/station of departure
     * @param string $searchQuery - City/station name
     * @return Array of iFreerider objects
     */
    public function get_by_departure($searchQuery)
    {
        return $this->backend->get_by_departure($searchQuery);
    }

    /**
     * Get all current bookable routes
     * @return Array of iFreerider objects
     */
    public function get_all()
    {
        return $this->backend->get_all();
    }
}