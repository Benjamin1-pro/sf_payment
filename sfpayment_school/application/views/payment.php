
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pending Payment</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pending</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-6">
<?php
  $sql = "SELECT bank_name FROM accounts_bank";
  $sql = $this->db->query($sql);
  $sql = $sql->result_array();
?>
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label>Select Bank</label>
                    <select name="select_bank" id="select_bank" class="form-control">
                      <option>Select A bank</option>
<?php foreach ($sql as $key => $value){  ?>
                      <option value="<?php echo $value['bank_name'];?>"><?php echo $value['bank_name'];?></option>
<?php } ?>
                    </select>
                  </div>
                </form>
              </div>
              <div id="transaction_lists"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
