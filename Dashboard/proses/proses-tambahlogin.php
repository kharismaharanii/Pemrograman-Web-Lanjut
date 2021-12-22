<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

$nama = $_POST["nama"];
// $nim = $_POST["nim"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$hakakses = $_POST["hakakses"];
$foto = $_FILES['foto']['name'];

$password = md5($_POST["password"]);

//cek dulu jika ada gambar produk jalankan coding ini
if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
        $query = "INSERT INTO user (nama, nim, username, password, email, hakakses,foto) VALUES ('$nama', '', '$username', '$password','$email','$hakakses', '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil ditambah.');window.location='../datalogin.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../tambahlogin.php';</script>";
    }
} else {
    //query insert data
    $query = "INSERT INTO user
                VALUES
                ('','$nama','$nim','$username','$password','$email','$hakakses','$foto')
            ";
    mysqli_query($koneksi, $query);

    // cek apakah data berhasil ditambahkan
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = '../datalogin.php'
         </script>";
    }
}
