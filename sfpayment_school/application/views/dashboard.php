
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Dashboard
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
       </ol>
     </section>
     <?php $this->load->model('constants');
     $data = $this->constants->api_credentials();
     print_r(count($data['equitybank']));
      ?>
     <!-- Main content -->
     <section class="content">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-lg-4 col-xs-8">
           <!-- small box -->
           <div class="small-box bg-aqua">
             <div class="inner">
               <h3>150</h3>
               <p>Students</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="students" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-8">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>53<sup style="font-size: 20px">%</sup></h3>

               <p>Payment Pending</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <a href="payment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-8">
           <!-- small box -->
           <div class="small-box bg-red">
             <div class="inner">
               <h3>65</h3>

               <p>Payment Approved</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <a href="payment_approved" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
