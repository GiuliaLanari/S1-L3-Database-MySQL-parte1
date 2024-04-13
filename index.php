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

$search= $_GET["search"] ?? "";

$page = $_GET["page"]?? 1;
$per_page = $_GET["per_pAGE"]?? 5;
$per_page= $per_page > 50 ? 5 : $per_page;

$offset = ($page -1)* $per_page;


$stmt = $pdo->prepare('SELECT * FROM user_date WHERE name LIKE :search LIMIT :per_page OFFSET :offset ');
$stmt->execute([
  "search" =>"%$search%",
  "per_page" => "$per_page",
  "offset"=> "$offset"
]);

$utenti= $stmt->fetchAll();


$stmt = $pdo->prepare("SELECT COUNT(*) AS num_utenti FROM user_date WHERE name LIKE :search");
$stmt->execute([
 
  "search"=> "%&search%"
]);

$num_utenti= $stmt->fetch()["num_utenti"];
$tot_pages= ceil($num_utenti / $per_page);


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
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
  <h1 class="display-6">Nomi di tutti gli utenti:</h1>

      <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search"  aria-label="Search" name="search" value="<?= $search ?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
<div class="row justify-content-center">
<div class="text-center mt-5" >
<a class="btn btn-success  " href= "http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/form-add.php">Add New</a>
</div>
<div class="col-xs-10 col-md-8 col-lg-5  mt-5">
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
foreach ($utenti as $row)
{?><tr><?php
     echo "<td>$row[name]</td>";
     echo "<td>$row[surname]</td>";
     ?>
     <td>
     <a class="btn btn-primary" href= "http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/form.php/?id=<?=$row['id'] ?>">Edit</a>
     <a class="btn btn-danger" href=  "http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/delete.php/?id=<?=$row['id'] ?>">Delete</a>
     <a class="btn btn-info" href=  "http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/info.php/?id=<?=$row['id'] ?>">Info</a>
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

<div class="d-flex justify-content-center mt-5">

  <nav>
  <ul class="pagination ">

  <li class="page-item <?= $page === 1 ? ' disabled' : '' ?>">
     <a
        class="page-link"
        href="http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>"
      >Previous</a>
  </li><?php

for ($i=1; $i <= $tot_pages; $i++) {?>

  <li class="page-item <?= $page === $i ? ' active': '' ?>">
      <a
          class="page-link"
          href="http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"
      ><?= $i ?></a>
  </li><?php
} ?>

<li class="page-item<?= $page === $tot_pages ? ' disabled' : '' ?>">
<a
  class="page-link"
  href="http://localhost/S1-L3-L4-Database%20MySQL-parte1-2/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>"
>Next</a>
</li>



  </ul>
</nav>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>