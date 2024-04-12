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
$id = $_POST['id'];



$stmt = $pdo->prepare("UPDATE user_date SET name= :name, surname= :surname, email= :email, age= :age WHERE id=:id");
$stmt->execute([
    'id'=> $id,
    'name' => $name,
    'surname' => $surname,
    'email' => $email,
    'age' => $age ,
]);



header("Location: /S1-L3-L4-Database%20MySQL-parte1-2/index.php");