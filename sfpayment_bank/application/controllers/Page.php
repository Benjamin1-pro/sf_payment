<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function view($page = 'dashboard')
	{
		if(!file_exists(APPPATH.'views/'.$page.'.php'))
		{
			//if the page doesn't exit
			show_404();
		}

		$data['title'] = ucfirst($page);
		$this->load->model('bankModel');
		$this->load->model('loginModel');

		$session = $this->session->userdata('logged_in');

		if ($session) {

			if ($page=='dashboard' || $page=='payment' || $page=='payment_approved' || $page=='students'
			 || $page=='deposit_slipBank' || $page=='transaction_list' || $page=='kyc') {

				 $data['kyc_display'] = $this->bankModel->kyc_display();
				 $data['transactionlist'] = $this->bankModel->transactionlist();
				 $data['staffInfo'] = $this->loginModel->fetchalldata();

				$this->load->view('header', $data);
				$this->load->view($page, $data);
				$this->load->view('footer');
			}
		}else {
			$this->load->view('login');
		}
	}
}
