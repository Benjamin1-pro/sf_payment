
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Student List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Student List</a></li>
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
                  <th>Roll Number</th>
                  <th>Names</th>
                  <th>Class</th>
                  <th>Amount Paid</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 0; foreach ($students as $key => $value) { $count++; ?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $value['roll_number'];?></td>
                  <td><?php echo $value['fname'].' '.$value['lname'];?></td>
                  <td><?php echo $value['class'];?></td>
                  <td><?php echo $value['amount_paid'];?></td>
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
