<?php

header('Content-Type: application/json');

require_once('functions.php');
require_once('db_connection.php');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
  readfile('dummy-cart-items.json');
} else if ($method == 'POST') {
  http_response_code(201);
  print($item);
} else {
  http_response_code(404);
  print(json_encode([
    'error' => 'Not Found',
    'message' => "Cannot $method /api/cart.php"
  ]));
}

?>
