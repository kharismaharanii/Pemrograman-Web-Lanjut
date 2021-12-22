<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../loginuser.php");
}

include('koneksi.php');
if (isset($_GET['id'])) {

    $id = ($_GET["id"]);

    $query = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='editlogin.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='editlogin.php';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftar</title>
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
                            <a href="datalogin.php">
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
                <div class="content read">
                    <div class="col-md-12">
                        <?php
                        $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$_SESSION[username]'");
                        $peg    = mysqli_fetch_array($tampilPeg);
                        ?>
                        <h2>
                            Edit Data
                        </h2>
                        <hr class=bg-secondary>
                        <form action="proses/proses-editlogin.php" method="POST" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $data['id']; ?>" hidden />
                            <img src="images/<?php echo $data['foto']; ?>" style="width: 220px;float: left;margin-bottom: 5px;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Foto</label>
                                <input type="file" class="form-control" onchange="loadFile(event)" name="foto" placeholder="Masukkan file foto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" value="<?php echo $data['nama']; ?>">
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" value="<?php echo $data['nim']; ?>">
                            </div> -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?php echo $data['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Masukkan password" value="<?php echo $data['password']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan E-mail" value="<?php echo $data['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Hak Akses:</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="hakakses">
                                        <option selected><?php echo $data['hakakses']; ?></option>
                                        <option value="mahasiswa">mahasiswa</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </div>
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