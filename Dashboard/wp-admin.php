<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../login.php");
}
if ($_SESSION['hakakses'] != "admin") {
	die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}

include('koneksi.php');
$data1 = mysqli_query($koneksi, "SELECT nama FROM user");
$jumlah_data1 = mysqli_num_rows($data1);

//jumlah data di pendaftar


//jumlah data di pelajar
$data3 = mysqli_query($koneksi, "SELECT namabeasiswa FROM beasiswa");
$jumlah_data3 = mysqli_num_rows($data3);

//jumlah data di modul
$data4 = mysqli_query($koneksi, "SELECT id FROM kritiksaran");
$jumlah_data4 = mysqli_num_rows($data4);


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
						$tampilPeg    = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$_SESSION[username]'");
						$peg    = mysqli_fetch_array($tampilPeg);
						?>
						<h2>
							Dashboard
						</h2>
						<hr class=bg-secondary>
						<!-- <div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<a>Selamat Datang, <?= $peg['nama'] ?></a>
					</div> -->
						<div class="row">
							<div class="col-sm-4">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Data Login</h5>
										<p class="card-text">Jumlah data Login adalah : <?php echo $jumlah_data1; ?> </p>
										<a href="datalogin.php" class="btn btn-primary">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Data Beasiswa</h5>
										<p class="card-text">Jumlah data Beasiswa adalah : <?php echo $jumlah_data3; ?></p>
										<a href="databeasiswa.php" class="btn btn-primary">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Kritik & Saran</h5>
										<p class="card-text">Jumlah data kritik & saran adalah : <?php echo $jumlah_data4; ?></p>
										<a href="kritiksaran.php" class="btn btn-primary">Lihat Selengkapnya</a>
									</div>
								</div>
							</div><br><br>
							<div style="width: 800px;margin: 0px auto; margin-top:20px">
								<canvas id="myChart"></canvas>
							</div>

							<br />
							<br />

							<script>
								var ctx = document.getElementById("myChart").getContext('2d');
								var myChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: ["Kurang", "Cukup", "Baik", "Sangat Baik"],
										datasets: [{
											label: '',
											data: [
												<?php
												$jumlah_teknik = mysqli_query($koneksi, "select * from kritiksaran where rating='1'");
												echo mysqli_num_rows($jumlah_teknik);
												?>,
												<?php
												$jumlah_ekonomi = mysqli_query($koneksi, "select * from kritiksaran where rating='2'");
												echo mysqli_num_rows($jumlah_ekonomi);
												?>,
												<?php
												$jumlah_fisip = mysqli_query($koneksi, "select * from kritiksaran where rating='3'");
												echo mysqli_num_rows($jumlah_fisip);
												?>,
												<?php
												$jumlah_pertanian = mysqli_query($koneksi, "select * from kritiksaran where rating='4'");
												echo mysqli_num_rows($jumlah_pertanian);
												?>
											],
											backgroundColor: [
												'rgba(255, 99, 132, 0.2)',
												'rgba(54, 162, 235, 0.2)',
												'rgba(255, 206, 86, 0.2)',
												'rgba(75, 192, 192, 0.2)'
											],
											borderColor: [
												'rgba(255,99,132,1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)'
											],
											borderWidth: 1
										}]
									},
									options: {
										scales: {
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									}
								});
							</script>

						</div>

					</div>
				</div>


</body>

</html>