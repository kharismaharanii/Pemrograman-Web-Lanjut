<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../loginuser.php");
}

include('koneksi.php');
if (isset($_GET['id'])) {

    $id = ($_GET["id"]);

    $query = "SELECT * FROM beasiswa WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='edibeasiswa.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='editbeasiswa.php';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Beasiswa</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active")
            })
        });
    </script>
</head>

<body>

    <div class="wrapper">

        <div class="top_navbar">
            <div class="logo">
                <a href="#">BEASISWAKU</a>
            </div>
            <div class="top_menu">
                <div class="home_link">

                </div>
                <div class="right_info">
                    <?php
                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$_SESSION[username]'");
                    $peg    = mysqli_fetch_array($tampilPeg);
                    ?>
                    <div class="icon_wrap">
                        <div class="icon">
                            <a>Hai, <?= $peg['nama'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_body">

            <div class="sidebar_menu">
                <div class="inner__sidebar_menu">
                    <ul>
                        <li>
                            <a href="wp-admin.php">
                                <span class="icon"><i class="far fa-chart-bar"></i></span>
                                <span class="list">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="datalogim.php">
                                <span class="icon"><i class="fas fa-user-clock"></i></span>
                                <span class="list">Data Login</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="datamahasiswa.php">
                                <span class="icon"><i class="fas fa-user-check"></i></span>
                                <span class="list">Data Mahasiswa</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="databeasiswa.php">
                                <span class="icon"><i class="fas fa-graduation-cap"></i></span>
                                <span class="list">Data Beasiswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="dataadmin.php">
                                <span class="icon"><i class="fas fa-user-clock"></i></span>
                                <span class="list">Data Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="kritiksaran.php">
                                <span class="icon"><i class="fas fa-comments"></i></span>
                                <span class="list">Kritik Saran</span>
                            </a>
                        </li>
                        <li>
                            <a href="../logout.php">
                                <span class="icon"><i class="fas fa-sign-out-alt mr-2"></i></span>
                                <span class="list">Keluar</span>
                            </a>
                        </li>
                    </ul>

                    <div class="hamburger">
                        <div class="inner_hamburger">
                            <span class="arrow">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="col-md-12">
                    <?php
                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$_SESSION[username]'");
                    $peg    = mysqli_fetch_array($tampilPeg);
                    ?>
                    <h2>
                        Edit Beasiswa
                    </h2>
                    <hr class=bg-secondary>
                    <form action="proses/proses-editbeasiswa.php" method="POST" enctype="multipart/form-data">
                        <input name="id" value="<?php echo $data['id']; ?>" hidden />
                        <img src="images/<?php echo $data['foto']; ?>" style="width: 220px;float: left;margin-bottom: 5px;">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pamflet</label>
                            <input type="file" name="foto" value="<?php echo $data['foto']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Beasiswa</label>
                            <input type="text" class="form-control" name="namabeasiswa" placeholder="Nama lengkap anda" value="<?php echo $data['namabeasiswa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Beasiswa</label>
                            <input type="text" class="form-control" name="tenggatbeasiswa" placeholder="NIM anda" value="<?php echo $data['tenggatbeasiswa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link Penunjang</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Username anda" value="<?php echo $data['keterangan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <input type="text" class="form-control" name="status" placeholder="E-mail anda" value="<?php echo $data['status']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>


</body>

</html>