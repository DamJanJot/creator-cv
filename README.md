# Creator CV

Creator CV to prosty generator CV uruchamiany w przegladarce. Projekt pozwala wypelnic formularz, podejrzec gotowy dokument, pobrac CV jako plik HTML albo wydrukowac je do PDF z poziomu przegladarki.

## Status

Projekt jest w wersji roboczej. Aktualnie dziala jako lekka aplikacja PHP/HTML/CSS/JavaScript bez bazy danych i bez zapisywania danych uzytkownika po stronie serwera.

## Funkcje

- formularz z danymi kontaktowymi, opisem, umiejetnosciami, kursami, doswiadczeniem i edukacja,
- opcjonalne zdjecie wczytywane lokalnie w przegladarce,
- podglad CV przed pobraniem,
- eksport do pliku HTML,
- drukowanie lub zapis do PDF przez systemowe okno drukowania,
- podstawowe czyszczenie danych wpisanych w formularzu przed wstawieniem ich do wygenerowanego HTML.

## Technologie

- PHP
- HTML
- CSS
- JavaScript
- Bootstrap z CDN

## Uruchomienie lokalne

Wymagany jest PHP z dostepem do wbudowanego serwera developerskiego.

```bash
php -S localhost:8000
```

Po uruchomieniu wejdz w przegladarce na:

```text
http://localhost:8000
```

Plik `index.php` przekierowuje do `generator.php`, gdzie znajduje sie interfejs generatora.

## Struktura

```text
.
|-- css/
|   `-- cv_style.css
|-- img/
|   `-- ico.png
|-- js/
|   `-- script.js
|-- generator.php
|-- index.php
|-- README.md
`-- DRAFT.md
```

## Prywatnosc

Repozytorium nie zawiera bazy danych ani endpointow zapisujacych CV. Dane wpisywane w formularzu sa przetwarzane lokalnie w przegladarce i trafiaja tylko do podgladu albo do pobranego pliku HTML.
