<?php
	include 'db/db_config.php';
	session_start();
	extract($_POST);
	$ids = array();
	foreach($_POST['place'] as $val)
	{
	$ids[] = (int) $val;
	}

	echo $ids = implode(',', $ids);
    
	reset($_POST['place']);
	reset($_SESSION['id_kriteria']);
	while (list($arr_key, $arr_val) = each($_POST['place'])) {
		list($arr2_key, $arr2_val) = each($_SESSION['id_kriteria']);
		// echo "<br>";
		// echo "nilai_produk ".$arr_val;
		// echo "<br>";
		// echo "id_kriteria ".$arr2_val;
		$db->update('profile_produk',"nilai_produk='$arr_val'")->where("id_kriteria='$arr2_val' and id_produk='$id_produk'")->count() == 1;
	}
    header('location:tampil_profile_produk.php');
?>