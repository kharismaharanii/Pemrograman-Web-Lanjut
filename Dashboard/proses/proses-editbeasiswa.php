<?php

include 'koneksi.php';


$id = $_POST['id'];
$namabeasiswa   = $_POST['namabeasiswa'];
$tenggatbeasiswa     = $_POST['tenggatbeasiswa'];
$keterangan    = $_POST['keterangan'];
$status    = $_POST['status'];
$foto = $_FILES['foto']['name'];

if ($foto != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',);
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $foto;
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru);


    $query  = "UPDATE beasiswa SET namabeasiswa = '$namabeasiswa', tenggatbeasiswa = '$tenggatbeasiswa', keterangan = '$keterangan', status = '$status', foto = '$nama_gambar_baru'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {

      echo "<script>alert('Data berhasil diubah.');window.location='../databeasiswa.php';</script>";
    }
  } else {

    echo "<script>alert('Ekstensi gambar yang boleh hanya .jpg, .png, .jpeg');window.location='proses-editbeasiswa.php';</script>";
  }
} else {

  $query  = "UPDATE beasiswa SET namabeasiswa = '$namabeasiswa', tenggatbeasiswa = '$tenggatbeasiswa', keterangan = '$keterangan', status = '$status'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {

    echo "<script>alert('Data berhasil diubah.');window.location='../databeasiswa.php';</script>";
  }
}
