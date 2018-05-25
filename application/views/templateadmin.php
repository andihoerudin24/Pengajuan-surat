
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Surma Fkip</title>
  <!-- plugins:css -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
 <link rel="stylesheet"    href="<?php echo base_url()?>assets/css/style.css">
 <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" />
 <link rel="stylesheet"    href="<?php echo base_url() ?>assets/bootstrap.min.css">
 <link rel="stylesheet"    href="<?php echo base_url() ?>assets/bootstrap.css"/>
 <link rel="stylesheet"    href="<?php echo base_url() ?>assets/dataTables.bootstrap4.min.css"/>
 
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="<?php echo base_url() ?>assets/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="<?php echo base_url() ?>assets/images/logo-mini.svg" alt="logo"/></a>
      </div>
         <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count"></span>
            </a>
           <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="<?php echo base_url() ?>assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
              </a>
              
          </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url() ?>assets/images/faces/face1.jpg" alt="image">
              <span class="d-none d-lg-inline"><?php echo $this->session->userdata['nama_lengkap']?></span>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
           <?php
           $id_level_user=$this->session->userdata('id_level_user');
           $sql_menu="SELECT * FROM `tbl_menu` WHERE id in(select id_menu from"
                      . " tbl_user_rule where id_level_user=$id_level_user)";
          // $main_menu=$this->db->get('tbl_menu')->result();
          $main_menu=$this->db->query($sql_menu)->result();
                foreach ($main_menu as $main) {
          echo "<a class='nav-link' href='".site_url('Admin/'.$main->link)."'>
                <span class='menu-title'>".$main->nama_menu."</span>
               </a>";   
           }
         ?>
          </li>
          </ul>
            
        </nav>
        <!-- partial -->
        <div class="content-wrapper bg-gradient-info">
          
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal ">Jumlah Mahasiswa</h4>
                  <?php  
                  $data=$this->db->query("SELECT count(*) as jumlah_data FROM `tbl_mahasiswa`")->result();
                  foreach ($data as $row) {
                      echo "<h2 class='font-weight-normal'>$row->jumlah_data</h2>";
                  }
                  ?>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal ">Transaksi Surat</h4>
                  <?php
                  $nama=$this->session->userdata('nama_lengkap');
                  $data=$this->db->query("SELECT nama_lengkap, count(*) as total FROM `v_transaksi_surat` where nama_lengkap='$nama' group by nama_lengkap")->result();
                  foreach ($data as $row) {
                      echo "<h2 class='font-weight-normal'>$row->total</h2>
                            <p class='card-text'>$row->nama_lengkap</p>  ";
                  }
                  ?>
                 </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal ">Hai Selamat Datang</h4>
                  <h2 class="font-weight-normal "><?php echo $this->session->userdata['nama_lengkap']  ?></h2>
                  <p class="card-text">Tetap Tersenyum Hari Yang Indah</p>
                </div>
              </div>
            </div>
          </div>
                   
           <?php 
           echo $contents 
           ?> 
        </div>
          </div>
        </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.Tutorkomputer.com/" target="_blank">Andi Hoerudin</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    
    <!-- page-body-wrapper ends -->
  
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery-1.12.4.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );
 function test(){
    swal("Good job!", "You clicked the button!", "success");
}

</script>
</html>
