<?php

  require_once('functions.php');
  require_once('db_connection.php');
  set_exception_handler('error_handler');
  startup();

  if (empty($_GET['id'])) {
    $whereClause = "";
  } else {
    $id = $_GET['id'];
    $whereClause = "WHERE `products.id` = {$id}";
    if(!is_numeric($id)) {
      throw new Exception('ID must be a number');
    }
  };

  $query = "SELECT * FROM `products`" . $whereClause;
  $result = mysqli_query($conn, $query);

  if (!$result) {
    throw new Exception("ERROR: " . mysqli_error($conn));
    exit();
  }

  $rows = mysqli_num_rows($result);

  if (!$rows) {
    throw new Exception("Invalid ID: {$id}");
  }

  $output = [];

  while ($product = mysqli_fetch_assoc($result)) {
    $output[] = $product;
  }

  $json_output = json_encode($output);
  print($json_output);

?>
