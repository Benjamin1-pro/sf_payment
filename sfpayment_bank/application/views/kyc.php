
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>KYC</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kyc</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Account Number</th>
                  <th>Account Name</th>
                  <th>Creation Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php $count = 0; foreach ($kyc_display as $key => $value) {$count++; ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $value['account_number'];?></td>
                  <td><?php echo $value['account_name'];?></td>
                  <td><?php echo $value['c_date'];?></td>
                </tr>
              <?php } ?>
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
