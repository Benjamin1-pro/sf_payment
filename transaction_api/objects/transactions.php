<?php

class Transactions
 {
   // database connection and table name
    private $conn;
    private $table_name = "transactions";

    // object properties
    public $id;
    public $amount;
    public $bankslip_number;
    public $account_number;
    public $account_name;
    public $category_name;
    public $reason;
    public $payment_date;

  // constructor with $db as database connection
   function __construct($db)
   {
     $this->conn = $db;
   }

   function read_transaction()
   {
     $query = "SELECT id, amount, bankslip_number, account_number, category_name, reason, payment_date FROM transactions";

     // prepare query statement
     $stmt = $this->conn->prepare($query);

     // execute query
     $stmt->execute();

     return $stmt;
   }
 }
