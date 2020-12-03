
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
          <form class="" action="#" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Roll Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Roll Number">
                </div>
                <div class="form-group">
                  <label>Class</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a Class" style="width: 100%;">
                    <option>Y1-CS-D</option>
                    <option>Y2-EBS-E</option>
                    <option>Y3-CS-D</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Student Name">
                </div>
                <div class="form-group">
                  <label>Bank Name</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Equity Bank</option>
                    <option>Bank Of Kigali</option>
                    <option>National Bank</option>
                    <option>Development Bank</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="123456789">
                </div>
                <div class="form-group">
                  <label>Date Of Payment</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Slip Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="325">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Amount (Rwf)</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="120,000">
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary">Approve</button>
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
