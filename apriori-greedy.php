<?php
function findAllPropbs($data,$minsupport,$minConfident){
	$lists = listBarang($data);
	$allProbs = [];
	foreach($lists as $list){
		$probability = hitungProbabilitas($data,$list,$minsupport,$minConfident);
		if(!empty($probability)){
			//$allProbs = array_merge($allProbs,$probability);
			$allProbs[$list] = $probability;
		}
	}
	return $allProbs;
}

//Ambil data barang dari total transaksi
function ambilDataBrand($data){
	$results = array();
	foreach($data as $key=>$value){
		$brand = [];
		foreach($value as $k=>$v){
			$brand[] = $v['BRAND'];
		}
		$results[] = $brand;

	}
	return $results;
}

//List Barang Uniq
function listBarang($data){
	$a= [];
	foreach(ambilDataBrand($data) as $result){
		foreach($result as $r){
			if(!array_key_exists($r,$a)){
				$a[] = $r;
			}
		}
	}
	$a = array_unique($a);
	return $a;
}

function hitungProbabilitas($data,$keywords,$minsupport,$minConfident){
	$result = [];
	$profit = [];

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
	///Confident;
		foreach($match as $k=>$m){
			if($m['jml'] >= $minConfident){
				$procentage = $m['jml'] / count($transaction);
				if($procentage >= $minConfident){
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



