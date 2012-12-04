<?php
require_once("simple_html_dom.php");
require_once(dirname(__FILE__) . "/../interface/iFreeriderAPI.php");
require_once(dirname(__FILE__) . "/../Freerider.php");
/**
 * PHP-API for fetching available Hertz Freerider travels.
 * @author Hans Bentlöv <hb222ap@student.lnu.se>
 * @todo Refactoring, renaming variables (naming convention - underscore)
 */
class FreeriderBackend implements iFreeriderAPI
{
    // URL to Freerider list site
    private $url = "http://hertzfreerider.se/unauth/list_transport_offer.aspx";
    private $freeriders = array();
    private $scrapedElements;

    /**
     * Scrapes Hertz Freerider website and stores the returned elements
     * @return Array with HTML elements.
     */
    public function __construct()
    {
        $html = file_get_html($this->url);
        $this->scrapedElements = $html->find("div[id=offers_list] tr[class=highlight]");
    }

    /**
     * Returns all current available Freerider rentals
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_all()
    {
        foreach ($this->scrapedElements as $element) {
            $origin = $element->find("a")[0]->plaintext;
            $destination = $element->find("a")[1]->plaintext;
            $startDate = $element->nextSibling()->find("td span")[0]->plaintext;
            $endDate = $element->nextSibling()->find("td span")[1]->plaintext;
            $carModel = $element->nextSibling()->find("td span")[2]->plaintext;
            array_push($this->freeriders, new Freerider($origin, $destination, $startDate, $endDate, $carModel));
        }
        return $this->freeriders;
    }

    /**
     * Returns available Freerider rentals based on a destination search query
     * @param $searchQuery - City/station name
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_by_destination($searchQuery)
    {
        foreach ($this->scrapedElements as $element) {
            if(preg_match("/". $searchQuery ."/i", $element->find("a")[1]->plaintext)){
                $origin = $element->find("a")[0]->plaintext;
                $destination = $element->find("a")[1]->plaintext;
                $startDate = $element->nextSibling()->find("td span")[0]->plaintext;
                $endDate = $element->nextSibling()->find("td span")[1]->plaintext;
                $carModel = $element->nextSibling()->find("td span")[2]->plaintext;
                array_push($this->freeriders, new Freerider($origin, $destination, $startDate, $endDate, $carModel));
            }
        }
        return $this->freeriders;
    }

    /**
     * Returns available Freerider rentals based on a departure search query
     * @param $searchQuery - City/station name
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_by_departure($searchQuery)
    {
        foreach ($this->scrapedElements as $element) {
            if(preg_match("/". $searchQuery ."/i", $element->find("a")[0]->plaintext)){
                $origin = $element->find("a")[0]->plaintext;
                $destination = $element->find("a")[1]->plaintext;
                $startDate = $element->nextSibling()->find("td span")[0]->plaintext;
                $endDate = $element->nextSibling()->find("td span")[1]->plaintext;
                $carModel = $element->nextSibling()->find("td span")[2]->plaintext;
                array_push($this->freeriders, new Freerider($origin, $destination, $startDate, $endDate, $carModel));
            }
        }
        return $this->freeriders;
    }
}
