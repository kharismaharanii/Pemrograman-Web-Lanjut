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
	<title>Kritik Saran</title>
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
				<div class="col-md-12">
					<?php
					$tampilPeg    = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$_SESSION[username]'");
					$peg    = mysqli_fetch_array($tampilPeg);
					?>
					<h2>
						Kritik Saran
					</h2>
					<hr class=bg-secondary>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Kritik</th>
								<th>Saran</th>
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

							$data = mysqli_query($koneksi, "select * from beasiswa");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);

							// jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
							$query = "SELECT * FROM kritiksaran ORDER BY id DESC limit $halaman_awal, $batas";
							$result = mysqli_query($koneksi, $query);

							//mengecek apakah ada error ketika menjalankan query
							if (!$result) {
								die("Query Error: " . mysqli_errno($koneksi) .
									" - " . mysqli_error($koneksi));
							}

							$no = 1; //variabel untuk membuat nomor urut
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['kritik']; ?></td>
									<td><?php echo $row['saran']; ?></td>
								</tr>
							<?php
								$no++;
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
		</div>
	</div>


</body>

</html>