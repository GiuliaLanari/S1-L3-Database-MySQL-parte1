<?php
$host = 'localhost';
$db   = 'user_registration';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);




$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE  FROM user_date WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->execute([$id]);

header("Location: /S1-L3-L4-Database%20MySQL-parte1-2/index.php");

?>