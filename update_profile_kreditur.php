<?php
	include 'db/db_config.php';
	extract($_POST);
	// print_r($_POST);
	$n = 0;
	foreach ($db->select('id_kriteria','kriteria')->get() as $c) {
		 $k[$n] = $c['id_kriteria'];
		 $n++;
	}
	
	$tgl = date("Y-m-d");
	if($db->delete('profile_kreditur')->where('id_calon_kr='.$id)->count() == 5){
	for ($i=0; $i < count($kriteria) ; $i++) { 
		$db->insert('profile_kreditur',"'$k[$i]','$id','$kriteria[$i]','$tgl'")->count() == 1;
	}
	header('location:tampil_profile_kreditur.php');


	} else {
		header('location:tampil_profile_kreditur.php?error_msg=error_delete');
	}
		

?>