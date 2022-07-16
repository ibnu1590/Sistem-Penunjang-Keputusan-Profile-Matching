<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	foreach ($db->select('produk','nama_produk')->where("id_produk=$id")->get() as $c) {
		 $krt = $c['nama_produk'];
	}
	if($db->delete('produk')->where('id_produk='.$id)->count() == 1){
		// $db->alter('hasil_tpa','drop column',"$krt",'')->get();
		header('location:tampil_produk.php');
	} else {
		header('location:tampil_produk.php?error_msg=delete_failed');
	}
?>