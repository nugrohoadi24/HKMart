<?php
include 'php/koneksi.php';

$datasiswa='dataSiswa/';
$tampil_siswa=$database->getReference($datasiswa)->getValue();
$update_siswa=$database->getReference($datasiswa)->getValue();

$dataadmin='dataAdmin/';
$tampil_admin=$database->getReference($dataadmin)->getValue();
if(!isset($_SESSION['nama'])) {
 header('location:login.php'); 
} else { 
 $nama = $_SESSION['nama']; 
}

if(isset($_POST["tambah"])){

  $nama_depan=$_POST['namaDepan'];
  $nama_belakang=$_POST['namaBelakang'];
  $full_name=$nama_depan." ".$nama_belakang;


  if(!empty($full_name) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['alamat']) && !empty($_POST['saldo'])) {
    if($_POST['password'] != $_POST['repeat']){
      echo "<script>alert('Password tidak sama!')</script>";
    }else{
      foreach($update_siswa as $update_siswa_value => $update_siswa_final){
        $updateByID = $_POST['username'];

        if ($update_siswa_final['ID'] && $updateByID) {
          $reference='dataSiswa/'.$updateByID;
          $data=[
            'NAMA'                  =>  $full_name,
            'ID'                    =>  $_POST['username'],
            'PASSWORD'              =>  $_POST['password'],
            'ALAMAT'                =>  $_POST['alamat'],
            'SALDO'                 =>  $_POST['saldo']
          ];

          if ($database->getReference($reference)->update($data)) {
            header('location: data-siswa.php');
          }
        }
      }
    }
  }
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

  <title>Husnul Khatimah - Data Siswa</title>

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
              <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
              <p class="mb-4">Data Siswa yang terdaftar pada Pondok Pesantren Husnul Khatimah.</p>

              <!-- DataTales Example -->
              <form class="user" action="" method="post">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah dan Update Siswa</h6>
                    <p class="">Untuk Tambah gunakanlah Username berbeda dan untuk Update gunakanlah Username yang sama!</p>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" required name="namaDepan" value="<?php 
                        if(isset($_POST['namaDepan'])){echo $_POST['namaDepan'];} ?>" placeholder="Nama Depan">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" required name="namaBelakang" value="<?php 
                        if(isset($_POST['namaBelakang'])){echo $_POST['namaBelakang'];} ?>" placeholder="Nama Belakang">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" required name="username" value="<?php
                      if(isset($_POST['username'])){echo $_POST['username'];} ?>" placeholder="Username">
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" required name="password" value="<?php 
                        if(isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Password 6 Karakter" minlength="6" maxlength="6">
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" required name="repeat" value="<?php 
                        if(isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Ulangi Password 6 Karakter" minlength="6" maxlength="6">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" required name="alamat" value="<?php 
                      if(isset($_POST['alamat'])){echo $_POST['alamat'];} ?>" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" required name="saldo" value="<?php 
                      if(isset($_POST['saldo'])){echo $_POST['saldo'];} ?>" placeholder="Saldo">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="tambah">Tambah atau Update Siswa</button>
                  </div>
                </div>
              </form>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <span class="pull-right">
                </span>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Alamat</th>
                          <th>Saldo</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Alamat</th>
                          <th>Saldo</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($tampil_siswa as $tampil_siswa_value =>$tampil_siswa_final){

                          ?>
                          <tr>
                            <td width="30px" class="text-center"><?=$no++?></td>
                            <td><?php  echo $tampil_siswa_final['NAMA']; ?></td>
                            <td><?php  echo $tampil_siswa_final['ID']; ?></td>
                            <td><?php  echo $tampil_siswa_final['PASSWORD']; ?></td>
                            <td><?php  echo $tampil_siswa_final['ALAMAT']; ?></td>
                            <td><?php  echo $tampil_siswa_final['SALDO']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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