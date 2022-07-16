<?php
	include 'db/db_config.php';
	extract($_POST);
	$dataProdukConvert = strtolower($nama_produk);
	$crt_tmp = explode(' ',$dataProdukConvert);
	$crt = implode('_', $crt_tmp);
	foreach ($db->select('produk','nama_produk')->where("id_produk='$id'")->get() as $r) {
		echo $k = $r['nama_produk'];
	}
	if($db->update('produk',"nama_produk='$crt'")->where("id_produk='$id'")->count()==1){
		// $db->alter('hasil_tpa','change',"$k $crt","int")->get();
		header('location:tampil_produk.php');
	} else {
		//echo "update gagal";
		header('location:tampil_produk.php');
	}
?>