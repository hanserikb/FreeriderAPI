<?php
require_once(dirname(__FILE__) . "/simple_html_dom.php");
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
    private $html;

    public function __construct()
    {
        // Removed scraping from constructor because of memory problems in PHP 5.2.17
    }

    /**
     * Scrapes Hertz Freerider website and stores the returned elements
     * @return Array with HTML elements.
     */
    private function scrape_content()
    {
        $this->html = file_get_html($this->url);
        return $this->html->find("div[id=offers_list] tr[class=highlight]");
    }

    /**
     * Returns all current available Freerider rentals
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_all()
    {
        foreach ($this->scrape_content() as $element) {
            $this->parse_and_push_freerider($element);
            $element->clear();
            unset($element);
        }
        $this->html->clear();
        unset($this->html);
        return $this->freeriders;
    }

    /**
     * Returns available Freerider rentals based on a destination search query
     * @param $searchQuery - City/station name
     * @return array Array containing Freerider-objects or empty array if none available
     */
    public function get_by_destination($searchQuery)
    {
        foreach ($this->scrape_content() as $element) {
            $destination = $this->get_destination_from_html($element);
            if(preg_match("/". $searchQuery ."/i", $destination)){
                $this->parse_and_push_freerider($element);
                $element->clear();
                unset($element);
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
        foreach ($this->scrape_content() as $element) {
            $departure = $this->get_departure_from_html($element);
            if(preg_match("/". $searchQuery ."/i", $departure)) {
                $this->parse_and_push_freerider($element);
                $element->clear();
                unset($element);
            }
        }
        return $this->freeriders;
    }

    /**
     * Processes the incoming HTML and adds Freerider objects to the private array
     * @param $element - DOM element
     */
    private function parse_and_push_freerider($element)
    {
        $origin = $this->get_departure_from_html($element);
        $destination = $this->get_destination_from_html($element);
        $startDate = $this->get_start_date_from_html($element);
        $endDate = $this->get_end_date_from_html($element);
        $carModel = $this->get_car_model_from_html($element);
        array_push($this->freeriders, new Freerider($origin, $destination, $startDate, $endDate, $carModel));
    }

    /*
     * Helper methods to parse the HTML
     */
    private function get_departure_from_html($html)
    {
        $element = $html->find("a");
        return $element[0]->plaintext;
    }

    private function get_destination_from_html($html)
    {
        $element = $html->find("a");
        return $element[1]->plaintext;
    }

    private function get_start_date_from_html($html)
    {
        $element = $html->nextSibling()->find("td span");
        return $element[0]->plaintext;
    }

    private function get_end_date_from_html($html)
    {
        $element = $html->nextSibling()->find("td span");
        return $element[1]->plaintext;
    }

    private function get_car_model_from_html($html)
    {
        $element = $html->nextSibling()->find("td span");
        return $element[2]->plaintext;
    }
}
