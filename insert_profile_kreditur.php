<?php
	include 'db/db_config.php';
    
    session_start();
    // require 'input_profile_kreditur.php';
	extract($_POST);
	$ids = array();
	foreach($_POST['place'] as $val)
	{
	$ids[] = (int) $val;
   
	}

	// echo $ids = implode(',', $ids);

    $tgl = date("Y-m-d");

    reset($_POST['place']);
	reset($_SESSION['id_kriteria']);
	while (list($arr_key, $arr_val) = each($_POST['place'])) {
		list($arr2_key, $arr2_val) = each($_SESSION['id_kriteria']);
		// $db->insert('profile_kreditur',"'$arr2_val','$id_kreditur','$arr_val','$tgl'")->count() == 1;

	if($db->insert('profile_kreditur',"'$arr2_val','$id_kreditur','$arr_val','$tgl'")->count() == 1){
		header('location:tampil_profile_kreditur.php');
	}
	}

    // foreach ($_POST['place'] as $nilai) :
    //     $db->insert('profile_kreditur',"'test','$id_kreditur','$nilai','$tgl'")->count() == 1;
    // endforeach;


    // print_r ($_SESSION['id_kriteria']);

    // foreach ($_SESSION['id_kriteria'] as $zz) :
    //     echo $zz;
    // endforeach;
	


  
?>