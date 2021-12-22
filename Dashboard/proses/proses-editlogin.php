<?php

include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST["nama"];
// $nim = $_POST["nim"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$hakakses = $_POST["hakakses"];
$foto = $_FILES['foto']['name'];

$password = md5($_POST["password"]);

if ($foto != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',);
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $foto;
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru);

    $query  = "UPDATE user SET nama = '$nama', nim = '$nim', username = '$username', password = '$password', email = '$email', hakakses = '$hakakses', foto = '$nama_gambar_baru'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {

      echo "<script>alert('Data berhasil diubah.');window.location='../datalogin.php';</script>";
    }
  } else {

    echo "<script>alert('Ekstensi gambar yang boleh hanya .jpg, .png, .jpeg');window.location='proses-editlogin.php';</script>";
  }
} else {

  $query  = "UPDATE user SET nama = '$nama', nim = '', username = '$username', password = '$password', email = '$email', hakakses = '$hakakses'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {

    echo "<script>alert('Data berhasil diubah.');window.location='../datalogin.php';</script>";
  }
}
