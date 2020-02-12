<?php

  require_once('functions.php');
  require_once('db_connection.php');
  set_exception_handler('error_handler');
  startUp();

  $query = "SELECT * FROM `products`";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    throw new Exception("ERROR: " . mysqli_error($conn));
    exit();
  }

  // if (empty($_GET['id'])) {
  //   $whereClause = "";
  // } else {
  //   $id = $_GET['id'];
  //   $whereClause = "WHERE products.id = {$id}";
  //   if(!is_numeric($id)) {
  //     throw new Exception('ID must be a number');
  //   }
  // };

  // $query = "SELECT * FROM `products`" . $whereClause;
  // $result = mysqli_query($conn, $query);

  // $rows = mysqli_num_rows($result);

  // if (!$rows) {
  //   throw new Exception("Invalid ID: {$id}");
  // }

  $output = [
    'success' => 'true',
    'data' => []
  ];

  while ($product = mysqli_fetch_assoc($result)) {
    $output['data'][] = $product;
  }

  $json_output = json_encode($output);
  print($json_output);


  // $output = file_get_contents('dummy-products-list.json');
  // print($output);

?>
