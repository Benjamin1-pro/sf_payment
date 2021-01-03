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
try {

    $statement = $this->dbConnect->prepare("SELECT * FROM api_keys WHERE api_key = :api_key");
    $statement->bindParam(":api_key", $api_key);
    $statement->execute();
    $transaction = $statement->fetch(PDO::FETCH_ASSOC);
    // echo $transaction;
    if (!is_array($transaction)) {
      $this->returnResponse(INVALID_USER_PASS,'Client information is incorrect');
    }
    $this->kyc_id = $transaction['kyc_id'];

    $paylod = [
      'iat' => time(),
      'iss' => 'localhost',
      'kyc_id' => $transaction['kyc_id']
    ];
    $token =JWT::encode($paylod, SECRET_KEY);
    $data = ['token' => $token];
    $this->returnResponse(SUCCESS_RESPONSE, $data);

  } catch (Exception $e) {
      $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
    }
  }

  public function getCustomerDetails(){
    $kyc_id = $this->kyc_id;
    $accNumber = $this->account_number;
    // $accNumber = $this->validateParameter('accNumber', $this->param['accNumber'], STRING);
    // select all query
    $info = "SELECT * FROM transactions WHERE account_number = :accNumber";
    $sql = $this->dbConnect->prepare($info);
    $sql->bindParam(":accNumber", $accNumber);
    $sql->execute();
    // $result = $sql->fetch(PDO::FETCH_ASSOC);
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $response[] = $row;
      // $this->returnResponse(SUCCESS_RESPONSE, $response);
    }
    $this->returnResponse(SUCCESS_RESPONSE, $response);
    if (!is_array($response)) {
      $this->returnResponse(SUCCESS_RESPONSE, ['message' => 'transaction details are not found in database']);
    }
  }
}

?>
