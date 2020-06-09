<?php
include 'php/koneksi.php';
    // error_reporting(0);
$tampil_barang    = $database->getReference('dataBarang/')->getValue();
$update_barang    = $database->getReference('dataBarang/')->getValue();
$tampil_transaksi = $database->getReference('dataTransaksi/')->getValue();
print_r($tampil_transaksi);
die();
    //require 'vendor/autoload';
$idtransaksi=date('ymdhis');
    // $input= new PhpFirebase($ath);
$uniq=date('Ymdhis');

?>
<?php $no=1; $total=0; $harga=0; $uniq=$idtransaksi."00000"; $jual=0; $profit=0;
foreach($tampil_barang as $tampil_barang_value => $tampil_barang_final){
	if(isset($_POST[$tampil_barang_final['PLU']]) && $_POST[$tampil_barang_final['PLU']] > 0){
		$total    = $total+$_POST[$tampil_barang_final['PLU']];
		$peritem  = $tampil_barang_final['NETSALES']*$_POST[$tampil_barang_final['PLU']];
		$harga    = $harga+$peritem;


                            //$jual     = ()+($tampil_barang_final['COSTPRICE']*$_POST[$tampil_barang_final['PLU']]);
                            //$profit   = ()+($tampil_barang_final['PROFIT']*$_POST[$tampil_barang_final['PLU']]);
		$qty      = ($tampil_barang_final['QTY_TERJUAL'] + $_POST[$tampil_barang_final['PLU']]);
		$reference='dataTransaksi/'.$idtransaksi."/".$uniq++;
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


		foreach ($update_barang as $update_barang_value => $update_barang_final) {
			$updateByPlu = $tampil_barang_final['PLU'];

			if ($update_barang_final['PLU'] && $updateByPlu) {
				$referenceupdate='dataBarang/'.$updateByPlu;
				$data=[
					'QTY_TERJUAL'         =>  $qty
				];
				$updatedata=$database->getReference($referenceupdate)->update($data);
			}
		}   

		$referencedelete='dataTemporary/';
		$hapusdata=$database->getReference($referencedelete)->remove();
		?>

		<input type="text" name="<?=$tampil_barang_final['PLU']?>" value="<?=$_POST[$tampil_barang_final['PLU']]?>">
		<?php
	}
}




header('location: tambah-pesanan.php');
?>


