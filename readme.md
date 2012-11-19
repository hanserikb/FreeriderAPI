# Freerider API

Detta inofficiella Hertz Freerider PHP API erbjuder möjligheten att hämta information om lediga hyrbilar.
För tillfället går det ej att boka bilar, något som är planerat att implementeras vid ett senare tillfälle.

## Vad är Hertz Freerider?
Hertz Freerider är en tjänst som erbjuder gratis one-way-transfers från olika Hertz-stationer i Sverige.

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
$freeriderapi = new freeriderAPI();

$routes = $freeriderapi->getAll();

foreach ($result as $freeride) {
        echo "Origin: " . $freeride->origin . "<br />";
        echo "Destination: " . $freeride->destination . "<br />";
        echo "Start date: " . $freeride->startDate . "<br />";
        echo "End date: " . $freeride->endDate . "<br />";
        echo "Car: " . $freeride->carModel . "<br />";
}
```

### GetDestinations
#### Parametrar
- string $destination - Sökord på destination
Hämtar alla resor med angiven destination

#### Användning
```php
$freeriderapi = new freeriderAPI();

$routes = $freeriderapi->getAll();

foreach ($result as $freeride) {
        echo "Origin: " . $freeride->origin . "<br />";
        echo "Destination: " . $freeride->destination . "<br />";
        echo "Start date: " . $freeride->startDate . "<br />";
        echo "End date: " . $freeride->endDate . "<br />";
        echo "Car: " . $freeride->carModel . "<br />";
}
```

### GetOrigins
#### Parametrar 
- $origin - Sökord på avfärdspunkt
Hämtar alla resor med angiven avfärdspunkt

#### Användning
```php
$freeriderapi = new freeriderAPI();

$routes = $freeriderapi->getAll();

foreach ($result as $freeride) {
        echo "Origin: " . $freeride->origin . "<br />";
        echo "Destination: " . $freeride->destination . "<br />";
        echo "Start date: " . $freeride->startDate . "<br />";
        echo "End date: " . $freeride->endDate . "<br />";
        echo "Car: " . $freeride->carModel . "<br />";
}
```

### Returnerad data
Samtliga metoder returnerar en array innehållandes objekt av typen Freerider.
Hittas inga resultat i sökningen resulteras en tom array

#### Freerider-objekt
Freerider-objekten innehåller följande egenskaper
- origin - Utgångspunkt
- destination - Mål
- startDate - Datum för tidigast bokning
- endDate - Datum för senast bokning
- carModel - Information om hyrbilen

## Om APIet
### Tekniker
Skrapningen av Hertz Freerider's webbplats sker med hjälp av hjälpbiblioteket [Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/).

### Jag
APIet är skapat av mig, Hans Bentlöv, i studiesyfte under kursen Webbutveckling med PHP II på Linnéuniversitetet i Kalmar.



