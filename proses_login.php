<?php
	include 'db/db_config.php';
	extract($_POST);
	$pass = md5($password);
	$sql = $db->select('*','admin')->where("username='$username' and password='$pass'");
	$check = $sql->count();
	$err = "";
	if($check==1){
		foreach ($sql->get() as $data) {
			$id_user = $data['id'];
			$role = $data['role'];
		}
		session_start();
		$_SESSION['id'] = $id_user;
		$_SESSION['nama'] = $username;
		$_SESSION['role'] = $role;
		header('location:index.php');
	} else {
		$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
		// header('location:login.php');
		// $err = "Email atau Password salah";
		header('Location: ./');
		die();
	}
?>