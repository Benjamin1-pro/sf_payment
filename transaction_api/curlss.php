<?php
require_once('curl.php');
$result = new Transaction;
$data = $result->fetchtransactionn();

if ($data) {
  // echo "<table id='example1' class='table table-bordered table-striped'>";
  // echo "
  // <thead>
  //   <tr>
  //     <th>#</th>
  //     <th>Account Number</th>
  //     <th>Bank Name</th>
  //     <th>Bank Sleep Number</th>
  //     <th>Amount</th>
  //     <th>Reason</th>
  //     <th>Date</th>
  //     <th>Action</th>
  //     </tr>
  // </thead>";
  // $count = 1;
  // foreach ($data as $key => $value) { $value = (Array)$value;
  //   echo "
  //     <tbody>
  //       <tr>
  //         <td>".$count++."</td>
  //         <td>".$value['account_number']."</td>
  //         <td>".$value['account_name']."</td>
  //         <td>".$value['bankslip_number']."</td>
  //         <td>".$value['amount']."</td>
  //         <td>".$value['reason']."</td>
  //         <td>".$value['payment_date']."</td>
  //         <td>
  //           <form class='' action='schoolfees/displayPending_sf' method='post'>
  //             <input type='text' name='pending_id' hidden value='".$value['id']."'>
  //             <button type='submit' class='btn btn-success btn-xs'>approve</button>
  //           </form>
  //       </td>
  //       </tr>
  //     </tbody>
  //   ";
  // }
  // echo "</table>";

  foreach ($data as $key => $value) {
    $value = (Array)$value;
    echo $value['id'];
  }
}
else {
  echo "0 result";
}
 ?>
