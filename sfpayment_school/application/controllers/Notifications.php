<?php
class Notifications extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('apirequestModel');

  }

  public function viewStatus()
  {
    $datas = $this->apirequestModel->curl_request('equitybank');
    if (count($datas)>0) {
      foreach ($datas as $key => $value) {
        $output =  '
                      <li>
                        <a href="payment">
                          <i class="fa fa-bell-o text-green"></i> There\'s still '.count($datas).' pending transaction!
                        </a>
                      </li>
                    ';
      }
    }else {
      $output =  '
                    <li>
                      <a href="#">
                        <i class="fa fa-bell-o text-red"></i> There is no pending transaction!
                      </a>
                    </li>
                  ';
    }

    $count = count($datas);
    $data = array(
      'notification' => $output,
      'unseen_notification' => $count
    );
    echo json_encode($data);
  }
}
