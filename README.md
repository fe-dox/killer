## Killer - Co to?
Gra w swojej pierwotnej wersji polegała na rozdaniu graczom karteczek (jedna na gracza) z iminiem i nazwiskiem ich celu.
Celem gry jest wyeliminowanie wszystkich pozostałych graczy.
Zabójstwa można dokonać w umówiony sposób np. trzeba podać przedmiot lewą ręką, lub być w jakimś pomieszczeniu sam na sam.
Tak naprawdę sposób moż być dowolny.

## Co dodaje nasza wersja
W naszej wersji każdy gracz dostaje karteczkę z kodem - to ona pozwala mu następnie na stronie uzyskać zlecenie.
Dzięki zastosowaniu naszego generatora i systemu do obsługi gry poprzez stronę internetową zapobiegamy sytuacji gdy gracz trafi na zlecenie na samego siebie przed końcem gry, a dodatkowo uniemożliwiamy wymiany zleceń oraz pomyłkowe zabójstwa.

## Jak użyć naszego systemu?
Procedura jest bardzo prosta, da się ją zamknąć w kilku punktach
 
#### Wymagania
* NodeJS >= 8 - do generowania kodów
* PHP >= 7 (pzbsowe jest ok) - do obsługi stron

#### Przygotowanie Plików
1. Kopiujemy zawartość folderu web do swojego folderu na serwerze
2. W tym samym ktalogu co plik `app.js` umieszczamy plik `killer.csv` zawierający listę zawodników 
Przykładowa zawartośc pliku `killer.csv`:
```csv
Laura Cichoń
Agata Warunek
Gaba Kroner
Mikołaj Bogucki
Łukasz Słuszniak
```

#### Gnerowanie 
1. W katalogu zawierającym plik `killer.csv` oraz `app.js` uruchamiamy cmd i wywołujemy polecenie `node app.js`
2. Kopiujemy utworzony plik `data.json` i umieszczamy go w folderze na serwerze
3. Drukujemy listę znajdującą się w pliku `print.html`

#### Rozdawanie karteczek
Tniemy dopiero co wydrukowaną listę na paski i wręczamy kod osobie, której nazwisko znajduję się po jego lewej stronie

![IMG](https://fedox.pl/i/1TNjePRQ8Vx6gsmV)

#### Instrukcje dla graczy
Aby uzyskać zlecenie należy wejść na stronę główną i podać swój kod, następnie zostaniemy powitani swoim imieniem i nazwiskiem i dowiemy się kto ma być naszym następnym celem.
Aby zapisać zabójstwo należy wpisać kod osoby, którą mieliśmy zabić - jeżeli był poprawny zabójstwo zostanie zaliczone, a my uzyskamy kolejne zlecenie

#### Gdyby coś się zepsuło
W razie czego zostawiamy mistrzowi gry dostęp do pliku `list.html` zawierającego listę osób wraz z ich celami, w celu naprawienia przebiegu gry wystarczy ruszyć głową :)
W ostateczności można kontaktować się z którymś z autorów

# Autorzy
[Mikołaj Bogucki](https://www.facebook.com/mmbogus) i [Jeremiasz Mazur](https://www.facebook.com/profile.php?id=100010091221795) pod natchnieniem i nadzorem [Ani Basiury](https://www.facebook.com/profile.php?id=100013693023314)

# Licencja
Udostępniamy naszego serwerowego killera głównie z myślą o kolejnych osobach prowadzących obozy brydżowe w Stasikówce,
ale każdy kto chce może z niego korzystać. Wystarczy trzymać się zasad licencji GNU GPL3
Jej szczegóły znajdziesz w pliku `LICENSE`


#### W skrócie

     Copyright (C) 16/08/2019, 13:10  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura

     This program is free software: you can redistribute it and/or modify
     it under the terms of the GNU General Public License as published by
     the Free Software Foundation, either version 3 of the License, or
     (at your option) any later version.
 
     This program is distributed in the hope that it will be useful,
     but WITHOUT ANY WARRANTY; without even the implied warranty of
     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     GNU General Public License for more details.
