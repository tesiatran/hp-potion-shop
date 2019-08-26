<?php
  require_once "functions.php";
  set_exception_handler("error_handler");
  startup();

  require_once "db_connection.php";
  if(!$conn) {
    throw new Exception("ERROR: " . mysqli_connect_error());
  };

  $id = $_GET["id"];

  if(empty($id)) {
    $whereClause = "";
  } else {
    $whereClause = "WHERE `id`={$id}";
    if(!is_numeric($id)) {
      throw new Exception("The id needs to be a number.");
    }
  };

  $query = "SELECT * FROM `products`" . $whereClause;

  $result = mysqli_query($conn, $query);

  if(!$result) {
    throw new Exception("ERROR: " . mysqli_error($conn));
    exit();
  }

  $rows = mysqli_num_rows($result);

  if(!$rows) {
    throw new Exception("Invalid ID: {$id}");
  }

  $output = [
    "success" => "true",
    "data" => []
  ];

  while($product = mysqli_fetch_assoc($result)) {
    $output["data"][] = $product;
  }

  $json_output = json_encode($output["data"]);
  print($json_output);
?>
