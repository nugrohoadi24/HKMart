<?php
    error_reporting(0);
    include 'php/koneksi.php';
    $login_data=$database->getReference('dataAdmin/')->getValue();

   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
   require_once("php/koneksi.php");

    foreach($login_data as $tampil_data => $data){
      if ($data['ID']==$_POST['id'] and $data['PASSWORD']==$_POST['pass']) {
        $_SESSION['id']=$data["ID"];
        $_SESSION['nama']=$data["NAMA"];
        $_SESSION['email']=$data["EMAIL"];
        $login=2;
        header('location: index.php');
        break;
      }else{
        $login=0;
      }
    }

    if (isset($login) and isset($_POST['id'])) {
      if ($login==0) {
        echo "<script>alert('Username atau password salah!')</script>";

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

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img class="col-lg-6 d-none d-lg-block bg-login" style="width: 25rem;" src="img/FotoHK.jpg" alt="">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">HUSNUL KHOTIMAH MART</h1>
                  </div>
                  <hr>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="name" name="id" required class="form-control form-control-user" value="<?php if(isset($_POST['id'])){echo $_POST['id'];}elseif(isset($_SESSION['id'])){ echo $_SESSION['id'];} ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username atau ID">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    <hr>
                    <div class="text-center">
                      <h6 class="h7 mb-6" style="color: #999; font-style: italic;"><i>“Bekerjalah kamu, maka Allah dan Rasul-Nya serta orang-orang mukmin 
                        akan melihat pekerjaanmu itu, dan kamu akan dikembalikan kepada (Allah) Yang Mengetahui akan yang ghaib 
                        dan yang nyata, lalu diberitakan-Nya kepada kamu apa yang telah kamu kerjakan”</i>
                      (QS. At Taubah 105)
                      <hr>
                        Jangan lupa untuk selalu berdoa sebelum bekerja!
                      </h6>                    
                    </div>
                  </form>
                  <hr>
<!--                   <div class="text-center">
                    <a class="small" href="register.php">Buat Akun!</a>
                  </div> -->
                </div>
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
