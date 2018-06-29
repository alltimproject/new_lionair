<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?> | Lion Air</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url().'assets/font-awesome/css/font-awesome.min.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/dataTables/dataTables.bootstrap4.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/adminlte.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/blue.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/css/animate.css' ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/morris.css' ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url().'assets/jquery/jquery-jvectormap-1.2.2.css' ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap3-wysihtml5.min.css' ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style media="screen">
  #note {
  position: absolute;
  z-index: 101;
  top: 0;
  left: 0;
  right: 0;
  background: #fde073;
  text-align: center;
  line-height: 2.5;
}
.cssanimations.csstransforms #close {
  display: none;
}

  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <?php
    if($this->session->flashdata('notifadmin')):?>
    <div id="note">
    <?php echo $this->session->flashdata('notifadmin') ?>
    </div>
   <?php endif ?>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#modalDatarefund" id="tampiltoday">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge" id="notif_jumlahrefund"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <div id="showdata"></div>
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url().'images/bg03.png' ?>" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><span class="fa fa-user fa-2x "></span> <?= $this->session->userdata('email') ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?= base_url().'adm/dashboard' ?>" class="nav-link">
             <i class="nav-icon fa fa-dashboard"></i>
             <p>
               Dashboard
               <span class="badge badge-info right"></span>
             </p>
           </a>
         </li>


          <li class="nav-header">REFUND</li>

          <li class="nav-item">
            <li class="nav-item">
              <a href="<?= base_url('adm/refund') ?>" class="nav-link">
                <i class="nav-icon fa fa-circle-o"></i>
                <p>
                  Data Refund
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>

            <li class="nav-header">RESCHEDULE</li>
            <li class="nav-item">
              <li class="nav-item">
                <a href="<?= base_url('adm/refund') ?>" class="nav-link">
                  <i class="nav-icon fa fa-circle-o"></i>
                  <p>
                    Data Reschedule
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>


              <li class="nav-item" style="padding-top:80px;">
                <li class="nav-item bg-danger">
                  <a href="<?= base_url('admin/logout') ?>" class="nav-link">
                    <i class="nav-icon fa fa-toggle-left"></i>
                    <p>
                      LOGOUT

                    </p>
                  </a>

                    </li>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>

                </li>


  <!-- modal pessenger -->
   <div class="modal fade" id="ModaldataToday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">

           <div class="modal-content" style="width:190%;">
               <div class="modal-header">
                 <div class="col-md-6 animated zoomIn">
                   <div class="info-box">
                   <span class="info-box-icon bg-success elevation-1"><i class="fa fa-credit-card"></i></span>
                   <div class="info-box-content">
                     <span class="info-box-text">Tanggal Refund</span>
                   </div>
                 </div>
                   <div id=""></div>
               </div>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                   <h6 class="modal-title" id="myModalLabel"></h6>
               </div>

               <form class="form-horizontal">
               <div class="modal-body">

               <table class="table table-hover">
                 <thead>
                 <tr class="bg-warning">
                   <th style="font-size:80%">No Refund</th>
                   <th style="font-size:80%">Tanggal Refund</th>
                 </tr>
               </thead>
               <tbody id=""></tbody>
               </table>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
               </div>
               </form>
           </div>
       </div>
   </div>

   <!-- modal pessenger -->
