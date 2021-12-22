<?php

session_start();


include '../koneksi.php';


$username = $_POST['username'];
$password = md5($_POST['password']);


$login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
	$_SESSION['id']    = $data['id'];
	$_SESSION['nama']    = $data['nama'];
	$_SESSION['username']    = $data['username'];
	$_SESSION['password']    = $data['password'];
	$_SESSION['email']    = $data['email'];
	$_SESSION['hakakses']    = $data['hakakses'];


	if ($data['hakakses'] == "admin") {


		$_SESSION['username'] = $username;
		$_SESSION['hakakses'] = "admin";

		header("location:../Dashboard/wp-admin.php");
	} else if ($data['hakakses'] == "mahasiswa") {

		$_SESSION['username'] = $username;
		$_SESSION['hakakses'] = "mahasiswa";

		header("location:../Dashboard-User/berandauser.php");
	} else {

		header("location:../login.php?pesan=gagal");
	}
} else {
	header("location:../login.php?pesan=gagal");
}
