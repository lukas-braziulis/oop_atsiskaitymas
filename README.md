Komentarai ir pastebėjimai:
-----

Home Page - index.php:
1. Neradau būdo kaip padaryti, kad išmetant Exception'ą, kai yra netinkama data, sugrąžintų į Home Page PRIRAŠANT Exception($message);
2. Nuėmus komentarą nuo:
   * header("Location: http://localhost/OOP_atsiskaitymas/index.php");
   * InputDataHandler.php checkDate() funkcijoje - tada re-direct'as į Home page veikia, jeigu parinktas mėnesis yra netinkamas (ir duomenys nėra išsaugomi).
   * Palikau užkomentuotą, tam kad parodyti, jog Exception'as veikia.

-----

Reports page - (./src/Views/reportsPage.php)
1. Sugalvota apmokėjimo logika buvo tokia:
   1. Paspaudus "Deklaruoti ir Sumokėti" mygtuką yra išsiunčiamas POST į EntryDeleteHandler.php klasę, kur yra paleidžiama setPaid() funkcija.
   2. Ši funkcija ant visų tuo metu rodomų įrašų prideda papildomas array value - ['paid'] = 'yes';
   3. Pridėjus tuos value, visi įrašai yra atnaujinami paymentEntries.json file'e.
   4. Tada buvo mintis, su reportsPage.php 33 eilutėje esančiu IF'u tiesiog praleisti visus įrašus, kurie turės isset(['paid'] = 'yes'), prieš viską atvaizduojant.
   5. Deja nesugalvojau kaip normaliai implementuoti šitą IF'ą HTML dalyje. Testavausi atskirame .php file'e tai kaip ir viskas veikė su foreach atvaizdavimu, bet HTML'e strigo...

-----

InputDataHandler - (./src/Handlers/InputDataHandler.php)
1. Arba kažką ne taip nustačiau su Autoloader'iu, arba nežinau kas, bet Namespaces man normaliai neveikė.
2. Bandžiau iškelti Exception'us ir Checker'ius į atskiras klases, bet InputDataHandler'is pastoviai metė error'us kad NEMATO tų klasių. Nors atrodo viską buvau teising su'set-up'inęs. (palikau tas dvi klases, su "..Original" prierašu, kad parodyti kaip norėjau padaryti)
3. Teko visus Exception'us ir Checker'ius sugrūsti į šitą vieną klasę, kad bent kažkaip veiktų.

-----
Router funckionalumas:
1. Nelabai aš jo suprantu, tai padariau tik, kad bet koks error page'as atvestų į index.php.

-----
Interfaces:
1. Sukūriau vieną... bet įsivaizduoju, kur galėčiau jį logiškai panaudoti...
2. Truputį bevertis jis toks atrodo, nes vis tiek koks tarifas ir tarifo kainas ranka įvedinėjam.