<?php

class Schoolfees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('schoolfeesModel');
		$this->load->model('apirequestModel');
		$this->load->model('sendsms');
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
		if ($pending_id) {
			//print_r($data);
			$pending_id = base64_encode($pending_id);
			redirect(site_url('../../deposit_slip?id='.$pending_id.''));
		}
		else {
			echo 'data not found';
		}
	}

	public function updateSchoolfees()
	{
		$pending_id = $this->input->post('transactionID');
		$roll_number = $this->input->post('reason');
		$current_amount = $this->input->post('amount');
		$bank_name = $this->input->post('bank_name');
		$student_info = $this->schoolfeesModel->prev_amount($roll_number);

		$mobileno = $this->input->post('phone_number');
		$studentName = $this->input->post('student_names');
		$message = "Dear ".$studentName." Student , your payment of ".$current_amount." Rwf done @ ".$bank_name." has been approved , ULK Finance";

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
		if ($this->schoolfeesModel->update_pending_scf($pending_payment)) {

				$studentID = $value['id'];
				$student_id = (int)$studentID;
				if ($this->apirequestModel->update_transactionStatus($pending_id)) {
					if ($this->schoolfeesModel->update_students_scf($student_id, $update_approved)) {
						if ($this->sendsms->sendsmsFunction($message, $mobileno)) {
								redirect(site_url('../../payment'));
						}
						else {
							$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
							redirect(site_url('../../payment'));
						}
					}else {
						$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
						redirect(site_url('../../deposit_slip'));
					}
			}else {
				$this->session->set_flashdata('error', '<i style="color:red;">An error occured on API side, please try again!</i>');
				redirect(site_url('../../payment'));
			}
		}else {
			$this->session->set_flashdata('error', '<i style="color:red;">An error occured, please try again!</i>');
			redirect(site_url('../../deposit_slip'));
		}
		}
	}

	public function get_transaction()
	{
		if (isset($_GET['bank'])) {
			$bank_name = $_GET['bank'];
		}
		// $bank_name = "Equity Bank";
		$data = $this->apirequestModel->curl_request();
			echo "<table id='example1' class='table table-bordered table-striped'>";
		  echo "
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Account Number</th>
		      <th>Account Name</th>
					<th>Bank Name</th>
		      <th>Bank Sleep Number</th>
		      <th>Amount</th>
		      <th>Reason</th>
		      <th>Date</th>
		      <th>Action</th>
		      </tr>
		  </thead>";
			if ($data) {
			  $count = 1;
				$result1 = array();
				$data = (Array)$data;
			  foreach ($data as $key => $value) {
					$bankname[] = $value->bank_name;
					if ($value->bank_name  == $bank_name) {
						$value = (Array)$value;
						$result1[] = $value;
						$result = $result1['0'];
				    echo "
				      <tbody>
				        <tr>
				          <td>".$count++."</td>
				          <td>".$result['account_number']."</td>
									<td>".$result['account_name']."</td>
									<td>".$result['bank_name']."</td>
				          <td>".$result['bankslip_number']."</td>
				          <td>".$result['amount']."</td>
				          <td>".$result['reason']."</td>
				          <td>".$result['payment_date']."</td>
				          <td>
				            <form class='' action='schoolfees/displayPending_sf' method='post'>
				              <input type='text' name='pending_id' hidden value='".$result['id']."'>
				              <button type='submit' class='btn btn-success btn-xs'>approve</button>
				            </form>
				        </td>
				        </tr>
				      </tbody>
				    ";
				  }
				}
		  echo "</table>";
		}
		else {
			echo 	"
							<tbody>
								<tr>
									<td colspan = '9' style = 'text-align:center'>No Data found in the Table.</td>
								</tr>
							</tbody>
						";
		}
	}
}
