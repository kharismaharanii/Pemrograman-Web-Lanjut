-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2021 pada 15.17
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswakuv2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(11) NOT NULL,
  `namabeasiswa` varchar(255) NOT NULL,
  `tenggatbeasiswa` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `penyelenggara` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `namabeasiswa`, `tenggatbeasiswa`, `keterangan`, `deskripsi`, `penyelenggara`, `status`, `foto`) VALUES
(23, 'Beasiswa Bondowoso', '2021-04-23', 'unesa.me/BeasiswaBondowoso', 'Beasiswa Bondowoso merupakan beasiswa yang diberikan kepada mahasiswa dengan asal Kabupaten Bondowoso dengan memperhatikan syarat dan ketentuan beasiswa.', 'Beasiswa Bondowoso merupakan beasiswa yang diberikan kepada mahasiswa dengan asal Kabupaten Bondowoso', 'Aktif', '278-Bondowoso.jpeg'),
(24, 'Beasiswa BI', '2021-04-22', 'unesa.me/BeasiswaBankIndonesia', 'Beasiswa Bank Indonesia adalah beasiswa yang diberikan oleh Bank Indonesia bagi mahasiswa jenjang sarjana (S1) di berbagai Perguruan Tinggi Negeri (PTN) sebagai bagian program sosial Bank Indonesia berupa bantuan biaya kuliah kepada mahasiswa yang memiliki prestasi akademik dan aktivitas sosial kemasyarakatan', 'Beasiswa Bank Indonesia adalah beasiswa yang diberikan oleh Bank Indonesia bagi mahasiswa jenjang sarjana (S1)', 'Tidak aktif', '254-BI.png'),
(25, 'Beasiswa UNESA', '2021-04-15', 'unesa.me/BeasiswaFreshgraduateUNESA', 'Universitas Negeri Surabaya (Unesa) memberikan beasiswa freshgraduate bagi lulusan sarjana (S1) untuk menempuh studi lanjut Program Magister (S2) Tahun Akademik 2021/2022 di Pascasarjana Unesa', 'Universitas Negeri Surabaya (Unesa) memberikan beasiswa freshgraduate bagi lulusan sarjana (S1)', 'Tidak Aktif', '79-Fresgred.jpeg'),
(26, 'Beasiswa PPA', '2021-04-07', 'unesa.me/LinkDaftarPPA', 'Beasiswa B-PPA (Beasiswa Peningkatan Prestasi Akademik dan BBP-PPA (Beasiswa Bantuan Pendidikan-PPA) diberikan kepada mahasiswa aktif berdasarkan periode tahun anggaran berjalan Kementerian Pendidikan dan Kebudayaan', 'Beasiswa ini diberikan kepada mahasiswa aktif berdasarkan periode tahun anggaran berjalan Kemendikbud', 'Tidak Aktif', '808-ppa.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataadmin`
--

CREATE TABLE `dataadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `hakakses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataadmin`
--

INSERT INTO `dataadmin` (`id`, `nama`, `username`, `password`, `email`, `foto`, `hakakses`) VALUES
(12, 'admin', 'admin', '6ad4664ba23eac71b5ef5e826ea0c6cd', 'reza@gmail.com', '769-zayn-malik-tinggalkan-islam-f914df45c35830fe1f6c13b80ec1fc1e_750x500.jpg', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kritiksaran`
--

INSERT INTO `kritiksaran` (`id`, `nama`, `kritik`, `saran`, `rating`) VALUES
(4, 'Kharismaharani', 'Bagus', 'Lebih ditingkatkan lagi fiturnya min', '1'),
(5, 'Zulfa', 'Kurang banyak min beasiswanya', 'Lebih diinformatifkan ya min mengenai beasiswanya, makasihh!!', '2'),
(20, 'kharismaa', 'tess', 'tess', '3'),
(21, 'Khar', 'Bagooss', 'Tambahin fitur lagi min', '2'),
(23, 'Reza Kurnia', 'Sudah bagus min', 'Semangat admin!', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hakakses` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `username`, `password`, `email`, `hakakses`, `foto`) VALUES
(23, 'Khar', '19051397015', 'kharismaunesa', '202cb962ac59075b964b07152d234b70', 'kharismaharani09@gmail.com', 'mahasiswa', '567-IMG-20210422-WA0006.jpg'),
(27, 'Muhammad Saiful Adim', '19051397021', 'adim', '202cb962ac59075b964b07152d234b70', 'adim@mhs.unesa.ac.id', 'admin', '399-Foto Unesa.jpg'),
(29, 'Reza Kurnia', '19051397021', 'rezaadmin', '21232f297a57a5a743894a0e4a801fc3', 'reza.19021@mhs.unesa.ac.id', 'mahasiswa', '726-Reza Kurnia.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resetpasswords`
--

CREATE TABLE `resetpasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resetpasswords`
--

INSERT INTO `resetpasswords` (`id`, `code`, `email`) VALUES
(13, '16094ab4e95db3', 'kharismaharani09@gmail.com'),
(14, '16094abaf57a3d', 'kharismaharani09@gmail.com'),
(15, '16094ad9121d2f', 'join.beasiswaku@gmail.com'),
(16, '16094aea5b03d1', 'kharismaharani09@gmail.com'),
(17, '160a0a2fd0b096', 'kharismaharani09@gmail.com'),
(18, '160a0a30d05242', 'kharismaharani09@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nim` text NOT NULL,
  `hakakses` varchar(100) NOT NULL,
  `foto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `nim`, `hakakses`, `foto`) VALUES
(46, 'Kharismaharani Aisyah Putri', 'mahasiswa', '5787be38ee03a9ae5360f54d9026465f', 'kharismaharani08@gmail.com', '', 'mahasiswa', '438-WhatsApp Image 2021-03-11 at 22.42.35.jpeg'),
(53, 'Reza Kurnia 1', 'rezaadmin', '21232f297a57a5a743894a0e4a801fc3', 'rezakurset@gmail.com', '190513970154', 'admin', '148-Foto Unesa Merah.jpg'),
(57, 'Percobaan', 'test', '202cb962ac59075b964b07152d234b70', 'gagasunesa5@gmail.com', '3653363', 'mahasiswa', '196-IMG_06092020_120852_500_x_496_piksel.jpg'),
(58, 'Reza Uhuy', 'reza22', '202cb962ac59075b964b07152d234b70', 'rezakursetss@gmail.com', '', 'mahasiswa', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dataadmin`
--
ALTER TABLE `dataadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resetpasswords`
--
ALTER TABLE `resetpasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `dataadmin`
--
ALTER TABLE `dataadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `resetpasswords`
--
ALTER TABLE `resetpasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
