<?php

class LoginModel extends CI_Model
{
	public function login_staffSchool($email=null, $password=null)
	{
		if ($email && $password) {
			$sql = "SELECT * FROM school_staff WHERE email = ? AND password = ?";
      $query = $this->db->query($sql, array($email, $password));
      $result = $query->row_array();

      return ($query->num_rows() === 1 ? $result['id'] : false);
		}else {
			return false;
		}
	}

	public function fetchalldata($staff_id = null)
	{
		$staff_id = $this->session->userdata('id');
		$sql = "SELECT * FROM school_staff WHERE id = ?";
		$query = $this->db->query($sql, $staff_id);
		return $query->result_array();
	}
}
