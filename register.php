<?php
include 'php/koneksi.php';
    // error_reporting(0);
$dataadmin='dataAdmin/';
$tampil_admin=$database->getReference($dataadmin)->getValue();

if(isset($_POST["daftar"])){
  
  $nama_depan=$_POST['namaDepan'];
  $nama_belakang=$_POST['namaBelakang'];
  $full_name=$nama_depan." ".$nama_belakang;
  
  foreach($tampil_admin as $tampil_data => $data){
    if($_POST['username']==$data['ID']){
      echo "<script>alert('Username telah digunakan!')</script>";
      $break=1;
      break;
    }
  }
  if(isset($break)){
  }else{
    if(!empty($full_name) && !empty($_POST['email']) && !empty($_POST['pass'])) {
      if($_POST['pass'] != $_POST['repeatPass']){
        echo "<script>alert('Password tidak sama!')</script>";
      }else{
        $reference='dataAdmin/';
        $data=[
          'NAMA'                  =>  $full_name,
          'EMAIL'                 =>  $_POST['email'],
          'ID'                    =>  $_POST['username'],
          'PASSWORD'              =>  $_POST['pass']

        ];

                              // $pushdata=$database->getReference($reference)->push($data);
        if ($database->getReference($reference)->push($data)) {
          $_SESSION['id']=$_POST['username'];
          header('location: login.php');
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

  <title>SKRIPSI Husnul Khotimah - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <img class="col-lg-5 d-none d-lg-block bg-register" style="width: 25rem;" src="img/FotoHK_2.jpg" alt="">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
              </div>

              <form class="user" action="" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" required name="namaDepan" value="<?php if(isset($_POST['namaDepan'])){echo $_POST['namaDepan'];} ?>" placeholder="Nama Depan">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" required name="namaBelakang" value="<?php if(isset($_POST['namaBelakang'])){echo $_POST['namaBelakang'];} ?>" placeholder="Nama Belakang">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" required name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" required name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="Alamat Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" required name="pass" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" required name="repeatPass" placeholder="Ulangi Password">
                  </div>
                </div>

                <button class="btn btn-primary btn-user btn-block" type="submit" name="daftar">Daftar akun</button>

                <hr>
                <div class="text-center">
                  <h6 class="h6 text-gray-900 mb-6"><i>“Bekerjalah kamu, maka Allah dan Rasul-Nya serta orang-orang mukmin 
                    akan melihat pekerjaanmu itu, dan kamu akan dikembalikan kepada (Allah) Yang Mengetahui akan yang ghaib 
                  dan yang nyata, lalu diberitakan-Nya kepada kamu apa yang telah kamu kerjakan”</i>
                (QS. At Taubah 105)</h6>
              </div>
              <hr>
              <div class="text-center">
                <h6 class="h6 text-gray-900 mb-6">“Orang yang berkata jujur akan mendapatkan tiga hal: Kepercayaan, Cinta dan Rasa Hormat”
                (Ali Bin Abi Thalib)</h6>
              </div>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="login.php">Sudah punya akun? Login!</a>
            </div>
          </div>
        </div>
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

</body>

</html>
