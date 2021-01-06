<?php
require_once('curl.php');
$result = new Transaction;
$data = $result->update_transactionID();

if ($data) {
  echo "Updated";
}
else {
  echo "Not Updated";
}
 ?>
