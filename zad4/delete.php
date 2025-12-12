<?php
require 'config.php';

if (!isset($_GET['id'])) {
    die("Brak ID postaci");
}

$postac_id = $_GET['id'];

$usun = $pdo->prepare("DELETE FROM characters WHERE id = ?");
$usun->execute([$postac_id]);

header("Location: index.php");
exit;