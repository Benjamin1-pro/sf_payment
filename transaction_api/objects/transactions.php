<?php
class Transactions{
  
    // database connection and table name
    private $conn;
    private $table_name = "transactions";
  
    // object properties
    public $id;
    public $amount;
    public $bankslip_number;
    public $account_number;
    public $account_name;
    public $reason;
    public $payment_date;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read transactions
    function read(){
  
    // select all query
    $query = "SELECT
                    id, amount, bankslip_number, account_number, account_name, reason, payment_date
                FROM
                    " . $this->table_name . "
                ORDER BY
                    payment_date";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
    }
}

?>