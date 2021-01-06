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
		$this->load->library('email');
		$api_name = 'transaction list updated';
		$account_number = $this->input->post('account_number');
		$email = $this->input->post('client_email');
		$private_endpoint = "http://{$_SERVER['HTTP_HOST']}";

   // Generates a random string of ten digits
		$random_key	= time();

		// Computes the signature by hashing the salt with the secret key as the key
		$signature = hash('sha256', time().$random_key);

		 // base64 encode...
		 $api_key = $signature;

		 if (!$this->bankModel->kyc_exist($account_number)) {
			 if ($this->bankModel->api_provider($api_key, $random_key, $api_name, $account_number,$email)) {

				 $config = array();
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.gmail.com';
				$config['smtp_user'] = 'muthamubenjamin@gmail.com';
				$config['smtp_pass'] = 'benjaminmu..236265';
				$config['smtp_port'] = 465;
				$config['smtp_crypto'] = 'ssl';
				$config['mailtype'] = 'text';
				$config['smtp_timeout'] = '5';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = true;

				$this->email->initialize($config);
				$this->email->set_newline("\r\n");

				$this->email->from('muthamubenjamin@gmail.com');
				$this->email->to($email);
				$this->email->subject('Your API Key From Sf-Payment');
				$this->email->message('Hi there! Your API Key is: '.$api_key.', Account-ID is: '.$random_key.' The Endpoints are: Public: sfpayment.com, Private: '.$private_endpoint.'.');

				// $this->email->send();
				if ($this->email->send()) {
					$this->session->set_flashdata('error', '<i style="color:green;">The deposit has been approved successfully!</i>');
 	 			 redirect(site_url('../../api_subscription'));
			 }
			 else {
				 $this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
 				redirect(site_url('../../api_subscriptionssss'));
			 }
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
		$email = $this->input->post('client_email');
		$private_endpoint = "http://{$_SERVER['HTTP_HOST']}";

   // Generates a random string of ten digits
		$random_key	=  $this->input->post('random_key');

		// Computes the signature by hashing the salt with the secret key as the key
		$signature = hash('sha256', time().$random_key);

		 // base64 encode...
		 $api_key =$signature;


			 if ($this->bankModel->api_update($api_key, $random_key, $api_name, $account_number, $apiKey,$email)) {
				 $this->session->set_flashdata('error', '<i style="color:green;">The Api Key Has been updated successfully!</i>');

				 $config = array();
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.gmail.com';
				$config['smtp_user'] = 'muthamubenjamin@gmail.com';
				$config['smtp_pass'] = 'benjaminmu..236265';
				$config['smtp_port'] = 465;
				$config['smtp_crypto'] = 'ssl';
				$config['mailtype'] = 'text';
				$config['smtp_timeout'] = '5';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = true;

				$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('muthamubenjamin@gmail.com');
			$this->email->to($email);
			$this->email->subject('Your API Key From Sf-Payment');
			$this->email->message('Hi there! \n Your API Key is: '.$api_key.',\n Account-ID is: '.$random_key.' The Endpoints are: Public: sfpayment.com, Private: '.$private_endpoint.'.');

			$this->email->send();
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
