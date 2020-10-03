<?php
function createSchema($row) {
  $response = array();
  $response['id'] = $row['id'];
  $response['name'] = $row['name'];
  $response['cursorColor'] = $row['cursor_color'];
  $response['foreground'] = $row['foreground'];
  $response['background'] = $row['background'];
  $response['colors'] = explode(',', $row['colors']);
  return $response;
}
header('Content-Type: application/json');

$conn = new PDO('pgsql:host=db;dbname=xresources;', 'plump', 'matthew');
$query = 'SELECT * FROM "schemas"';

// If id is provided - return only this schema
if (isset($_GET['id'])) {
  $query = $query . " WHERE id = $_GET[id]";
  $res = $conn->query($query);
  if ($res) {
    echo json_encode(createSchema($res->fetch(PDO::FETCH_ASSOC)));
    $conn = null;
    exit();
  } else {
    echo json_encode(array(
      "error" => true,
      "message" => "Schema with id `$_GET[id]` is not found"
    ));
    $conn = null;
    die();
  }
}

if (isset($_GET['count'])) {
  $query = $query . " LIMIT $_GET[count]";
}
if (isset($_GET['offset'])) {
  $query = $query . " OFFSET $_GET[offset]";
}

$res = $conn->query($query);
$schemas = array();
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
  $schemas[] = createSchema($row);
}
$conn = null;
echo json_encode($schemas);
