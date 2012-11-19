# Freerider API

Med detta inofficiella Freerider API kan du hämta tillgängliga bilar hos Hertz Freerider.

## Hertz Freerider
Hertz Freerider är en tjänst där man kan få hyra en bil för att köra tillbaka en envägssträcka. Helt gratis.

## Funktionalitet

APIet ger dig möjlighet att hämta samtliga resor samt söka på destination och startpunkt.

## Installation

APIet installeras genom att inkludera filen FreeriderAPI.php i ditt projekt. För att använda APIet instantieras klassen FreeriderAPI som sedan tillhandahåller tre metoder för att söka resor.

## Metoder
### GetAllRoutes
Hämtar samtliga resor

### GetDestinations
#### Parametrar: $destination - Sökord på destination
Hämtar alla resor med angiven destination

### GetOrigins
#### Parametrar: $destination - Sökord på avfärdspunkt
Hämtar alla resor med angiven avfärdspunkt


## Svar
Som svar på anropen får man en array med objekt som innehåller objekt innehållandes följande reseinformation
Utgångspunkt
Destination
Bilmodell
Datum för tidigast bokning
Datum för senast bokning



