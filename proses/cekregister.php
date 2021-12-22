<?php
//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form input-barang 
    $nama = $_POST["nama"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$hakakses = $_POST["hakakses"];

	//query insert data
	$query = "INSERT INTO user
				            VALUES
				        ('','$nama','$username','$password','$email','$nim','$hakakses','$foto')
				            ";
	mysqli_query($koneksi, $query);

	// cek apakah data berhasil ditambahkan
	if (mysqli_affected_rows($koneksi) > 0) {
		echo "<script>
				            alert('Registrasi Berhasil, silahkan login');
				            document.location.href = '../login.php'
				            </script>";
	}

?>