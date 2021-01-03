<?php
require_once('constants.php');

class Rest
{
  protected $request;
  protected $serviceName;
  protected $param;
  protected $dbConnect;
  public $kyc_id;
  public $account_number;

  public function __construct()
  {
    $db = new Database();
    $this->dbConnect = $db->getConnection();

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->throwError(REQUEST_METHOD_NOT_VALID, 'Request Method is not valid');
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
    if (!isset($data['name']) || $data['name'] == "") {
      $this->throwError(API_NAME_REQUIRED, 'API Name required');
    }
    $this->serviceName = $data['name'];

    if (!is_array($data['param'])) {
      $this->throwError(API_PARAM_REQUIRED, 'API Param is required');
    }
    $this->param = $data['param'];
  }

  public function processApi()
  {
    $api = new API;
    $rMethod = new reflectionMethod('API', $this->serviceName);
    if (!method_exists($api, $this->serviceName)) {
      $this->throwError(API_DOES_NOT_EXIST, 'API does not exist');
    }
    $rMethod->invoke($api);
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

  public function returnResponse($code, $data)
  {
    header("content-type: application/json");
    $response = json_encode(['Response' => ['status'=>$code, $data]]);

    // $Array = $response->Response;
    // $Array =  (Array) $Array;
    // $response = ($Array[0]);
    // $request = (Array)($response);
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
     $payload = JWT::decode($token, SECRET_KEY, ['HS256']);
     $this->kyc_id = $payload->kyc_id;

     $statement = $this->dbConnect->prepare("SELECT account_number FROM kyc WHERE id = :kyc_id");
     $statement->bindParam(":kyc_id", $this->kyc_id);
     $statement->execute();
     $result1 = $statement->fetch(PDO::FETCH_ASSOC);
     $this->account_number = $result1['account_number'];

   } catch (Exception $e) {
     $this->throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());
   }

 }
}

?>
