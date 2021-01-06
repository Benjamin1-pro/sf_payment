
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>API Subscription</h1>
      <center><?php echo $this->session->flashdata('error');?></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kyc</a></li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="pull-right">
        <button style="background:#222d32; color:white" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Create New Api Key</button>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Account Name</th>
                  <th>Client ID</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $count = 0; foreach ($api_provider as $key => $value) : $count++;
$kyc_id = $value['kyc_id'];
$sql = "SELECT * FROM kyc WHERE id = $kyc_id";
$query = $this->db->query($sql);
$query = $query->result_array();
foreach ($query as $key => $value1) : ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $value1['account_name'];?></td>
                  <td><?php echo $value['random_string'];?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="" data-toggle="modal" data-target="#modalChangekey<?php echo $value['id'];?>" class="fa fa-pencil" style="color:black;"> Change The Api Key</a></li>
                        <li class="divider"></li>
                        <li><a href="" data-toggle="modal" data-target="#modalRemove<?php echo $value['id'];?>" class="fa fa-trash" style="color:black;"> Remove The Api Key</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Provide another Key Modal -->

                <div class="modal fade" id="modalChangekey<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header"><p class="modal-title"><B>Sf Payment</B> <span class="text-muted"> | Register Data field</span></p></div>
                      <div class="modal-body">
                       <div class="box box-primary" style="padding-right: 10px;">
                         <form action="bank/change_api_key" enctype="multipart/form-data" method="post">
                           <div class="box-body">
                             <p><i><strong>Notice : </strong> The Api Key will be generated automatically!</i></p>
                             <input type="text" name="api_key_id" hidden value="<?php echo $value['id'];?>">
                             <input type="text" hidden name="account_number" value="<?php echo $value1['account_number'];?>">
                             <input type="text" hidden name="random_key" value="<?php echo $value['random_string'];?>">
                           </div>
                      </div>
                      <center>
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Save Modification</button>
                      </center>
                    </div>
                   </div>
                  </form>
                 </div>
                </div>
              </div>

              <!-- Remove Modal -->
              <div class="modal fade" id="modalRemove<?php echo $value['id'];?>"; tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <p class="modal-title"><B>Sf Payment</B> <span class="text-muted"> | Remove The Api Access from this Account</span></p></div>
                        <form method="post" action="bank/removeApi_key" class="form-group" style="shape-margin: 20px;">
                          <div class="box box-primary" style="padding-right: 10px;">
                            <div class="modal-body">
                              <center>
                              <div class="input-group">
                                <span class=""> Do you want to Remove the Api access from this Account : <strong><?php echo $value1['account_name'];?> ?</strong></span>
                                <input name="apikeyID" hidden value="<?php echo $value['id'];?>">
                              </div><br>
                              </center>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <center>
                              <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-sm btn-danger" name="delete">Remove</button>
                            </center>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

<?php endforeach;endforeach?>
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Add Key Modal -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header"><p class="modal-title" id="exampleModalLabel"><B>Sf Payment</B> <span class="text-muted"> | Add Api Key</span></p></div>
        <div class="modal-body">
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

                  <div class="form-group">
                    <label for="account_number">Client Email</label>
                    <input type="text" name="client_email" class="form-control" placeholder="Enter Client's Email">
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
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
