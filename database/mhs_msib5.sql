-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2023 pada 05.48
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs_msib5`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(40) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `fullname`, `email`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Nasrul', 'nasrul99@gmail.com', 'nasrul', '7db99588d82ab7cdaec9470afb23fb7b900d58e0', 'admin', NULL),
(2, 'Budi Santoso', 'budi@gmail.com', 'budi', 'e9124cb8c35adccc0f946539bd16f769e5160280', 'manager', NULL),
(3, 'Ahmad Mulyawan', 'ahmad@gmail.com', 'ahmad', 'c8bd2f598dcb1074fa556cb448554c2a3bca1fc6', 'staff', NULL),
(4, 'Dewi Maharani', 'dewi@gmail.com', 'dewi', 'dewi', 'staff', NULL),
(13, 'Zian', 'ziannaisila123@gmail.com', 'zian', 'dc6eabe6f385332d6af9970d038e9138615ff123', 'admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `idagama` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `media_sosial` varchar(45) NOT NULL,
  `prodi` varchar(45) NOT NULL,
  `kampus` varchar(45) NOT NULL,
  `mentor` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `person`
--

INSERT INTO `person` (`id`, `idagama`, `nama`, `gender`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `email`, `media_sosial`, `prodi`, `kampus`, `mentor`, `foto`) VALUES
(7, 1, 'Irgi rama sulistio', 'Laki-laki', 'Bogor', '2002-06-03', 'Penilaian (Jawaban)         \'089612431791    ', 'irgirama01@gmail.com', 'irgiramz', '', 'Politeknik Negeri Media Kreatif', '', 'Irgi.jpg'),
(8, 1, 'Ahmad Fadhliansyah ', 'Laki-laki', 'Dki Jakarta', '2003-12-06', '082114254952', 'fadhliansyah9f@gmail.com', 'fadhliansyaah', '', 'Stt NF', '', ''),
(42, 4, 'Nata Nara Narendra Putra Suanda', 'Laki-laki', 'Sumbawa Besar', '2003-07-30', '089675998114', 'natanaranarendra@gmail.com', 'natanaraps', '', 'Universitas Udayana', '', 'nata.jpg'),
(43, 1, 'Muhammad Jaisy Adli', 'Laki-laki', 'Bekasi', '2004-01-13', '089512391211', 'muhjaisyadli@gmail.com', 'jaisyadli', '', 'STT NF', '', ''),
(44, 1, 'Adi', 'Laki-laki', 'Pamekasan', '2000-10-29', '081937264222', 'adilrindu29@gmail.com', '@adialfatih45', '', 'Institut Sains danTeknologi Annuqayah', '', 'adli.jpg'),
(45, 1, 'Qonita Azizah ', 'perempuan', 'Panyalaian ', '2002-03-08', '085761434808', 'qonita.azizah@student.pradita.ac.id', 'qonitaazh_', '', 'Pradita University ', '', ''),
(46, 1, 'Izzudin muktar ', 'Laki-laki', 'Depok', '2003-06-27', '083122661966', 'izudinmuktar5@gmail.com', 'mukktaaaaar', '', 'STT Terpadu Nurul Fikri ', '', 'Izudin.jpg'),
(47, 1, 'MOCH FIKRI RAMADHAN', 'Laki-laki', 'Depok', '2001-10-11', '089684711291', 'libr.libr1711@gmail.com', '@fikrii1711', '', 'Sekolah Tinggi Teknologi Terpadu Nurul Fikri', '', 'Fikri.jpg'),
(48, 1, 'Sri Lestari', 'perempuan', 'Pati', '2002-09-28', '08157945227', 'lestatari41@gmail.com', 'taarrrrri', '', 'Universitas Muria Kudus', '', 'Sri.jpg'),
(49, 1, 'Septia Dwi Kurniasih', 'perempuan', 'Jakarta', '1995-09-18', '087889018920', 'septiadk2@gmail.com', 'cepiaaaws', '', 'Unsurya', '', 'Septia.jpeg'),
(50, 1, 'Putra Habib Al Aziz ', 'Laki-laki', 'Rantau karya ', '2003-12-23', '085377519996', 'putrahabibalaziz@gmail.com', 'ajizz11_', '', 'Politeknik Manufaktur Negeri Bangka Belitung ', '', ''),
(51, 1, 'Siti Amdah', 'perempuan', 'Tangerang', '2001-04-14', '08979281365', 'siti.amdah14@gmail.com', 'amdah14', '', 'STT Terpadu Nurul Fikri', '', ''),
(52, 1, 'Renawati', 'perempuan', 'Tangerang', '2001-05-22', '085282884467', 'rena09910@gmail.com', 'ren_aniqobie', '', 'STT Terpadu Nurul Fikri', '', ''),
(53, 1, 'Hanif Hidayatulloh ', 'Laki-laki', 'Brebes', '2003-11-28', '087862678478', 'hanifhidayatulloh2811@gmail.com', 'hanief_nief', '', 'STT Terpadu Nurul Fikri', '', 'hanif.jpg'),
(55, 1, 'Ariza Akmal Syahida', 'Laki-laki', 'Bantul', '2003-04-13', '083849257999', 'arizaakmal04@gmail.com', 'arizaakmal13', '', 'Universitas Amikom Yogyakarta', '', ''),
(56, 1, 'Muarif Rizqy', 'Laki-laki', 'Brebes', '2001-11-21', '085326762608', 'murizqyarf17@gmail.com', 'Arif_rzym', '', 'Universitas Peradaban', '', ''),
(57, 1, 'Muhammad Alifi Ferdiansyah', 'Laki-laki', 'Tulungagung', '2002-07-24', '088217206039', 'alifi240700@gmail.com', 'alifi_24', '', 'Universitas Bhinneka PGRI', '', ''),
(58, 1, 'Fajar septianto', 'Laki-laki', 'jakarta selatan', '2002-09-06', '085889432197', 'fajar23.septianto@gmail.com', 'slashandback', '', 'STT Nurul Fikri', '', ''),
(63, 1, 'Muhammad Bahrul Ulum', 'Laki-laki', 'Pontianak', '2002-09-15', '087716374672', 'rangga.agg2018@gmail.com', '@ulum_kane', '', 'Universitas Tanjungpura', '', ''),
(64, 1, 'Hadi Prasetiyo', 'Laki-laki', 'Samarinda', '2002-06-16', '085711228592', 'hadiiyok01@gmail.com', '@hadiiprasetiyo', '', 'Universitas Mulawarman', '', ''),
(65, 1, 'Euis safania', 'perempuan', 'Cirebon', '0001-10-25', '083156525468', 'euissafania8703@students.unnes.ac.id', '@safania.euis', '', 'Universitas Negeri Semarang', '', ''),
(66, 1, 'Ulayya Salmaa Khoirunnisaa', 'perempuan', 'Kudus', '2003-05-28', '081215627905', 'ulayyasalmaa28@gmail.com', 'salmaaul._', '', 'Universitas Muria Kudus', '', ''),
(67, 1, 'Ahmad Riziq', 'Laki-laki', 'Jakarta', '2002-07-18', '085939446587', 'ahmadriziq010@gmail.com', '@arizieq', '', 'Sekolah Tinggi Teknologi terpadu Nurul fikri', '', ''),
(68, 2, 'Carmennita Soleman', 'perempuan', 'Samarinda', '2004-01-24', '085350232057', 'nitacarmen06@gmail.com', '@carmeennita', '', 'Universitas Mulawarman', '', ''),
(69, 1, 'Dimas Andhika Firmansyah ', 'Laki-laki', 'Pemalang ', '2003-07-20', '089630147925', 'dmsandhika87@gmail.com', 'dmsandhika_', '', 'Universitas Negeri Semarang ', '', ''),
(70, 1, 'Ahmad Zuaidi', 'Laki-laki', 'Sumenep ', '2001-11-02', '085963093822', 'ahmadzuaidi892@gmail.com', 'ahmd.zdi__', '', 'IST Annuqayah', '', ''),
(71, 1, 'SHABRINA PRIMADEWI', 'perempuan', 'kudus', '2003-01-09', '085848686194', 'shabrinaprima@gmail.com', 'shabrinampol', '', 'Universitas Muria Kudus', '', ''),
(72, 1, 'Anisa', 'perempuan', 'depok', '2003-10-09', '083895461608', 'anisaaabcd@gmail.com', 'SyNissa', '', 'Stt terpadu nurul Fikri ', '', ''),
(73, 1, 'Shafa Salsabila Febriani', 'perempuan', 'Depok', '2002-02-20', '0895706510309', 'shafafebriani4@gmail.com', '@shafaslls', 'Sistem Informasi', 'UBSI Depok', 'Fathan Mubin', 'shafa.jpg'),
(74, 1, 'Nasyath Faykar ', 'Laki-laki', 'Pekalongan ', '2002-11-30', '088806923500', 'nasyathfaykar@gmail.com', 'faykarr_', '', 'STMIK WIDYA PRATAMA PEKALONGAN ', '', 'nasyath.jpg'),
(75, 1, 'Maulidhiansyah Bayu Setiawan', 'Laki-laki', 'Jakarta', '2003-05-10', '089507631813', 'maulidhiansyahbayu@gmail.com', '@inibayou', 'Teknik Informatika', 'STT Terpadu Nurul Fikri ', 'Nasrul', 'bayu.jpg'),
(76, 2, 'RANGGA EKKLESIA GABRIEL ANUGRAHNU', 'Laki-laki', 'palangkaraya', '2002-06-08', '083143508517', 'ranggaekkle20020806@gmail.com', 'rangga_e.g.a', 'Teknik Informatika', 'UNIVERSITAS PALANGKARAYA ', 'Fathan Mubin', 'user.png'),
(77, 1, 'Muhammad Alif Firdaus Arizona', 'Laki-laki', 'Surabaya', '2002-03-14', '082132306322', '20410100080@dinamika.ac.id', '@afarizona_', 'Sistem Informasi', 'Universitas Dinamika', 'Nasrul', 'alif.jpeg'),
(78, 1, 'Zian Naisila Anjarwati', 'perempuan', 'Sumedang', '2001-02-24', '089652639063', 'ziannaisila@gmail.com', 'ziannaisilaa', 'Sistem Informasi', 'STMIK - IM Bandung', 'Fathan Mubin', 'zian.jpg'),
(79, 1, 'kurniawan', 'Laki-laki', 'sumedang', '2001-08-19', '081411096708', 'ikurniawannf@gmail.com', 'i_kr19', 'Teknik Informatika', 'SEKOLAH TINGGI TEKNOLOGI TERPADU NURUL FIKRI', 'Nasrul', 'Kurniawan.jpg'),
(80, 1, 'Milda Khusnul Khotimah', 'perempuan', 'Lumajang', '2003-02-26', '087863533945', 'mildakhusnul999@gmai.com', '_mldkhsnl', 'Sistem Informasi', 'Politeknik Negeri Malang', 'Fathan Mubin', 'milda.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_person_agama` (`idagama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_agama` FOREIGN KEY (`idagama`) REFERENCES `agama` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
