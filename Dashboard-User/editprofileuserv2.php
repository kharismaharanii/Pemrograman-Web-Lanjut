<?php

include('koneksi.php');
$id = $_GET['id'];
$_SESSION['id'] = $id;


if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id =  '$id'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika ditemukan
            $nama = $data['nama'];
            $foto = $data['foto'];
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
        }
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
            <img src="../Dashboard/images/<?= @$foto ?>" class="img-thumbnail"></td>
        </div>
        <div class="col-lg-6">
            <div class="kritiksaranv2"><b>Edit Profile</b></div>

            <form action="proseseditprofil.php" method="POST" enctype="multipart/form-data">
                <input name="id" value="<?php echo $data['id']; ?>" hidden />


                <div class="form-group">
                    <label for="usr">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="<?= @$nama ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?= @$username ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?= @$email ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" value="<?= @$password ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Masukkan file foto">
                </div>
                <div class="buttoninput">
                    <input class="btn btn-primary" type="submit" value="simpan" name="simpan" role="button" style="float:right;"></input>
                </div>
            </form>
        </div>
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