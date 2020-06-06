<?php
    include 'php/koneksi.php';

    $datatransaksi='dataBarang/';
    $tampil_transaksi=$database->getReference($datatransaksi)->getValue();

    $dataadmin='dataAdmin/';
    $tampil_admin=$database->getReference($dataadmin)->getValue();
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

  <title>Husnul Khatimah - Data Siswa</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
          <p class="mb-4">Data Transaksi yang tercatat secara keseluruhan di Husnul Khatimah Mart</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode</th>
                      <th class="text-center">Nama Barang</th>
                      <th class="text-center">Satuan Modal</th>
                      <th class="text-center">Satuan Penjualan</th>
                      <th class="text-center">Kuantitas Terjual</th>
                      <th class="text-center">Total Modal</th>
                      <th class="text-center">Total Penjualan</th>
                      <th class="text-center">Total Profit</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode</th>
                      <th class="text-center">Nama Barang</th>
                      <th class="text-center">Satuan Modal</th>
                      <th class="text-center">Satuan Penjualan</th>
                      <th class="text-center">Kuantitas Terjual</th>
                      <th class="text-center">Total Modal</th>
                      <th class="text-center">Total Penjualan</th>
                      <th class="text-center">Total Profit</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $no=1;
                        foreach($tampil_transaksi as $tampil_transaksi_value => $tampil_transaksi_final){
                          $beli=$tampil_transaksi_final['COSTPRICE'];
                          $jual=$tampil_transaksi_final['NETSALES'];
                          $qty=$tampil_transaksi_final['QTY_TERJUAL'];
                        ?>

                    <tr>
                      <td><?=$no++?></td>
                      <td><?php  echo $tampil_transaksi_final['PLU']; ?></td>
                      <td><?php  echo $tampil_transaksi_final['BRAND']; ?></td>
                      <td style="width: 12%"><?php  echo "Rp. ".number_format($jual); ?></td>
                      <td style="width: 12%"><?php  echo "Rp. ".number_format($beli); ?></td>
                      <td style="width: 12%" class="text-center"><?php  echo $qty; ?></td>
                      <td style="width: 12%"><?php  echo "Rp. ".number_format($jual*$qty); ?></td>
                      <td style="width: 12%"><?php  echo "Rp. ".number_format($beli*$qty); ?></td>
                      <td style="width: 12%"><?php  echo "Rp. ".number_format(($jual-$beli)*$qty); ?></td>
                    </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
  <script>window.print()</script>
</body>
</html>