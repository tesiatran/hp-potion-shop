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

?>
