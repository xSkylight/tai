<?php
require 'config.php';

if (!isset($_GET['id'])) {
    die("Brak ID postaci");
}

$postac_id = $_GET['id'];

$zapytanie = $pdo->prepare("SELECT * FROM characters WHERE id = ?");
$zapytanie->execute([$postac_id]);
$postac = $zapytanie->fetch(PDO::FETCH_ASSOC);

if (!$postac) {
    die("Taka postać nie istnieje.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = $_POST['nickname'];
    $klasa = $_POST['class'];
    $sila = $_POST['strength'];
    $intel = $_POST['intelligence'];
    $zwinnosc = $_POST['agility'];
    $lvl = $_POST['level'];

    $aktualizacja = $pdo->prepare("UPDATE characters SET nickname=?, class=?, strength=?, intelligence=?, agility=?, level=? WHERE id=?");
    $aktualizacja->execute([$nick, $klasa, $sila, $intel, $zwinnosc, $lvl, $postac_id]);

    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edytuj postać</title></head>
<body>
<h1>Edytuj postać</h1>

<form method="POST">
    Nick: <input type="text" name="nickname" value="<?= htmlspecialchars($postac['nickname']) ?>" required><br><br>
    Klasa: <input type="text" name="class" value="<?= htmlspecialchars($postac['class']) ?>" required><br><br>
    Siła: <input type="number" name="strength" value="<?= $postac['strength'] ?>" required><br><br>
    Inteligencja: <input type="number" name="intelligence" value="<?= $postac['intelligence'] ?>" required><br><br>
    Zwinność: <input type="number" name="agility" value="<?= $postac['agility'] ?>" required><br><br>
    Poziom: <input type="number" name="level" value="<?= $postac['level'] ?>" required><br><br>

    <button type="submit">Zapisz zmiany</button>
</form>

</body>
</html>