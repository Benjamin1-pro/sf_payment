<?php

class bankModel extends CI_Model
{
	public $kyc_id;

	public function depositslip_bank()
	{
		$deposit = array(
			'amount' => $this->input->post('amount'),
			'bankslip_number' => $this->input->post('bankslip_number'),
			'account_number' => $this->input->post('account_number'),
			'account_name' => $this->input->post('account_name'),
			'bank_name' => $this->input->post('bank_name'),
			'reason' => $this->input->post('reason'),
			'payment_date' =>$this->input->post('payment_date'),
			'status' => 'Pending'
		);

		$result = $this->db->insert('transactions', $deposit);
		return ($result == true ? true : false);
	}

	public function kyc_display()
	{
		$query = "SELECT * FROM kyc";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function transactionlist()
	{
		$query = "SELECT * FROM transactions";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function api_provider($api_key, $random_key, $api_name, $account_number,$email)
	{
		$kyc_query = "SELECT id FROM kyc WHERE account_number = ?";
		$kycs_id = $this->db->query($kyc_query, $account_number);
		$kycs_id = $kycs_id->result_array();
		foreach ($kycs_id as $row) {
			$kyc_id = $row['id'];
		}

		$staff_id = $this->session->userdata('id');
		$data = array(

			'kyc_id'	=> $kyc_id,
			'api_key'	=> $api_key,
			'random_string' => $random_key,
			'api_name' => $api_name,
			'email' => $email,
			'added_by'	=> $staff_id,
			'c_date' => date(DATE_RFC1036, time())
		);

		$result = $this->db->insert('api_keys', $data);
		return ($result == true ? true : false);
	}

	public function kyc_exist($account_number)
	{
		$kyc_query = "SELECT id FROM kyc WHERE account_number = ?";
		$kycs_id = $this->db->query($kyc_query, $account_number);
		$kycs_id = $kycs_id->result_array();
		foreach ($kycs_id as $row) {
			$this->kyc_id = $row['id'];
		}
		$query = "SELECT kyc_id FROM api_keys WHERE kyc_id = ?";
		$sql = $this->db->query($query, $this->kyc_id);
		return $sql->result_array();
	}

	public function fetch_apikeys()
	{

		$query = "SELECT * FROM api_keys";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function fetch_kyc_name()
	{
		$query = "SELECT * FROM kyc WHERE id = ?";
		$sql = $this->db->query($query, $this->kyc_id);
		return $sql->result_array();
	}

	public function api_update($api_key, $random_key, $api_name, $account_number, $apiKey, $email)
	{
		$kyc_query = "SELECT id FROM kyc WHERE account_number = ?";
		$kycs_id = $this->db->query($kyc_query, $account_number);
		$kycs_id = $kycs_id->result_array();
		foreach ($kycs_id as $row) {
			$kyc_id = $row['id'];
		}

		$staff_id = $this->session->userdata('id');
		$data = array(

			'kyc_id'	=> $kyc_id,
			'api_key'	=> $api_key,
			'random_string' => $random_key,
			'api_name' => $api_name,
			'email' => $email,
			'added_by'	=> $staff_id,
			'c_date' => date(DATE_RFC1036, time())
		);

		$this->db->where('id', $apiKey);
		$update = $this->db->update('api_keys', $data);
		return ($update == true ? true : false);
	}

	public function deleteApikey($apiKeyID)
	{
		$this->db->where('id', $apiKeyID);
		$delete = $this->db->delete('api_keys');
		return ($delete == true ? true : false);
	}
}
