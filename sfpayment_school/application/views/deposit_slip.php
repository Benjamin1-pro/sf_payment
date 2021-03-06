
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Deposit Slip</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">pending Payment</a></li>
        <li class="active">Deposit Slip</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="schoolfees/updateSchoolfees" enctype="multipart/form-data" method="post">
<?php
  $this->load->model('apirequestModel');
  $data = base64_decode($_GET['id']);
  $data = explode(".",$data);
  $pending_id = $data[0];
  $bank_name = $data[1];
  $data = $this->apirequestModel->curl_request_singleData($pending_id, $bank_name);
  foreach ($data as $key => $value) { $value = (Array)$value;
    $roll_number = $value['reason'];
    $query = "SELECT * FROM students WHERE roll_number = ?";
    $query = $this->db->query($query, $roll_number);
    $query = $query->result_array();
    foreach ($query as $key => $value1) {
      $mobileno = $value1['telephone'];
			$studentName = $value1['fname'].' '.$value1['lname'];
      $class = $value1['class'];
    }
?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Roll Number</label>
                  <input type="text" class="form-control" name="reason" id="exampleInputEmail1" value="<?php echo $value['reason']; ?>">
                </div>
                <div class="form-group">
                  <label>Class</label>
                  <select class="form-control select2" name="class" style="width: 100%;">
                    <option value="" desable><?php echo $class; ?></option>
                    <option value="Y1-CS-D">Y1-CS-D</option>
                    <option value="Y2-CS-D">Y2-CS-D</option>
                    <option value="Y3-CS-D">Y3-CS-D</option>
                    <option value="Y1-EBS-E">Y1-EBS-E</option>
                    <option value="Y2-EBS-E">Y2-EBS-E</option>
                    <option value="Y3-EBS-E">Y3-EBS-E</option>
                    <option value="Y3-SS-D">Y1-SS-D</option>
                    <option value="Y3-SS-D">Y2-SS-D</option>
                    <option value="Y3-SS-D">Y3-SS-D</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Name</label>
                  <input type="text" class="form-control" name="account_name" id="exampleInputEmail1" value="<?php echo $value['account_name'];?>">
                </div>
                <div class="form-group">
                  <label>Bank Name</label>
                  <select class="form-control select2" name="bank_name" style="width: 100%;">
                    <option selected="selected" value="<?php echo $value['bank_name'];?>"><?php echo $value['bank_name'];?></option>
                    <option value="Bank Of Kigali">Bank Of Kigali</option>
                    <option value="National Bank">National Bank</option>
                    <option value="Development Bank">Development Bank</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Number</label>
                  <input type="text" class="form-control" name="account_number" id="exampleInputEmail1" value="<?php echo $value['account_number'];?>">
                </div>
                <div class="form-group">
                  <label>Date Of Payment</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="p_date" value="<?php echo $value['payment_date'];?>" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Slip Number</label>
                  <input type="text" class="form-control" name="bs_number" id="exampleInputEmail1" value="<?php echo $value['bankslip_number'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Amount (Rwf)</label>
                  <input type="text" class="form-control" name="amount" id="exampleInputPassword1" value="<?php echo $value['amount'];?>">
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary">Approve</button>
                 <input type="text" name="transactionID" hidden  value="<?php  echo $value['id'];?>">
                 <input type="text" name="phone_number"  hidden  value="<?php  echo $mobileno; ?>">
                 <input type="text" name="student_names" hidden  value="<?php  echo $studentName; ?>">
                 <input type="text" name="bank_name"     hidden  value="<?php echo $bank_name;?>">
              </span>
              <span class="input-group-btn">
                 <button type="button" class="btn btn-danger" style="background:#ba575b;">Cancel</button>
              </span>
            </div>
          </div>
          <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </section>
