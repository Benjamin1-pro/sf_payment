<?php
require_once('constants.php');

class Rest
{
  protected $request;
  protected $serviceName;
  protected $param;
  protected $transactionID;
  protected $dbConnect;
  public $apiversion;
  public $ressource;
  public $ressource_id;
  public $kyc_id;
  public $clientID;
  public $token;
  public $account_number;

  public function __construct()
  {
    $db = new Database();
    $this->dbConnect = $db->getConnection();
    $this->apiversion = $_GET['version'];
    $this->ressource = $_GET['request'];

    if(isset($_GET['request_id'])){
      $this->ressource_id = $_GET['request_id'];
    }

    $file = fopen('php://input', 'r');
    $this->request = stream_get_contents($file);
    $this->validateRequest($this->request);

    if ("transactionlistupdated" != strtolower($this->serviceName)) {
      $this->validateToken();
    }
  }

  public function validateRequest($request)
  {
    if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
      $this->throwError(REQUEST_CONTETTYPE_NOT_VALID, 'Request content-type is not valid');
    }
    $data = json_decode($this->request, true);
    if (isset($data['name'])) {
      $this->serviceName = $data['name'];
    }

    if (isset($data['transactionID'])) {
      $this->transactionID = $data['transactionID'];
    }
    if (isset($data['param'])){
      $this->param = $data['param'];
    }

  }

  public function version_ressource_validation()
  {
      switch ($this->apiversion) {
        case 'v1':
            switch ($this->ressource) {
              case 'payments':

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                  if($this->ressource_id){
                    $this->serviceName="getCustomerTransationsDetails";
                  }
                  else{
                        $this->serviceName="getCustomerTransations";
                  }
                  $this->processApi();
                }
                elseif ($_SERVER['REQUEST_METHOD'] == 'PUT'){
                  if($this->validateToken()){
                    $this->serviceName="updateTransactionStatus";
                    $this->processApi();
                  }
                  else{
                        $this->returnResponse(ACCESS_TOKEN_ERRORS,'Access Denied');
                 }
                }
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $this->serviceName="transactionListUpdated";
                  $this->processApi();
                }
              break;
              default:
                  $this->returnResponse(BAD_REQUEST,'Ressource Not Found');
                break;
            }
        break;
        default:
            $this->returnResponse(BAD_REQUEST,'Invalid API Version');
        break;
      }

  }


  public function processApi()
  {
    $api = new API;
    if (!method_exists($api, $this->serviceName)) {
                    $this->returnResponse(BAD_REQUEST,'Bad request');
    }else{

      $rMethod = new reflectionMethod('API', $this->serviceName);
      $rMethod->invoke($api);
    }

  }
  public function validateParameter($fieldname, $value, $dataType, $required = true)
  {
    if ($required == true && empty($value) == true) {
      $this->throwError(VALIDATE_PARAMETER_REQUIRED, $fieldname.' Parameter is required');
    }

    switch ($dataType) {
      case 'BOOLEAN':
        if (!is_bool($value)) {
          $this->throwError(VALIDATE_PARAMETER_DATATYPE, 'Datatype is not valid for '.$fieldname.'. It should be boolean.');
        }
        break;
      case 'INTEGER':
        if (!is_numeric($value)) {
          $this->throwError(VALIDATE_PARAMETER_DATATYPE, 'Datatype is not valid for '.$fieldname.'. It should be numeric');
        }
        break;
      case 'STRING':
        if (!is_string($value)) {
          $this->throwError(VALIDATE_PARAMETER_DATATYPE, 'Datatype is not valid for '.$fieldname.'. It should be a string');
        }
        break;

      default:
        break;
    }
     return $value;
  }

  public function throwError($code, $message)
  {
    header("content-type: application/json");
    $errorMsg = json_encode(['Error' => ['status'=> $code, 'message'=>$message]]);
    echo $errorMsg; exit;
  }

  public function returnResponse($code,$message,$data = array())
  {
    header("content-type: application/json");
    $response = json_encode(['status'=>$code, 'message' => $message, 'count' => count($data), 'data' => $data]);
    echo $response; exit;
  }

  // Get hearder authorization
 public function getAuthorizationHeader(){
   $headers = null;
   if (isset($_SERVER['Authorization'])) {
     $headers = trim($_SERVER['Authorization']);
   }
   elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
     // Nginx or fast CGI
     $headers = trim($_SERVER['HTTP_AUTHORIZATION']);
   }elseif (function_exists('apache_request_headers')) {
     $requestHeaders =  apache_request_headers();
     $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
     if (isset($requestHeaders['Authorization'])) {
       $headers = trim($requestHeaders['Authorization']);
     }
   }
   return $headers;
 }
 // get access token from header

 public function getBearerToken(){
   $headers = $this->getAuthorizationHeader();
   // HEADER: Get the access token from the header
   if (!empty($headers)) {
     if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
       return $matches[1];
     }
   }
   $this->throwError(AUTHORIZATION_HEADER_NOT_FOUND, "Access token not found");
 }

 public function validateToken(){

   try {
     $token = $this->getBearerToken();

     $myData = base64_decode($token);
     $myData = explode("::", $myData);

     if(count($myData)!=2  ) return false;
     $random_string = $myData[0];
     $api_key = $myData[1];

     $statement = $this->dbConnect->prepare("SELECT * FROM api_keys WHERE api_key = :api_key AND random_string = :random_string");
     $statement->bindParam(":api_key", $api_key);
     $statement->bindParam(":random_string", $random_string);
     $statement->execute();
     $result1 = $statement->fetch(PDO::FETCH_ASSOC);
       if ($result1) {
         $this->kyc_id = $result1['kyc_id'];
         $kyc_id = $this->kyc_id;
         $query = $this->dbConnect->prepare("SELECT * FROM kyc WHERE id = :kyc_id");
         $query->bindParam(":kyc_id", $kyc_id);
         $query->execute();
         $result = $query->fetch(PDO::FETCH_ASSOC);
         $this->account_number = $result['account_number'];
         // print_r($result1);
        return true;
       }
       else {
        return false ;
       }
     } catch (Exception $e) {
       $this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());
     }

 }
}

?>
