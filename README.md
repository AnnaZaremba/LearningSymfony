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
chmod -R 0777 var/logs
chmod -R 0777 var/cache
chmod -R 0777 var/sessions
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

```
Adding permissions
------------------
```bash
chmod -R 0777 foldername
```

Routing
-------
```bash
bin/console debug:router
```

Czyszczenie Cache
-----------------
```
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
```

OnClick - wysuwany tekst
------------------------
```$xslt
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


