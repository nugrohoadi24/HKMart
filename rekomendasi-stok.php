<?php

include 'php/koneksi.php';

$dataadmin='dataAdmin/';
$tampil_admin=$database->getReference($dataadmin)->getValue();
$tampil_rekomendasi = $database->getReference('rekomendasi/')->getValue();


if(!isset($_SESSION['nama'])) {
 header('location:login.php'); 
} else { 
 $nama = $_SESSION['nama']; 
}


if(isset($_POST['update'])){
  $num=0;
  $supp=$num+$_POST['minSupp'];
  $conf=$num+$_POST['minConf'];

  $reference = 'rekomendasi/';
  $data=[
    'minSupp'   => $supp,
    'minConf'   => $conf
  ];

  $updatedata=$database->getReference($reference)->update($data);

  header('location: rekomendasi-stok.php');
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

  <title>Husnul Khatimah - Rekomendasi Stok</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Rekap Penjualan</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
              </div>

              <!-- Content Row -->
              <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produk Terlaris</div>
                          <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $qtyawal=0; $brand='';
                            $databarang='dataBarang/';
                            $tampil_barang=$database->getReference($databarang)->getValue();
                            foreach($tampil_barang as $tampil_data => $data){
                              if ($data['QTY_TERJUAL'] > $qtyawal) {
                                $qtyawal=$data['QTY_TERJUAL'];
                                $brand=$data['BRAND'];
                              }
                            }
                            echo $brand." - ".$qtyawal." Items";
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-gem fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Item Terjual</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">457</div>
                          <div class="h6 mb-0 font-weight-bold text-gray-800">
<!--                            <?php
                           $qtyawal=0; $total=0;
                           $databarang='dataBarang/';
                           $tampil_barang=$database->getReference($databarang)->getValue();
                           foreach($tampil_barang as $tampil_data => $data){
                            if ($data['QTY_TERJUAL'] > $qtyawal) {
                              $qtyawal=$data['QTY_TERJUAL'];
                            }
                          }
                          echo $qtyawal;
                          ?> -->
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pendapatan</div>
                        <div class="row no-gutters align-items-center">
                          <div class="h5 mb-0 font-weight-bold text-gray-800">672881</div>
                          <div class="col">

                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Profit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">258182</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->

            <div class="row">
              <!-- Begin Page Content -->
              <div class="container-fluid">
                <!-- Area Chart -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Stok</h6>
                    <span class="pull-right">
                    </span>
                  </div>
                  <form class="rekomendasi" action="rekomendasi-stok.php" method="post">
                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <button class="btn btn-primary btn-user btn-block" type="submit" name="tambah">Cek Rekomendasi</button>
                      </div>
                    </div>
                  </form>
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Minimum Support = <?php echo $tampil_rekomendasi['minSupp']; ?></h6><br>
                    <h6 class="m-0 font-weight-bold text-primary">Minimum Confident = <?php echo $tampil_rekomendasi['minConf']; ?></h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Nama Barang A</th>
                            <th>Nama Barang B</th>
                            <th>Dibeli Bersamaan</th>
                            <th>Persentase Confident</th>
                            <th>Profit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(isset($_POST['tambah'])){
                            include 'apriori-greedy.php';
                            $tampil_transaksi = $database->getReference('dataTransaksi/')->getValue();
                            $tampil_rekomendasi = $database->getReference('rekomendasi/')->getValue();

                            $minSup = $tampil_rekomendasi['minSupp'];
                            $conf = $tampil_rekomendasi['minConf'];

                            $results = findAllPropbs($tampil_transaksi,$minSup,$conf);
                            foreach ($results as $k =>$result) {
                              foreach ($result as $key => $value){
                                ?>
                                <tr>
                                  <td><?php echo $k; ?></td>
                                  <td><?php echo $key; ?></td>
                                  <td><?php echo $value['jumlah']; ?></td>
                                  <td><?php echo round($value['procentage'] *100); ?></td>
                                  <td><?php echo $value['profit']; ?></td>
                                </tr>
                                <?php
                              }
                            }
                          }

                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Nama Barang A</th>
                            <th>Nama Barang B</th>
                            <th>Dibeli Bersamaan</th>
                            <th>Persentase Confident</th>
                            <th>Profit</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>                
                </div>
              </div>
            </div>
            <!-- End of Main Content -->

            <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Set Ulang Minimum Support dan Minimum Confident</h6>
                  <span class="pull-right">
                  </span>
                  <hr>

                  <div class="user" class="collapse" id="qr">
                    <form action="" method="post">
                      <div class="form-group">
                        <h6>Masukkan Minimum Support</h6>
                        <input type="text" class="form-control form-control-user" required name="minSupp" value="<?php
                        if(isset($_POST['minSupp'])){echo $_POST['minSupp'];} ?>" placeholder="Minimum Support">
                      </div>
                      <div class="form-group">
                        <h6>Masukkan Minimum Confident</h6>
                        <input type="text" class="form-control form-control-user" required name="minConf" value="<?php
                        if(isset($_POST['minConf'])){echo $_POST['minConf'];} ?>" placeholder="Minimum Confident">
                      </div>
                      <p><button class="btn btn-primary btn-user btn-block" type="submit" data-toggle="collapse" data-target="#qr" aria-expanded="false" aria-controls="collapseExample" name="update">Update Set</button></p>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

  </body>
  </html>