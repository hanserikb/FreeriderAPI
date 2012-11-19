<?php

require_once("../../simpletest/autorun.php");
require_once("../Freerider.php");
class FreeriderAPITEsts extends UnitTestCase
{

    function testFreeriderObject()
    {
        $freerider = new Freerider("Stockholm", "Västerås", date("Y-m-d", strtotime("2012-11-18")), date("Y-m-d", strtotime("2012-11-20")), "Volvo V40");
        $this->assertTrue(1 == 1);
    }


    function testGetAll()
    {
        // Gör ett anrop
        // En array med minst ett objekt
        $result = null;
      //  $this->assertTrue(count($result) > 1, "Keyword search failed, no results");
    }

    function testGetDestination()
    {
        // Gör ett anrop med "Stockholm" som argument

        // Få tillbaka minst ett resultat med "Stockholm" som destination
    }

    function testGetOrigin()
    {
        // Gör ett anrop med "Stockholm" som argument

        // Få tillbaka minst ett resultat innehållandes "Stockholm" som startpunkt
    }
}