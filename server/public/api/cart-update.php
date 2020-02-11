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
} else {
  throw new Exception('ID is required to update cart');
}

if ($jsonData['count']) {
  $count = $jsonData['count'];
} else {
  throw new Exception('Could not get item count');
}

if (array_key_exists('cartID', $_SESSION)) {
  $cartID = $_SESSION['cartID'];
} else {
  $cartID = false;
}

$updateQuery = "UPDATE `cartItems` SET count = {$count} WHERE `productID` = {$id}";
$updateQueryResult = mysqli_query($conn, $updateQuery);

?>
