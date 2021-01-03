<?php

class ApirequestModel extends CI_Model
{

	public function request_api()
	{
		// Initializes a new cURL session
		$curl = curl_init();
		$data = '{
								"name":"transactionListUpdated",
								"param":{
											"api_key":"7yOXzvSGE%2FtOrUZDC2XlK6Noo4giP6Nol3nGJcElEJY%3D"
										}
							}';

		curl_setopt($curl, CURLOPT_URL, 'http://localhost/transaction_api/');
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
			$Ar = $result->Response;
			$Ar =  (Array) $Ar;
			$token = ($Ar[0]->token);
			// $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MDkzOTI1MTQsImlzcyI6ImxvY2FsaG9zdCIsImt5Y19pZCI6IjEifQ.4GMY9_dvYHxy0BbOTwUn9JOA8d2i9wNTMeUs3tfkkkU";
			// Close cURL session
			curl_close($curl);



			//Call second web service
			$curl = curl_init();

			$request = '{
										"name":"getCustomerDetails",
										"param":{
													"api_key":"7yOXzvSGE%2FtOrUZDC2XlK6Noo4giP6Nol3nGJcElEJY%3D"
												}
									}';

			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://localhost/transaction_api/",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $request,
				CURLOPT_HTTPHEADER => array(
					"authorization: Bearer $token",
					"content-type: application/json"
				),
			));

			$response1 = curl_exec($curl);
			$err = curl_error($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$response = json_decode($response1);

				$Array2 = $response->Response;
        $Array2 =  (Array) $Array2;
        $request = ($Array2[0]);
        $request = array($request);
				$request = $request['0'];
        return $request;
			}
		}

		// Close cURL session
		curl_close($curl);
	}
}
