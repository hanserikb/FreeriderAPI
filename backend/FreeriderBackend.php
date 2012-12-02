<?php
require_once("simple_html_dom.php");
require_once('interface/iFreeriderAPI.php');
require_once('Freerider.php');
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

    /**
     * Scrapes Hertz Freerider website and returns elements with data
     * @return Array with elements containing freerider info.
     */
    private function scrape_content()
    {
        $html = file_get_html($this->url);
        $elements = $html->find("div[id=offers_list] tr[class=highlight]");
        return $elements;
    }

    /**
     * Returns all current available Freerider rentals
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_all()
    {
        $elements = $this->scrape_content();
        foreach ($elements as $element) {
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
        $elements = $this->scrape_content();
        foreach ($elements as $element) {
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
        $elements = $this->scrape_content();
        foreach ($elements as $element) {
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
