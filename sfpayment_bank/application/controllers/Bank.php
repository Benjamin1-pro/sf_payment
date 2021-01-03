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

	public function get_kyc()
	{
		$data = $this->input->post('query');
		if (isset($data)) {
			$db = mysqli_connect('localhost', 'root', '','sfpayment_bank');
			$sql = "SELECT * FROM kyc WHERE account_name LIKE '%$data%' OR account_number LIKE '%$data%'";
			$query = mysqli_query($db, $sql);
			if ($query->num_rows==0) {
				echo "<p class='list-group-item border-1'>No {$data} Record Found</p>";
			}
			else {
				while ($row=$query->fetch_assoc()) {
					echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['account_name']." |<span class='text-muted'> ".$row['account_number']."</span></a>";
				}
			}
		}
	}

	public function generate_api_key()
	{
		$api_name = 'transaction list updated';
		$account_number = $this->input->post('account_number');

   // Generates a random string of ten digits
		$random_key	= mt_rand();

		// Computes the signature by hashing the salt with the secret key as the key
		$signature = hash_hmac('sha256', $api_name, $random_key, true);

		 // base64 encode...
		 $api_key = base64_encode($signature);

		 // urlencode...
		 $api_key = urlencode($api_key);

		 if (!$this->bankModel->kyc_exist($account_number)) {
			 if ($this->bankModel->api_provider($api_key, $random_key, $api_name, $account_number)) {
				 $this->session->set_flashdata('error', '<i style="color:green;">The deposit has been approved successfully!</i>');
	 			 redirect(site_url('../../api_subscription'));
			 }
			 else {
				 $this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
	 			 redirect(site_url('../../api_subscription'));
			 }
		 }else {
			 $this->session->set_flashdata('error', '<i style="color:red;">An API KEY has been already assigned to this client!</i>');
 		 	 redirect(site_url('../../api_subscription'));
		 }
	}

	public function change_api_key()
	{
		$api_name = 'transaction list updated';
		$account_number = $this->input->post('account_number');
		$apiKey = $this->input->post('api_key_id');

   // Generates a random string of ten digits
		$random_key	= mt_rand();

		// Computes the signature by hashing the salt with the secret key as the key
		$signature = hash_hmac('sha256', $api_name, $random_key, true);

		 // base64 encode...
		 $api_key = base64_encode($signature);

		 // urlencode...
		 $api_key = urlencode($api_key);

			 if ($this->bankModel->api_update($api_key, $random_key, $api_name, $account_number, $apiKey)) {
				 $this->session->set_flashdata('error', '<i style="color:green;">The Api Key Has been updated successfully!</i>');
	 			 redirect(site_url('../../api_subscription'));
			 }
			 else {
				 $this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
	 			 redirect(site_url('../../api_subscription'));
			 }
	}

	public function removeApi_key()
	{
		$apiKeyID = $this->input->post('apikeyID');

		if ($this->bankModel->deleteApikey($apiKeyID)) {
			$this->session->set_flashdata('error', '<i style="color:green;">The Api Key Has been Deleted!</i>');
			redirect(site_url('../../api_subscription'));
		}
		else {
			$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
			redirect(site_url('../../api_subscription'));
		}
	}
}
