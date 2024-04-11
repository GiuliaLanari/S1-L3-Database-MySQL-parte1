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
<body>

<h1>Nomi di tutti gli utenti:</h1>
<ul>
<?php
while ($row = $stmt->fetch())
{
    // echo '<pre>' . print_r($row, true) . '</pre>';
    echo "<li>$row[name]$row[surname]$row[age]$row[email]</li>";
};
?>


</ul>
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <?php
while ($row = $stmt->fetch())
{
    echo "<td>$row[name]</td>";
    echo "<td>$row[surname]</td>";
    echo "<td>$row[age]</td>";
    echo "<td>$row[email]</td>";
};
?>
    </tr>
   
  </tbody>
</table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>