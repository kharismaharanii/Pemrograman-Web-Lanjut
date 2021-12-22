<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../loginuser.php");
}

include('koneksi.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Admin</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/tabledata.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                            <div>Hai, <?= $peg['nama'] ?></div>
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
                <div class="row">
                    <div class="content read">
                        <h2>Data Admin</h2>
                        <a href="tambahadmin.php" class="create-contact">Tambah Admin</a>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <!-- <th>Password</th> -->
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('koneksi.php');

                                //membuat pagimasi
                                $batas = 5;
                                $halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                $data = mysqli_query($koneksi, "select * from dataadmin");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                                $query = "SELECT * FROM dataadmin ORDER BY id ASC limit $halaman_awal, $batas";
                                $result = mysqli_query($koneksi, $query);

                                //mengecek apakah ada error ketika menjalankan query
                                if (!$result) {
                                    die("Query Error: " . mysqli_errno($koneksi) .
                                        " - " . mysqli_error($koneksi));
                                }

                                //buat perulangan untuk element tabel dari data mahasiswa
                                $no = 1; //variabel untuk membuat nomor urut
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td style="text-align: center;"><img src="images/<?php echo $row['foto']; ?>" style="width: 50px"></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <!-- <td><?php echo $row['password']; ?></td> -->
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['hakakses']; ?></td>
                                        <td>
                                            <a class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Data" name="tombol_edit" href="editadmin.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                                            <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data" name="tombol_edit" href="proses/proses-hapusadmin.php?id=<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                }
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end p-3">
                                <li class="page-item">
                                    <a class="page-link" <?php if ($halaman > 1) {
                                                                echo "href='?hal=$previous'";
                                                            } ?>><i class="fas fa-arrow-left"></i></a>
                                </li>
                                <?php
                                for ($x = 1; $x <= $total_halaman; $x++) {
                                ?>
                                    <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                echo "href='?hal=$next'";
                                                            } ?>><i class="fas fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>




</body>

</html>