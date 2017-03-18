<?php
/**
 * Do zrobienia:
 * =============
 *
 * - informacja 'brak danych' w przypadku braku wpisów w tabeli
 * - zabezpieczenie przed wpisaniem wieku większego niż 120 lat (walidator)
 * - zabezpieczenie przed wpisaniem imienia dłuższego niż 32 znaki
 * - zabezpieczenie przed wpisaniem nazwiska dłuższego niż 32 znaki
 *
 */
require_once('class.DaneOsobowe.php');
require_once('class.Warunek.php');
require_once('class.Walidator.php');
//var_dump($_POST);
$daneOsobowe = new DaneOsobowe();
$warunek = new Warunek();
$walidator = new Walidator();

$dane = $daneOsobowe->znajdzWszystkieElementy();
if ($warunek->czyMozemyUsunac($_POST)) {
    $daneOsobowe->usun($_POST['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>formularz_dane</title>
    <meta charset="UTF-8">
    <style TYPE="text/css">

        fieldset {
            width: 7cm;
            border: 1px #FF0000 dotted;
        }

    </style>
</head>
<body>

<form method="post" action="formularz_dane.php">

    <?php

    if (isset($_POST['imie'], $_POST['nazwisko'], $_POST['wiek'])) {

        if (!$walidator->czyImieJestPoprawne($_POST['imie'])) {
            echo "Imię jest błędne!" . "<br/>";
        }

        if (!$walidator->czyNazwiskoJestPoprawne($_POST['nazwisko'])) {
            echo "Nazwisko jest błędne!" . "<br/>";
        }
    }

    if ($warunek->czyMozemyEdytowacDane($_POST)) {
        ?>
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <?php
    }
    ?>
    <fieldset>
        <legend>Dane osobowe</legend>
        <table border="6">

            <tr>
                <td><label for="imie">imię:</label></td>
                <td><input type="text" name="imie" id="imie"
                           value="<?php if ($warunek->czyMozemyEdytowacDane($_POST)) {
                               echo $_POST['imie'];
                           } ?>">
                </td>
            </tr>
            <tr>
                <td><label for="nazwisko">nazwisko:</label></td>
                <td><input type="text" name="nazwisko" id="nazwisko"
                           value="<?php if ($warunek->czyMozemyEdytowacDane($_POST)) {
                               echo $_POST['nazwisko'];
                           } ?>">
                </td>
            </tr>
            <tr>
                <td><label for="wiek">wiek:</label></td>
                <td><input type="number" name="wiek" id="wiek"
                           value="<?php if ($warunek->czyMozemyEdytowacDane($_POST)) {
                               echo $_POST['wiek'];
                           } ?>">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" value="zapisz"></td>
            </tr>
        </table>
    </fieldset>
    <?php
    if ($warunek->czyMozemyDodacDoBazyDanych($_POST)) {
        if ($walidator->czyImieJestPoprawne($_POST['imie']) && $walidator->czyNazwiskoJestPoprawne($_POST['nazwisko'])) {
            $daneOsobowe->zapisz($_POST['imie'], $_POST['nazwisko'], $_POST['wiek']);
        }
    }

    if ($warunek->czyMozemyZapisacEdytowaneDane($_POST)) {
        if ($walidator->czyImieJestPoprawne($_POST['imie']) && $walidator->czyNazwiskoJestPoprawne($_POST['nazwisko'])) {
            $daneOsobowe->edytuj($_POST['imie'], $_POST['nazwisko'], $_POST['wiek'], $_POST['id']);
        }
    }
    ?>
</form>

<?php
$dane = $daneOsobowe->znajdzWszystkieElementy();
?>

<fieldset>
    <legend>Lista osób</legend>
    <table border="6">
        <tr>
            <th>Id</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Wiek</th>
        </tr>
        <?php
        for ($row = 0; $row < count($dane); $row++) {
            ?>
            <tr>
                <td><?= $dane[$row]['id'] ?></td>
                <td><?= $dane[$row]['imie'] ?></td>
                <td><?= $dane[$row]['nazwisko'] ?></td>
                <td><?= $dane[$row]['wiek'] ?></td>
                <td align="center">
                    <form method="post" action="formularz_dane.php">
                        <input type="hidden" name="id" value="<?= $dane[$row]['id'] ?>">
                        <input type="hidden" name="imie" value="<?= $dane[$row]['imie'] ?>">
                        <input type="hidden" name="nazwisko" value="<?= $dane[$row]['nazwisko'] ?>">
                        <input type="hidden" name="wiek" value="<?= $dane[$row]['wiek'] ?>">
                        <input type="hidden" name="co_zrobic" value="edytuj">
                        <input type="submit" value="edytuj">
                    </form>
                </td>
                <td align="center">
                    <form method="post" action="formularz_dane.php">
                        <input type="hidden" name="id" value="<?= $dane[$row]['id'] ?>">
                        <input type="hidden" name="co_zrobic" value="usun">
                        <input type="submit" value="usuń" onclick="return confirm_delete()">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <script type="text/javascript">
        function confirm_delete() {
            return confirm('Czy na pewno chcesz usunąć dane?');
        }
    </script>
</body>
</html>