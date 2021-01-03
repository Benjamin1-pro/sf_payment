<?php

class SchoolfeesModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('apirequestModel');
	}

	public function add_pendingscf()
	{
		$depositslip = array(
			'amount' => $this->input->post('amount'),
			'bankslip_number' => $this->input->post('bs_number'),
			'account_number' => $this->input->post('account_number'),
			'account_name' => $this->input->post('account_name'),
			'payment_date' => $this->input->post('p_date'),
			'bank_name' => $this->input->post('bank_name'),
			'reason' => $this->input->post('reason'),
			'class' => $this->input->post('class'),
			'status' => 0
		);

		$result = $this->db->insert('school_fees', $depositslip);
		return ($result == true ? true : false);
	}

	public function update_pending_scf($pending_id, $pending_payment)
	{
		$this->db->where('id', $pending_id);
		$update = $this->db->update('school_fees', $pending_payment);
		return ($update == true ? true : false);
	}

	public function prev_amount($roll_number)
	{
		$query = "SELECT * FROM students WHERE roll_number = $roll_number";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function update_students_scf($student_id, $update_approved)
	{
		$this->db->where('id', $student_id);
		$update = $this->db->update('students', $update_approved);
		return ($update == true ? true : false);
	}

	public function add_approve_scf($approved_payment)
	{
		$result = $this->db->insert('school_feesApproved', $approved_payment);
		return ($result == true ? true : false);
	}

	public function displayscf()
	{
		$query = "SELECT * FROM school_fees WHERE status = 0";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function displayscf_pending($pending_id)
	{
		$query = "SELECT * FROM school_fees WHERE status = 0 AND id = $pending_id";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}


	public function displayscf_approved()
	{
		$query = "SELECT * FROM school_fees WHERE status = 1";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function display_students()
	{
		$query = "SELECT * FROM students";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	// public function compare_in_data()
	// {
	// 	$transactionID = $this->apirequestModel->request_api();
	// 	foreach ($transactionID as $key => $value) { $value = (Array)$value;
	// 		$dataID = $value['id'];
	// 		$dataID = (Array)$dataID;
	// 		$data =array_map('intval', $dataID);
	// 		$data = implode(',', $data);
	// 		print_r($data);
	//
	// 	}
	// 			$sql = "SELECT *	FROM school_fee	WHERE api_transactionID IN($data)";
	// 			$query = $this->db->query($sql);
	// 			return $query->result_array();
	// 	}
}
