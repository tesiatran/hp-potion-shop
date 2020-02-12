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

if (array_key_exists('cart_id', $_SESSION)) {
  $cartID = $_SESSION['cart_id'];
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
  $_SESSION['cart_id'] = $cartID;
}

$cartQuery = "INSERT INTO `cart_items`
              SET `cart_items.count` = $count,
                  `cart_items.product_id` = $id,
                  `cart_items.price` = $price,
                  `cart_items.added` = NOW(),
                  `cart_items.cart_id` = $cartID
              ON DUPLICATE KEY UPDATE `cart_items.count` = `cart_items.count` + $count";
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
