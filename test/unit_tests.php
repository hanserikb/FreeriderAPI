<?php

require_once("simpletest/autorun.php");
require_once("../Freerider.php");
require_once("../FreeriderAPI.php");

class FreeriderAPITEsts extends UnitTestCase
{
    // Kontrollerar om klassen Freeriders konstruktor fungerar som den ska
    function testFreeriderObject()
    {
        $freerider = new Freerider("Västerås","Stockholm", date("Y-m-d", strtotime("2012-11-18")), date("Y-m-d", strtotime("2012-11-20")), "Volvo V40");
        $this->assertIsA($freerider, "Freerider", "Object should be type Freerider");
        $this->assertEqual($freerider->carModel == "Volvo V40", "Car model not valid, it is %s");
        $this->assertEqual($freerider->origin == "Stockholm", "Origin is not Stockholm");
        $this->assertEqual($freerider->destination == "Västerås", "Destination not Västerås");
        $this->assertIsA($freerider->startDate,"string", "Start Date not a date object");
        $this->assertIsA($freerider->endDate, "string", "End Date not a date object");
    }

    function testScrape()
    {
        $FreeriderAPI = new FreeriderAPI();
        $result = $FreeriderAPI->getAll();

        // Testar om det returneras några element
        $this->assertEqual(count($result) > 0, "No objects were returned");

    }
    function testGetAll()
    {
        // Gör ett anrop
        // En array med minst ett objekt
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