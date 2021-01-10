
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>ULK Sf-Payment</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="annex/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="annex/bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="annex/bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="annex/dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="annex/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="annex/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="annex/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="annex/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="annex/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="annex/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- Google Font -->
	 <link rel="stylesheet" href="annex/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- iCheck for checkboxes and radio inputs -->
   <link rel="stylesheet" href="annex/plugins/iCheck/all.css">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="annex/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
   <!-- Bootstrap time Picker -->
   <link rel="stylesheet" href="annex/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="annex/bower_components/select2/dist/css/select2.min.css">
 </head>
 <body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">

   <header class="main-header">
     <!-- Logo -->
     <a href="index2.html" class="logo">
       <!-- mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini"><b>Sf-P</b></span>
       <!-- logo for regular state and mobile devices -->
       <span class="logo-lg"><b>ULK Sf-Payment</b></span>
     </a>
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top">
       <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
       </a>

       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
           <!-- Notifications: style can be found in dropdown.less -->
           <li class="dropdown notifications-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-bell-o"></i>
               <span class="label label-warning"><span class="count"></span></span>
             </a>
             <ul class="dropdown-menu">
               <li class="header">You have new notifications</li>
               <li>
                 <!-- inner menu: contains the actual data -->
                 <ul class="menu"></ul>
               </li>
               <li class="footer"><a href="#">View all</a></li>
             </ul>
           </li>
           <!-- User Account: style can be found in dropdown.less -->
           <li class="dropdown user user-menu">
             <?php foreach ($staffInfo as $key => $value){ ?>
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="annex/dist/img/<?php echo $value['picture'];?>" class="user-image" alt="User Image">
               <span class="hidden-xs"><?php echo $value['fname'].' '.$value['lname'];?></span>
             </a>
             <ul class="dropdown-menu">
               <!-- User image -->
               <li class="user-header">
                 <img src="annex/dist/img/<?php echo $value['picture'];?>" class="img-circle" alt="User Image">

                 <p>
                   <?php echo $value['fname'].' '.$value['lname'];?>
                 </p>
               </li>
               <!-- Menu Footer-->
               <li class="user-footer">
                 <div class="">
                  <center><a href="login/logout" class="btn btn-default btn-flat">Sign out</a></center>
                 </div>
               </li>
             </ul>
             <?php } ?>
           </li>
         </ul>
       </div>
     </nav>
   </header>
   <!-- Left side column. contains the logo and sidebar -->
   <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
       <!-- Sidebar user panel -->
       <div class="user-panel">
         <?php foreach ($staffInfo as $key => $value){ ?>
         <div class="pull-left image">
           <img src="annex/dist/img/<?php echo $value['picture'];?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
           <p><?php echo $value['fname'].' '.$value['lname'];?></p>
           <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
         <?php } ?>
       </div>
       <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MAIN NAVIGATION</li>
				 <li>
           <a href="dashboard">
             <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           </a>
         </li>
         <li class="treeview">
           <a href="#">
             <i class="fa fa-pie-chart"></i>
             <span>Payment</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="payment" id="request"><i class="fa fa-circle-o"></i> pending</a></li>
             <li><a href="payment_approved"><i class="fa fa-circle-o"></i> Approved</a></li>
           </ul>
         </li>
         <li>
           <a href="students">
             <i class="fa fa-calendar"></i> <span>Students List</span>
           </a>
         </li>
       </ul>
     </section>
     <!-- /.sidebar -->
   </aside>
