<?php

require_once('functions.php');

if (!INTERNAL) {
  print('Direct access is not allowed');
  exit();
};

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
  throw new Exception('ID is required to add to cart');
};

if ($jsonData['count']) {
  $count = $jsonData['count'];
};

if (array_key_exists('cartID', $_SESSION)) {
  $cartID = $_SESSION['cartID'];
} else {
  $cartID = false;
};

$priceQuery = "SELECT `price` FROM `products` WHERE `products.id` = $id";
$priceResult = mysqli_error($conn, $priceQuery);

if (!$priceResult) {
  throw new Exception('Price connection failed');
};

$rowCount = mysqli_num_rows($priceResult);

if ($rowCount === 0) {
  throw new Exception('Invalid product ID: ' . $id);
};

$productData = [];

while ($row = mysqli_fetch_assoc($priceResult)) {
  $productData[] = $row;
};

$price = $productData[0]['price'];

$transactionQuery = "START TRANSACTION";
$transactionResult = mysqli_query($conn, $transactionQuery);

if (!$transactionResult) {
  throw new Exception('Transaction connection failed');
};

if ($cartID === false) {
  $insertQuery = "INSERT INTO `cart` SET `created` = NOW()";
  $insertResult = mysqli_query($conn, $insertQuery);

  if (!$insertResult) {
    throw new Exception('Insert connection failed');
  }
}

?>
