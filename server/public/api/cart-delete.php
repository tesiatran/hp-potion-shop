<?php

require_once('functions.php');

if (!INTERNAL) {
  print('Direct access is not allowed');
  exit();
}

$item = file_get_contents('php://input');
$jsonData = getBodyData($item);

if ($jsonData['id']) {
  $id = $jsonData['id'];

  if (intval($id) < 1) {
    throw new Exception('ID must be greater than 0');
  }
}

?>
