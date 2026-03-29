<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = $_POST['nickname'];
    $klasa = $_POST['class'];
    $sila = $_POST['strength'];
    $intel = $_POST['intelligence'];
    $zwinnosc = $_POST['agility'];
    $lvl = $_POST['level'];

    $zapytanie = $pdo->prepare("INSERT INTO characters (nickname, class, strength, intelligence, agility, level)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $zapytanie->execute([$nick, $klasa, $sila, $intel, $zwinnosc, $lvl]);

    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dodaj postać</title></head>
<body>
<h1>Dodaj nową postać</h1>

<form method="POST">
    Nick: <input type="text" name="nickname" required><br><br>
    Klasa: <input type="text" name="class" required><br><br>
    Siła: <input type="number" name="strength" required><br><br>
    Inteligencja: <input type="number" name="intelligence" required><br><br>
    Zwinność: <input type="number" name="agility" required><br><br>
    Poziom: <input type="number" name="level" required><br><br>

    <button type="submit">Dodaj</button>
</form>

</body>
</html>