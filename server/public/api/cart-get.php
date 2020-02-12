<?php

require_once('functions.php');

if (!INTERNAL) {
  print('Direct access is not allowed');
  exit();
}

if (empty($_SESSION['cart_id'])) {
  print(getBodyData([]));
  exit('No cart exists');
} else {
  $cartID = intval($_SESSION['cart_id']);
}

$getQuery = "SELECT `cart_items.cart_id`, `cart_items.count`, `cart_items.price`, `products.id`, `products.name`, `products.brand`, `products.description`, `products.image`
          FROM `cart_items`
          INNER JOIN `products`
          ON `cart_items.product_id` = `products.id`
          WHERE `cart_items.cart_id` = {$cartID}";
$getQueryResult = mysqli_query($conn, $getQuery);

if (!$getQueryResult) {
  throw new Exception('Failed to get');
}

$output = [];
while ($row = mysqli_fetch_assoc($getQueryResult)) {
  $output[] = $row;
}

if ($output === []) {
  print('[]');
  exit();
} else {
  print(json_encode($output));
}

?>
