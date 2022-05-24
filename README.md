# DT173G, Inloggning med PHP och REST
Detta repository visar ett enklare exempel på hur en inloggningsfunktion kan göras med hjälp av PHP, 
Sessionsvariabel och cURL som anropar ett API som också ligger i repot under mappen **api**.

## Installation
Kopiera över filerna till din htdocs-mapp. Blir då sökvägen till mappen **localhost/login_curl/** behöver du inte ändra något i filerna. 
Blir din sökväg annorlunda behöver du ändra sökvägen för de olika cURL-anropen så det stämmer överens med sökvägen(URLen) på din dator.

## Filer
**Webbplats**
|Filnamn|Hantering|
|--|--|
|index.php| Innehåller ett inloggningsformulär, om formuläret postas görs POST-anrop med cURL, är det korrekt användare sätts en sessionsvariabel.|
|admin.php| Kontrollerar att en användare är inloggad, gör sedan en GET-anrop med cURL till APIet för att hämta in all data och skriver ut på skärmen.
|config.php| Aktiverar felmeddelanden och sessioner|

# API
I filerna ligger en mapp **api** som innehåller filerna till en enklare webbtjänst. Lösningen är inte objektorienterad eller är kopplad till någon databas.

## Länk
APIet ligger endast lokalt och URL kan variera beroende vart den klonas ned. URL för APIet som standard: [http://localhost/login_curl/api](http://localhost/login_curl/api)

## Användning
Nedan finns beskriver hur man når APIet på olika vis(endpoints och metoder):
|Metod|Endpoint|Beskrivning|
|--|--|--|
|GET|/cats.php|Hämtar alla katter.|
|POST|/login.php|Kontrollerar att användaren är giltig. Kräver att ett objekt med användaruppgifter skickas med.|

Objekt med användaruppgifter skickas som JSON med följande struktur:
```
{
   "username": "admin",
   "password": "password"
}
```
Korrekt användarnamn och lösenord är: **admin** och **password**. Eftersom användaruppgifterna i denna lösning är hårdkodad. 
Dessa bör vara lagrad i en databas med lösenordet hashat.
