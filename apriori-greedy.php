<?php

function hitungProbabilitas($data,$keywords,$minsupport,$minConiden){

	//$file = fopen($filepath,'r');
	//$data = json_decode(fread($file,filesize('nyoba.json')),true);

//menentukan keyword
	$result = [];
	$profit = [];

//deklarasi min support

//Looping dalam data json untuk mencari berapa transaksi yg berisi BRAND keyword
	$transaction = [];
	foreach($data as $key=>$value){
		foreach($value as $v){
			if($v['BRAND'] == $keywords){
				$transaction[] = $value;
			}
		}
	}

//Looping keyword dengan item lain
	if(count($transaction) / count($data) >= $minsupport){
		$match = [];
		foreach($transaction as $key=>$trans){
			foreach($trans as $k=>$v){
				if($v['BRAND'] !== $keywords){
					//$profit[] = $trans;
					if(!array_key_exists($v['BRAND'],$match)){
						$match[$v['BRAND']]['jml'] = 1;
						$match[$v['BRAND']]['profit'] = $v['PROFIT'];
					}else{
						$match[$v['BRAND']]['jml'] += 1;
						$match[$v['BRAND']]['profit'] += $v['PROFIT'];
					}
				}
			}
		}


 //tentukan minimal pertemuan item dgn keywords dan looping untuk menampilkan data yg sesuai
	///$confiden = 0.5;
		foreach($match as $k=>$m){
			if($m['jml'] >= $minConiden){
				$procentage = $m['jml'] / count($transaction);
				if($procentage >= $minConiden){
					$result[$k] = [
						'jumlah'=>$m['jml'],
						'procentage'=>$procentage,
						'profit'=>$m['profit']
					];
				}
			}
		}
	}
	return $result;
}



