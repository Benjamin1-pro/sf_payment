<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/transactions.php';
  
// instantiate database and transaction object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$transaction = new Transactions($db);
  
// query 
$stmt = $transaction->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // transaction array
    $transaction_arr=array();
    $transaction_arr["records"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
  
        $transaction_data=array(
            "id" => $id,
            "amount" => $amount,
            "bankslip_number" => $bankslip_number,
            "account_number" => $account_number,
            "account_name" => $account_name,
            "reason" => $reason,
            "payment_date" => $payment_date,
        );
  
        array_push($transaction_arr["records"], $transaction_data);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show transactions data in json format
    echo json_encode($transaction_arr);
}
  else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no transaction found
    echo json_encode(
        array("message" => "No transaction found.")
    );
}
