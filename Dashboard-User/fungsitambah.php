<?php
$conn = mysqli_connect("localhost", "root", "", "beasiswakuv2");


function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$kritik = htmlspecialchars($data["kritik"]);
	$saran = htmlspecialchars($data["saran"]);
	$rating = htmlspecialchars($data["rating"]);
	// querynya
	$query = "INSERT INTO kritiksaran VALUES
	 			('', '$nama', '$kritik', '$saran','$rating')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
