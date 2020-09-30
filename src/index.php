<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Testing live edit</title>
</head>
<body>
<h1>Will it work?</h1>
 <?php
$conn = new PDO('pgsql:host=db;dbname=xresources;', 'plump', 'matthew');
$res = $conn->query("SELECT *
FROM pg_catalog.pg_tables;");

$row = $res->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($row);
echo '</pre>';
?>
</body>
</html>

