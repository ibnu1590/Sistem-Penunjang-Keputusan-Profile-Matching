<?php
	include 'db/db_config.php';
	extract($_POST);
	$dataKriteriaConvert = strtolower($kriteria);
	$crt_tmp = explode(' ',$dataKriteriaConvert);
	$crt = implode('_', $crt_tmp);
	foreach ($db->select('kriteria','kriteria')->where("id_kriteria='$id'")->get() as $r) {
		echo $k = $r['kriteria'];
	}
	if($db->update('kriteria',"nama_kriteria='$crt',bobot='$bobot',status='$type'")->where("id_kriteria='$id'")->count()==1){
		// $db->alter('hasil_tpa','change',"$k $crt","int")->get();
		header('location:tampil_kriteria.php');
	} else {
		//echo "update gagal";
		header('location:tampil_kriteria.php');
	}
?>