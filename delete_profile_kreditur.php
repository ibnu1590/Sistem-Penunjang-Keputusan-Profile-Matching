<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('profile_kreditur')->where('id_calon_kr='.$id)->count() == 5){
		header('location:tampil_profile_kreditur.php');
	} else {
		header('location:tampil_profile_kreditur.php?error_msg=error_delete');
	}
?>