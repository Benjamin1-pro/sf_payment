<?php

class Bank extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('bankModel');
	}

	public function depositslip_bank()
	{
		if ($this->bankModel->depositslip_bank()) {
			$this->session->set_flashdata('error', '<i style="color:green;">The deposit has been approved successfully!</i>');
			redirect(site_url('../../deposit_slipBank'));
		}else {
			$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
				redirect(site_url('../../deposit_slipBank'));
		}
	}
}
