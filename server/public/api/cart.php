<?php

header('Content-Type: application/json');

require_once('functions.php');
require_once('db_connection.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
  case 'GET':
    http_response_code(200);
    require_once('cart-get.php');
    break;
  case 'POST':
    http_response_code(201);
    require_once('cart-add.php');
    break;
  case 'DELETE':
    require_once('cart-delete.php');
    break;
  case 'PUT':
    require_once('cart-update.php');
    break;
  default:
    http_response_code(404);
    print(json_encode([
      'error' => 'Not Found',
      'message' => "Cannot $method /api/cart.php"
    ]));
}

?>
