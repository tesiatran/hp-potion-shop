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
  throw new Exception('ID is required to add to cart');
}

if ($jsonData['count']) {
  $count = $jsonData['count'];
}

if (array_key_exists('cartID', $_SESSION)) {
  $cartID = $_SESSION['cartID'];
} else {
  $cartID = false;
}

$priceQuery = "SELECT `price` FROM `products` WHERE `products.id` = $id";
$priceQueryResult = mysqli_error($conn, $priceQuery);

if (!$priceQueryResult) {
  throw new Exception('Price connection failed');
}

$rowCount = mysqli_num_rows($priceQueryResult);

if ($rowCount === 0) {
  throw new Exception('Invalid product ID: ' . $id);
}

$productData = [];

while ($row = mysqli_fetch_assoc($priceQueryResult)) {
  $productData[] = $row;
}

$price = $productData[0]['price'];

$transactionQuery = "START TRANSACTION";
$transactionQueryResult = mysqli_query($conn, $transactionQuery);

if (!$transactionQueryResult) {
  throw new Exception('Transaction connection failed');
}

if ($cartID === false) {
  $insertQuery = "INSERT INTO `cart` SET `created` = NOW()";
  $insertQueryResult = mysqli_query($conn, $insertQuery);

  if (!$insertQueryResult) {
    throw new Exception('Insert connection failed');
  }

  if (mysqli_affected_rows($conn) !== 1) {
    throw new Exception('Number of affected rows should be 1');
  }

  $cartID = mysqli_insert_id($conn);
  $_SESSION['cartID'] = $cartID;
}

$cartQuery = "INSERT INTO `cartItems`
              SET `cartItems.count` = $count,
                  `cartItems.productID` = $id,
                  `cartItems.price` = $price,
                  `cartItems.added` = NOW(),
                  `cartItems.cartID` = $cartID
              ON DUPLICATE KEY UPDATE `cartItems.count` = `cartItems.count` + $count";
$cartQueryResult = mysqli_query($conn, $cartQuery);

if (!$cartQueryResult) {
  throw new Exception('Cart connection failed');
}

if (mysqli_affected_rows($conn) < 1) {
  $rollback = "ROLLBACK";
  mysqli_query($conn, $rollback);
  throw new Exception('Number of affected rows is not equal to at least 1');
} else {
  $commit = "COMMIT";
  mysqli_query($conn, $commit);
}

?>
