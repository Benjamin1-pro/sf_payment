<?php

class Sendsms extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public  function sendsmsFunction($message, $mobileno)
  {
    $_url= "https://rest.messagebird.com/messages";
    $data=http_build_query([
          'recipients'=>$mobileno,
          'originator'=>'ULK Sf-Payment',
          'body'=>$message]);

              $ch = curl_init();
              curl_setopt( $ch, CURLOPT_URL, $_url );
              curl_setopt( $ch, CURLOPT_POST, true );
              curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization: AccessKey oiYBdC1AuX8nemIimQDUuyxam'));
              curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
              @curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
              $result = @curl_exec($ch);
              @curl_close($ch);
              // echo $result;
  }
}

?>
