# Creator CV

Creator CV to prosty generator CV uruchamiany w przeglądarce. Projekt pozwala wypełnić formularz, podejrzeć gotowy dokument, pobrać CV jako plik HTML albo wydrukowac je do PDF z poziomu przegladarki.

## Status

Projekt jest w wersji roboczej. Aktualnie działa jako lekka aplikacja PHP/HTML/CSS/JavaScript bez bazy danych i bez zapisywania danych użytkownika po stronie serwera.

## Funkcje

- formularz z danymi kontaktowymi, opisem, umiejętnościami, kursami, doświadczeniem i edukacja,
- opcjonalne zdjęcie wczytywane lokalnie w przeglądarce,
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

Po uruchomieniu wejdź w przeglądarce na:

```text
http://localhost:8000
```

Plik `index.php` przekierowuje do `generator.php`, gdzie znajduje się interfejs generatora.

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

## Prywatność

Repozytorium nie zawiera bazy danych ani endpointow zapisujacych CV. Dane wpisywane w formularzu są przetwarzane lokalnie w przeglądarce i trafiaja tylko do podgladu albo do pobranego pliku HTML.

## Dobre praktyki

- Nie wpisuj danych prawdziwych osób podczas testowania publicznego wdrożenia.
- Przed wysłaniem CV sprawdź podgląd wydruku i układ na formacie A4.
- Zdjęcia warto wcześniej skompresować, aby wygenerowany plik nie był niepotrzebnie duży.
- Gotowe dokumenty przechowuj lokalnie; aplikacja nie pełni funkcji dysku ani archiwum CV.
