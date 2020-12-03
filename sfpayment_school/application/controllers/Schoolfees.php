<?php

class Schoolfees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('schoolfeesModel');
	}

	public function addSchoolfees()
	{

		if ($this->schoolfeesModel->add_pendingscf()) {

			redirect(site_url('../../payment'));

		}else {
			$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
			redirect(site_url('../../deposit_slip'));
		}
	}

	public function displayPending_sf()
	{
		$pending_id = $this->input->post('pending_id');

		if ($this->schoolfeesModel->displayscf_pending($pending_id)) {

			$pending = $this->schoolfeesModel->displayscf_pending($pending_id);
			serialize($pending);
			redirect(site_url('../../deposit_slip?pending_id='.''.serialize($pending)));
		}
	}

	public function updateSchoolfees()
	{
		$pending_id = $this->input->post('pending');
		$roll_number = $this->input->post('reason');
		$current_amount = $this->input->post('amount');
		$student_info = $this->schoolfeesModel->prev_amount($roll_number);

		foreach ($student_info as $key => $value) {

		$pending_payment = array(
			'amount' => $this->input->post('amount'),
			'bankslip_number' => $this->input->post('bs_number'),
			'account_number' => $this->input->post('account_number'),
			'account_name' => $this->input->post('account_name'),
			'payment_date' => $this->input->post('p_date'),
			'bank_name' => $this->input->post('bank_name'),
			'reason' => $this->input->post('reason'),
			'class' => $this->input->post('class'),
			'status' => 1
		);

		$amount = $value['amount_paid'] + $current_amount;
		$update_approved = array(
			'amount_paid' => $amount
		);
		if ($this->schoolfeesModel->update_pending_scf($pending_id, $pending_payment)) {

				$studentID = $value['id'];
				$student_id = (int)$studentID;
				if ($this->schoolfeesModel->update_students_scf($student_id, $update_approved)) {
					redirect(site_url('../../payment'));
				}else {
					$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
					redirect(site_url('../../deposit_slip'));
				}
		}else {
			$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
			redirect(site_url('../../deposit_slip'));
		}
		}
	}
}
