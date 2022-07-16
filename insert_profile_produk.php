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
    
    // foreach ($_POST['place'] as $nilai) :
		// foreach ($_SESSION['id_kriteria'] as $idkriteria) : 
        // 	$db->insert('profile_produk',"'$id_produk','$idkriteria','12'")->count() == 1;
		// 	// echo $idkriteria;
		// endforeach; 
	// endforeach;

	reset($_POST['place']);
	reset($_SESSION['id_kriteria']);
	while (list($arr_key, $arr_val) = each($_POST['place'])) {
		list($arr2_key, $arr2_val) = each($_SESSION['id_kriteria']);
		$db->insert('profile_produk',"'$id_produk','$arr2_val','$arr_val'")->count() == 1;
	}
?>