# Freerider API

Med detta inofficiella API kan man hämta tillgängliga bilar hos Hertz Freerider.

## Hertz Freerider
Hertz Freerider är en tjänst som erbjuder gratis one-way-transfers från olika Hertz-stationer i Sverige.

## Funktionalitet
APIet möjliggör att hämta samtliga resor samt söka på destination och startpunkt.

## Installation
APIet installeras genom att inkludera filen FreeriderAPI.php. För att använda APIet instantieras klassen FreeriderAPI som tillhandahåller tre metoder för att söka resor.

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
#### Parametrar: $destination - Sökord på destination
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
#### Parametrar: $destination - Sökord på avfärdspunkt
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

## Användning
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




