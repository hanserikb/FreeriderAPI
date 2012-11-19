<?php
include_once("helper/simple_html_dom.php");
include_once("Freerider.php");
/**
 * Created by JetBrains PhpStorm.
 * User: HansBentlov
 * Date: 2012-11-19
 * Time: 12:43
 * To change this template use File | Settings | File Templates.
 */
class FreeriderAPI
{
    // URL to Freerider list site
    private $url = "http://hertzfreerider.se/unauth/list_transport_offer.aspx";

    public function GetAll()
    {
        $travelInfo = array();
        $html = file_get_html($this->url);
        $elements = $html->find("div[id=offers_list] tr[class=highlight]");

        foreach ($elements as $element) {
            $origin = $element->find("a")[0]->plaintext;
            $destination = $element->find("a")[1]->plaintext;
            $startDate = $element->nextSibling()->find("td span")[0]->plaintext;
            $endDate = $element->nextSibling()->find("td span")[1]->plaintext;
            $carModel = $element->nextSibling()->find("td span")[2]->plaintext;
           array_push($travelInfo, new Freerider($origin, $destination, $startDate, $endDate, $carModel));
        }
        return $travelInfo;
    }
}
