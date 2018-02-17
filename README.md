LearningSymfony
===============

Installation
------------

1. Get project
```
git clone https://github.com/AnnaZaremba/LearningSymfony.git
```
2. Install dependencies
```
composer install
```
3. Permission to folders
```bash
sudo chmod -R 0777 var/logs
sudo chmod -R 0777 var/cache
sudo chmod -R 0777 var/sessions
```

Running server
------------
```bash
 cd my_project_name/
 php bin/console server:run
```

Git configuration
-----------------

Change git user
```bash
git config user.name "Anna Zaremba"
git config user.email "aniazarem@gmail.com"
```

Dodawanie commita
```bash
cd developing_ania/github/montujemymeble/
git status
git add .
git commit -am 'usuniecie katalogu idea'
git push origin feature/1_czyste_symfony
```

Github w konsoli
----------------
```bash
cd nazwa_katalogu
git status - pokazuje zmienione pliki
git diff nazwa_pliku - pokazuje zmiany w pliku
git add -all - dodaje do wysyłki
git commit -am 'tytuł komita' - puszcza komita
git branch -av - sprawdza bruncha np. master, develop
git push origin master - wysyła kompta do GitHuba

mc -e nazwa_pliku - edycja pliku

Routing
-------

Lista adresów serwisu
```bash
bin/console debug:router
```

Czyszczenie Cache
-----------------
```bash
sudo bin/console cache:clear
```

PhpStorm
--------
```bash
Alt Ins - generuje get i set controller...
Alt Enter - podpowiada np. importuje klasy
Ctrl Alt L - formatowanie
Ctrl Spacja - pokazuje dostępne metody
Ctrl B - wyswietlenie plików w których używa się danej klasy
Ctrl + n - wyszukuje klasy w projekcie
Ctrl + Shift + n - wyszukuje wszystkie pliki w projekcie
```

OnClick - wysuwany tekst
------------------------
```
$xslt
<!DOCTYPE html>
<html>
<head>
<style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top:20px;
}
</style>
</head>
<body>

<p>Click the "Try it" button to toggle between hiding and showing the DIV element:</p>

<button onclick="myFunction()">Try it</button>

<div id="myDIV">
This is my DIV element.
</div>

<p><b>Note:</b> The element will not take up any space when the display property set to "none".</p>

<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

</body>
</html>
```

Tinymce
--------
```bash

composer require stfalcon/tinymce-bundle='2.1'

// app/AppKernel.php
<?php
    // ...
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
        );
    }

bin/console assets:install web/

{{ tinymce_init() }}
