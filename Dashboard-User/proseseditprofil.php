<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',);
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../Dashboard/images/' . $nama_gambar_baru);


        $query  = "UPDATE user SET nama = '$nama', username = '$username', password = '$password', email = '$email', foto = '$nama_gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {

            echo "<script>alert('Data berhasil diubah.');window.location='profileuserv2.php';</script>";
        }
    } else {

        echo "<script>alert('Ekstensi gambar yang boleh hanya .jpg, .png, .jpeg');window.location='proseeditprofil.php';</script>";
    }
} else {
    //query update
    $query  = "UPDATE user SET nama = '$nama', username = '$username', password = '$password', email = '$email'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='profileuserv2.php';</script>";
    }
}
