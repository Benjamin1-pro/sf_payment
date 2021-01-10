<?php

class Constants extends CI_Model
{
	public function  api_credentials()
	{
		return array(
			'equity' => array(
				'api_name' => 'transactionListUpdated',
				'api_key' => 'd94a24a1991f95d4fde2d72906a6655fbb3956a7928b8fdc403a46fca3e3dcc9',
				'account_id' => '1607040671',
				'endpoints' => array('public' => 'sfpayment.com', 'private' => 'http://localhost/project/webservices/v1/payments/')

		)
		);
	}
}
 ?>
