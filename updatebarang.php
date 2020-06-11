<?php
include 'php/koneksi.php';
// error_reporting(0);
$databarang='dataBarang/';
$tampil_barang=$database->getReference($databarang)->getValue();
$update_barang=$database->getReference($databarang)->getValue();

// Update Data

$qty=0;
$stok=0; 
$num=0;
$profit=$_POST['NETSALES']-$_POST['COSTPRICE'];
$sale=$num+$_POST['NETSALES'];
$cost=$num+$_POST['COSTPRICE'];
$plu=$num+$_POST['PLU'];
$stok=$num+$_POST['STOK'];


foreach($update_barang as $update_barang_value => $update_barang_final){
  $updateByPlu = $_POST['PLU'];

  if ($update_barang_final['PLU'] && $updateByPlu) {
    $referenceupdate='dataBarang/'.$updateByPlu;
    $updateData=[
      'PLU'                  =>  $plu,
      'BRAND'                =>  $_POST['BRAND'],
      'COSTPRICE'            =>  $cost,
      'NETSALES'             =>  $sale,
      'PROFIT'               =>  $profit,
      'QTY_TERJUAL'          =>  $qty,
      'STOK'                 =>  $stok
    ];
    $updatedata=$database->getReference($referenceupdate)->update($updateData);
  }
}
header('location: data-barang.php');
?>