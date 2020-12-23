<?php

class Database
{
  //Database specifications
  private $host = "localhost";
  private $dbname = "sfpayment_bank";
  private $username = "root";
  private $password = "";
  public $connection;

  public function get_connection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");

    } catch (PDOException $exception) {

      echo "Connection error: " . $exception->getMessage();

    }
    return $this->conn;
  }
}
