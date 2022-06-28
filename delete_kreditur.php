<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('kreditur')->where('id_calon_kr='.$id)->count() == 1){
		header('location:tampil_kreditur.php');
	} else {
		header('location:tampil_kreditur.php?error_msg=error_delete');
	}
?>