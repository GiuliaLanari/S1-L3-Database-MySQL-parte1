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

$stmt = $pdo->prepare("SELECT * FROM user_date WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>form</title>
</head>
<body class="bg-dark text-white">
    <h1 class="display-2 text-center my-5">Modifica:</h1>
<div class="row justify-content-center mx-auto"> 
<form  action="/S1-L3-L4-Database%20MySQL-parte1-2/edit.php" method="post" class="col-5  g-3 needs-validation " > 
  <input type="hidden" name="id" value="<?= $id ?>">
    <div>
  <div class="col-md-12" >
    <label for="name" class="form-label">Name:</label>
    <input type="text" name="name" class="form-control " id="name" placeholder="Name" value="<?=$row["name"] ?>" >
  
  </div>
  <div class="col-md-12">
    <label for="surname" class="form-label">Surname:</label>
    <input type="text" class="form-control" name="surname" id="surmane" placeholder="Surname" value="<?=$row["surname"] ?>" >
   
  </div>

  <div class="col-md-12">
      <label for="email" class="form-label">Email:</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?=$row["email"] ?>"   >
      
    </div>
  <div class="col-md-12">
      <label for="age" class="form-label">Age:</label>
      <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?=$row["age"] ?>"   >
      
    </div>
   
  
  <div class="col-12 justify-content-center d-flex">
    <button class="btn btn-success mt-4" type="submit">Modifica</button>
  </div>
</form>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>