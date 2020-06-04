<?php
    include 'php/koneksi.php';
    // error_reporting(0);
    $tampil_barang    = $database->getReference('dataBarang/')->getValue();
    $idtransaksi=date('ymdhis');
    // $input= new PhpFirebase($ath);
    $uniq=date('Ymdhis');
    
    // if(isset($_POST["bayarqr"])){
    //   $referencedelete='dataTemporary/';
    //   $hapusdata=$database->getReference($referencedelete)->remove();
    // }
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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
          <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
          <p class="mb-4">Data Barang yang tersedia di Husnul Khatimah Mart</a>.</p>
          <form action="prosespesanan.php" method="post" name="form">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6>Daftar Pesanan</h6>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Quantity</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah</th>
<!--                       <th></th>
                      <th></th> -->
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; $total=0; $harga=0; $uniq=$idtransaksi."00000"; $jual=0; $profit=0;
                        foreach($tampil_barang as $tampil_barang_value =>$tampil_barang_final){
                          if(isset($_POST[$tampil_barang_final['PLU']]) && $_POST[$tampil_barang_final['PLU']] > 0){
                            $total=$total+$_POST[$tampil_barang_final['PLU']];
                            $peritem=$tampil_barang_final['NETSALES']*$_POST[$tampil_barang_final['PLU']];
                            $harga=$harga+$peritem;

                            $jual=$tampil_barang_final['COSTPRICE']*$_POST[$tampil_barang_final['PLU']];
                            $profit=$tampil_barang_final['PROFIT']*$_POST[$tampil_barang_final['PLU']];

                          $reference='dataTemporary/'.$idtransaksi."/".$uniq++;
                          $data=[
                              'IDTRANSAKSI'         =>  $idtransaksi,
                              'PLU'                 =>  $tampil_barang_final['PLU'],
                              'BRAND'               =>  $tampil_barang_final['BRAND'],
                              'QTY_TERJUAL'         =>  $_POST[$tampil_barang_final['PLU']],
                              'TOTALITEM'           =>  $peritem,
                              'COSTPRICE'           =>  $tampil_barang_final['COSTPRICE'],
                              'NETSALES'            =>  $tampil_barang_final['NETSALES'],
                              'PROFIT'              =>  $tampil_barang_final['PROFIT']
                          ];

                          $pushdata=$database->getReference($reference)->set($data);


                          echo "<tr>";
                          echo "<td>".$no++."</td>";
                          echo "<td>".$tampil_barang_final['PLU']."</td>";
                          echo "<td>".$tampil_barang_final['BRAND']."</td>";
                          echo "<td>".$_POST[$tampil_barang_final['PLU']]."</td>";
                          echo "<td>Rp. ".number_format($tampil_barang_final['NETSALES'])."</td>";
                          echo "<td>Rp. ".number_format($peritem)."</td>";
                          // echo "<td>".$jual."</td>";
                          // echo "<td>".$profit."</td>";
                          echo "</tr>";
                          
                         
                        ?>
                        <input type="hidden" name="<?=$tampil_barang_final['PLU']?>" value="<?=$_POST[$tampil_barang_final['PLU']]?>">
                        <input type="hidden" name="plu<?=$tampil_barang_final['PLU']?>" value="<?=$tampil_barang_final['PLU']?>">
                        
                        <?php                        
                          }else{

                          }
                        }
                        if($total == 0):
                          echo "<tr>";
                          echo "<td colspan='6' class='text-center'>Keranjang Masih Kosong!</td>";
                          echo "</tr>";
                        endif;
                         ?>
                </tbody>
                
                <tfoot><tr><td colspan="5" class="text-right"><strong>Total</strong></td><td>Rp. <?=number_format($harga)?></td></tr></tfoot>
              </table>

              
                <div class="form-group">
                <label>Metode Pembayaran</label>
                </div>
                <div class="form-row row">
                  <div class="col-lg-6 col-xs-12 col-md-6">
                    <p>
                      <button class="btn btn-block btn-outline-dark" type="button" data-toggle="collapse" data-target="#qr" aria-expanded="false" aria-controls="collapseExample">
                        QR Code
                      </button>
                    </p>
                    <div class="collapse" id="qr">
                    <form action="tambah-pesanan.php">
                        <Button type="submit" name="bayarqr" class="btn btn-primary btn-block">Sudah bayar dengan QR!</Button>
                        <form action="tambah-pesanan.php">
                    </div>
                  </div>

                  <div class="col-lg-6 col-xs-12 col-md-6">
                    <p>
                      <button class="btn btn-block btn-outline-dark" type="button" data-toggle="collapse" data-target="#tunai" aria-expanded="false" aria-controls="collapseExample">
                        Tunai
                      </button>
                    </p>
                    <form action="prosespesanan.php" method="post">
                      <div class="collapse" id="tunai">

                      <?php $no=1; $total=0; $harga=0;
                        foreach($tampil_barang as $tampil_barang_value =>$tampil_barang_final){
                          if(isset($_POST[$tampil_barang_final['PLU']]) && $_POST[$tampil_barang_final['PLU']] > 0){
                            
                          ?>
                          
                        <input type="hidden" name="<?=$tampil_barang_final['PLU']?>" value="<?=$_POST[$tampil_barang_final['PLU']]?>">
                          <?php
                        }
                      }
                        ?>

                        <Button type="submit" name="Bayar" value="tunai" class="btn btn-primary btn-block">Bayar dengan Tunai!</Button>
                      </div>
                    </form>
                  </div>
                
                </div>
              
            </div>
          </div>
        <!-- /.container-fluid -->
        <!-- </form> -->
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
          <a class="btn btn-primary" href="login.php">Logout</a>
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