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

$stmt = $pdo->prepare("SELECT *  FROM user_date WHERE id = ?");
$stmt->execute([$id]);


$row = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Details</title>
</head>
<body class="bg-dark text-white">
    <h1 class="display-2 text-center my-5">Dettagli User:</h1>
    <div class="card col-6 mx-auto" >
  <img src="https://images.pexels.com/photos/268533/pexels-photo-268533.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" height="100rem" style="object-fit: cover;" alt="panorama">
  <div class="card-body d-flex flex-column ">
    <h5 class="card-title display-6 text-center"><?= $row["name"] ?> <?= $row["surname"] ?></h5>
    <p class="card-text ">Age: <?= $row["age"] ?> </p>
    <p class="card-text">Email: <?= $row["email"] ?> </p>
    <a href=" /S1-L3-Database%20MySQL-parte1/index.php" class="btn btn-outline-success ms-auto">Go Back</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>