<?php

  require_once("functions.php");
  require_once("db_connection.php");
  set_exception_handler("error_handler");
  startUp();

  if (empty($_GET["id"])) {
    $whereClause = "";
  } else if (is_numeric($_GET["id"])) {
    $whereClause = "WHERE products.id = " . $_GET["id"];
  } else {
    throw new Exception("ID must be a number");
  }

  $query = "SELECT * FROM `products`" . $whereClause;
  $result = mysqli_query($conn, $query);
  $rows = mysqli_num_rows($result);

  if (!$result) {
    throw new Exception("ERROR: " . mysqli_error($conn));
  }

  if ($rows === 1) {
    $output = mysqli_fetch_assoc($result);
    $product = $output;
  } else {
    $output = [];
    while ($product = mysqli_fetch_assoc($result)) {
      $output[] = $product;
    }
  }

  // print_r($output);

  print(json_encode($output));

  // print_r($output);

  // $output = file_get_contents('dummy-products-list.json');
  // print($output);

?>
