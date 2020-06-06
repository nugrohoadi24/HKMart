<?php
    include 'php/koneksi.php';
    // error_reporting(0);
    $tampil_barang    = $database->getReference('dataBarang/')->getValue();
    $idtransaksi=date('ymdhis');
    // $input= new PhpFirebase($ath);
    $uniq=date('Ymdhis');

    
    $referencedelete='dataTemporary/';
    $hapusdata=$database->getReference($referencedelete)->remove();

    header('location: tambah-pesanan.php');
?>