<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hakakses = $_POST['hakakses'];
$foto = $_FILES['foto']['name'];
$password = md5($password);


if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',);
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru);


        $query  = "UPDATE dataadmin SET nama = '$nama', username = '$username', password = '$password',email = '$email', foto = '$nama_gambar_baru', hakakses = '$hakakses'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {

            echo "<script>alert('Data berhasil diubah.');window.location='../dataadmin.php';</script>";
        }
    } else {

        echo "<script>alert('Ekstensi gambar yang boleh hanya .jpg, .png, .jpeg');window.location='proses-editadmin.php';</script>";
    }
} else {
    $query  = "UPDATE dataadmin SET nama = '$nama', username = '$username', password = '$password',email = '$email',hakakses = '$hakakses'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='../dataadmin.php';</script>";
    }
}
