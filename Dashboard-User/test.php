<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../loginuser.php");
}
if ($_SESSION['hakakses'] != "user") {
	die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}
include('koneksi.php');

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="style3.css" />
    <title>Beasiswaku</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="garis-navbar-atas"></div>
    <nav>
        <div class="logo">
            <h3>BEASISWAKU</h3>
        </div>

        <ul>
            <li><a href="index.php">Beasiswa</a></li>
            <li><a href="panduan.php">Kritik & Saran </a></li>
            <li><a href="tentangkami.php">Pengaturan Akun</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox"></input>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="garis-navbar-bawah"></div>
    <div class="bg-header">
        <div class="row">
            
        </div>
    </div>
    <div class="headerdashboard">
        <div class="nameuser" > <b>SELAMAT DATANG ,</b></div>
        <div class="userp" > Dapatkan Informasi terbaru beasiswa</div>
    </div>
    <div class="container-fluid px-md-4" >
    <div class="row">
							<div class="col-md-12">
								<div class="row">
                                    <div class="col-md-12 mt-lg-4 mt-4">
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <h1 class="h3 mb-0 text-gray-800">Beasiswaku</h1>
                    
                                        </div>
                                    </div>
                                    <?php
      include('../koneksi.php');
      $query = "SELECT * FROM beasiswa ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
									<div class="col-sm-3">
										<div class="card" style="width: 18rem;">
                                            <img src="images/<?php echo $row['foto']; ?>" class="card-img-top" alt="..."style="width: 50px" >
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row['namabeasiswa']; ?></h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <p class="card-text">Periode Berasiswa : </p>
                                            </div>
                                            <div class="card-footer text-muted">
                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                                            </div>
                                        </div>
									</div>
                                    <?php
                        $no++;
                    }
                    ?>


								</div>
							</div>
            </div>
    
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