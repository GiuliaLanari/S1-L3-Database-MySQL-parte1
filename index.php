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

$stmt = $pdo->query('SELECT * FROM user_date');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tabella nome utenti</title>
</head>
<body class="bg-dark text-white">
<div class="container">
<div class="row justify-content-center">
<h1 class="display-3">Nomi di tutti gli utenti:</h1>
<div >
<a class="btn btn-success" href= "http://localhost/S1-L3-Database%20MySQL-parte1/form-add.php">Add New</a>
</div>

<div class="col-5 ">
<table class="table table-dark table-striped p-2 ">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Details</th>

    </tr>
  </thead>
  <tbody>
    
      
      <?php
while ($row = $stmt->fetch())
{?><tr><?php
     echo "<td>$row[name]</td>";
     echo "<td>$row[surname]</td>";
     ?>
     <td>
     <a class="btn btn-primary" href= "http://localhost/S1-L3-Database%20MySQL-parte1/form.php/?id=<?=$row['id'] ?>">Edit</a>
     <a class="btn btn-danger" href=  "http://localhost/S1-L3-Database%20MySQL-parte1/delete.php/?id=<?=$row['id'] ?>">Delete</a>
     <a class="btn btn-info" href=  "http://localhost/S1-L3-Database%20MySQL-parte1/info.php/?id=<?=$row['id'] ?>">Info</a>
    </td>
</tr>
    <?php
   
}
?>

 
   
  </tbody>
</table>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>