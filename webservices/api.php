<?php

class Api extends Rest
{

  public function __construct()
  {
    parent::__construct();

  }

  public function transactionListUpdated()
  {
    $api_key  = $this->validateParameter('api_key', $this->param['api_key'], STRING);
    $clientID =  $this->validateParameter('clientID', $this->param['clientID'], STRING);
    try {

        $token = base64_encode($clientID.'::'.$api_key);

        $data = ['token' => $token];
        $this->token = $data;
        $this->returnResponse(SUCCESS_RESPONSE, $data);


      } catch (Exception $e) {
          $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
        }
  }

  public function getCustomerTransations(){
    $this->validateToken();
    $accNumber = $this->account_number;
    $status = "pending";

    // select all query
    $info = "SELECT * FROM transactions WHERE account_number = :accNumber AND status = :status";
    $sql = $this->dbConnect->prepare($info);
    $sql->bindParam(":accNumber", $accNumber);
    $sql->bindParam(":status", $status);
    $sql->execute();

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $response[] = $row;
    }

    if (@!is_array($response)) {
      $this->returnResponse(SERVER_ERROR, 'transaction details are not found in database');
    }
    else {
      $this->returnResponse(SUCCESS_RESPONSE, 'Transaction found.', $response);
    }
  }

  public function getCustomerTransationsDetails(){
    $this->validateToken();
    $kyc_id = $this->kyc_id;
    $accNumber = $this->account_number;
    $ressource_id = $this->ressource_id;
    $status = "Pending";

    // select all query
    $info = "SELECT * FROM transactions WHERE account_number = :accNumber AND status = :status AND id = :ressource_id";
    $sql = $this->dbConnect->prepare($info);
    $sql->bindParam(":accNumber", $accNumber);
    $sql->bindParam(":status", $status);
    $sql->bindParam(":ressource_id", $ressource_id);
    $sql->execute();

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $response[] = $row;
    }

    if (@!is_array($response)) {
      $this->returnResponse(SERVER_ERROR,  'transaction   not found ');
    }
    else {
      $this->returnResponse(SUCCESS_RESPONSE,'transaction found', $response);
    }
  }

  public function updateTransactionStatus()
  {
    $status = "Approved";
    $transactionID = $this->validateParameter('status', $this->transactionID, INTEGER, false);

    $sql = "UPDATE transactions SET status = :status WHERE id = :transactionID";
    $query = $this->dbConnect->prepare($sql);
    $query->bindParam(":status", $status);
    $query->bindParam(":transactionID", $transactionID);
    $result = $query->execute();
    if ($result) {
      $this->returnResponse(SUCCESS_RESPONSE,'transactions updated' );
    }
    else {
      $this->returnResponse(SERVER_ERROR,  'transaction update failed ');
    }
  }
}

?>
