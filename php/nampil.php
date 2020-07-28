<?php

include 'includes/koneksi.php';

$datasiswa='dataSiswa/';
$tampil_siswa=$database->getReference($datasiswa)->getValue();

print r($tampil_siswa);

?>