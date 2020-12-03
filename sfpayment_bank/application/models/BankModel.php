<?php

class bankModel extends CI_Model
{
	public function depositslip_bank()
	{
		$deposit = array(
			'amount' => $this->input->post('amount'),
			'bankslip_number' => $this->input->post('bankslip_number'),
			'account_number' => $this->input->post('account_number'),
			'account_name' => $this->input->post('account_name'),
			'reason' => $this->input->post('reason'),
			'payment_date' =>$this->input->post('payment_date'),
			'status' => 1
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
		$query = "SELECT * FROM transactions WHERE status = 1";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
}
