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
  if (gettype($id) !== 'integer') {
    throw new Exception('ID must be a number');
  }
  if (intval($id) < 1) {
    throw new Exception('ID must be a number greater than 0');
  }
  $deleteQuery = "DELETE FROM `cart_items` WHERE `product_id` = " . $id;
} else if ($jsonData['cart_id']) {
  $cartID = $jsonData['cart_id'];
  if (gettype($cartID) !== 'integer') {
    throw new Exception('ID must be a number');
  }
  if (intval($cartID) < 1) {
    throw new Exception('ID must be a number greater than 0');
  }
  $deleteQuery = "DELETE FROM `cart_items` WHERE `cart_id` = " . $cartID;
} else {
  throw new Exception('ID is required to delete from cart');
}

if (array_key_exists('cart_id', $_SESSION)) {
  $cartID = $_SESSION['cart_id'];
} else {
  $cartID = false;
}

$deleteQueryResult = mysqli_query($conn, $deleteQuery);

if (!$deleteQueryResult) {
  throw new Exception('Failed to delete');
}

?>
