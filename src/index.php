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
$res = $conn->query('SELECT * FROM "schemas";');

;
echo '<pre>';
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
  var_dump($row);
}
echo '</pre>';
?>
</body>
</html>

