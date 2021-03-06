
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Transaction List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaction</a></li>
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
                  <th>Bank Sleep Number</th>
                  <th>Account Name</th>
                  <th>Account Number</th>
                  <th>Amount</th>
                  <th>Reason</th>
                  <th>Date Of Payment</th>
                </tr>
                </thead>
                <tbody>
                  <?php $count = 0; foreach ($transactionlist as $key => $value) {$count++; ?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $value['bankslip_number'];?></td>
                  <td><?php echo $value['account_name'];?></td>
                  <td><?php echo $value['account_number'];?></td>
                  <td><?php echo $value['amount'];?></td>
                  <td><?php echo $value['reason'];?></td>
                  <td><?php echo $value['payment_date'];?></td>
                </tr>
              <?php } ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
