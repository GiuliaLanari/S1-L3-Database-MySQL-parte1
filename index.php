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


// SELECT * FROM user_date LIMIT 5;




$search= $_GET["search"] ?? "";

$stmt = $pdo->prepare('SELECT * FROM user_date WHERE name LIKE ? LIMIT 5 OFFSET');
$stmt->execute(["%$search%"]);


// $limit = 2;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $offset = ($page - 1) * $limit;
// $stmt = $pdo->prepare('SELECT * FROM client LIMIT :limit OFFSET :offset');
// $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
// $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
// $stmt->execute();
// $paginated_results = $stmt->fetchAll();



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
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
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
while ($row = $stmt->fetch())
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
<nav aria-label="Page navigation example bg-black text-white">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>