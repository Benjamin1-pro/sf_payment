<?php

class CurlRequest extends CI_Model
{
  public $token;
  public function __construct()
	{
		$this->load->model('constants');
	}

  function curl_request($pending_id = null, $transactionID = null)
  {	// Initializes a new cURL session
    $curl = curl_init();
    $credentials = $this->constants->api_credentials();
    $credentials = $credentials['equity'];
    $api_name = $credentials['api_name'];
    $clientID = $credentials['account_id'];
    $api_key = $credentials['api_key'];
    $endpoint = $credentials['endpoints'];
    $endpoint = $endpoint['private'];

		$data = '{
              	"name":"'.$api_name.'",
              	"param":{
                  "clientID":"'.$clientID.'",
                  "api_key":"'.$api_key.'"
              			}
              }';

		curl_setopt($curl, CURLOPT_URL, "".$endpoint."");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
    $error = curl_error($curl);
    if ($error) {
      echo 'Curl Error: ' . $error;
    }else {

      $result = json_decode($response);

      $result = (Array)$result;
      $result = (Array)$result['message'];
      $result = $result['token'];
      $token = $result;
      $this->token = $token;
      // Close cURL session
      curl_close($curl);


      //Call second web service
      $curl = curl_init();
      if ($pending_id) {
        curl_setopt($curl, CURLOPT_URL, "".$endpoint."".$pending_id."");
      }else {
        curl_setopt($curl, CURLOPT_URL, "".$endpoint."");
      }
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_ENCODING, "");
      curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
      curl_setopt($curl, CURLOPT_TIMEOUT, 0);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
      if ($transactionID) {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, '{ "transactionID":'.$transactionID.'}');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer $token",
          "Content-Type: application/json"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        return $response;
      }
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $token",
        "Content-Type: application/json"
      ));

			$response = curl_exec($curl);

			curl_close($curl);
			$response = json_decode($response);

			$response = (Array)$response;
			$response = $response['data'];
			// print_r($response);
}
			return $response;
	}
}
