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
		$login = $this->loginModel->login_staffSchool($email, $password);

			if ($email) {
				if ($password) {
					if ($login) {
						$schoolStaff = array(
							'id' => $login,
							'logged_in' => 'school_staff'
						);
						$this->session->set_userdata($schoolStaff);
						redirect('../../dashboard');
					}else {
						$this->session->set_flashdata('error', '<i style="color:red;"> Your Email or Password is incorrect</i>');
						redirect('../../');
					}
				}else {
					$this->session->set_flashdata('error1', '<i style="color:red;"> The Password field is empty</i>');
					redirect('../../');
				}
			}else {
				$this->session->set_flashdata('error0', '<i style="color:red;"> Please fill the Email field!</i>');
				redirect('../../');
			}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('../../');
	}
}
