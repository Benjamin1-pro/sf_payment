
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Deposit Slip</h1>
      <center><?php echo $this->session->flashdata('error');?></center>
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
          <form class="" action="bank/depositslip_bank" enctype="multipart/form-data" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Slip Number</label>
                  <input type="text" name="bankslip_number" class="form-control" id="exampleInputEmail1" placeholder="Bank Slip Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Reason</label>
                  <input type="text" name="reason" class="form-control" id="exampleInputEmail1" placeholder="Bank Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Number</label>
                  <input type="text" name="account_number" class="form-control" id="exampleInputEmail1" placeholder="Account Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Name</label>
                  <input type="text" name="account_name" class="form-control" id="exampleInputEmail1" placeholder="Account Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Amount (Rwf)</label>
                  <input type="text" name="amount" class="form-control" id="exampleInputPassword1" value="120,000">
                </div>
                <div class="form-group">
                  <label>Date Of Payment</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="payment_date" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary">submit</button>
              </span>
              <span class="input-group-btn">
                 <button type="button" class="btn btn-danger" style="background:#ba575b;">Cancel</button>
              </span>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
