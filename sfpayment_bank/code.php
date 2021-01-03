<?php
require 'controllers/Bank.php';
$Bank = new Bank();
echo var_char($Bank->get_kyc());
 ?>
