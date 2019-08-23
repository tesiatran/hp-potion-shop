<?php

  require_once "functions.php";

  set_exception_handler("error_handler");

  require_once "db_connection.php";

  if($conn) {
    throw new Exception("ERROR: ", mysqli_connect_error());
  };

  $output = file_get_contents("dummy-products-list.json");

  print($output);

?>
