# Freerider API

Detta inofficiella Hertz Freerider PHP API erbjuder möjligheten att hämta information om lediga hyrbilar.
Funktionalitet som ev tillkommer senare:
- Getters istället för att hämta direkt från medlemsvariablerna
- Tillhandahålla länk till boknings-sidan för respektive bil
- Tillhandahålla information om hertz-stationerna
- Funktionalitet för bokning


## Vad är Hertz Freerider?
[Hertz Freerider](http://www.hertzfreerider.se) är en tjänst som erbjuder gratis one-way-transfers från och till olika Hertz-stationer i Sverige.

## Funktionalitet
För att hämta aktuella hyrbilar tillhandahåller APIet tre metoder med följande funktionalitet
- Hämta **samtliga** bilar
- Hämta bilar som ska köras **ifrån** en viss station
- Hämta bilar som ska köras **till** en viss station

## Installation
APIet installeras genom att ladda ned samtliga filer och sedan inkludera filen FreeriderAPI.php i sitt projekt.
```php
include_once("FreeriderAPI.php");
...
```

## Metoder
### GetAll
Hämtar samtliga resor

#### Användning
```php
$freerider_api = new freeriderAPI();

$rides = $freeriderapi->getAll();

foreach ($rides as $ride) {
        echo "Origin: " . $ride->origin . "<br />";
        echo "Destination: " . $ride->destination . "<br />";
        echo "Start date: " . $ride->startDate . "<br />";
        echo "End date: " . $ride->endDate . "<br />";
        echo "Car: " . $ride->carModel . "<br />";
}
```

### GetDestinations
#### Parametrar
- string $destination - Sökord på destination
Hämtar alla resor med angiven destination

#### Användning
```php
$freerider_api = new freeriderAPI();

$rides = $freeriderapi->getDestination("Stockholm");

foreach ($rides as $ride) {
        echo "Origin: " . $ride->origin . "<br />";
        echo "Destination: " . $ride->destination . "<br />";
        echo "Start date: " . $ride->startDate . "<br />";
        echo "End date: " . $ride->endDate . "<br />";
        echo "Car: " . $ride->carModel . "<br />";
}
```

### GetOrigins
#### Parametrar 
- string $origin - Sökord på avfärdspunkt
Hämtar alla resor med angiven avfärdspunkt

#### Användning
```php
$freeriderapi = new freeriderAPI();

$rides = $freeriderapi->getOrigin("Stockholm");

foreach ($rides as $ride) {
        echo "Origin: " . $ride->origin . "<br />";
        echo "Destination: " . $ride->destination . "<br />";
        echo "Start date: " . $ride->startDate . "<br />";
        echo "End date: " . $ride->endDate . "<br />";
        echo "Car: " . $ride->carModel . "<br />";
}
```

### Returnerad data
Samtliga metoder returnerar en array innehållandes objekt av typen Freerider.
Hittas inga resultat i sökningen resulteras en tom array

#### Freerider-objekt
Freerider-objekten innehåller följande egenskaper
- origin - Utgångspunkt (sträng, t.ex "Stockholm")
- destination - Mål (sträng, t.ex "Kalmar")
- startDate - Datum för tidigast bokning (sträng, format: "åååå-mm-dd", t.ex "2012-11-20")
- endDate - Datum för senast bokning (sträng, format: "åååå-mm-dd", t.ex "2012-11-29")
- carModel - Information om hyrbilen (sträng, formatet varierar, t.ex "Volvo V70")

## Om APIet
### Tekniker
Skrapningen av Hertz Freerider's webbplats sker med hjälp av hjälpbiblioteket [Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/). Testningen är genomförd med hjälp av (SimpleTest)[http://www.simpletest.org/].
Båda bilbioteken är inkluderade i repositoriet.

### Jag
APIet är skapat av mig, Hans Bentlöv, i studiesyfte under kursen Webbutveckling med PHP II på Linnéuniversitetet i Kalmar.



