<?php
include_once "/var/www/html/src/list.php";
header('Content-Type: application/json');

if (isset($_GET['id'])) {
  $schema = getSchema($_GET['id']);
  if ($schema) {
    echo json_encode($schema);
    exit();
  } else {
    echo json_encode(array(
      'error' => true,
      'message' => "Schema with `id`=$_GET[id] is not exists"
    ));
    die();
  }
}
$schemas = getSchemas($_GET['count'], $_GET['offset']);
echo json_encode($schemas);
