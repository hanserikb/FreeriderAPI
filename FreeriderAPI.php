<?php
include_once("helper/simple_html_dom.php");
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
        $html = file_get_html($this->url);
        $elements = $html->find("div[id=offers_list]");
        return $elements;
    }
}
