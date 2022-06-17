<?php
	include 'db/db_config.php';
	// extract($_POST);
	if($db->insert('hasil_hitung',"'id_calon_kr','hasil_nilai_akhir'")->count() == 1){
		echo "ok";
	} else {
        echo "gagal dah";
    }
?>