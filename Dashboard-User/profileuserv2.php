<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../loginuser.php");
}
if ($_SESSION['hakakses'] != "mahasiswa") {
    die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}
include('koneksi.php');

?>
<?php
require 'fungsitambah.php';
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
			<script>
			alert('kritik dan saran berhasil dikirimkan');
			</script>
		";
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="style3.css" />
    <title>Beasiswaku</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
        .kritiksaranv2 {
            font-size: 25px;
            color: #003b5e;
            padding-top: 80px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="garis-navbar-atas"></div>
    <nav>
        <div class="logo">
            <h3>BEASISWAKU</h3>
        </div>

        <ul>
            <li><a href="berandauser.php">Beasiswa</a></li>
            <li><a href="kritiksaranv2.php">Kritik & Saran </a></li>
            <li><a href="profileuserv2.php">Pengaturan Akun</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox"></input>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="garis-navbar-bawah"></div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
            <div class="kritiksaranv2"><b>Foto Profil</b></div>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * from user WHERE username='$_SESSION[username]'");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <img src="../Dashboard/images/<?= $data['foto'] ?>" class="img-thumbnail"></td>
            <?php endwhile; ?>
        </div>
        <div class="col-lg-6">
            <div class="kritiksaranv2"><b>Edit Profil</b></div>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * from user WHERE username='$_SESSION[username]'");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <input name="id" value="<?php echo $data['id']; ?>" hidden />
                <div class="form-group">
                    <label for="usr">Nama:</label>
                    <div class="form-control"><?= $data['nama'] ?></div>
                </div>
                <div class="form-group">
                    <label for="pwd">Username:</label>
                    <div class="form-control"><?= $data['username'] ?></div>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <div class="form-control"><?= $data['email'] ?></div>
                </div>
                <div class="buttoninput">
                    <a href="editprofileuserv2.php?hal=edit&id=<?= $data['id'] ?>" type="button" class="btn btn-danger" style="float:right;">Update Profil</a>
                </div>
            <?php endwhile; ?>
            <div class="col-lg-2"></div>
            <br><br>
        </div>


        <div class="sosmed">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="follow-sosmed">
                        <center><b>IKUTI KAMI</b>
                            <div class="icon-sosmed">
                                <p>Berkenalan lebih jauh dengan Beasiswaku melalui saluran berikut :</p>
                                <a href="#" style="font-size:28px" class="fa">&#xf230;</a>
                                <a href="#" style="font-size:28px" class="fa">&#xf16d;</a>
                                <a href="#" style="font-size:28px" class="fa">&#xf081;</a>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <div class="beasiswaku">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <center><img src="../img/beasiswaku.png"></center>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <center>
                        <div class="posisi-footer"><img src="../img/logo1.png" alt="logo"></div>
                        <div class="deskripsi-footer">
                            <p>Beasiswa menurut KBBI yaitu beasiswa merupakan tunjangan uang yang diberikan kepada pelajar atau mahasiswa sebagai bantuan biaya belajar.</p>
                        </div>
                    </center>
                </div>
                <div class="col-lg-3">
                    <center>
                        <div class="posisi-footer"><b>NAVIGASI</b></div>
                        <center>
                            <div class="garis"></div>
                        </center>
                        <div class="navigasi">
                            <a href="" class="navigasi1">Panduan Daftar</a><br>
                            <a href="" class="navigasi1">Hubungi Kami</a>
                        </div>
                    </center>
                </div>
                <div class="col-lg-3">
                    <center>
                        <div class="posisi-footer"><b>HUBUNGI KAMI</b></div>
                        <div class="garis"></div>
                        <div class="deskripsi-footer">
                            <i style="font-size:32px" class="fa">&#xf041;</i>
                            Pulorejo , Tembelang, Jombang<br>
                            <i style="font-size:24px" class="fa">&#xf0e0;</i>
                            join.beasiswaku@gmail.com
                        </div>
                    </center>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <div class="copyright">
            <center> © 2021 | Beasiswaku </center>
        </div>
</body>
<script src="js/nav.js"></script>

</html>