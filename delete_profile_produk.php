<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('profile_produk')->where('id_produk='.$id)->count() == 1){
		header('location:tampil_profile_produk.php');
	} else {
		// header('location:tampil_profile_produk.php?error_msg=error_delete');
        header('location:tampil_profile_produk.php');
	}
?>