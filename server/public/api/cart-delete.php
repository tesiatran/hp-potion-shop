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
  $query = "DELETE FROM `cartItems` WHERE `productID` = " . $id;
} else if ($jsonData['cartID']) {
  $cartID = $jsonData['cartID'];
  if (gettype($cartID) !== 'integer') {
    throw new Exception('ID must be a number');
  }
  if (intval($cartID) < 1) {
    throw new Exception('ID must be a number greater than 0');
  }
  $query = "DELETE FROM `cartItems` WHERE `cartID` = " . $cartID;
} else {
  throw new Exception('ID is required to delete from cart');
}



?>
