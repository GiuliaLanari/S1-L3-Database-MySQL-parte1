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


$name = $_POST ["name"]?? "";
$surname = $_POST ["surname"]?? "";
$email = $_POST ["email"]?? "";
$age = $_POST ["age"]?? "";




$stmt = $pdo->prepare("INSERT INTO user_date (name, surname, email, age) VALUES (:name, :surname, :email, :age)");
$stmt->execute([
    'name' => $name,
    'surname' => $surname,
    'email' => $email,
    'age' => $age ,
]);

header("Location: /S1-L3-L4-Database%20MySQL-parte1-2/index.php");