<?php

class ApirequestModel extends CI_Model
{
	public function __construct()
	{
		$this->load->model('curlRequest');
	}

	public function curl_request($bank_name)
	{
		$result = $this->curlRequest->curl_request($pending_id = null, $transactionID = null, $bank_name);
		return $result;
	}


	// 	Return a single data
	public function curl_request_singleData($pending_id, $bank_name)
	{
			$result = $this->curlRequest->curl_request($pending_id,$transactionID = null, $bank_name);
			return $result;
	}

// Update transaction status
	public function update_transactionStatus($pending_id, $bank_name)
	{
		$transactionID = $pending_id;
		$result = $this->curlRequest->curl_request($pending_id = null, $transactionID, $bank_name);
		return $result;
	}
}
