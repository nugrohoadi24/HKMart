  <?php
  include 'php/koneksi.php';

  $datatransaksi='dataBarang/';
  $tampil_transaksi=$database->getReference($datatransaksi)->getValue();

  $dataSiswa='dataSiswa/';
  $tampil_siswa=$database->getReference($dataSiswa)->getValue();

  $dataQR='dataTransaksiQR/';
  $tampilQR=$database->getReference($dataQR)->getValue();

  if(!isset($_SESSION['nama'])) {
   header('location:login.php'); 
 } else { 
   $nama = $_SESSION['nama']; 
 }
 ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Husnul Khatimah - Data Transaksi</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Husnul Khatimah</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Warehouse Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Warehouse</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Warehouse Components:</h6>
              <a class="collapse-item" href="data-barang.php">Data Barang</a>
              <a class="collapse-item" href="data-transaksi.php">Data Transaksi</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Manage Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Manage</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Manage:</h6>
              <a class="collapse-item" href="tambah-pesanan.php">Pembelian</a>
              <a class="collapse-item" href="data-siswa.php">Data Siswa</a>
              <a class="collapse-item" href="data-admin.php">Data Admin</a>
              <a class="collapse-item" href="generate-qr.php">Generate QR Code</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>

        <!-- Nav Item - Rekomendasi Stok -->
        <li class="nav-item">
          <a class="nav-link" href="rekomendasi-stok.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Rekomendasi Stok</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama']?></span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800">Data Transaksi Per User</h1>
              <p class="mb-4">Data Transaksi yang tercatat secara keseluruhan di Husnul Khatimah Mart</p>

              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                </div>
                <div class="card-body">
                  <?php if (!isset($_GET['id'])): ?>

                    <?php
                    $no=1;
                    foreach($tampil_siswa as $tampil_siswa_value =>$tampil_siswa_final){

                      ?>
                      <a href="transaksi-user.php?id=<?php echo $tampil_siswa_final['ID']; ?>" >
                        <div class="alert alert-primary">
                          <?php echo $tampil_siswa_final['NAMA']; ?>
                        </div>
                      </a>
                      <?php
                    } 
                  else: 
                    foreach($tampil_siswa as $tampil_siswa_value =>$tampil_siswa_final){
                      if ($tampil_siswa_final['ID']==$_GET['id']) { ?>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <tr>
                              <td>Nama</td>
                              <td>
                                <?php echo $tampil_siswa_final['NAMA']; ?>  
                              </td>
                            </tr>
                            <tr>
                              <td>Username</td>
                              <td>
                                <?php echo $tampil_siswa_final['ID']; ?>  
                              </td>
                            </tr>
                            <tr>
                              <td>Alamat</td>
                              <td>
                                <?php echo $tampil_siswa_final['ALAMAT']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                          </table>
                          <br>
                        </div>

                        <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <th>No</th>
                              <th>Tanggal Transaksi</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Quantity</th>
                              <th>Total Harga</th>
                            </thead>
                            <tfoot>
                              <th>No</th>
                              <th>Tanggal Transaksi</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Quantity</th>
                              <th>Total Harga</th>
                            </tfoot>
                            <tbody>
                              <?php
                              foreach($tampil_siswa as $tampil_siswa_value =>$tampil_siswa_final){
                              }
                              $no=1;
                              foreach($tampilQR as $tampil_QR_value =>$tampil_QR_final){
                                foreach($tampil_QR_final as $a =>$b){
                                  foreach($b as $c =>$tampil_spesifik){
                                    if (isset($tampil_spesifik['ID']) and $tampil_spesifik['ID']==$_GET['id']) { 
                                      ?>
                                      <tr>
                                        <td width="30px" class="text-center"><?=$no++?></td>
                                        <td><?php  echo substr($tampil_spesifik['IDTRANSAKSI'],0,6); ?></td>
                                        <td><?php  echo $tampil_spesifik['BRAND']; ?></td>
                                        <td><?php  echo $tampil_spesifik['NETSALES']; ?></td>
                                        <td><?php  echo $tampil_spesifik['QTY_TERJUAL']; ?></td>
                                        <td><?php  echo $tampil_spesifik['TOTALITEM']; ?></td>
                                      </tr>
                                      <?php 
                                    }
                                  } 
                                } 
                              } ?>
                            </tbody>
                          </table>
                        </div>
                        <?php   
                      }
                    }
                    ?>
                  <?php endif ?>
                </div>

              </div>
            </div>
            <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Nugroho Adi Pratomo 2020</span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar dari Akun ini?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Silahan Pilih Logout jika ingin keluar dari Akun ini.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
      <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

      <script>
        $(document).ready( function () {
          $('#myTable').DataTable();
        } );
      </script>

    </body>
    </html>