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

function getSchema($id) {
  $conn = new PDO('pgsql:host=db;dbname=xresources;', 'plump', 'matthew');
  $query = 'SELECT * FROM "schemas"'
    . " WHERE id=$id";
  $res = $conn->query($query);
  if ($res) {
    $res = createSchema($res->fetch(PDO::FETCH_ASSOC));
    $conn = null;
    return $res;
  } else {
    $conn = null;
    return false;
  }
}

function getSchemas($count, $offset) {
  $conn = new PDO('pgsql:host=db;dbname=xresources;', 'plump', 'matthew');
  $query = 'SELECT * FROM "schemas"';
  if (isset($count)) {
    $query = $query . " LIMIT $count";
  }
  if (isset($offset)) {
    $query = $query . " OFFSET $offset";
  }
  $res = $conn->query($query);
  $schemas = array();
  while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $schemas[] = createSchema($row);
  }
  $conn = null;
  return $schemas;
}
