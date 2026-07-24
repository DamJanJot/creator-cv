# Szkic projektu

## Cel

Creator CV ma byc prostym narzedziem do szybkiego przygotowania CV bez konta, logowania i zapisywania prywatnych danych na serwerze.

## Obecny zakres

- pojedynczy formularz CV,
- podglad dokumentu po stronie klienta,
- eksport do HTML,
- drukowanie do PDF przez przegladarke,
- lokalne wczytywanie zdjecia.

## Kolejne kroki

- dodac kilka szablonow wizualnych CV,
- dodac walidacje najwazniejszych pol formularza,
- poprawic responsywnosc podgladu CV na malych ekranach,
- rozwazyc eksport PDF bez recznego korzystania z okna drukowania,
- dodac opcje zapisu i ponownego wczytania danych lokalnie w przegladarce,
- przygotowac prosty zestaw testow dla logiki generowania HTML.

## Zasady prywatnosci projektu

- nie commitowac gotowych CV z realnymi danymi,
- nie dodawac plikow `.env` ani sekretow,
- trzymac wygenerowane dokumenty w ignorowanych katalogach typu `exports/` lub `generated/`,
- jezeli kiedykolwiek pojawi sie backend, dokumentacja musi jasno opisac, gdzie trafiaja dane uzytkownika.
