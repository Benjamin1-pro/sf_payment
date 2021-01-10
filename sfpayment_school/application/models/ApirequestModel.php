<?php

class ApirequestModel extends CI_Model
{
	public function __construct()
	{
		$this->load->model('curlRequest');
	}

	public function curl_request()
	{
		$result = $this->curlRequest->curl_request();
		return $result;
	}


	// 	Return a single data
	public function curl_request_singleData($pending_id)
	{
			$result = $this->curlRequest->curl_request($pending_id);
			return $result;
	}

// Update transaction status
	public function update_transactionStatus($pending_id)
	{
		$transactionID = $pending_id;
		$result = $this->curlRequest->curl_request($pending_id = null, $transactionID);
		return $result;
	}
}
