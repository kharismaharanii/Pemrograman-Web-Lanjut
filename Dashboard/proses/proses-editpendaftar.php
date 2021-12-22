<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$nim = $_POST['nim'];

//query update
$query  = "UPDATE user SET nama = '$nama', username = '$username', nim = '$nim', email = '$email'";
$query .= "WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diubah.');window.location='../datapendaftar.php';</script>";
}
