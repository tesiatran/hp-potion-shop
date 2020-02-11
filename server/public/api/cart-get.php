<?php

require_once('functions.php');

if (!INTERNAL) {
  print('Direct access is not allowed');
  exit();
}

if (empty($_SESSION['cartID'])) {
  print(getBodyData([]));
  exit('No cart exists');
} else {
  $cartID = intval($_SESSION['cartID']);
}

$query = "SELECT cartItems.cartID, cartItems.count, cartItems.price, products.id, products.name, products.image, products.shortDescription, products.longDescription
          FROM cartItems
          INNER JOIN products
          ON cartItems.productID = products.id
          WHERE cartItems.cartID = {$cartID}";

?>
