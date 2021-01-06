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
		$this->load->model('schoolfeesModel');
		$this->load->model('loginModel');
		$this->load->model('apirequestModel');

		$session = $this->session->userdata('logged_in');

		if ($session) {

			if ($page=='dashboard' || $page=='payment' || $page=='payment_approved' || $page=='students'
					|| $page=='deposit_slip' || $page=='deposit_slipBank' || $page=='transaction_list') {

				$data['scf_pending'] = $this->schoolfeesModel->displayscf();
				$data['approved'] = $this->schoolfeesModel->displayscf_approved();
				$data['students'] = $this->schoolfeesModel->display_students();
				$data['staffInfo'] = $this->loginModel->fetchalldata();
				$data['apiResponse'] = $this->schoolfeesModel->compare_in_data();

				$this->load->view('header', $data);
				$this->load->view($page, $data);
				$this->load->view('footer');
			}
		}else {
			$this->load->view('login');
		}
	}
}
