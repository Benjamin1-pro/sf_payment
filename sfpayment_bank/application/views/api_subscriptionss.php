<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        API Subscription
      </h1>
      <center><?php echo $this->session->flashdata('error');?></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">API Subscription</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="bank/generate_api_key" enctype="multipart/form-data" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="accoutname">Select the Account Name</label>
                  <input type="text" name="account_name" class="form-control" id="search" placeholder="Enter Account Name">
                </div>
                <div class="list-group" id="show_kyc">

                </div>
                <div class="form-group">
                  <label for="account_number">Account Number</label>
                  <input type="text" name="account_number" id="show_accountnumber" class="form-control" id="account_number" placeholder="Account Number">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-left">
                  <button type="submit" class="btn btn-primary">Create Api Key</button>
                </div>
                <div class="pull-right">
                  <button type="boutton" class="btn btn-danger">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
