<?php

require_once('functions.php');

if(!INTERNAL) {
  print('Direct access not allowed.');
  exit();
};

$item = file_get_contents('php://input');

?>
