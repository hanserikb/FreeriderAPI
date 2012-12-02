<?php
interface iFreeriderAPI
{
    /**
     * Search current bookable routes by their city/station of destination
     * @param string $searchQuery - City/station name
     * @return Array of iFreerider objects
     */
    public function get_by_destination($searchQuery);

    /**
     * Search curret bookable routes by their city/station of departure
     * @param string $searchQuery - City/station name
     * @return Array of iFreerider objects
     */
    public function get_by_departure($searchQuery);

    /**
     * Get all current bookable routes
     * @return Array of iFreerider objects
     */
    public function get_all();
}
