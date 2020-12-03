<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	}
	public function all_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$login = $this->loginModel->login_staffBank($email, $password);

		if ($login) {
			$bankStaff = array(
				'id' => $login1,
				'logged_in' => 'bank_staff'
			);
			$this->session->set_userdata($bankStaff);
			redirect('../../dashboard');
		}else {
			$this->session->set_flashdata('error', '<i style="color:red;"> Your Email or Password is incorrect</i>');
			redirect('../../');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('../../');
	}
}
