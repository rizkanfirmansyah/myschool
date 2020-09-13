-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2020 pada 21.11
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen` int(11) NOT NULL,
  `id_guru` char(25) NOT NULL,
  `keterangan` char(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen`, `id_guru`, `keterangan`, `date`) VALUES
(7, '11717500', 'izin', '2020-09-11 16:54:50'),
(8, '11717500', 'sakit', '2020-09-12 13:56:47'),
(9, '11717501', 'hadir', '2020-09-12 16:19:23'),
(10, '11717502', 'hadir', '2020-09-12 16:19:28'),
(11, '11717503', 'hadir', '2020-09-12 16:19:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `angkatan_id` int(11) NOT NULL,
  `angkatan_nama` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`angkatan_id`, `angkatan_nama`) VALUES
(1, 2014),
(2, 2015),
(3, 2016),
(4, 2017),
(5, 2018),
(6, 2019),
(7, 2020),
(8, 2021),
(9, 2022),
(10, 2023),
(11, 2024),
(12, 2025),
(13, 2026);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `merk_barang` int(11) NOT NULL,
  `unit_barang` int(11) NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `harga` int(25) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `merk_barang`, `unit_barang`, `jenis_barang`, `harga`, `status`, `tanggal`) VALUES
(2, 'Sock Breker', 1, 2, 1, 15000, 1, '0000-00-00 00:00:00'),
(4, 'USB ADAPTER', 2, 3, 3, 125000, 1, '2020-09-09 18:49:27'),
(8, 'router', 4, 5, 3, 10000, 1, '2020-09-09 19:00:36'),
(11, 'USB ADAPTER', 3, 3, 3, 125000, 1, '2020-09-12 23:12:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_keahlian`
--

CREATE TABLE `bidang_keahlian` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_keahlian`
--

INSERT INTO `bidang_keahlian` (`id`, `nama`, `keterangan`, `gambar`) VALUES
(1, 'Networking', 'Disini, kalian akan diajari bagaimana cara menjadi seorang Network Administration (Admin jaringan) dan bagaimana cara menjadi teknisi jaringan yang baik berbasis Linux, Cisco, dan Mikrotik sebagai tujuan pembelajarannya. Disini juga kalian akan diajarkan bagaimana keahlian yang akan dibutuhkan pada dunia industri nanti.', '1logo.jpg'),
(2, 'Programming', 'Disini, kalian akan mempelajari bagaimana suatu sistem atau user interface seperti website, aplikasi dan lain sebagainya terbentuk oleh blok-blok kode yang disusun untuk mempermudah segala aktivitas manusia. Kalian akan diberikan materi yang bertujuan untuk memenuhi permintaan industri dan kurikulum 4.0', '2logo.jpg'),
(3, 'Multimedia', 'Disini, kalian akan mempelajari bagaimana cara membuat animasi, design, user interface dan lain sebagainya untuk menciptakan sebuah karya yang berguna untuk memperindah, mempercantik, atau multifungsi bagi masyarakat maupun instansi-instansi tertentu.', '3logo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `besar` varchar(12) NOT NULL,
  `kecil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id`, `besar`, `kecil`) VALUES
(1, 'Juli', 7),
(2, 'Agustus', 8),
(3, 'September', 9),
(4, 'Oktober', 10),
(5, 'November', 11),
(6, 'Desember', 12),
(7, 'Januari', 1),
(8, 'Februari', 2),
(9, 'Maret', 3),
(10, 'April', 4),
(11, 'Mei', 5),
(12, 'Juni', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_jawaban`
--

CREATE TABLE `cbt_jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawabanA` varchar(512) DEFAULT NULL,
  `jawabanB` varchar(512) DEFAULT NULL,
  `jawabanC` varchar(512) DEFAULT NULL,
  `jawabanD` varchar(512) DEFAULT NULL,
  `jawabanE` varchar(512) DEFAULT NULL,
  `fileA` varchar(255) DEFAULT NULL,
  `fileB` int(255) DEFAULT NULL,
  `fileC` varchar(255) DEFAULT NULL,
  `fileD` varchar(255) DEFAULT NULL,
  `fileE` varchar(255) DEFAULT NULL,
  `jawaban` char(2) DEFAULT NULL,
  `bobot_nilai` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_jawaban`
--

INSERT INTO `cbt_jawaban` (`id`, `id_soal`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`, `fileA`, `fileB`, `fileC`, `fileD`, `fileE`, `jawaban`, `bobot_nilai`) VALUES
(2, 8, 'python', 'PHP', 'python', 'C#', 'C++', '2e35897e949eccb4ee7528debafbaa8c.png', NULL, NULL, 'fea3f01bd093ab9f6c84de8433398d6e.jpeg', NULL, 'C', '3'),
(4, 9, '1 dengan 1', '2 dengan 2', '3 dengan 3', '4 dengan 4', '5 dengan 5', '0181a65148dd631b730a7ab69af28715.png', 8, 'dd823be0bf014b692cf0f99f28521ddc.jpg', '3bd02b3560103316059ca22ce5e9bca0.png', NULL, 'B', '2'),
(5, 10, 'jawaban A', 'jawaban B', 'jawaban C', 'jawaban D', 'jawaban E', NULL, NULL, NULL, NULL, NULL, 'D', '5'),
(6, 11, 'IP Address', 'Ip Address adalah IP', 'ajhdwawad', 'awdwadwad', 'awdwad', NULL, NULL, NULL, NULL, NULL, 'B', '10'),
(7, 12, 'ini jawaban A', 'ini jawaban B', 'ini jawaban C', 'ini jawaban D', 'ini jawaban E', NULL, NULL, NULL, NULL, NULL, 'C', '4'),
(8, 13, 'ini jawaban B', 'ini jawaban B', 'ini jawaban B', 'ini jawaban B', 'ini jawaban B', NULL, NULL, NULL, NULL, NULL, 'B', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `file_soal` varchar(255) DEFAULT NULL,
  `create_at` date NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_soal`
--

INSERT INTO `cbt_soal` (`id`, `id_ujian`, `no_urut`, `soal`, `file_soal`, `create_at`, `update_on`) VALUES
(8, 5, 1, '<b>                                     Isi soal disini </b><i style=\"\">coba lagi</i>', '35d0ac8474f4bd2b5c9cedb29b2eb1e7.jpg', '2020-08-27', '2020-09-04 12:08:01'),
(9, 5, 2, '                                     Apa yang dimaksud one vs one?', 'd15a5d337b853bf7a6e4c2711a9960db.png', '2020-08-28', '2020-09-03 13:27:16'),
(10, 5, 3, '                                     Apa yang dimaskud dengan IT Club? sebutkan minimal 5 kelebihan dan kekurangan eskul IT CLub SMKN 5 Bandung yang kalian ketahui !', '5835e1e480b1063791c7178e2d525397.png', '2020-09-03', '2020-09-03 14:39:11'),
(11, 8, 1, 'apa yang dimaksud dengan <b>IP Address</b>', NULL, '2020-09-13', '2020-09-13 06:37:52'),
(12, 13, 1, 'Robbana atina fid dunya hasanah .....', NULL, '2020-09-14', '2020-09-13 17:15:00'),
(13, 13, 2, '                                     wa fil akhirati .....', NULL, '2020-09-14', '2020-09-13 17:18:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_ujian`
--

CREATE TABLE `cbt_ujian` (
  `id` int(11) NOT NULL,
  `id_mapel` char(12) NOT NULL,
  `id_guru` char(12) NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `deskripsi_ujian` text NOT NULL,
  `kkm` int(11) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL,
  `create_at` date NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mulai_at` datetime NOT NULL,
  `akhir_at` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `tipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_ujian`
--

INSERT INTO `cbt_ujian` (`id`, `id_mapel`, `id_guru`, `nama_ujian`, `deskripsi_ujian`, `kkm`, `auth_key`, `create_at`, `update_on`, `mulai_at`, `akhir_at`, `active`, `tipe`) VALUES
(3, '9', '11717500', 'INI TLJ', 'deskripsi', 75, 'MzUwMTU=', '2020-09-11', '2020-09-10 18:41:17', '2020-09-11 01:38:00', '2020-09-11 01:43:00', 1, 1),
(5, '2', '11717500', 'INI MATEMATIKA', 'Masukan deskripsi soal', 75, 'OTU3OTA=', '2020-09-11', '2020-09-10 17:48:40', '2020-09-11 00:48:00', '2020-09-11 12:48:00', 1, 2),
(8, '12', '11717500', 'Cara menghitung dengan baik', 'Masukan deskripsi soal', 75, 'MzAyMTc=', '2020-09-13', '2020-09-13 12:30:55', '2020-09-13 13:29:00', '2020-09-13 19:33:00', 1, 3),
(9, '12', '11717500', 'UAS kompetensi Dasar', 'dilarang mencontek dilarang mencontek dilarang mencontek dilarang mencontek dilarang mencontek dilarang mencontek', NULL, 'ODQ4MjQ=', '2020-09-04', '2020-09-05 10:14:46', '2020-09-04 18:51:00', '2020-09-05 18:51:00', 0, NULL),
(12, '12', '11717500', 'Cara menghitung dengan baik', 'Masukan deskripsi soal', NULL, 'MTYwNTA=', '2020-09-11', '2020-09-10 18:01:02', '2020-09-11 01:00:00', '2020-09-11 13:01:00', 0, 1),
(13, '9', '11717500', 'ahdwaudhauwhduwahduwahd', 'Masukan deskripsiajdawjdawdkwadkwad soal', 70, 'MTk0MzQ=', '2020-09-14', '2020-09-13 17:39:17', '2020-09-14 00:39:00', '2020-09-14 00:42:00', 1, 3),
(16, '9', '11717500', 'coba kkm', 'Masukan deskripsi soalawdwad', 78, 'OTYxNDE=', '2020-09-14', '2020-09-13 17:38:51', '2020-09-14 00:39:00', '2020-09-14 00:39:00', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(12) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `keterangan` varchar(16) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id`, `id_siswa`, `id_mapel`, `id_kelas`, `keterangan`, `date`) VALUES
(30, '11717001', 4, 1, 'izin', '19-Aug-2020'),
(34, '11717444', 4, 13, 'sakit', '19-Aug-2020'),
(38, '11717444', 4, 1, 'hadir', '20-Aug-2020'),
(40, '11717001', 4, 1, 'alfa', '20-Aug-2020'),
(41, '11717444', 4, 1, 'izin', '2-Aug-2020'),
(42, '11717444', 4, 1, 'izin', '22-Aug-2020'),
(45, '11717003', 4, 1, 'izin', '24-Aug-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_blog`
--

CREATE TABLE `data_blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `artikel` varchar(10240) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `tag` varchar(128) NOT NULL,
  `time` int(11) NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  `is_active` int(11) NOT NULL,
  `lihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_blog`
--

INSERT INTO `data_blog` (`id`, `judul`, `image`, `email`, `artikel`, `deskripsi`, `tag`, `time`, `date`, `is_active`, `lihat`) VALUES
(1, 'Cara konfigurasi samba server', 'logo-4.png', 'firmansyahrizkan099@gmail.com', '<p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers</p>\r\n\r\n<p>By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>\r\n\r\n<p>We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materializ</p>\r\n', 'Cara men konfigurasi samba server di debian 8, disini anda akan membuat sebuah server dengan fungsi sebagai penyimpanan data dan', 'networking', 2147483647, '0000-00-00', 1, 585),
(2, 'Jaringan komputer', 'logo-42.png', 'firmansyahrizkan099@gmail.com', '<p style=\"text-align:center\"><span style=\"font-size:24px\">SEJARAH JARINGAN KOMPUTER</span><br />\n&nbsp;</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p>Sejarah jaringan komputer bermula dari lahirnya konsep jaringan komputer pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1940\" title=\"1940\">1940</a>-an di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Amerika\" title=\"Amerika\">Amerika</a>&nbsp;yang digagas oleh sebuah proyek pengembangan komputer MODEL I di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Laboratorium_Bell\" title=\"Laboratorium Bell\">laboratorium Bell</a>&nbsp;dan group riset&nbsp;<a href=\"https://id.wikipedia.org/wiki/Universitas_Harvard\" title=\"Universitas Harvard\">Universitas Harvard</a>&nbsp;yang dipimpin profesor&nbsp;<a href=\"https://id.wikipedia.org/wiki/Howard_Aiken\" title=\"Howard Aiken\">Howard Aiken</a>. Pada mulanya proyek tersebut hanyalah ingin memanfaatkan sebuah perangkat komputer yang harus dipakai bersama. Untuk mengerjakan beberapa proses tanpa banyak membuang waktu kosong dibuatlah proses beruntun (<em>Batch Processing</em>), sehingga beberapa program bisa dijalankan dalam sebuah komputer dengan kaidah antrian.</p>\n\n<p>Kemudian pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1950\" title=\"1950\">1950</a>-an ketika jenis komputer mulai berkembang sampai terciptanya&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Super_komputer&amp;action=edit&amp;redlink=1\" title=\"Super komputer (halaman belum tersedia)\">super komputer</a>, maka sebuah komputer harus melayani beberapa tempat yang tersedia (<em>terminal</em>), untuk itu ditemukan konsep distribusi proses berdasarkan waktu yang dikenal dengan nama&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=TSS&amp;action=edit&amp;redlink=1\" title=\"TSS (halaman belum tersedia)\">TSS</a>&nbsp;(<em>Time Sharing System</em>). Maka untuk pertama kalinya bentuk jaringan (<em>network</em>) komputer diaplikasikan. Pada sistem TSS beberapa terminal terhubung secara seri ke sebuah komputer atau perangkat lainnya yang terhubung dalam suatu jaringan (<em>host</em>) komputer. Dalam proses TSS mulai terlihat perpaduan&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Teknologi_komputer&amp;action=edit&amp;redlink=1\" title=\"Teknologi komputer (halaman belum tersedia)\">teknologi komputer</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Teknologi_telekomunikasi\" title=\"Teknologi telekomunikasi\">teknologi telekomunikasi</a>&nbsp;yang pada awalnya berkembang sendiri-sendiri.&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Departemen_Pertahanan_Amerika&amp;action=edit&amp;redlink=1\" title=\"Departemen Pertahanan Amerika (halaman belum tersedia)\">Departemen Pertahanan Amerika</a>,&nbsp;<em><a href=\"https://id.wikipedia.org/w/index.php?title=U.S._Defense_Advanced_Research_Projects_Agency&amp;action=edit&amp;redlink=1\" title=\"U.S. Defense Advanced Research Projects Agency (halaman belum tersedia)\">U.S. Defense Advanced Research Projects Agency</a></em>&nbsp;(DARPA) memutuskan untuk mengadakan riset yang bertujuan untuk menghubungkan sejumlah komputer sehingga membentuk jaringan organik pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1969\" title=\"1969\">1969</a>. Program riset ini dikenal dengan nama&nbsp;<a href=\"https://id.wikipedia.org/wiki/ARPANET\" title=\"ARPANET\">ARPANET</a>. Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1970\" title=\"1970\">1970</a>, sudah lebih dari 10 komputer yang berhasil dihubungkan satu sama lain sehingga mereka bisa saling berkomunikasi dan membentuk sebuah jaringan. Dan pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1970\" title=\"1970\">1970</a>&nbsp;itu juga setelah beban pekerjaan bertambah banyak dan harga perangkat komputer besar mulai terasa sangat mahal, maka mulailah digunakan konsep proses distribusi (<em>Distributed Processing</em>). Dalam proses ini beberapa&nbsp;<em>host</em>&nbsp;komputer mengerjakan sebuah pekerjaan besar secara paralel untuk melayani beberapa&nbsp;<em>terminal</em>&nbsp;yang tersambung secara seri disetiap&nbsp;<em>host</em>&nbsp;komputer. Dalam proses distribusi sudah mutlak diperlukan perpaduan yang mendalam antara&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Teknologi_komputer&amp;action=edit&amp;redlink=1\" title=\"Teknologi komputer (halaman belum tersedia)\">teknologi komputer</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Telekomunikasi\" title=\"Telekomunikasi\">telekomunikasi</a>, karena selain proses yang harus didistribusikan, semua&nbsp;<em>host</em>&nbsp;komputer wajib melayani terminal-terminalnya dalam satu perintah dari komputer pusat.</p>\n\n<p><a href=\"https://id.wikipedia.org/wiki/Berkas:TSS_Model.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/TSS_Model.jpg/250px-TSS_Model.jpg\" style=\"height:117px; width:250px\" /></a></p>\n\n<p>Ini adalah Model&nbsp;<em>Time Sharing System</em>&nbsp;(TSS)</p>\n\n<p>Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1972\" title=\"1972\">1972</a>,&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Roy_Tomlinson&amp;action=edit&amp;redlink=1\" title=\"Roy Tomlinson (halaman belum tersedia)\">Roy Tomlinson</a>&nbsp;berhasil menyempurnakan program surat elektonik (<em>email</em>) yang dibuatnya setahun yang lalu untuk&nbsp;<a href=\"https://id.wikipedia.org/wiki/ARPANET\" title=\"ARPANET\">ARPANET</a>. Program tersebut begitu mudah untuk digunakan, sehingga langsung menjadi populer. Pada tahun yang sama yaitu tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1972\" title=\"1972\">1972</a>, ikon at (@) juga diperkenalkan sebagai lambang penting yang menunjukan &ldquo;at&rdquo; atau &ldquo;pada&rdquo;. Tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1973\" title=\"1973\">1973</a>, jaringan komputer ARPANET mulai dikembangkan meluas ke luar&nbsp;<a href=\"https://id.wikipedia.org/wiki/Amerika_Serikat\" title=\"Amerika Serikat\">Amerika Serikat</a>. Komputer&nbsp;<em><a href=\"https://id.wikipedia.org/w/index.php?title=University_College&amp;action=edit&amp;redlink=1\" title=\"University College (halaman belum tersedia)\">University College</a></em>&nbsp;di&nbsp;<a href=\"https://id.wikipedia.org/wiki/London\" title=\"London\">London</a>&nbsp;merupakan komputer pertama yang ada di luar Amerika yang menjadi anggota jaringan Arpanet. Pada tahun yang sama yaitu tahun 1973, dua orang ahli komputer yakni&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Vinton_Cerf&amp;action=edit&amp;redlink=1\" title=\"Vinton Cerf (halaman belum tersedia)\">Vinton Cerf</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Bob_Kahn&amp;action=edit&amp;redlink=1\" title=\"Bob Kahn (halaman belum tersedia)\">Bob Kahn</a>&nbsp;mempresentasikan sebuah gagasan yang lebih besar, yang menjadi cikal bakal pemikiran&nbsp;<em>International Network</em>&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Internet\" title=\"Internet\">Internet</a>). Ide ini dipresentasikan untuk pertama kalinya di&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Universitas_Sussex&amp;action=edit&amp;redlink=1\" title=\"Universitas Sussex (halaman belum tersedia)\">Universitas Sussex</a>. Hari bersejarah berikutnya adalah tanggal&nbsp;<a href=\"https://id.wikipedia.org/wiki/26_Maret\" title=\"26 Maret\">26 Maret</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/1976\" title=\"1976\">1976</a>, ketika Ratu Inggris berhasil mengirimkan surat elektronik dari&nbsp;<em><a href=\"https://id.wikipedia.org/w/index.php?title=Royal_Signals_and_Radar_Establishment&amp;action=edit&amp;redlink=1\" title=\"Royal Signals and Radar Establishment (halaman belum tersedia)\">Royal Signals and Radar Establishment</a></em>&nbsp;di&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Malvern&amp;action=edit&amp;redlink=1\" title=\"Malvern (halaman belum tersedia)\">Malvern</a>. Setahun kemudian, sudah lebih dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/100\" title=\"100\">100</a>&nbsp;komputer yang bergabung di ARPANET membentuk sebuah jaringan atau&nbsp;<em>network</em>.</p>\n\n<p><a href=\"https://id.wikipedia.org/w/index.php?title=Berkas:Arpanet_logical_map,_march_1977.png&amp;filetimestamp=20150203140456&amp;\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Arpanet_logical_map%2C_march_1977.png/250px-Arpanet_logical_map%2C_march_1977.png\" style=\"height:179px; width:250px\" /></a></p>\n\n<p>Peta logika dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/ARPANET\" title=\"ARPANET\">ARPANET</a></p>\n\n<p><a href=\"https://id.wikipedia.org/w/index.php?title=Tom_Truscott&amp;action=edit&amp;redlink=1\" title=\"Tom Truscott (halaman belum tersedia)\">Tom Truscott</a>,&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Jim_Ellis&amp;action=edit&amp;redlink=1\" title=\"Jim Ellis (halaman belum tersedia)\">Jim Ellis</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Steve_Bellovin&amp;action=edit&amp;redlink=1\" title=\"Steve Bellovin (halaman belum tersedia)\">Steve Bellovin</a>, menciptakan&nbsp;<em><a href=\"https://id.wikipedia.org/w/index.php?title=Newsgroups&amp;action=edit&amp;redlink=1\" title=\"Newsgroups (halaman belum tersedia)\">newsgroups</a></em>&nbsp;pertama yang diberi nama&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=USENET&amp;action=edit&amp;redlink=1\" title=\"USENET (halaman belum tersedia)\">USENET</a>&nbsp;(<em>User Network</em>) pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1979\" title=\"1979\">1979</a>. Tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1981\" title=\"1981\">1981</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/France_Telecom\" title=\"France Telecom\">France Telecom</a>&nbsp;menciptakan sesuatu hal yang baru dengan meluncurkan&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Telepon_televisi&amp;action=edit&amp;redlink=1\" title=\"Telepon televisi (halaman belum tersedia)\">telepon televisi</a>&nbsp;pertama, di mana orang bisa saling menelepon yang juga berhubungan dengan&nbsp;<em>video link</em>.</p>\n\n<p>Seiring dengan bertambahnya komputer yang membentuk jaringan, dibutuhkan sebuah protokol resmi yang dapat diakui dan diterima oleh semua jaringan. Untuk itu, pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1982\" title=\"1982\">1982</a>&nbsp;dibentuk sebuah&nbsp;<em>', 'Sejarah jaringan komputer bermula dari lahirnya konsep jaringan komputer pada tahun 1940-an di Amerika yang digagas oleh sebuah', 'networking', 2147483647, '0000-00-00', 1, 368),
(3, 'Cara installasi OS debian 8 di virtual box', 'logo-42.png', 'firmansyahrizkan099@gmail.com', '<h2 style=\"text-align:center\">Debian 8 VirtualBox</h2>\r\n\r\n<p>Berikut adalah tatacara atau langkah langkah installasi OS Debian 8 di VirtualBox :</p>\r\n\r\n<p>1. buka os virtualbox</p>\r\n\r\n<p>2. klik new virtual machine</p>\r\n\r\n<p>3. pilih OS debian dan isikan ram berikut HDD</p>\r\n\r\n<p>4. jika sudah selesai klik ok</p>\r\n\r\n<p>5. jalankan virtual machine</p>\r\n\r\n<p>6. menu tampilan akan muncul</p>\r\n\r\n<p>7. ikuti petunjuk dari installasi</p>\r\n\r\n<p>8. jika sudah selesai klik restart</p>\r\n\r\n<p>9 tunggu hingga proses reboot selesai</p>\r\n\r\n<p>10. login ke debian 8 kalian</p>\r\n\r\n<p>selesai</p>\r\n', 'Berikut adalah cara installasi sistem operasi linux debian 8 di virtual box', 'networking', 2147483647, '0000-00-00', 1, 230),
(4, 'macbook', 'White_with_Colorful_Icon_Computer_Logo.png', 'firmansyahrizkan099@gmail.com', '<p>hgfftgftgfgf</p>\r\n', 'Cara membeli macbook pro di lazada', 'itclub', 2147483647, '0000-00-00', 0, 21),
(5, 'Cara konfigurasi mikrotik part1', 'part1-mikrotik-dasar.png', 'firmansyahrizkan099@gmail.com', '', 'Berikut, adalah penjelasan bagaimana cara setting mikrotik router OS', 'networking', 2147483647, '0000-00-00', 0, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dpp`
--

CREATE TABLE `data_dpp` (
  `id` int(11) NOT NULL,
  `siswa_nis` char(32) NOT NULL,
  `nominal` char(32) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `dpp_id` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dpp`
--

INSERT INTO `data_dpp` (`id`, `siswa_nis`, `nominal`, `tanggal`, `dpp_id`) VALUES
(1, '11717003', '4750000', '29-08-2020', '2'),
(2, '11717001', '400000', '25-08-2020', '2'),
(6, '11717002', '1000000', '25-08-2020', '2'),
(7, '11717300', '1100000', '13-09-2020', '2'),
(8, '11717399', '120000', '14-09-2020', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_file`
--

CREATE TABLE `data_file` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `lokasi_file` varchar(512) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_file`
--

INSERT INTO `data_file` (`id`, `id_materi`, `nama_file`, `lokasi_file`, `date`) VALUES
(9, 11, 'database.txt', 'assets/data/guru/materi/', '22-08-2020'),
(10, 11, 'database.txt', 'assets/data/guru/materi/', '22-08-2020'),
(16, 7, 'MODUL_PKK_SMK-KELAS-XI_SEMESTER-GANJIL-1.pdf', 'assets/data/guru/tugas/', '13-09-2020'),
(17, 7, '106125490_745491039595916_193987676388880993_n.jpg', 'assets/data/guru/tugas/', '13-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_homepage`
--

CREATE TABLE `data_homepage` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `keterangan` varchar(2048) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_homepage`
--

INSERT INTO `data_homepage` (`id`, `jenis`, `judul`, `deskripsi`, `keterangan`, `gambar`) VALUES
(1, 'slider', 'Mengikuti perlombaan nasional', 'OLIMPIADE JARINGAN\nMIKROTIK-APJII 2019\n\n', 'Kami mengirimkan beberapa perwakilan anggota IT Club untuk mewakilkan sekolah dalam ajang perlombaan Nasional pada divisi Jaringan untuk mengikuti ajang bergengsi tersebut', 'Tulips.jpg'),
(12, 'slider', 'menuju hijaunya bumi melalui sekolah sekolah', 'SMK SAMUDRA GO GREEN', 'SMKN SAMUDRA kota CIREBON mengadakan penghijauan di sekitar halaman sekolah dan juga warga sekitar untuk menghindari polusi udara yang terlalu banyak', 'Hydrangeas.jpg'),
(16, 'services', 'Ilmu Teknologi (TI 4.0)', 'Disini siswa akan mempelajari ilmu TI dengan standar industri 4.0 dengan mengikuti kurikulum sekolah yang berlaku disini\n', '', 'fa fa-atlas'),
(19, 'services', 'Relasi (Jaringan)', 'Terdapat berbagai macam relasi seperti alumni IT Club, siswa dari sekolah lain, pengajar-pengajar lain dan juga relasi dari berbagai pihak lainnya.mengikuti kurikulum sekolah yang berlaku disini\n', '', 'fa fa-users'),
(20, 'services', 'Pembelajaran Terstruktur', 'Pembelajaran yang terstruktur adalah kunci terciptanya potensi siswa, kami harap pembelajaran yang kami susun dapat mengembangkan potensi setiap siswa terhadap keahliannya masing-masing.', '', 'fa fa-chart-line'),
(22, 'slider', 'Anak smk membanggakan', 'Anak SMK Samudra membuat Robot ', 'setelah beberapa bulan mengikuti olimpiade robotik SMK SAMUDRA berhasil menjadi tempat pertama membuat robot', 'How-to-Secure-the-IoT-Environment-37qlmuk9r6dbbdns1bx3pc.jpg'),
(23, 'profile', 'SELAMAT DATANG DI WEB KAMI', 'SMK Samudra Nusantara', 'Selamat datang user, coder, engineer, dan siswa-siswi di halaman web kami. Kami harap dengan adanya web ini dapat mempermudah siapa saja untuk mendapatkan segala hal berupa informasi, data, ataupun hal yang bermanfaat lainnya.\n\nPerkenalkan kami adalah salah satu ekstrakulikuler dari SMK SAMUDRA CIREBON yang membentuk sebuah club sebagai sarana pembelajaran tambahan di sekolah kami terutama pada jurusan Teknik Komputer Jaringan yang ada di sekolah kami. Kami membentuk 3 divisi diantaranya Networking, Programming, dan Multimedia sebagai pondasi pembelajaran kami dengan mengikuti perkembangan teknologi 4.0 sebagai salah satu target belajar kami.', '1_uezAyMqN2ZynYoWs9uDXvQ.png'),
(24, 'testimonial', 'Riezkan Aprianda F', 'Sekolah yang mendidik, sangat membantu bagi anak yang mau berkembang dan mempelajari ilmu baru apalagi di bidang teknik dan sains sekolah ini patut diberi akreditasi B atau lebih karena cakupan materi dan pengajar sangat baik', '', '33.jpg'),
(25, 'testimonial', 'M Fajri Zulfa', 'Sekolah yang luar biasa bagi saya seorang diripun ini sudah lebih dari cukup untuk memenuhi kriteria perushaan di era industry 4.0 ini. mantull lanjutkan smk samudra nusantara', '', 'fajri.jpg'),
(26, 'testimonial', 'Hasan Basri', 'Sekolah yang mendidik, sangat membantu bagi anak yang mau berkembang dan mempelajari ilmu baru apalagi di bidang teknik dan sains sekolah ini patut diberi akreditasi B atau lebih karena cakupan materi dan pengajar sangat baik', '', 'hasan.jpg'),
(27, 'services', 'Selamat Datang', 'Startup yang berdomisili di daerah Kota Bandung', '', 'fa fa-tachometer-alt'),
(29, 'footer', 'SMK samudra', 'Perkenalkan kami adalah salah satu startup yang ada di wilayah Kota Bandung. Dimana kami membentuk sebuah tim startup sebagai sarana pembelajaran dan sarana untuk menunjukan kekhalayak ramai mengenai brand kami yaitu CLUB-IT Startup', 'Jl.Bojongkoneng No.37A', 'Samnus_copy.jpg'),
(30, 'sosmed', 'facebook', 'facebook.com', 'aktif', 'fa-facebook'),
(31, 'sosmed', 'instagram', 'instagram.com', 'aktif', 'fa-instagram'),
(32, 'sosmed', 'twitter', 'twitter.com', 'aktif', 'fa-twitter'),
(33, 'sosmed', 'linkedin', 'linkedin.com', 'tidak aktif', 'fa-linkedin'),
(34, 'sosmed', 'google-plus', 'youtube.com', 'tidak aktif', 'fa-youtube'),
(35, 'contact', '089669266839', 'Legiyanto2008@gmail.com', '089669266839', '-'),
(36, 'sponsor', 'mikrotik', 'mikrotik indonesia', 'aktif', 'images.png'),
(38, 'sponsor', 'Ciso', 'founder cisco networking', 'aktif', 'cisco1.png'),
(42, 'footer', 'ukuran', '100', '100', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jawaban`
--

CREATE TABLE `data_jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` varchar(32) NOT NULL,
  `id_no_urut` int(11) NOT NULL,
  `id_siswa` varchar(32) NOT NULL,
  `id_ujian` char(32) NOT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jawaban`
--

INSERT INTO `data_jawaban` (`id`, `id_soal`, `id_no_urut`, `id_siswa`, `id_ujian`, `jawaban`, `date`) VALUES
(33, '10', 3, '11717003', '5', 'A', '2020-09-06 13:42:54'),
(34, '9', 2, '11717003', '5', 'B', '2020-09-06 13:43:04'),
(35, '8', 1, '11717003', '5', 'C', '2020-09-06 13:43:08'),
(37, '11', 1, '11717301', '8', 'A', '2020-09-13 12:32:51'),
(38, '12', 1, '11717302', '13', NULL, '2020-09-13 17:57:41'),
(39, '13', 2, '11717302', '13', NULL, '2020-09-13 17:57:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenjang`
--

CREATE TABLE `data_jenjang` (
  `jenjang_id` int(11) NOT NULL,
  `nama_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jenjang`
--

INSERT INTO `data_jenjang` (`jenjang_id`, `nama_jenjang`) VALUES
(1, 10),
(2, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kas`
--

CREATE TABLE `data_kas` (
  `id` int(11) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_kas` int(11) NOT NULL,
  `tanggal` varchar(16) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kas`
--

INSERT INTO `data_kas` (`id`, `user_id`, `nominal`, `jenis_kas`, `tanggal`, `keterangan`, `waktu`) VALUES
(1, 'itc-9', 2000, 2, '2020-05-18', '', 1589820369),
(2, 'itc-9', 3000, 2, '2020-05-18', '', 1589820381),
(3, 'itc-13', 10000, 1, '2020-04-19', '', 1589821399),
(4, 'itc-24', 4000, 2, '2020-05-19', 'hahahaha', 1589861751),
(5, 'itc-24', 3000, 1, '2020-04-18', 'hihihihihi', 1589868081),
(6, 'itc-19', 10000, 1, '2020-04-19', 'Pemasukan sebesar 10000 oleh itc-19', 1589872333),
(7, 'itc-24', 4000, 1, '2020-04-19', 'Pemasukan sebesar 4000 dengan kode ID itc-24', 1589872409),
(8, 'admin-1', 10000, 2, '2020-05-19', 'pengeluaran untuk membeli IoT', 1589872931),
(9, 'itc-25', 3000, 1, '2020-05-19', 'Pemasukan sebesar 3000 dengan kode ID itc-25', 1589873517),
(10, 'itc-25', 3000, 1, '2020-05-19', 'Pemasukan sebesar 3000 dengan kode ID itc-25', 1589873545),
(11, 'admin-1', 10000, 1, '2020-05-19', 'beli minuman buat istirahat', 1589873579),
(12, 'itc-19', 4000, 1, '2020-05-19', 'Pemasukan sebesar 4000 dengan kode ID itc-19', 1589879792),
(13, 'itc-25', 5000, 1, '2020-05-19', 'Pemasukan sebesar 5000 dengan kode ID itc-25', 1589879800),
(14, 'itc-24', 4000, 1, '2020-05-19', 'Pemasukan sebesar 4000 dengan kode ID itc-24', 1589879808),
(15, 'itc-9', 10000, 1, '2020-05-19', 'Pemasukan sebesar 10000 dengan kode ID 1', 1589879821),
(16, 'admin-1', 3000, 1, '2020-05-19', 'beli minuman buat istirahat', 1589879922),
(17, 'Admin IT Club', 5000, 2, '2020-05-19', 'beli makanan ', 1589879931),
(18, '1', 10000, 1, '2020-05-20', 'Pemasukan sebesar 10000 dengan kode ID 1', 1589941587),
(19, 'itc-9', 10000, 1, '2020-05-20', 'Pemasukan sebesar 10000 dengan kode ID itc-9', 1589941625),
(20, 'itc-24', 2000, 1, '2020-05-20', 'Pemasukan sebesar 2000 dengan kode ID itc-24', 1589954541),
(21, 'itc-22', 1000, 1, '2020-05-20', 'Pemasukan sebesar 1000 dengan kode ID itc-22', 1589954548),
(22, 'itc-13', 5000, 1, '2020-05-20', 'Pemasukan sebesar 5000 dengan kode ID itc-13', 1589954555),
(23, 'itc-9', 1000, 1, '2020-05-20', 'Pemasukan sebesar 1000 dengan kode ID itc-9', 1589954595),
(24, 'itc-19', 6000, 1, '2020-05-20', 'Pemasukan sebesar 6000 dengan kode ID itc-19', 1589954604),
(25, 'itc-24', 11000, 1, '2020-05-20', 'Pemasukan sebesar 11000 dengan kode ID itc-24', 1589954615),
(26, 'itc-13', 12000, 1, '2020-06-12', 'Pemasukan sebesar 12000 dengan kode ID itc-13', 1591968141),
(27, 'itc-9', 3345, 1, '2020-06-23', '2234 dengan kode ID itc-9', 1592925648),
(28, 'itc-24', 2000, 1, '2020-06-23', 'Pemasukan sebesar 2000 dengan kode ID itc-24', 1592927058),
(29, 'itc-28', 3000, 1, '2020-06-23', 'Pemasukan sebesar 3000 dengan kode ID itc-28', 1592927065),
(30, 'itc-19', 5000, 1, '2020-06-23', 'Pemasukan sebesar 5000 dengan kode ID itc-19', 1592927071),
(31, 'itc-25', 4000, 1, '2020-06-23', 'Pemasukan sebesar 4000 dengan kode ID itc-25', 1592927079),
(32, 'itc-13', 4000, 1, '2020-06-23', 'Pemasukan sebesar 4000 dengan kode ID itc-13', 1592927086),
(33, 'itc-22', 6000, 1, '2020-06-23', 'Pemasukan sebesar 6000 dengan kode ID itc-22', 1592927096),
(34, 'Admin IT Club', 1000, 2, '2020-06-23', 'beli minuman buat istirahat', 1592927135),
(35, 'Admin IT Club', 6000, 2, '2020-06-23', 'pengeluaran untuk membeli IoT', 1592927143),
(36, 'Admin IT Club', 12000, 2, '2020-06-23', 'makanan istirahat', 1592927156),
(37, 'itc-24', 2000, 1, '2020-06-28', 'Pemasukan sebesar 2000\\ dengan kode ID itc-24', 1593330241),
(38, 'itc-19', 7000, 1, '2020-06-28', '3000 dengan kode ID itc-19', 1593330405),
(39, 'itc-25', 1000, 1, '2020-06-28', 'Pemasukan sebesar 1000 dengan kode ID itc-25', 1593330278),
(40, 'itc-28', 5000, 1, '2020-06-28', 'Pemasukan sebesar 5000 dengan kode ID itc-28', 1593330284),
(41, 'itc-13', 5000, 1, '2020-06-28', 'Pemasukan sebesar 5000 dengan kode ID itc-13', 1593330289),
(42, 'itc-9', 4500, 1, '2020-06-28', 'Pemasukan sebesar 4500 dengan kode ID itc-9', 1593330295),
(43, 'itc-22', 3500, 1, '2020-06-28', 'Pemasukan sebesar 3500 dengan kode ID itc-22', 1593330301),
(44, 'itc-12', 2500, 1, '2020-06-28', 'Pemasukan sebesar 2500 dengan kode ID itc-12', 1593330394),
(45, 'itc-8', 20000, 1, '2020-06-28', 'Pemasukan sebesar 20000 dengan kode ID itc-8', 1593331462),
(46, 'itc-3', 5000, 1, '2020-07-24', 'Pemasukan sebesar 5000 dengan kode ID itc-3', 1595561990);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_komentar`
--

CREATE TABLE `data_komentar` (
  `id` int(11) NOT NULL,
  `id_post` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date` varchar(128) NOT NULL,
  `komentar` varchar(256) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_komentar`
--

INSERT INTO `data_komentar` (`id`, `id_post`, `email`, `date`, `komentar`, `time`) VALUES
(1, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'min ane mau nanya kalo cara install debian dekstop di VMWare gimana? makasih', 1587929307),
(2, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hai min\r\n', 1587929655),
(3, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hehehe', 1587929701),
(4, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'apa kabar min?', 1587930570),
(5, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hei min udah punya pacar belum??', 1587930582),
(6, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hai min', 1587930590),
(7, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hehe\r\n', 1588004179),
(8, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hai\r\n', 1588004187),
(9, '27', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hai', 1588004566),
(10, '26', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'halo', 1588004588),
(11, '27', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hehe\r\n', 1588005182),
(12, '27', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'hai\r\n', 1588005189),
(13, '29', 'riezkanaprianda@gmail.com', '2020-05-10 13:00:59', 'Mana gaada postingan', 1588835583),
(14, '24', 'firmansyahrizkan099@gmail.com', '2020-05-10 13:00:59', 'ghfyegfhsef\\\r\n', 1591968483);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_materi`
--

CREATE TABLE `data_materi` (
  `id` int(11) NOT NULL,
  `id_guru` char(6) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` char(12) NOT NULL,
  `id_kd` char(64) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_materi`
--

INSERT INTO `data_materi` (`id`, `id_guru`, `id_mapel`, `id_kelas`, `id_kd`, `nama_materi`, `deskripsi`, `status`, `date`) VALUES
(11, '332', 4, '1', '1', 'Materi', 'masukkan deskripsi materi', 1, '22-08-2020'),
(13, '425', 12, '13', '1', 'linux', 'Pertama installasi sistem OPERASI ', 1, '29-08-2020'),
(14, '425', 9, '1', '2', 'Materi', 'awdwadwadwad', 1, '13-09-2020'),
(15, '425', 9, '13', '1', 'Materi', 'dawdwadwad', 1, '13-09-2020'),
(16, '425', 9, '1', '1', 'Materi', 'wadwadwada', 1, '13-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id` int(11) NOT NULL,
  `id_pengajar` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `file` varchar(128) NOT NULL,
  `jenis_file` varchar(12) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu` varchar(16) NOT NULL,
  `deadline` varchar(16) NOT NULL,
  `tugas` varchar(128) NOT NULL,
  `bab` int(11) NOT NULL,
  `komentar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id`, `id_pengajar`, `email`, `status`, `file`, `jenis_file`, `nilai`, `waktu`, `deadline`, `tugas`, `bab`, `komentar`) VALUES
(8, 'ITP-1', 'firmansyahrizkan099@gmail.com', 1, '1_uezAyMqN2ZynYoWs9uDXvQ.png', 'file', 69, '2020-07-13', '2020-07-18', 'Konfig DHCP di Debian 8', 2, 'hebat hebat mengagumkan '),
(9, 'ITP-1', 'firmansyahrizkan099@gmail.com', 1, '1_uezAyMqN2ZynYoWs9uDXvQ.png', 'file', 89, '2020-07-16', '2020-05-08', 'Buat video cara konfigurasi mail server', 1, 'heheheheheh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai_ujian`
--

CREATE TABLE `data_nilai_ujian` (
  `id` int(11) NOT NULL,
  `id_ujian` int(128) DEFAULT NULL,
  `id_siswa` char(128) DEFAULT NULL,
  `id_kelas` char(128) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT 0,
  `jumlah_benar` int(11) DEFAULT 0,
  `jumlah_salah` int(11) DEFAULT 0,
  `nilai` varchar(16) DEFAULT '0',
  `status` int(1) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_nilai_ujian`
--

INSERT INTO `data_nilai_ujian` (`id`, `id_ujian`, `id_siswa`, `id_kelas`, `jumlah_soal`, `jumlah_benar`, `jumlah_salah`, `nilai`, `status`, `date`) VALUES
(6, 5, '11717003', '13', 3, 2, 1, '50', 1, '2020-09-06 13:43:27'),
(9, 3, '11717301', '1', 0, 0, 0, '0', 1, '2020-09-13 18:40:24'),
(11, 8, '11717301', '16', 1, 0, 1, '0', 1, '2020-09-13 12:33:04'),
(14, 13, '11717302', '1', 2, 0, 2, '0', 1, '2020-09-13 17:58:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_postingan`
--

CREATE TABLE `data_postingan` (
  `id` int(11) NOT NULL,
  `id_post` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `profil` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  `tgl` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_postingan`
--

INSERT INTO `data_postingan` (`id`, `id_post`, `email`, `nama`, `gambar`, `text`, `profil`, `time`, `tgl`) VALUES
(1, 'itpost-1', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'lenovo_s135.png', 'ini laptop bagus  nihhh', 'default.jpg', 1589188841, '2020-05-09'),
(2, 'itpost-2', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589188906, '2020-05-10'),
(3, 'itpost-3', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589188937, '2020-05-10'),
(4, 'itpost-4', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589189106, '2020-05-10'),
(5, 'itpost-5', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589189118, '2020-05-10'),
(6, 'itpost-6', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589189133, '2020-05-10'),
(7, 'itpost-7', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589189157, '2020-05-11'),
(8, 'itpost-8', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'logo-bg-1.png', 'gusy ini card logo IT Oke bisa dibagikan di lab nanti sore kasih tau ke temen temen kalian\r\n', 'default.jpg', 1589190187, '2020-05-11'),
(9, 'itpost-9', 'riezkanaprianda@gmail.com', 'riezkan firmansyah', '0', 'Lagi gabut', 'default.jpg', 1589190638, '2020-05-11'),
(10, 'itpost-10', 'riezkanaprianda@gmail.com', 'riezkan firmansyah', 'cf60a99a321924eacca0777a4380202c.jpg', 'Website down, sore hari nanti troubleshoot nya', 'default.jpg', 1589191741, '2020-05-11'),
(11, 'itpost-11', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', 'hehe\r\n', 'default.jpg', 1589260996, '2020-05-11'),
(12, 'itpost-12', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261453, '2020-05-11'),
(13, 'itpost-13', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261488, '2020-05-12'),
(14, 'itpost-14', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'lenovo_s1351.png', '', 'default.jpg', 1589261518, '2020-05-12'),
(15, 'itpost-15', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261528, '2020-04-11'),
(16, 'itpost-16', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261544, '2020-04-11'),
(17, 'itpost-17', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261639, '2020-04-11'),
(18, 'itpost-18', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261659, '2020-04-11'),
(19, 'itpost-19', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261669, '2020-04-11'),
(20, 'itpost-20', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261741, '2020-03-11'),
(21, 'itpost-21', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'logo-2.png', '', 'default.jpg', 1589261885, '2020-03-11'),
(22, 'itpost-22', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589261984, '2020-03-11'),
(23, 'itpost-23', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'hp_14s_dku.png', '', 'default.jpg', 1589262023, '2020-03-11'),
(24, 'itpost-24', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589263167, '2020-05-18'),
(25, 'itpost-25', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', '', 'default.jpg', 1589263202, '2020-05-26'),
(26, 'itpost-26', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', 'hhhh', 'default.jpg', 1590560683, '2020-05-27'),
(27, 'itpost-27', 'riezkanaprianda@gmail.com', 'riezkan firmansyah', '0', 'https://drive.google.com/drive/folders/1TiPoEOEgLIXIt4opah_hj0QdWQlJi-sS?usp=sharing', 'default.jpg', 1591019122, '2020-06-01'),
(28, 'itpost-28', 'riezkanaprianda@gmail.com', 'riezkan firmansyah', '0', 'https://doc-0c-8o-drive-data-export.googleusercontent.com/download/r21t2rblhh7tepbk533fcq74b8u29r3d/feevg5tfv4vchphnqj5ipdm6rj4gbq5f/1591020000000/89b73309-026a-49db-a743-fd6716344d11/114697360595565073417/ADt3v-NaG4opJhodlTPki2Zkr1OfFUW_7IlWPmMMWE28JjFml6bTIu7UvyLGkQKTPXDVx7x96dWWamTRuuyq4V8SAMRDMnUAVdVVR6N3oRiT-kaIQmOc0fxUMoBnODddbuCAbjAFBDVeK1QW2todUW5XHrJe5ENauhunVk2bBKHeqygC6_8V5-eaAi5T4Z7cJ1MtnGPcAL1XaX50SB5EPCS_BAxDwo8nwKQUXcY-3H1ivqnLMX2ZKPARi1EK8p3u3gcdfBCcWwYnMGNs-8Qlsygsew3PQbg8rl_gD2gEnzySbRmWYx-bu7hJyHEEYp7NKdpw54VGLA9ILnMS1ZRkTIh-MwEdtak-LQ==?nonce=lkpu3cubpifv4&user=114697360595565073417&authuser=0&hash=dab5cun9a1hrk8hiltv8mfadsnskjheh\r\n', 'default.jpg', 1591021070, '2020-06-01'),
(29, 'itpost-29', 'riezkanaprianda@gmail.com', 'riezkan firmansyah', '0', 'https://doc-0c-8o-drive-data-export.googleusercontent.com/download/r21t2rblhh7tepbk533fcq74b8u29r3d/feevg5tfv4vchphnqj5ipdm6rj4gbq5f/1591020000000/89b73309-026a-49db-a743-fd6716344d11/114697360595565073417/ADt3v-NaG4opJhodlTPki2Zkr1OfFUW_7IlWPmMMWE28JjFml6bTIu7UvyLGkQKTPXDVx7x96dWWamTRuuyq4V8SAMRDMnUAVdVVR6N3oRiT-kaIQmOc0fxUMoBnODddbuCAbjAFBDVeK1QW2todUW5XHrJe5ENauhunVk2bBKHeqygC6_8V5-eaAi5T4Z7cJ1MtnGPcAL1XaX50SB5EPCS_BAxDwo8nwKQUXcY-3H1ivqnLMX2ZKPARi1EK8p3u3gcdfBCcWwYnMGNs-8Qlsygsew3PQbg8rl_gD2gEnzySbRmWYx-bu7hJyHEEYp7NKdpw54VGLA9ILnMS1ZRkTIh-MwEdtak-LQ==?nonce=lb3iv3vmo8jue&user=114697360595565073417&authuser=0&hash=terfoor1g87af9upkrod75ria40dc332', 'default.jpg', 1591021223, '2020-06-01'),
(30, 'itpost-30', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem quibusdam qui velit numquam perspiciatis, libero illo maiores accusantium pariatur a, possimus temporibus quia dolores, obcaecati deleniti. Nisi obcaecati doloremque sequi blanditiis quaerat non dignissimos suscipit iusto impedit delectus. Debitis quod blanditiis ex eos tenetur autem aut commodi, sed earum velit, perferendis aspernatur consequatur odit cumque, aperiam perspiciatis? Maiores voluptatibus temporibus impedit magni consectetur commodi deserunt quisquam animi quidem delectus. Reprehenderit blanditiis deleniti tempore culpa molestias aperiam sed perferendis ab! Perspiciatis at numquam ratione obcaecati provident sequi, laborum delectus saepe, sed fuga blanditiis quia, harum repellendus! Repellendus debitis reiciendis, dolores repudiandae.', 'default.jpg', 1591240291, '2020-06-04'),
(31, 'itpost-31', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '20200405_040101_0000.png', 'background banner IT club', 'default.jpg', 1591240599, '2020-06-04'),
(32, 'itpost-32', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', 'asus_a412ua.png', 'lumayan\r\n', 'default.jpg', 1591241015, '2020-06-04'),
(33, 'itpost-33', 'firmansyahrizkan099@gmail.com', 'Riezkan Aprianda Firmansyah', '0', 'blob:https://carbon.now.sh/421cec85-db6d-4314-8ce4-c00263c8be85\r\n', 'default.jpg', 1591290242, '2020-06-05'),
(34, 'itpost-34', 'firmansyahrizkan099@gmail.com', 'rizkanfirmansyah', '0', 'test\r\n', '33.jpg', 1593338280, '2020-06-28'),
(35, 'itpost-35', 'firmansyahrizkan099@gmail.com', 'rizkanfirmansyah', '0', 'coba\r\n\r\n', '33.jpg', 1593338291, '2020-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(11) NOT NULL,
  `id_soal` varchar(32) NOT NULL,
  `id_pengajar` varchar(128) NOT NULL,
  `soal` varchar(128) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `bab` int(11) NOT NULL,
  `jurusan` varchar(16) NOT NULL,
  `is_active` int(1) NOT NULL,
  `kkm` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_soal`
--

INSERT INTO `data_soal` (`id`, `id_soal`, `id_pengajar`, `soal`, `deskripsi`, `bab`, `jurusan`, `is_active`, `kkm`, `time`, `date`) VALUES
(1, '3-Networking-1', 'ITP-1', 'soal bab 1', 'ini merupakan soal yang wajib kalian kerjakan dalam waktu 120 menit', 1, 'Networking', 1, 80, 1589267779, '2020-05-22'),
(2, '3-Networking-2', 'ITP-1', 'soal bab 2', 'Masukan deskripsi soal', 2, 'Networking', 1, 40, 1589533919, '2020-06-22'),
(3, '3-Networking-1', 'ITP-1', '', 'Masukan deskripsi soal', 1, 'Networking', 1, 0, 1595562512, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_spp`
--

CREATE TABLE `data_spp` (
  `id` int(11) NOT NULL,
  `siswa_nis` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `nominal` char(32) NOT NULL,
  `tanggal` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_spp`
--

INSERT INTO `data_spp` (`id`, `siswa_nis`, `bulan`, `nominal`, `tanggal`) VALUES
(1, 11717003, 7, '400000', '28-08-2020'),
(5, 11717003, 8, '400000', '25-08-2020'),
(6, 11717002, 7, '300000', '29-08-2020'),
(7, 11717399, 7, '3000000', '14-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_status`
--

CREATE TABLE `data_status` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_status`
--

INSERT INTO `data_status` (`id`, `email`, `status`) VALUES
(1, 'firmansyahrizkan099@gmail.com', 'Lagi Males');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tag`
--

CREATE TABLE `data_tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tag`
--

INSERT INTO `data_tag` (`id`, `tag`) VALUES
(1, 'networking'),
(2, 'programming'),
(3, 'multimedia'),
(4, 'itclub'),
(5, 'smkn5bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tugas`
--

CREATE TABLE `data_tugas` (
  `id` int(11) NOT NULL,
  `kd` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_tugas` varchar(128) NOT NULL,
  `id_mapel` varchar(12) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `batas_waktu` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tugas`
--

INSERT INTO `data_tugas` (`id`, `kd`, `id_kelas`, `id_guru`, `nama_tugas`, `id_mapel`, `deskripsi`, `status`, `tanggal`, `batas_waktu`) VALUES
(7, 5, 13, 425, 'Tugas 2', '9', 'Ini adalah tugas 1 TLJ', 1, '13-09-2020', '2020-09-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `kelas` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_post` varchar(128) NOT NULL,
  `tag` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `waktu` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `download` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `user_post`, `tag`, `gambar`, `keterangan`, `tanggal`, `waktu`, `status`, `download`) VALUES
(1, 'firmansyahrizkan099@gmail.com', 'networking', 'ITC-060620201452.png', 'ini nomor 1', '2020-06-06 14:52:52', 1591429972, 1, 100),
(2, 'firmansyahrizkan099@gmail.com', 'networking', 'ITC-060620201459.png', 'awdadawda', '2020-06-06 14:59:37', 1591430377, 1, 23),
(3, 'firmansyahrizkan099@gmail.com', 'programming', 'ITC-060620201500.png', 'Spesifikasi HP 14S yang dinilai laptop murah bergengsi					', '2020-06-06 15:00:32', 1591464510, 1, 89),
(4, 'firmansyahrizkan099@gmail.com', 'itclub', 'ITC-060620201501.png', 'Laptop terbaik seri 14S keluaran HP', '2020-06-06 15:01:19', 1591464551, 1, 15),
(5, 'firmansyahrizkan099@gmail.com', 'multimedia', 'ITC-06062020150319.png', 'Laptop keluaran asus dengan budget minim tapi jiwa sosialita					', '2020-06-06 15:03:28', 1591464591, 1, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` char(25) DEFAULT NULL,
  `telepon` char(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tahun_ajar_awal` year(4) DEFAULT NULL,
  `lulusan` varchar(255) DEFAULT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp(),
  `date_created` date DEFAULT NULL,
  `status` char(25) DEFAULT NULL,
  `agama` char(25) DEFAULT NULL,
  `tanggal_lahir` varchar(128) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `telepon`, `email`, `alamat`, `tahun_ajar_awal`, `lulusan`, `sertifikasi`, `last_update`, `date_created`, `status`, `agama`, `tanggal_lahir`, `gambar`, `id_jurusan`) VALUES
(425, 'GURU 1', '11717500', '83287423', 'legiyanto@gmail.com', 'jl. Sekeloa timur no.55', 2017, 'S1 - Teknik Informatika', '', '2020-08-24 02:07:01', '2020-08-24', 'pns', 'islam', '09-04-2002', NULL, 108),
(426, 'GURU 2', '11717501', '83287423', 'user1@email.com', 'jl. Sekeloa timur no.56', 2017, 'S1 - Teknik Informatika', NULL, '2020-08-24 02:07:01', '2020-08-24', 'pns', 'islam', '09-04-2003', NULL, 108),
(427, 'GURU 3', '11717502', '83287423', 'user2@email.com', 'jl. Sekeloa timur no.57', 2017, 'S1 - Teknik Informatika', NULL, '2020-08-24 02:07:01', '2020-08-24', 'pns', 'islam', '09-04-2004', NULL, 108),
(428, 'GURU 4', '11717503', '83287423', 'user3@email.com', 'jl. Sekeloa timur no.58', 2017, 'S1 - Teknik Informatika', NULL, '2020-08-24 02:07:02', '2020-08-24', 'pns', 'islam', '09-04-2005', NULL, 109),
(429, 'GURU 5', '11717504', '83287423', 'user4@emai.com', 'jl. Sekeloa timur no.59', 2017, 'S1 - Teknik Informatika', NULL, '2020-08-24 02:07:02', '2020-08-24', 'pns', 'islam', '09-04-2006', NULL, 109),
(430, 'GURU 6', '11717505', '83287423', 'user5@email.com', 'jl. Sekeloa timur no.60', 2017, 'S1 - Teknik Informatika', '', '2020-08-24 02:07:02', '2020-08-24', 'honorer', 'islam', '09-04-2007', NULL, 109),
(431, 'GURU 7', '11717506', '83287423', 'user6@email.com', 'jl. Sekeloa timur no.61', 2017, 'S1 - Teknik Informatika', 'ya', '2020-08-24 02:07:02', '2020-08-24', 'pns', 'islam', '09-04-2008', NULL, 109);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Sekolah'),
(3, 'tata usaha'),
(4, 'sarana & prasarana'),
(5, 'kesiswaan'),
(6, 'hubinmas'),
(7, 'sdm'),
(10, 'waka. bidang informasi'),
(17, 'KETUA ICT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam_masuk` varchar(128) NOT NULL,
  `jam_keluar` varchar(128) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `id_mapel`, `id_ruangan`, `id_kelas`, `id_guru`, `jam_masuk`, `jam_keluar`, `hari`, `status`) VALUES
(25, 9, 2, 1, 425, '09:12', '21:12', 'senin', 1),
(26, 9, 1, 13, 425, '07:00', '08:30', 'senin', 1),
(27, 12, 1, 16, 427, '10:00', '11:30', 'jumat', 1),
(28, 12, 11, 13, 426, '02:40', '03:40', 'senin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id`, `id_ujian`, `id_kelas`, `id_ruangan`, `mulai`, `selesai`, `status`) VALUES
(23, 5, 1, 4, '2020-09-11 20:06:00', '2020-09-07 03:42:42', 1),
(24, 3, 1, 7, '2020-09-11 00:14:00', '2020-09-06 01:43:33', 1),
(25, 8, 16, 1, '2020-09-12 23:02:00', '2020-09-13 23:02:00', 1),
(26, 5, 17, 11, '2020-09-12 23:05:00', '2020-09-13 23:05:00', 1),
(27, 5, 15, 6, '2020-09-12 23:05:00', '2020-09-12 23:05:00', 1),
(28, 5, 13, 3, '2020-09-12 23:05:00', '2020-09-12 23:05:00', 1),
(29, 5, 15, 4, '2020-09-12 23:05:00', '2020-09-12 23:05:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` char(64) NOT NULL,
  `id_siswa` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`, `status`, `date`) VALUES
(1, 'Habis', 1, '2020-09-09 12:02:38'),
(2, 'Sekali pakai', 1, '2020-09-08 14:26:55'),
(3, 'Barang Baru', 1, '2020-09-09 11:48:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `guru_id` char(7) DEFAULT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `payload` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `guru_id`, `nama_jurusan`, `payload`) VALUES
(1, NULL, 'TOTAL', '2000'),
(170, NULL, 'GEOMATIKA', '240'),
(171, NULL, 'KIMIA ANALIS', '240'),
(172, NULL, 'DPIB', '600'),
(173, NULL, 'KGSP', '240'),
(174, NULL, 'PROFIL', '120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `ruangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `guru_id`, `jurusan_id`, `nama_kelas`, `ruangan_id`) VALUES
(1, 347, 169, '12 tkj 2', 1),
(13, 425, 169, 'XI TKJ 4', 7),
(14, 346, 108, '12 TKJ 1', 8),
(15, 425, 169, 'X TKJ 1', 6),
(16, 425, 170, 'X TKJ 2', 1),
(17, 427, 170, 'X GEOMATIKA 1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_kepsek` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id`, `id_guru`, `nama_kepsek`, `status`) VALUES
(1, 344, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `keuangan_id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jenis_keuangan` int(11) NOT NULL,
  `nominal` char(64) NOT NULL,
  `date_created` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan_detail`
--

CREATE TABLE `keuangan_detail` (
  `detail_id` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `nominal_jenis` char(128) NOT NULL,
  `max_jenis` char(128) NOT NULL,
  `aturan_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunci_jawaban`
--

CREATE TABLE `kunci_jawaban` (
  `jawaban_id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `pilihan_ganda` char(64) NOT NULL,
  `isi_jawaban` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user` varchar(128) NOT NULL,
  `log` varchar(128) NOT NULL,
  `class` varchar(128) NOT NULL,
  `method` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `user`, `log`, `class`, `method`, `time`, `date`, `status`) VALUES
(1501, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595167421, '2020-07-19 16:03:41', 0),
(1502, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595167421, '2020-07-19 16:03:41', 0),
(1503, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595167425, '2020-07-19 16:03:45', 0),
(1504, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167448, '2020-07-19 16:04:08', 0),
(1505, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167451, '2020-07-19 16:04:11', 0),
(1506, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167451, '2020-07-19 16:04:11', 0),
(1507, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167451, '2020-07-19 16:04:11', 0),
(1508, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167451, '2020-07-19 16:04:11', 0),
(1509, 'firmansyahrizkan099@gmail.com', 'data/useradmin', 'data', 'useradmin', 1595167486, '2020-07-19 16:04:46', 0),
(1510, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167487, '2020-07-19 16:04:47', 0),
(1511, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167489, '2020-07-19 16:04:49', 0),
(1512, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167490, '2020-07-19 16:04:50', 0),
(1513, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167490, '2020-07-19 16:04:50', 0),
(1514, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595167491, '2020-07-19 16:04:51', 0),
(1515, 'firmansyahrizkan099@gmail.com', 'root/role', 'root', 'role', 1595167564, '2020-07-19 16:06:04', 0),
(1516, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595167567, '2020-07-19 16:06:07', 0),
(1517, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595167601, '2020-07-19 16:06:41', 0),
(1518, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595167680, '2020-07-19 16:08:00', 0),
(1519, 'akuncoba@email.com', 'user/index', 'user', 'index', 1595167742, '2020-07-19 16:09:02', 1),
(1520, 'akuncoba@email.com', 'data/kas', 'data', 'kas', 1595167782, '2020-07-19 16:09:42', 1),
(1521, 'akuncoba@email.com', 'input/materi', 'input', 'materi', 1595167796, '2020-07-19 16:09:56', 1),
(1522, 'akuncoba@email.com', 'user/index', 'user', 'index', 1595167804, '2020-07-19 16:10:04', 1),
(1523, 'akuncoba@email.com', 'input/materi', 'input', 'materi', 1595167886, '2020-07-19 16:11:26', 1),
(1524, 'akuncoba@email.com', 'data/user', 'data', 'user', 1595167898, '2020-07-19 16:11:38', 1),
(1525, 'akuncoba@email.com', 'data/absen', 'data', 'absen', 1595167906, '2020-07-19 16:11:46', 1),
(1526, 'akuncoba@email.com', 'input/materi', 'input', 'materi', 1595167939, '2020-07-19 16:12:19', 1),
(1527, 'akuncoba@email.com', 'input/materi', 'input', 'materi', 1595167940, '2020-07-19 16:12:20', 1),
(1528, 'akuncoba@email.com', 'edit/materi', 'edit', 'materi', 1595167955, '2020-07-19 16:12:35', 1),
(1529, 'akuncoba@email.com', 'edit/materi', 'edit', 'materi', 1595167957, '2020-07-19 16:12:37', 1),
(1530, 'akuncoba@email.com', 'edit/materi', 'edit', 'materi', 1595167957, '2020-07-19 16:12:37', 1),
(1531, 'akuncoba@email.com', 'edit/materi', 'edit', 'materi', 1595167957, '2020-07-19 16:12:37', 1),
(1532, 'akuncoba@email.com', 'edit/materi', 'edit', 'materi', 1595167957, '2020-07-19 16:12:37', 1),
(1533, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595307906, '2020-07-21 07:05:06', 0),
(1534, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595308006, '2020-07-21 07:06:46', 0),
(1535, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595308063, '2020-07-21 07:07:43', 0),
(1536, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595308067, '2020-07-21 07:07:47', 0),
(1537, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595308068, '2020-07-21 07:07:48', 0),
(1538, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595308077, '2020-07-21 07:07:57', 0),
(1539, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595308078, '2020-07-21 07:07:58', 0),
(1540, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595308095, '2020-07-21 07:08:15', 0),
(1541, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595308096, '2020-07-21 07:08:16', 0),
(1542, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595308118, '2020-07-21 07:08:38', 0),
(1543, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595308126, '2020-07-21 07:08:46', 0),
(1544, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595308128, '2020-07-21 07:08:48', 0),
(1545, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595308133, '2020-07-21 07:08:53', 0),
(1546, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595308134, '2020-07-21 07:08:54', 0),
(1547, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595308139, '2020-07-21 07:08:59', 0),
(1548, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595308141, '2020-07-21 07:09:01', 0),
(1549, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595308152, '2020-07-21 07:09:12', 0),
(1550, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595308153, '2020-07-21 07:09:13', 0),
(1551, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595308177, '2020-07-21 07:09:37', 0),
(1552, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595308177, '2020-07-21 07:09:37', 0),
(1553, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595308186, '2020-07-21 07:09:46', 0),
(1554, 'firmansyahrizkan099@gmail.com', 'admin/inputkas', 'admin', 'inputkas', 1595308196, '2020-07-21 07:09:56', 0),
(1555, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595308197, '2020-07-21 07:09:57', 0),
(1556, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595308205, '2020-07-21 07:10:05', 0),
(1557, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595308228, '2020-07-21 07:10:28', 0),
(1558, 'firmansyahrizkan099@gmail.com', 'admin/user', 'admin', 'user', 1595308241, '2020-07-21 07:10:41', 0),
(1559, 'firmansyahrizkan099@gmail.com', 'member/index', 'member', 'index', 1595308272, '2020-07-21 07:11:12', 0),
(1560, 'firmansyahrizkan099@gmail.com', 'member/profile', 'member', 'profile', 1595308299, '2020-07-21 07:11:39', 0),
(1561, 'firmansyahrizkan099@gmail.com', 'akses/materiakses', 'akses', 'materiakses', 1595308319, '2020-07-21 07:11:59', 0),
(1562, 'firmansyahrizkan099@gmail.com', 'member/profile', 'member', 'profile', 1595308321, '2020-07-21 07:12:01', 0),
(1563, 'firmansyahrizkan099@gmail.com', 'member/dashboard', 'member', 'dashboard', 1595308388, '2020-07-21 07:13:08', 0),
(1564, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595308445, '2020-07-21 07:14:05', 0),
(1565, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595308490, '2020-07-21 07:14:50', 0),
(1566, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595308514, '2020-07-21 07:15:14', 0),
(1567, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595308516, '2020-07-21 07:15:16', 0),
(1568, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595308518, '2020-07-21 07:15:18', 0),
(1569, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595308518, '2020-07-21 07:15:18', 0),
(1570, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595308519, '2020-07-21 07:15:19', 0),
(1571, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595308521, '2020-07-21 07:15:21', 0),
(1572, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595308549, '2020-07-21 07:15:49', 0),
(1573, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595308568, '2020-07-21 07:16:08', 0),
(1574, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595308575, '2020-07-21 07:16:15', 0),
(1575, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595308578, '2020-07-21 07:16:18', 0),
(1576, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595308580, '2020-07-21 07:16:20', 0),
(1577, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595308582, '2020-07-21 07:16:22', 0),
(1578, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595308585, '2020-07-21 07:16:25', 0),
(1579, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595308625, '2020-07-21 07:17:05', 0),
(1580, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595308642, '2020-07-21 07:17:22', 0),
(1581, 'firmansyahrizkan099@gmail.com', 'user/log', 'user', 'log', 1595308781, '2020-07-21 07:19:41', 0),
(1582, 'firmansyahrizkan099@gmail.com', 'user/clearlog', 'user', 'clearlog', 1595308789, '2020-07-21 07:19:49', 0),
(1583, 'firmansyahrizkan099@gmail.com', 'user/log', 'user', 'log', 1595308792, '2020-07-21 07:19:52', 1),
(1584, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595308864, '2020-07-21 07:21:04', 1),
(1585, 'firmansyahrizkan099@gmail.com', 'data/daftar', 'data', 'daftar', 1595309108, '2020-07-21 07:25:08', 1),
(1586, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595309109, '2020-07-21 07:25:09', 1),
(1587, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595309119, '2020-07-21 07:25:19', 1),
(1588, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595309128, '2020-07-21 07:25:28', 1),
(1589, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595309128, '2020-07-21 07:25:28', 1),
(1590, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595309150, '2020-07-21 07:25:50', 1),
(1591, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595309179, '2020-07-21 07:26:19', 1),
(1592, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595309180, '2020-07-21 07:26:20', 1),
(1593, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595309180, '2020-07-21 07:26:20', 1),
(1594, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595309180, '2020-07-21 07:26:20', 1),
(1595, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595309180, '2020-07-21 07:26:20', 1),
(1596, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595309204, '2020-07-21 07:26:44', 1),
(1597, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595309217, '2020-07-21 07:26:57', 1),
(1598, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595309227, '2020-07-21 07:27:07', 1),
(1599, 'firmansyahrizkan099@gmail.com', 'hosting/web', 'hosting', 'web', 1595309292, '2020-07-21 07:28:12', 1),
(1600, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1601, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1602, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1603, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1604, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1605, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309299, '2020-07-21 07:28:19', 1),
(1606, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1607, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1608, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1609, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1610, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1611, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1612, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1613, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309300, '2020-07-21 07:28:20', 1),
(1614, 'firmansyahrizkan099@gmail.com', 'itwebhost/index', 'itwebhost', 'index', 1595309301, '2020-07-21 07:28:21', 1),
(1615, 'firmansyahrizkan099@gmail.com', 'hosting/web', 'hosting', 'web', 1595309309, '2020-07-21 07:28:29', 1),
(1616, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309312, '2020-07-21 07:28:32', 1),
(1617, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309312, '2020-07-21 07:28:32', 1),
(1618, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309312, '2020-07-21 07:28:32', 1),
(1619, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309312, '2020-07-21 07:28:32', 1),
(1620, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309312, '2020-07-21 07:28:32', 1),
(1621, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309350, '2020-07-21 07:29:10', 1),
(1622, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309350, '2020-07-21 07:29:10', 1),
(1623, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309350, '2020-07-21 07:29:10', 1),
(1624, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1625, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1626, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1627, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1628, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1629, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1630, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1631, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1632, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1633, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1634, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1635, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309351, '2020-07-21 07:29:11', 1),
(1636, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309370, '2020-07-21 07:29:30', 1),
(1637, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309371, '2020-07-21 07:29:31', 1),
(1638, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309371, '2020-07-21 07:29:31', 1),
(1639, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309371, '2020-07-21 07:29:31', 1),
(1640, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309371, '2020-07-21 07:29:31', 1),
(1641, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309373, '2020-07-21 07:29:33', 1),
(1642, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309374, '2020-07-21 07:29:34', 1),
(1643, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309374, '2020-07-21 07:29:34', 1),
(1644, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309374, '2020-07-21 07:29:34', 1),
(1645, 'firmansyahrizkan099@gmail.com', 'hosting/editfile', 'hosting', 'editfile', 1595309374, '2020-07-21 07:29:34', 1),
(1646, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309378, '2020-07-21 07:29:38', 1),
(1647, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309379, '2020-07-21 07:29:39', 1),
(1648, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309380, '2020-07-21 07:29:40', 1),
(1649, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309380, '2020-07-21 07:29:40', 1),
(1650, 'firmansyahrizkan099@gmail.com', 'hosting/open', 'hosting', 'open', 1595309380, '2020-07-21 07:29:40', 1),
(1651, 'firmansyahrizkan099@gmail.com', 'admin/backend', 'admin', 'backend', 1595309792, '2020-07-21 07:36:32', 1),
(1652, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595309955, '2020-07-21 07:39:15', 1),
(1653, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595309962, '2020-07-21 07:39:22', 1),
(1654, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595310870, '2020-07-21 07:54:30', 1),
(1655, 'firmansyahrizkan099@gmail.com', 'member/dashboard', 'member', 'dashboard', 1595314282, '2020-07-21 08:51:22', 1),
(1656, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595399889, '2020-07-22 08:38:09', 1),
(1657, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595399925, '2020-07-22 08:38:45', 1),
(1658, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595399930, '2020-07-22 08:38:50', 1),
(1659, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595399931, '2020-07-22 08:38:51', 1),
(1660, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595399931, '2020-07-22 08:38:51', 1),
(1661, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595399931, '2020-07-22 08:38:51', 1),
(1662, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595399931, '2020-07-22 08:38:51', 1),
(1663, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595400474, '2020-07-22 08:47:54', 1),
(1664, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595400482, '2020-07-22 08:48:02', 1),
(1665, 'riezkanaprianda@gmail.com', 'user/index', 'user', 'index', 1595400921, '2020-07-22 08:55:21', 1),
(1666, 'riezkanaprianda@gmail.com', 'member/index', 'member', 'index', 1595400931, '2020-07-22 08:55:31', 1),
(1667, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595487657, '2020-07-23 09:00:57', 1),
(1668, 'firmansyahrizkan099@gmail.com', 'root/role', 'root', 'role', 1595487712, '2020-07-23 09:01:52', 1),
(1669, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487719, '2020-07-23 09:01:59', 1),
(1670, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487719, '2020-07-23 09:01:59', 1),
(1671, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487720, '2020-07-23 09:02:00', 1),
(1672, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487720, '2020-07-23 09:02:00', 1),
(1673, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487720, '2020-07-23 09:02:00', 1),
(1674, 'firmansyahrizkan099@gmail.com', 'root/role', 'root', 'role', 1595487738, '2020-07-23 09:02:18', 1),
(1675, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487740, '2020-07-23 09:02:20', 1),
(1676, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487740, '2020-07-23 09:02:20', 1),
(1677, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487740, '2020-07-23 09:02:20', 1),
(1678, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487740, '2020-07-23 09:02:20', 1),
(1679, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487741, '2020-07-23 09:02:21', 1),
(1680, 'firmansyahrizkan099@gmail.com', 'root/changeaccess', 'root', 'changeaccess', 1595487745, '2020-07-23 09:02:25', 1),
(1681, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487747, '2020-07-23 09:02:27', 1),
(1682, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487747, '2020-07-23 09:02:27', 1),
(1683, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487747, '2020-07-23 09:02:27', 1),
(1684, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487747, '2020-07-23 09:02:27', 1),
(1685, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487747, '2020-07-23 09:02:27', 1),
(1686, 'firmansyahrizkan099@gmail.com', 'root/changeaccess', 'root', 'changeaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1687, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1688, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1689, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1690, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1691, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595487757, '2020-07-23 09:02:37', 1),
(1692, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595487766, '2020-07-23 09:02:46', 1),
(1693, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595487785, '2020-07-23 09:03:05', 1),
(1694, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595487786, '2020-07-23 09:03:06', 1),
(1695, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595487786, '2020-07-23 09:03:06', 1),
(1696, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595487786, '2020-07-23 09:03:06', 1),
(1697, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595487786, '2020-07-23 09:03:06', 1),
(1698, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595487804, '2020-07-23 09:03:24', 1),
(1699, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595487807, '2020-07-23 09:03:27', 1),
(1700, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595487834, '2020-07-23 09:03:54', 1),
(1701, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595487985, '2020-07-23 09:06:25', 1),
(1702, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595488193, '2020-07-23 09:09:53', 1),
(1703, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595488382, '2020-07-23 09:13:02', 1),
(1704, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595488543, '2020-07-23 09:15:43', 1),
(1705, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595488551, '2020-07-23 09:15:51', 1),
(1706, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595488552, '2020-07-23 09:15:52', 1),
(1707, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595488552, '2020-07-23 09:15:52', 1),
(1708, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595488552, '2020-07-23 09:15:52', 1),
(1709, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595488552, '2020-07-23 09:15:52', 1),
(1710, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595489049, '2020-07-23 09:24:09', 1),
(1711, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595489058, '2020-07-23 09:24:18', 1),
(1712, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595489058, '2020-07-23 09:24:18', 1),
(1713, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595489058, '2020-07-23 09:24:18', 1),
(1714, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595489058, '2020-07-23 09:24:18', 1),
(1715, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595489058, '2020-07-23 09:24:18', 1),
(1716, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595489161, '2020-07-23 09:26:01', 1),
(1717, 'firmansyahrizkan099@gmail.com', 'data/daftar', 'data', 'daftar', 1595489167, '2020-07-23 09:26:07', 1),
(1718, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595489168, '2020-07-23 09:26:08', 1),
(1719, 'firmansyahrizkan099@gmail.com', 'data/daftar', 'data', 'daftar', 1595489178, '2020-07-23 09:26:18', 1),
(1720, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595489178, '2020-07-23 09:26:18', 1),
(1721, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595489187, '2020-07-23 09:26:27', 1),
(1722, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595489196, '2020-07-23 09:26:36', 1),
(1723, 'firmansyahrizkan099@gmail.com', 'data/absen', 'data', 'absen', 1595489196, '2020-07-23 09:26:36', 1),
(1724, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595489718, '2020-07-23 09:35:18', 1),
(1725, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595489723, '2020-07-23 09:35:23', 1),
(1726, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595489723, '2020-07-23 09:35:23', 1),
(1727, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595489758, '2020-07-23 09:35:58', 1),
(1728, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595489758, '2020-07-23 09:35:58', 1),
(1729, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595489957, '2020-07-23 09:39:17', 1),
(1730, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595489963, '2020-07-23 09:39:23', 1),
(1731, 'firmansyahrizkan099@gmail.com', 'root/role', 'root', 'role', 1595490339, '2020-07-23 09:45:39', 1),
(1732, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595490352, '2020-07-23 09:45:52', 1),
(1733, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595490916, '2020-07-23 09:55:16', 1),
(1734, 'firmansyahrizkan099@gmail.com', 'input/list', 'input', 'list', 1595490941, '2020-07-23 09:55:41', 1),
(1735, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595490947, '2020-07-23 09:55:47', 1),
(1736, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595490976, '2020-07-23 09:56:16', 1),
(1737, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595490976, '2020-07-23 09:56:16', 1),
(1738, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595490977, '2020-07-23 09:56:17', 1),
(1739, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595490977, '2020-07-23 09:56:17', 1),
(1740, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595490977, '2020-07-23 09:56:17', 1),
(1741, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595491003, '2020-07-23 09:56:43', 1),
(1742, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595491037, '2020-07-23 09:57:17', 1),
(1743, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595491240, '2020-07-23 10:00:40', 1),
(1744, 'firmansyahrizkan099@gmail.com', 'input/nilai', 'input', 'nilai', 1595491320, '2020-07-23 10:02:00', 1),
(1745, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491351, '2020-07-23 10:02:31', 1),
(1746, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491352, '2020-07-23 10:02:32', 1),
(1747, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491352, '2020-07-23 10:02:32', 1),
(1748, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491352, '2020-07-23 10:02:32', 1),
(1749, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491352, '2020-07-23 10:02:32', 1),
(1750, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595491360, '2020-07-23 10:02:40', 1),
(1751, 'firmansyahrizkan099@gmail.com', 'input/nilai', 'input', 'nilai', 1595491361, '2020-07-23 10:02:41', 1),
(1752, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595491479, '2020-07-23 10:04:39', 1),
(1753, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491485, '2020-07-23 10:04:45', 1),
(1754, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491485, '2020-07-23 10:04:45', 1),
(1755, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491485, '2020-07-23 10:04:45', 1),
(1756, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491485, '2020-07-23 10:04:45', 1),
(1757, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491485, '2020-07-23 10:04:45', 1),
(1758, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595491580, '2020-07-23 10:06:20', 1),
(1759, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491591, '2020-07-23 10:06:31', 1),
(1760, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491591, '2020-07-23 10:06:31', 1),
(1761, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491591, '2020-07-23 10:06:31', 1),
(1762, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491591, '2020-07-23 10:06:31', 1),
(1763, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595491592, '2020-07-23 10:06:32', 1),
(1764, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595491604, '2020-07-23 10:06:44', 1),
(1765, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595491736, '2020-07-23 10:08:56', 1),
(1766, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491749, '2020-07-23 10:09:09', 1),
(1767, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491750, '2020-07-23 10:09:10', 1),
(1768, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491750, '2020-07-23 10:09:10', 1),
(1769, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491750, '2020-07-23 10:09:10', 1),
(1770, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491750, '2020-07-23 10:09:10', 1),
(1771, 'firmansyahrizkan099@gmail.com', 'soal/soal', 'soal', 'soal', 1595491858, '2020-07-23 10:10:58', 1),
(1772, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491866, '2020-07-23 10:11:06', 1),
(1773, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491866, '2020-07-23 10:11:06', 1),
(1774, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491866, '2020-07-23 10:11:06', 1),
(1775, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491866, '2020-07-23 10:11:06', 1),
(1776, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595491867, '2020-07-23 10:11:07', 1),
(1777, 'firmansyahrizkan099@gmail.com', 'hosting/blog', 'hosting', 'blog', 1595492157, '2020-07-23 10:15:57', 1),
(1778, 'firmansyahrizkan099@gmail.com', 'data/user', 'data', 'user', 1595492925, '2020-07-23 10:28:45', 1),
(1779, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595492932, '2020-07-23 10:28:52', 1),
(1780, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595492958, '2020-07-23 10:29:18', 1),
(1781, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493001, '2020-07-23 10:30:01', 1),
(1782, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493001, '2020-07-23 10:30:01', 1),
(1783, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493001, '2020-07-23 10:30:01', 1),
(1784, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493001, '2020-07-23 10:30:01', 1),
(1785, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493001, '2020-07-23 10:30:01', 1),
(1786, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595493005, '2020-07-23 10:30:05', 1),
(1787, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595493006, '2020-07-23 10:30:06', 1),
(1788, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595493017, '2020-07-23 10:30:17', 1),
(1789, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595493034, '2020-07-23 10:30:34', 1),
(1790, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595493049, '2020-07-23 10:30:49', 1),
(1791, 'firmansyahrizkan099@gmail.com', 'developer/changerule', 'developer', 'changerule', 1595493055, '2020-07-23 10:30:55', 1),
(1792, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595493055, '2020-07-23 10:30:55', 1),
(1793, 'riezkanaprianda@gmail.com', 'user/index', 'user', 'index', 1595493072, '2020-07-23 10:31:12', 1),
(1794, 'riezkanaprianda@gmail.com', 'data/user', 'data', 'user', 1595493077, '2020-07-23 10:31:17', 1),
(1795, 'riezkanaprianda@gmail.com', 'data/absen', 'data', 'absen', 1595493083, '2020-07-23 10:31:23', 1),
(1796, 'rizkan@rizkan.com', 'user/index', 'user', 'index', 1595493131, '2020-07-23 10:32:11', 1),
(1797, 'rizkan@rizkan.com', 'data/user', 'data', 'user', 1595493134, '2020-07-23 10:32:14', 1),
(1798, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595493152, '2020-07-23 10:32:32', 1),
(1799, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595493158, '2020-07-23 10:32:38', 1),
(1800, 'rizkan@rizkan.com', 'user/index', 'user', 'index', 1595493210, '2020-07-23 10:33:30', 1),
(1801, 'rizkan@rizkan.com', 'user/index', 'user', 'index', 1595493225, '2020-07-23 10:33:45', 1),
(1802, 'rizkan@rizkan.com', 'user/index', 'user', 'index', 1595493240, '2020-07-23 10:34:00', 1),
(1803, 'rizkan@rizkan.com', 'input/materi', 'input', 'materi', 1595493248, '2020-07-23 10:34:08', 1),
(1804, 'rizkan@rizkan.com', 'input/nilai', 'input', 'nilai', 1595493269, '2020-07-23 10:34:29', 1),
(1805, 'rizkan@rizkan.com', 'input/tugas', 'input', 'tugas', 1595493271, '2020-07-23 10:34:31', 1),
(1806, 'member@my.id', 'member/index', 'member', 'index', 1595493305, '2020-07-23 10:35:05', 1),
(1807, 'member@my.id', 'member/dashboard', 'member', 'dashboard', 1595493310, '2020-07-23 10:35:10', 1),
(1808, 'riezkanaprianda@gmail.com', 'user/index', 'user', 'index', 1595493334, '2020-07-23 10:35:34', 1),
(1809, 'riezkanaprianda@gmail.com', 'member/index', 'member', 'index', 1595493343, '2020-07-23 10:35:43', 1),
(1810, 'riezkanaprianda@gmail.com', 'member/dashboard', 'member', 'dashboard', 1595493347, '2020-07-23 10:35:47', 1),
(1811, 'riezkanaprianda@gmail.com', 'akses/materiakses', 'akses', 'materiakses', 1595493360, '2020-07-23 10:36:00', 1),
(1812, 'riezkanaprianda@gmail.com', 'akses/materiakses', 'akses', 'materiakses', 1595493361, '2020-07-23 10:36:01', 1),
(1813, 'riezkanaprianda@gmail.com', 'member/profile', 'member', 'profile', 1595493367, '2020-07-23 10:36:07', 1),
(1814, 'riezkanaprianda@gmail.com', 'akses/materiakses', 'akses', 'materiakses', 1595493372, '2020-07-23 10:36:12', 1),
(1815, 'riezkanaprianda@gmail.com', 'member/profile', 'member', 'profile', 1595493373, '2020-07-23 10:36:13', 1),
(1816, 'riezkanaprianda@gmail.com', 'member/dashboard', 'member', 'dashboard', 1595493382, '2020-07-23 10:36:22', 1),
(1817, 'riezkanaprianda@gmail.com', 'user/index', 'user', 'index', 1595493419, '2020-07-23 10:36:59', 1),
(1818, 'riezkanaprianda@gmail.com', 'admin/kas', 'admin', 'kas', 1595493464, '2020-07-23 10:37:44', 1),
(1819, 'riezkanaprianda@gmail.com', 'input/materi', 'input', 'materi', 1595493489, '2020-07-23 10:38:09', 1),
(1820, 'riezkanaprianda@gmail.com', 'input/tugas', 'input', 'tugas', 1595493520, '2020-07-23 10:38:40', 1),
(1821, 'riezkanaprianda@gmail.com', 'input/nilai', 'input', 'nilai', 1595493534, '2020-07-23 10:38:54', 1),
(1822, 'riezkanaprianda@gmail.com', 'input/soal', 'input', 'soal', 1595493566, '2020-07-23 10:39:26', 1),
(1823, 'riezkanaprianda@gmail.com', 'input/ujian', 'input', 'ujian', 1595493576, '2020-07-23 10:39:36', 1),
(1824, 'riezkanaprianda@gmail.com', 'data/absen', 'data', 'absen', 1595493679, '2020-07-23 10:41:19', 1),
(1825, 'riezkanaprianda@gmail.com', 'data/absen', 'data', 'absen', 1595493709, '2020-07-23 10:41:49', 1),
(1826, 'riezkanaprianda@gmail.com', 'input/ujian', 'input', 'ujian', 1595493904, '2020-07-23 10:45:04', 1),
(1827, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595561222, '2020-07-24 05:27:02', 1),
(1828, 'firmansyahrizkan099@gmail.com', 'root/role', 'root', 'role', 1595561425, '2020-07-24 05:30:25', 1),
(1829, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561574, '2020-07-24 05:32:54', 1),
(1830, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561575, '2020-07-24 05:32:55', 1),
(1831, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561575, '2020-07-24 05:32:55', 1),
(1832, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561575, '2020-07-24 05:32:55', 1),
(1833, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561576, '2020-07-24 05:32:56', 1),
(1834, 'firmansyahrizkan099@gmail.com', 'root/changeaccess', 'root', 'changeaccess', 1595561587, '2020-07-24 05:33:07', 1),
(1835, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561587, '2020-07-24 05:33:07', 1),
(1836, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561588, '2020-07-24 05:33:08', 1),
(1837, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561588, '2020-07-24 05:33:08', 1),
(1838, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561588, '2020-07-24 05:33:08', 1),
(1839, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561588, '2020-07-24 05:33:08', 1),
(1840, 'firmansyahrizkan099@gmail.com', 'root/changeaccess', 'root', 'changeaccess', 1595561610, '2020-07-24 05:33:30', 1),
(1841, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561610, '2020-07-24 05:33:30', 1),
(1842, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561610, '2020-07-24 05:33:30', 1),
(1843, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561610, '2020-07-24 05:33:30', 1),
(1844, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561611, '2020-07-24 05:33:31', 1),
(1845, 'firmansyahrizkan099@gmail.com', 'root/roleaccess', 'root', 'roleaccess', 1595561611, '2020-07-24 05:33:31', 1),
(1846, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595561761, '2020-07-24 05:36:01', 1),
(1847, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595561769, '2020-07-24 05:36:09', 1),
(1848, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595561769, '2020-07-24 05:36:09', 1),
(1849, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595561770, '2020-07-24 05:36:10', 1),
(1850, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595561770, '2020-07-24 05:36:10', 1),
(1851, 'firmansyahrizkan099@gmail.com', 'root/datauser', 'root', 'datauser', 1595561770, '2020-07-24 05:36:10', 1),
(1852, 'firmansyahrizkan099@gmail.com', 'root/databaseuser', 'root', 'databaseuser', 1595561785, '2020-07-24 05:36:25', 1),
(1853, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595561796, '2020-07-24 05:36:36', 1),
(1854, 'firmansyahrizkan099@gmail.com', 'edit/member', 'edit', 'member', 1595561812, '2020-07-24 05:36:52', 1),
(1855, 'firmansyahrizkan099@gmail.com', 'edit/member', 'edit', 'member', 1595561813, '2020-07-24 05:36:53', 1),
(1856, 'firmansyahrizkan099@gmail.com', 'edit/member', 'edit', 'member', 1595561813, '2020-07-24 05:36:53', 1),
(1857, 'firmansyahrizkan099@gmail.com', 'edit/member', 'edit', 'member', 1595561813, '2020-07-24 05:36:53', 1),
(1858, 'firmansyahrizkan099@gmail.com', 'edit/member', 'edit', 'member', 1595561813, '2020-07-24 05:36:53', 1),
(1859, 'firmansyahrizkan099@gmail.com', 'root/member', 'root', 'member', 1595561817, '2020-07-24 05:36:57', 1),
(1860, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595561828, '2020-07-24 05:37:08', 1),
(1861, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561869, '2020-07-24 05:37:49', 1),
(1862, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561869, '2020-07-24 05:37:49', 1),
(1863, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561870, '2020-07-24 05:37:50', 1),
(1864, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561870, '2020-07-24 05:37:50', 1),
(1865, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561870, '2020-07-24 05:37:50', 1),
(1866, 'firmansyahrizkan099@gmail.com', 'back/end', 'back', 'end', 1595561872, '2020-07-24 05:37:52', 1),
(1867, 'firmansyahrizkan099@gmail.com', 'root/backend', 'root', 'backend', 1595561872, '2020-07-24 05:37:52', 1),
(1868, 'firmansyahrizkan099@gmail.com', 'admin/backend', 'admin', 'backend', 1595561891, '2020-07-24 05:38:11', 1),
(1869, 'firmansyahrizkan099@gmail.com', 'admin/user', 'admin', 'user', 1595561903, '2020-07-24 05:38:23', 1),
(1870, 'firmansyahrizkan099@gmail.com', 'admin/member', 'admin', 'member', 1595561909, '2020-07-24 05:38:29', 1),
(1871, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595561919, '2020-07-24 05:38:39', 1),
(1872, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595561933, '2020-07-24 05:38:53', 1),
(1873, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595561949, '2020-07-24 05:39:09', 1),
(1874, 'firmansyahrizkan099@gmail.com', 'admin/inputkas', 'admin', 'inputkas', 1595561958, '2020-07-24 05:39:18', 1),
(1875, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595561958, '2020-07-24 05:39:18', 1),
(1876, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595561970, '2020-07-24 05:39:30', 1),
(1877, 'firmansyahrizkan099@gmail.com', 'upload/kas', 'upload', 'kas', 1595561990, '2020-07-24 05:39:50', 1),
(1878, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595561991, '2020-07-24 05:39:51', 1),
(1879, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595562025, '2020-07-24 05:40:25', 1),
(1880, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595562026, '2020-07-24 05:40:26', 1),
(1881, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595562026, '2020-07-24 05:40:26', 1),
(1882, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595562026, '2020-07-24 05:40:26', 1),
(1883, 'firmansyahrizkan099@gmail.com', 'kas/pemasukan', 'kas', 'pemasukan', 1595562026, '2020-07-24 05:40:26', 1),
(1884, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595562037, '2020-07-24 05:40:37', 1),
(1885, 'firmansyahrizkan099@gmail.com', 'admin/kas', 'admin', 'kas', 1595562043, '2020-07-24 05:40:43', 1),
(1886, 'firmansyahrizkan099@gmail.com', 'data/kas', 'data', 'kas', 1595562069, '2020-07-24 05:41:09', 1),
(1887, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595562078, '2020-07-24 05:41:18', 1),
(1888, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595562103, '2020-07-24 05:41:43', 1),
(1889, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595562103, '2020-07-24 05:41:43', 1),
(1890, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595562103, '2020-07-24 05:41:43', 1),
(1891, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595562103, '2020-07-24 05:41:43', 1),
(1892, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595562103, '2020-07-24 05:41:43', 1),
(1893, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595562106, '2020-07-24 05:41:46', 1),
(1894, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595562119, '2020-07-24 05:41:59', 1),
(1895, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562150, '2020-07-24 05:42:30', 1),
(1896, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562150, '2020-07-24 05:42:30', 1),
(1897, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562150, '2020-07-24 05:42:30', 1),
(1898, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562151, '2020-07-24 05:42:31', 1),
(1899, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562151, '2020-07-24 05:42:31', 1),
(1900, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562156, '2020-07-24 05:42:36', 1),
(1901, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595562156, '2020-07-24 05:42:36', 1),
(1902, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562167, '2020-07-24 05:42:47', 1),
(1903, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562168, '2020-07-24 05:42:48', 1),
(1904, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562168, '2020-07-24 05:42:48', 1),
(1905, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562169, '2020-07-24 05:42:49', 1),
(1906, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562169, '2020-07-24 05:42:49', 1),
(1907, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595562175, '2020-07-24 05:42:55', 1),
(1908, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595562176, '2020-07-24 05:42:56', 1),
(1909, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595562191, '2020-07-24 05:43:11', 1),
(1910, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562208, '2020-07-24 05:43:28', 1),
(1911, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562208, '2020-07-24 05:43:28', 1),
(1912, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562209, '2020-07-24 05:43:29', 1),
(1913, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562210, '2020-07-24 05:43:30', 1),
(1914, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562210, '2020-07-24 05:43:30', 1),
(1915, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562210, '2020-07-24 05:43:30', 1),
(1916, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595562236, '2020-07-24 05:43:56', 1),
(1917, 'firmansyahrizkan099@gmail.com', 'input/list', 'input', 'list', 1595562258, '2020-07-24 05:44:18', 1),
(1918, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595562263, '2020-07-24 05:44:23', 1),
(1919, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562276, '2020-07-24 05:44:36', 1),
(1920, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562276, '2020-07-24 05:44:36', 1),
(1921, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562277, '2020-07-24 05:44:37', 1),
(1922, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562277, '2020-07-24 05:44:37', 1),
(1923, 'firmansyahrizkan099@gmail.com', 'input/daftar', 'input', 'daftar', 1595562277, '2020-07-24 05:44:37', 1),
(1924, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595562288, '2020-07-24 05:44:48', 1),
(1925, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595562343, '2020-07-24 05:45:43', 1),
(1926, 'firmansyahrizkan099@gmail.com', 'hapus/tugas', 'hapus', 'tugas', 1595562368, '2020-07-24 05:46:08', 1),
(1927, 'firmansyahrizkan099@gmail.com', 'input/tugas', 'input', 'tugas', 1595562369, '2020-07-24 05:46:09', 1),
(1928, 'firmansyahrizkan099@gmail.com', 'input/nilai', 'input', 'nilai', 1595562429, '2020-07-24 05:47:09', 1),
(1929, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562461, '2020-07-24 05:47:41', 1),
(1930, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562461, '2020-07-24 05:47:41', 1),
(1931, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562462, '2020-07-24 05:47:42', 1),
(1932, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562462, '2020-07-24 05:47:42', 1),
(1933, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562462, '2020-07-24 05:47:42', 1),
(1934, 'firmansyahrizkan099@gmail.com', 'akses/nilai', 'akses', 'nilai', 1595562468, '2020-07-24 05:47:48', 1),
(1935, 'firmansyahrizkan099@gmail.com', 'input/nilai', 'input', 'nilai', 1595562468, '2020-07-24 05:47:48', 1),
(1936, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595562492, '2020-07-24 05:48:12', 1),
(1937, 'firmansyahrizkan099@gmail.com', 'soal/input', 'soal', 'input', 1595562512, '2020-07-24 05:48:32', 1),
(1938, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595562513, '2020-07-24 05:48:33', 1),
(1939, 'firmansyahrizkan099@gmail.com', 'soal/status', 'soal', 'status', 1595562524, '2020-07-24 05:48:44', 1),
(1940, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595562525, '2020-07-24 05:48:45', 1),
(1941, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562533, '2020-07-24 05:48:53', 1),
(1942, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562534, '2020-07-24 05:48:54', 1),
(1943, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562534, '2020-07-24 05:48:54', 1);
INSERT INTO `log` (`id`, `user`, `log`, `class`, `method`, `time`, `date`, `status`) VALUES
(1944, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562534, '2020-07-24 05:48:54', 1),
(1945, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562534, '2020-07-24 05:48:54', 1),
(1946, 'firmansyahrizkan099@gmail.com', 'input/soal', 'input', 'soal', 1595562538, '2020-07-24 05:48:58', 1),
(1947, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562552, '2020-07-24 05:49:12', 1),
(1948, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562553, '2020-07-24 05:49:13', 1),
(1949, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562553, '2020-07-24 05:49:13', 1),
(1950, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562553, '2020-07-24 05:49:13', 1),
(1951, 'firmansyahrizkan099@gmail.com', 'soal/manage', 'soal', 'manage', 1595562553, '2020-07-24 05:49:13', 1),
(1952, 'firmansyahrizkan099@gmail.com', 'input/ujian', 'input', 'ujian', 1595562599, '2020-07-24 05:49:59', 1),
(1953, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595562622, '2020-07-24 05:50:22', 1),
(1954, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595562623, '2020-07-24 05:50:23', 1),
(1955, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595562624, '2020-07-24 05:50:24', 1),
(1956, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595562624, '2020-07-24 05:50:24', 1),
(1957, 'firmansyahrizkan099@gmail.com', 'input/hasilujian', 'input', 'hasilujian', 1595562624, '2020-07-24 05:50:24', 1),
(1958, 'firmansyahrizkan099@gmail.com', 'developer/setting', 'developer', 'setting', 1595562703, '2020-07-24 05:51:43', 1),
(1959, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595562719, '2020-07-24 05:51:59', 1),
(1960, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595562719, '2020-07-24 05:51:59', 1),
(1961, 'firmansyahrizkan099@gmail.com', 'developer/changes', 'developer', 'changes', 1595562734, '2020-07-24 05:52:14', 1),
(1962, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595562735, '2020-07-24 05:52:15', 1),
(1963, 'firmansyahrizkan099@gmail.com', 'admin/user', 'admin', 'user', 1595562795, '2020-07-24 05:53:15', 1),
(1964, 'firmansyahrizkan099@gmail.com', 'admin/backend', 'admin', 'backend', 1595562808, '2020-07-24 05:53:28', 1),
(1965, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595562909, '2020-07-24 05:55:09', 1),
(1966, 'firmansyahrizkan099@gmail.com', 'hosting/blog', 'hosting', 'blog', 1595563214, '2020-07-24 06:00:14', 1),
(1967, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595563223, '2020-07-24 06:00:23', 1),
(1968, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595563428, '2020-07-24 06:03:48', 1),
(1969, 'firmansyahrizkan099@gmail.com', 'setup/gallery', 'setup', 'gallery', 1595563451, '2020-07-24 06:04:11', 1),
(1970, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595563457, '2020-07-24 06:04:17', 1),
(1971, 'firmansyahrizkan099@gmail.com', 'developer/setrule', 'developer', 'setrule', 1595563493, '2020-07-24 06:04:53', 1),
(1972, 'firmansyahrizkan099@gmail.com', 'developer/developer', 'developer', 'developer', 1595563493, '2020-07-24 06:04:53', 1),
(1973, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595563512, '2020-07-24 06:05:12', 1),
(1974, 'firmansyahrizkan099@gmail.com', 'input/list', 'input', 'list', 1595563515, '2020-07-24 06:05:15', 1),
(1975, 'firmansyahrizkan099@gmail.com', 'input/materi', 'input', 'materi', 1595563530, '2020-07-24 06:05:30', 1),
(1976, 'firmansyahrizkan099@gmail.com', 'root/index', 'root', 'index', 1595743344, '2020-07-26 08:02:24', 1),
(1977, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743373, '2020-07-26 08:02:53', 1),
(1978, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743378, '2020-07-26 08:02:58', 1),
(1979, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743379, '2020-07-26 08:02:59', 1),
(1980, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743410, '2020-07-26 08:03:30', 1),
(1981, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743411, '2020-07-26 08:03:31', 1),
(1982, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743411, '2020-07-26 08:03:31', 1),
(1983, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743411, '2020-07-26 08:03:31', 1),
(1984, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743411, '2020-07-26 08:03:31', 1),
(1985, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743414, '2020-07-26 08:03:34', 1),
(1986, 'firmansyahrizkan099@gmail.com', 'menu/deletemenu', 'menu', 'deletemenu', 1595743437, '2020-07-26 08:03:57', 1),
(1987, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743438, '2020-07-26 08:03:58', 1),
(1988, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743450, '2020-07-26 08:04:10', 1),
(1989, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743450, '2020-07-26 08:04:10', 1),
(1990, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743450, '2020-07-26 08:04:10', 1),
(1991, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743450, '2020-07-26 08:04:10', 1),
(1992, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743450, '2020-07-26 08:04:10', 1),
(1993, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743454, '2020-07-26 08:04:14', 1),
(1994, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595743454, '2020-07-26 08:04:14', 1),
(1995, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743455, '2020-07-26 08:04:15', 1),
(1996, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595743461, '2020-07-26 08:04:21', 1),
(1997, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595743468, '2020-07-26 08:04:28', 1),
(1998, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595743521, '2020-07-26 08:05:21', 1),
(1999, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595743605, '2020-07-26 08:06:45', 1),
(2000, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743606, '2020-07-26 08:06:46', 1),
(2001, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743609, '2020-07-26 08:06:49', 1),
(2002, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743609, '2020-07-26 08:06:49', 1),
(2003, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743609, '2020-07-26 08:06:49', 1),
(2004, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743609, '2020-07-26 08:06:49', 1),
(2005, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743609, '2020-07-26 08:06:49', 1),
(2006, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743615, '2020-07-26 08:06:55', 1),
(2007, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743616, '2020-07-26 08:06:56', 1),
(2008, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743623, '2020-07-26 08:07:03', 1),
(2009, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743624, '2020-07-26 08:07:04', 1),
(2010, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743624, '2020-07-26 08:07:04', 1),
(2011, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743624, '2020-07-26 08:07:04', 1),
(2012, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743624, '2020-07-26 08:07:04', 1),
(2013, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743627, '2020-07-26 08:07:07', 1),
(2014, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743628, '2020-07-26 08:07:08', 1),
(2015, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743634, '2020-07-26 08:07:14', 1),
(2016, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743635, '2020-07-26 08:07:15', 1),
(2017, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743635, '2020-07-26 08:07:15', 1),
(2018, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743635, '2020-07-26 08:07:15', 1),
(2019, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743635, '2020-07-26 08:07:15', 1),
(2020, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743638, '2020-07-26 08:07:18', 1),
(2021, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743639, '2020-07-26 08:07:19', 1),
(2022, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743646, '2020-07-26 08:07:26', 1),
(2023, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743647, '2020-07-26 08:07:27', 1),
(2024, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743647, '2020-07-26 08:07:27', 1),
(2025, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743647, '2020-07-26 08:07:27', 1),
(2026, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743647, '2020-07-26 08:07:27', 1),
(2027, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595743650, '2020-07-26 08:07:30', 1),
(2028, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595743650, '2020-07-26 08:07:30', 1),
(2029, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595743655, '2020-07-26 08:07:35', 1),
(2030, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595743680, '2020-07-26 08:08:00', 1),
(2031, 'firmansyahrizkan099@gmail.com', 'admin/databaseuser', 'admin', 'databaseuser', 1595743682, '2020-07-26 08:08:02', 1),
(2032, 'firmansyahrizkan099@gmail.com', 'admin/member', 'admin', 'member', 1595743685, '2020-07-26 08:08:05', 1),
(2033, 'firmansyahrizkan099@gmail.com', 'admin/databaseuser', 'admin', 'databaseuser', 1595743788, '2020-07-26 08:09:48', 1),
(2034, 'firmansyahrizkan099@gmail.com', 'admin/member', 'admin', 'member', 1595743789, '2020-07-26 08:09:49', 1),
(2035, 'firmansyahrizkan099@gmail.com', 'admin/databaseuser', 'admin', 'databaseuser', 1595743791, '2020-07-26 08:09:51', 1),
(2036, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595743804, '2020-07-26 08:10:04', 1),
(2037, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595743814, '2020-07-26 08:10:14', 1),
(2038, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744023, '2020-07-26 08:13:43', 1),
(2039, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744024, '2020-07-26 08:13:44', 1),
(2040, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744024, '2020-07-26 08:13:44', 1),
(2041, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744025, '2020-07-26 08:13:45', 1),
(2042, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744025, '2020-07-26 08:13:45', 1),
(2043, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744025, '2020-07-26 08:13:45', 1),
(2044, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744027, '2020-07-26 08:13:47', 1),
(2045, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744029, '2020-07-26 08:13:49', 1),
(2046, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744029, '2020-07-26 08:13:49', 1),
(2047, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744029, '2020-07-26 08:13:49', 1),
(2048, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744030, '2020-07-26 08:13:50', 1),
(2049, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744030, '2020-07-26 08:13:50', 1),
(2050, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744034, '2020-07-26 08:13:54', 1),
(2051, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744038, '2020-07-26 08:13:58', 1),
(2052, 'firmansyahrizkan099@gmail.com', 'admin/editrole', 'admin', 'editrole', 1595744117, '2020-07-26 08:15:17', 1),
(2053, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744117, '2020-07-26 08:15:17', 1),
(2054, 'firmansyahrizkan099@gmail.com', 'admin/deleterole', 'admin', 'deleterole', 1595744148, '2020-07-26 08:15:48', 1),
(2055, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744151, '2020-07-26 08:15:51', 1),
(2056, 'firmansyahrizkan099@gmail.com', 'admin/deleterole', 'admin', 'deleterole', 1595744211, '2020-07-26 08:16:51', 1),
(2057, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744211, '2020-07-26 08:16:51', 1),
(2058, 'firmansyahrizkan099@gmail.com', 'admin/databaseuser', 'admin', 'databaseuser', 1595744217, '2020-07-26 08:16:57', 1),
(2059, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595744233, '2020-07-26 08:17:13', 1),
(2060, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595744292, '2020-07-26 08:18:12', 1),
(2061, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595744293, '2020-07-26 08:18:13', 1),
(2062, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595744294, '2020-07-26 08:18:14', 1),
(2063, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595744317, '2020-07-26 08:18:37', 1),
(2064, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595744346, '2020-07-26 08:19:06', 1),
(2065, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595744355, '2020-07-26 08:19:15', 1),
(2066, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595744356, '2020-07-26 08:19:16', 1),
(2067, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744377, '2020-07-26 08:19:37', 1),
(2068, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744378, '2020-07-26 08:19:38', 1),
(2069, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744378, '2020-07-26 08:19:38', 1),
(2070, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744378, '2020-07-26 08:19:38', 1),
(2071, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744378, '2020-07-26 08:19:38', 1),
(2072, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595744380, '2020-07-26 08:19:40', 1),
(2073, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744384, '2020-07-26 08:19:44', 1),
(2074, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744385, '2020-07-26 08:19:45', 1),
(2075, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744385, '2020-07-26 08:19:45', 1),
(2076, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744386, '2020-07-26 08:19:46', 1),
(2077, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744386, '2020-07-26 08:19:46', 1),
(2078, 'firmansyahrizkan099@gmail.com', 'menu/editmenu', 'menu', 'editmenu', 1595744388, '2020-07-26 08:19:48', 1),
(2079, 'firmansyahrizkan099@gmail.com', 'menu/index', 'menu', 'index', 1595744388, '2020-07-26 08:19:48', 1),
(2080, 'firmansyahrizkan099@gmail.com', 'admin/role', 'admin', 'role', 1595744390, '2020-07-26 08:19:50', 1),
(2081, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744394, '2020-07-26 08:19:54', 1),
(2082, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744394, '2020-07-26 08:19:54', 1),
(2083, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744394, '2020-07-26 08:19:54', 1),
(2084, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744394, '2020-07-26 08:19:54', 1),
(2085, 'firmansyahrizkan099@gmail.com', 'admin/roleaccess', 'admin', 'roleaccess', 1595744394, '2020-07-26 08:19:54', 1),
(2086, 'firmansyahrizkan099@gmail.com', 'admin/backend', 'admin', 'backend', 1595744402, '2020-07-26 08:20:02', 1),
(2087, 'firmansyahrizkan099@gmail.com', 'admin/user', 'admin', 'user', 1595744406, '2020-07-26 08:20:06', 1),
(2088, 'firmansyahrizkan099@gmail.com', 'admin/backend', 'admin', 'backend', 1595744409, '2020-07-26 08:20:09', 1),
(2089, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744413, '2020-07-26 08:20:13', 1),
(2090, 'firmansyahrizkan099@gmail.com', 'hapus/submenu', 'hapus', 'submenu', 1595744429, '2020-07-26 08:20:29', 1),
(2091, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744429, '2020-07-26 08:20:29', 1),
(2092, 'firmansyahrizkan099@gmail.com', 'hapus/submenu', 'hapus', 'submenu', 1595744445, '2020-07-26 08:20:45', 1),
(2093, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744445, '2020-07-26 08:20:45', 1),
(2094, 'firmansyahrizkan099@gmail.com', 'hapus/submenu', 'hapus', 'submenu', 1595744459, '2020-07-26 08:20:59', 1),
(2095, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744459, '2020-07-26 08:20:59', 1),
(2096, 'firmansyahrizkan099@gmail.com', 'hapus/submenu', 'hapus', 'submenu', 1595744465, '2020-07-26 08:21:05', 1),
(2097, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744466, '2020-07-26 08:21:06', 1),
(2098, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744476, '2020-07-26 08:21:16', 1),
(2099, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744476, '2020-07-26 08:21:16', 1),
(2100, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744477, '2020-07-26 08:21:17', 1),
(2101, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744477, '2020-07-26 08:21:17', 1),
(2102, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744477, '2020-07-26 08:21:17', 1),
(2103, 'firmansyahrizkan099@gmail.com', 'menu/editsubmenu', 'menu', 'editsubmenu', 1595744482, '2020-07-26 08:21:22', 1),
(2104, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744482, '2020-07-26 08:21:22', 1),
(2105, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744876, '2020-07-26 08:27:56', 1),
(2106, 'firmansyahrizkan099@gmail.com', 'menu/submenu', 'menu', 'submenu', 1595744876, '2020-07-26 08:27:56', 1),
(2107, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595745039, '2020-07-26 08:30:39', 1),
(2108, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595750730, '2020-07-26 10:05:30', 1),
(2109, 'firmansyahrizkan099@gmail.com', 'user/index', 'user', 'index', 1595750807, '2020-07-26 10:06:47', 1),
(2110, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595750810, '2020-07-26 10:06:50', 1),
(2111, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751269, '2020-07-26 10:14:29', 1),
(2112, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751290, '2020-07-26 10:14:50', 1),
(2113, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751308, '2020-07-26 10:15:08', 1),
(2114, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751325, '2020-07-26 10:15:25', 1),
(2115, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751403, '2020-07-26 10:16:43', 1),
(2116, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751464, '2020-07-26 10:17:44', 1),
(2117, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751536, '2020-07-26 10:18:56', 1),
(2118, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751596, '2020-07-26 10:19:56', 1),
(2119, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751608, '2020-07-26 10:20:08', 1),
(2120, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751627, '2020-07-26 10:20:27', 1),
(2121, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751635, '2020-07-26 10:20:35', 1),
(2122, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751684, '2020-07-26 10:21:24', 1),
(2123, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751702, '2020-07-26 10:21:42', 1),
(2124, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751719, '2020-07-26 10:21:59', 1),
(2125, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751803, '2020-07-26 10:23:23', 1),
(2126, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751836, '2020-07-26 10:23:56', 1),
(2127, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751925, '2020-07-26 10:25:25', 1),
(2128, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751996, '2020-07-26 10:26:36', 1),
(2129, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595751997, '2020-07-26 10:26:37', 1),
(2130, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595752046, '2020-07-26 10:27:26', 1),
(2131, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595752050, '2020-07-26 10:27:30', 1),
(2132, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595752422, '2020-07-26 10:33:42', 1),
(2133, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595752440, '2020-07-26 10:34:00', 1),
(2134, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595752458, '2020-07-26 10:34:18', 1),
(2135, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753721, '2020-07-26 10:55:21', 1),
(2136, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753864, '2020-07-26 10:57:44', 1),
(2137, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753877, '2020-07-26 10:57:57', 1),
(2138, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753914, '2020-07-26 10:58:34', 1),
(2139, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753957, '2020-07-26 10:59:17', 1),
(2140, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595753999, '2020-07-26 10:59:59', 1),
(2141, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754104, '2020-07-26 11:01:44', 1),
(2142, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754252, '2020-07-26 11:04:12', 1),
(2143, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754579, '2020-07-26 11:09:39', 1),
(2144, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754726, '2020-07-26 11:12:06', 1),
(2145, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754754, '2020-07-26 11:12:34', 1),
(2146, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595754991, '2020-07-26 11:16:31', 1),
(2147, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595755018, '2020-07-26 11:16:58', 1),
(2148, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595755045, '2020-07-26 11:17:25', 1),
(2149, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595755081, '2020-07-26 11:18:01', 1),
(2150, 'firmansyahrizkan099@gmail.com', 'profile/homepage', 'profile', 'homepage', 1595755184, '2020-07-26 11:19:44', 1),
(2162, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595788857, '2020-07-26 20:40:57', 1),
(2163, 'firmansyahrizkan099@gmail.com', 'admin/index', 'admin', 'index', 1595788902, '2020-07-26 20:41:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `id_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `nama_mapel`, `id_jenjang`) VALUES
(2, 'matematika', 1),
(8, 'ASJ', 3),
(9, 'TLJ', 3),
(10, 'MATEMATIKA', 2),
(11, 'MATEMATIKA', 3),
(12, 'ASJ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `file_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_check`
--

CREATE TABLE `materi_check` (
  `id` int(11) NOT NULL,
  `materi` varchar(256) NOT NULL,
  `pengajar` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_check`
--

INSERT INTO `materi_check` (`id`, `materi`, `pengajar`, `email`, `date`, `time`, `status`) VALUES
(6, 'Cara membuat server mail', 'firmansyahrizkan099@gmail.com', 'firmansyahrizkan099@gmail.com', '2020-07-14 15:24:26', 1594733066, 0),
(7, 'Cara konfigurasi DHCP Server', 'firmansyahrizkan099@gmail.com', 'firmansyahrizkan099@gmail.com', '2020-07-14 15:25:34', 1594733134, 1),
(8, 'Cara membuat server mail', 'firmansyahrizkan099@gmail.com', 'riezkanaprianda@gmail.com', '2020-07-23 10:36:00', 1595493360, 0),
(9, 'Cara konfigurasi DHCP Server', 'firmansyahrizkan099@gmail.com', 'riezkanaprianda@gmail.com', '2020-07-23 10:36:01', 1595493361, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_siswa`
--

CREATE TABLE `materi_siswa` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `selesai` int(11) NOT NULL,
  `tgl_pengumpulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_siswa`
--

INSERT INTO `materi_siswa` (`id`, `id_materi`, `id_siswa`, `selesai`, `tgl_pengumpulan`) VALUES
(1, 11, 11717444, 1, '02-08-2020'),
(2, 11, 11717001, 2, '02-08-2020'),
(6, 12, 11717003, 1, '24-08-2020'),
(7, 11, 11717003, 1, '24-08-2020'),
(8, 5, 11717500, 2, '24-08-2020'),
(9, 6, 11717003, 1, '24-08-2020'),
(10, 6, 11717500, 2, '24-08-2020'),
(11, 12, 11717500, 2, '25-08-2020'),
(12, 13, 11717500, 2, '29-08-2020'),
(13, 11, 11717399, 2, '14-09-2020'),
(14, 14, 11717399, 2, '14-09-2020'),
(15, 16, 11717399, 2, '14-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk_barang`
--

CREATE TABLE `merk_barang` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merk_barang`
--

INSERT INTO `merk_barang` (`id_merk`, `nama_merk`, `status`, `date`) VALUES
(1, 'Yamaha', 1, '2020-09-08 15:26:17'),
(2, 'TP-LINK', 1, '2020-09-09 11:47:00'),
(3, 'D-LINK', 1, '2020-09-09 11:47:09'),
(4, 'CISCO', 1, '2020-09-09 11:47:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tugas`
--

CREATE TABLE `nilai_tugas` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` char(255) NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_tugas`
--

INSERT INTO `nilai_tugas` (`id`, `id_tugas`, `id_siswa`, `nilai`, `status`, `lokasi_file`, `nama_file`, `tanggal`) VALUES
(2, 6, 11717003, 80, '1', 'assets/data/siswa/tugas/', 'tugas.txt', '25-08-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_nota` varchar(25) NOT NULL,
  `jenis_pembelian` char(25) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` char(45) NOT NULL,
  `pajak` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_nota`, `jenis_pembelian`, `id_barang`, `jumlah_barang`, `total_harga`, `pajak`, `diskon`, `status`, `tanggal`) VALUES
(2, 'SPI-09092020-1', 'pembelian', 4, 3, '375000', 0, 0, 1, '2020-09-09 22:27:07'),
(3, 'SPI-10092020-1', 'pembelian', 4, 2, '250000', 0, 0, 1, '2020-09-10 21:39:40'),
(4, 'SPI-11092020-1', 'pembelian', 2, 22, '330000', 0, 0, 1, '2020-09-11 00:38:20'),
(5, 'SPI-12092020-1', 'pembelian', 11, 5, '625000', 0, 0, 1, '2020-09-12 23:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` char(5) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_barang`, `jumlah_barang`, `keterangan`, `date`) VALUES
(1, 4, '3', 'adwadwadwad', '0000-00-00 00:00:00'),
(2, 2, '1', 'rusak', '2020-09-11 00:37:30'),
(3, 4, '1', 'Rusak', '2020-09-11 00:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `payload` int(11) NOT NULL,
  `kategori_gedung` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `nama_ruangan`, `payload`, `kategori_gedung`) VALUES
(1, 'RB.1.2', 36, 'Gedung B'),
(2, 'RC 1.3', 35, 'Gedung C'),
(3, 'RB.1.4', 36, 'Gedung B'),
(4, 'RC 1.5', 35, 'Gedung C'),
(6, 'RB 1.1', 40, 'Gedung B'),
(7, 'RC 2.4', 40, 'Ruang Lab'),
(9, 'RG 2.1', 40, 'Ruang Lab'),
(10, 'RG 2.2', 40, 'Ruang Lab'),
(11, 'RD 2.4', 40, 'KELAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setup_spp`
--

CREATE TABLE `setup_spp` (
  `id` int(11) NOT NULL,
  `tipe` char(12) NOT NULL,
  `nominal` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setup_spp`
--

INSERT INTO `setup_spp` (`id`, `tipe`, `nominal`) VALUES
(1, 'spp', '400000'),
(2, 'dpp', '5500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` char(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelas_id` char(25) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan_id` char(4) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `lulusan` year(4) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `telepon` char(25) DEFAULT NULL,
  `status` char(25) DEFAULT NULL,
  `nisn` int(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `agama` char(128) DEFAULT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas_id`, `jurusan`, `angkatan_id`, `tahun_ajaran`, `lulusan`, `email`, `gambar`, `telepon`, `status`, `nisn`, `tempat_lahir`, `ttl`, `agama`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `alamat`, `updated`, `date_created`) VALUES
(1262, '11717399', 'SISWA 1', '1', '169', '4', '2019/2020', NULL, 'user@gmail.com', NULL, '0834781212', 'pelajar', 11717498, 'bandung', '2020-09-09', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:39', '2020-09-13'),
(1263, '11717301', 'SISWA 2', '16', '170\r\n', '4', '2019/2020', NULL, 'user@gmail.com', NULL, '0834781213', 'pelajar', 11717499, 'bandung', '2020-09-10', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:39', '2020-09-13'),
(1264, '11717302', 'SISWA 3', '13', '169', '4', '2019/2021', NULL, 'user@gmail.com', NULL, '0834781214', 'pelajar', 11717500, 'bandung', '2020-09-11', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:39', '2020-09-13'),
(1265, '11717303', 'SISWA 4', '1', '169', '4', '2019/2022', NULL, 'user@gmail.com', NULL, '0834781215', 'pelajar', 11717501, 'bandung', '2020-09-12', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:39', '2020-09-13'),
(1266, '11717304', 'SISWA 5', '1', '169', '4', '2019/2023', NULL, 'user@gmail.com', NULL, '0834781216', 'pelajar', 11717502, 'bandung', '2020-09-13', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:40', '2020-09-13'),
(1267, '11717305', 'SISWA 6', '1', '169', '4', '2019/2024', NULL, 'user@gmail.com', NULL, '0834781217', 'pelajar', 11717503, 'bandung', '2020-09-14', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:40', '2020-09-13'),
(1268, '11717306', 'SISWA 7', '1', '169', '4', '2019/2025', NULL, 'user@gmail.com', NULL, '0834781218', 'pelajar', 11717504, 'bandung', '2020-09-15', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:40', '2020-09-13'),
(1269, '11717307', 'SISWA 8', '1', '169', '4', '2019/2026', NULL, 'user@gmail.com', NULL, '0834781219', 'pelajar', 11717505, 'bandung', '2020-09-16', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:40', '2020-09-13'),
(1270, '11717308', 'SISWA 9', '1', '169', '4', '2019/2027', NULL, 'user@gmail.com', NULL, '0834781220', 'pelajar', 11717506, 'bandung', '2020-09-17', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:40', '2020-09-13'),
(1271, '11717309', 'SISWA 10', '1', '169', '4', '2019/2028', NULL, 'user@gmail.com', NULL, '0834781221', 'alumni', 11717507, 'bandung', '2020-09-18', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:40', '2020-09-13'),
(1272, '11717310', 'SISWA 11', '1', '169', '4', '2019/2029', NULL, 'user@gmail.com', NULL, '0834781222', 'alumni', 11717508, 'bandung', '2020-09-19', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:40', '2020-09-13'),
(1273, '11717311', 'SISWA 12', '1', '169', '4', '2019/2030', NULL, 'user@gmail.com', NULL, '0834781223', 'alumni', 11717509, 'bandung', '2020-09-20', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:41', '2020-09-13'),
(1274, '11717312', 'SISWA 13', '1', '169', '4', '2019/2031', NULL, 'user@gmail.com', NULL, '0834781224', 'alumni', 11717510, 'bandung', '2020-09-21', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:41', '2020-09-13'),
(1275, '11717313', 'SISWA 14', '1', '169', '4', '2019/2032', NULL, 'user@gmail.com', NULL, '0834781225', 'alumni', 11717511, 'bandung', '2020-09-22', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal b', '2020-09-13 06:33:41', '2020-09-13'),
(1276, '11717314', 'SISWA 15', '1', '169', '4', '2019/2033', NULL, 'user@gmail.com', NULL, '0834781226', 'alumni', 11717512, 'bandung', '2020-09-23', 'islam', 'SMK Samudra', 'ayah', 'ibu', 'jl. Asal a', '2020-09-13 06:33:41', '2020-09-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nama_soal` text NOT NULL,
  `bobot_nilai` char(10) NOT NULL,
  `tipe_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff_jabatan`
--

CREATE TABLE `staff_jabatan` (
  `staff_jabatan_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kepala_jabatan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff_jabatan`
--

INSERT INTO `staff_jabatan` (`staff_jabatan_id`, `jabatan_id`, `guru_id`, `kepala_jabatan`) VALUES
(65, 1, 431, 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_webcode_backend`
--

CREATE TABLE `tb_data_webcode_backend` (
  `id_id` int(11) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `nama_komponen` varchar(128) NOT NULL,
  `jumlah_baris` int(11) NOT NULL,
  `jumlah_code` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(128) NOT NULL,
  `modifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_webcode_backend`
--

INSERT INTO `tb_data_webcode_backend` (`id_id`, `id_komponen`, `nama_komponen`, `jumlah_baris`, `jumlah_code`, `time`, `date`, `modifier`) VALUES
(1, 3, 'Admin', 12, 210, 1595561872, '2020-05-28 23:39:34', 0),
(2, 3, 'Akses', 79, 2696, 1593623949, '2020-05-28 23:47:43', 1),
(3, 3, 'Artikel', 147, 6709, 1590685923, '2020-05-29 00:12:03', 1),
(4, 3, 'Back', 47, 1329, 1590686581, '2020-05-29 00:23:01', 1),
(5, 3, 'Blog', 93, 3654, 1590686616, '2020-05-29 00:23:36', 1),
(6, 3, 'Data', 191, 8711, 1590686659, '2020-05-29 00:24:19', 1),
(7, 3, 'Edit', 288, 12701, 1590686688, '2020-05-29 00:24:48', 1),
(8, 3, 'Exam', 198, 6594, 1590686759, '2020-05-29 00:25:59', 1),
(9, 3, 'Hapus', 119, 5002, 1590686788, '2020-05-29 00:26:28', 1),
(10, 3, 'Input', 225, 10545, 1590686817, '2020-05-29 00:26:57', 1),
(11, 3, 'Kas', 78, 2860, 1590686861, '2020-05-29 00:27:41', 1),
(12, 3, 'Materi', 49, 1830, 1590686888, '2020-05-29 00:28:08', 1),
(13, 3, 'Member', 194, 10589, 1590686919, '2020-05-29 00:28:39', 1),
(14, 3, 'Menu', 168, 7248, 1590686943, '2020-05-29 00:29:03', 1),
(15, 3, 'Postingan', 67, 2290, 1590686969, '2020-05-29 00:29:29', 1),
(16, 3, 'Root', 336, 14662, 1590686989, '2020-05-29 00:29:49', 1),
(17, 3, 'Soal', 104, 4556, 1590687015, '2020-05-29 00:30:15', 1),
(18, 3, 'Update', 43, 1655, 1590687036, '2020-05-29 00:30:36', 1),
(19, 3, 'Upload', 92, 2984, 1590687078, '2020-05-29 00:31:18', 1),
(20, 3, 'User', 143, 6347, 1590687095, '2020-05-29 00:31:35', 1),
(21, 1, 'Access', 29, 853, 1595825953, '2020-05-29 14:04:45', 1),
(22, 1, 'Artikel', 39, 993, 1590735973, '2020-05-29 14:06:13', 1),
(23, 1, 'Backend', 34, 1120, 1590735997, '2020-05-29 14:06:37', 1),
(24, 1, 'Data', 322, 9872, 1590736020, '2020-05-29 14:07:00', 1),
(25, 1, 'Delete', 20, 588, 1590736095, '2020-05-29 14:08:15', 1),
(26, 1, 'Exam', 14, 2724, 1590736122, '2020-05-29 14:08:42', 1),
(27, 1, 'Insert', 19, 628, 1590736144, '2020-05-29 14:09:04', 1),
(28, 1, 'Kas', 40, 1027, 1590736183, '2020-05-29 14:09:43', 1),
(29, 1, 'Member', 41, 998, 1590736208, '2020-05-29 14:10:08', 1),
(30, 1, 'Memori', 37, 2116, 1590736229, '2020-05-29 14:10:29', 1),
(31, 1, 'Menu', 15, 411, 1590736254, '2020-05-29 14:10:54', 1),
(32, 1, 'Pagination', 32, 1206, 1590736279, '2020-05-29 14:11:19', 1),
(33, 1, 'Session', 162, 5778, 1590736302, '2020-05-29 14:11:42', 1),
(34, 1, 'Update', 22, 709, 1590736315, '2020-05-29 14:11:55', 1),
(35, 1, 'User', 73, 1700, 1590736335, '2020-05-29 14:12:15', 1),
(36, 1, 'Edit', 9, 127, 1590736571, '2020-05-29 14:16:11', 1),
(37, 2, 'akses/nilai.php', 49, 2220, 1590765518, '2020-05-29 22:18:38', 1),
(38, 2, 'code/backend.php', 137, 8107, 1590765574, '2020-05-29 22:19:34', 1),
(39, 2, 'data/absen.php', 92, 4301, 1590765688, '2020-05-29 22:21:28', 1),
(40, 2, 'data/user.php', 147, 8047, 1590765735, '2020-05-29 22:22:15', 1),
(41, 2, 'data/kas/index.php', 500, 23561, 1590765764, '2020-05-29 22:22:44', 1),
(42, 2, 'data/kas/pemasukan.php', 74, 2738, 1590765867, '2020-05-29 22:24:27', 1),
(43, 2, 'edit/list.php', 97, 3973, 1590765963, '2020-05-29 22:26:03', 1),
(44, 2, 'edit/materi.php', 86, 3330, 1590766018, '2020-05-29 22:26:58', 1),
(45, 2, 'edit/member.php', 94, 3800, 1590766060, '2020-05-29 22:27:40', 1),
(46, 2, 'edit/tugas.php', 82, 3190, 1590766140, '2020-05-29 22:29:00', 1),
(47, 2, 'edit/user.php', 93, 3801, 1590766178, '2020-05-29 22:29:38', 1),
(48, 2, 'exam/check.php', 124, 5944, 1590766553, '2020-05-29 22:35:53', 1),
(49, 2, 'exam/hasil.php', 85, 4861, 1590766591, '2020-05-29 22:36:31', 1),
(50, 2, 'exam/index.php', 84, 3585, 1590766640, '2020-05-29 22:37:20', 1),
(51, 2, 'exam/templates/footer.php', 28, 1379, 1590766812, '2020-05-29 22:40:12', 1),
(52, 2, 'exam/templates/header.php', 16, 801, 1590766840, '2020-05-29 22:40:40', 1),
(53, 2, 'member/artikel/aside.php', 119, 4889, 1590767032, '2020-05-29 22:43:52', 1),
(54, 2, 'member/artikel/aside_artikel.php', 81, 3634, 1590767087, '2020-05-29 22:44:47', 1),
(55, 2, 'member/artikel/main.php', 35, 1418, 1590767189, '2020-05-29 22:46:29', 1),
(56, 2, 'member/artikel/main_artikel.php', 68, 2788, 1590767259, '2020-05-29 22:47:39', 1),
(57, 2, 'member/artikel/templates/footer.php', 78, 3960, 1590767297, '2020-05-29 22:48:17', 1),
(58, 2, 'member/artikel/templates/header.php', 98, 5965, 1590767395, '2020-05-29 22:49:55', 1),
(59, 2, 'member/home/dashboard.php', 690, 34658, 1590767508, '2020-05-29 22:51:48', 1),
(60, 2, 'member/home/index.php', 256, 15291, 1590767555, '2020-05-29 22:52:35', 1),
(61, 2, 'member/home/list.php', 392, 17807, 1590767596, '2020-05-29 22:53:16', 1),
(62, 2, 'member/home/profile.php', 530, 30787, 1590767642, '2020-05-29 22:54:02', 1),
(63, 2, 'member/materi/index.php', 53, 2873, 1590768135, '2020-05-29 23:02:15', 1),
(64, 2, 'member/templates/footer.php', 143, 7721, 1590768471, '2020-05-29 23:07:51', 1),
(65, 2, 'member/templates/header.php', 96, 5830, 1590768509, '2020-05-29 23:08:29', 1),
(66, 2, 'menu/index.php', 109, 5908, 1590768807, '2020-05-29 23:13:27', 1),
(67, 2, 'menu/submenu.php', 139, 7973, 1590768827, '2020-05-29 23:13:47', 1),
(68, 2, 'menu/editmenu.php', 31, 1038, 1590768857, '2020-05-29 23:14:17', 1),
(69, 2, 'menu/editsubmenu.php', 57, 2615, 1590768880, '2020-05-29 23:14:40', 1),
(70, 2, 'root/data/index.php', 590, 36261, 1590769602, '2020-05-29 23:26:42', 1),
(71, 2, 'root/data/footer.php', 113, 4194, 1590769680, '2020-05-29 23:28:00', 1),
(72, 2, 'root/data/end.php', 3, 16, 1590769709, '2020-05-29 23:28:29', 1),
(73, 2, 'root/data/chart/absen.php', 103, 4160, 1590778154, '2020-05-30 01:49:14', 1),
(74, 2, 'root/data/chart/artikel.php', 104, 4177, 1590778184, '2020-05-30 01:49:44', 1),
(75, 2, 'root/data/chart/jurusan.php', 43, 1457, 1590778222, '2020-05-30 01:50:22', 1),
(76, 2, 'root/data/chart/kas.php', 103, 4160, 1590778256, '2020-05-30 01:50:56', 1),
(77, 2, 'root/data/chart/kas_total.php', 84, 3246, 1590778292, '2020-05-30 01:51:32', 1),
(78, 2, 'root/data/chart/keterangan_absen.php', 92, 3537, 1590778341, '2020-05-30 01:52:21', 1),
(79, 2, 'root/data/chart/postingan.php', 104, 4184, 1590778370, '2020-05-30 01:52:50', 1),
(80, 2, 'root/data/chart/tag.php', 44, 1446, 1590778399, '2020-05-30 01:53:19', 1),
(81, 2, 'root/databaseuser.php', 132, 6221, 1590778518, '2020-05-30 01:55:18', 1),
(82, 2, 'root/datauser.php', 85, 4116, 1590778561, '2020-05-30 01:56:01', 1),
(83, 2, 'root/editrole.php', 36, 1145, 1590778591, '2020-05-30 01:56:31', 1),
(84, 2, 'root/index.php', 12, 319, 1590778622, '2020-05-30 01:57:02', 1),
(85, 2, 'root/member.php', 97, 5411, 1590778696, '2020-05-30 01:58:16', 1),
(86, 2, 'root/role.php', 108, 5947, 1590778721, '2020-05-30 01:58:41', 1),
(87, 2, 'root/roleaccess.php', 61, 3069, 1590778749, '2020-05-30 01:59:09', 1),
(88, 2, 'templates/auth_footer', 14, 475, 1590778841, '2020-05-30 02:00:41', 1),
(89, 2, 'templates/auth_header', 23, 784, 1590778878, '2020-05-30 02:01:18', 1),
(90, 2, 'templates/footer', 157, 5402, 1590778911, '2020-05-30 02:01:51', 1),
(91, 2, 'templates/header', 29, 1140, 1590779004, '2020-05-30 02:03:24', 1),
(92, 2, 'templates/sidebar', 84, 2640, 1590779082, '2020-05-30 02:04:42', 1),
(93, 2, 'templates/topbar', 111, 6418, 1590779117, '2020-05-30 02:05:17', 1),
(94, 4, 'Edit', 104, 210, 1590857324, '2020-05-30 23:48:44', 1),
(95, 3, 'Profile', 63, 2031, 1595825939, '2020-07-27 06:58:43', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_developer`
--

CREATE TABLE `tb_developer` (
  `id` int(11) NOT NULL,
  `setting` varchar(128) NOT NULL,
  `rule` int(1) NOT NULL,
  `parameter` varchar(128) NOT NULL,
  `setmore` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_developer`
--

INSERT INTO `tb_developer` (`id`, `setting`, `rule`, `parameter`, `setmore`) VALUES
(1, 'input', 1, 'materi', 'maintanance'),
(2, 'all', 1, 'all', 'maintanance'),
(3, 'tema', 1, 'dark', 'ui website'),
(4, 'topbar', 1, 'white', 'ui website'),
(5, 'input', 0, 'all', 'maintanance'),
(6, 'admin', 0, 'all', 'maintanance'),
(7, 'akses', 0, 'all', 'maintanance'),
(8, 'artikel', 0, 'all', 'maintanance'),
(9, 'back', 0, 'all', 'maintanance'),
(10, 'blog', 0, 'all', 'maintanance'),
(11, 'data', 0, 'all', 'maintanance'),
(12, 'exam', 0, 'all', 'maintanance'),
(14, 'hapus', 0, 'all', 'maintanance'),
(15, 'kas', 0, 'all', 'maintanance'),
(18, 'materi', 0, 'all', 'maintanance'),
(19, 'member', 0, 'all', 'maintanance'),
(20, 'menu', 0, 'all', 'maintanance'),
(21, 'postingan', 0, 'all', 'maintanance'),
(23, 'soal', 0, 'all', 'maintanance'),
(24, 'update', 0, 'all', 'maintanance'),
(25, 'upload', 0, 'all', 'maintanance'),
(26, 'user', 0, 'all', 'maintanance'),
(27, 'postingan', 1, 'gallery', 'maintanance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id` int(11) NOT NULL,
  `kas` int(11) NOT NULL,
  `tanggal` varchar(16) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kas`
--

INSERT INTO `tb_kas` (`id`, `kas`, `tanggal`, `waktu`, `jenis`) VALUES
(1, 5000, '2020-07-01', 1592785687, 1),
(2, 5000, '2020-05-19', 1592986687, 1),
(3, 5000, '2020-05-20', 1593490687, 1),
(4, 2000, '2020-07-05 05:58', 1593903523, 1),
(5, 5000, '2020-07-11 11:47', 1594460852, 1),
(6, 5000, '2020-07-21 07:09', 1595308196, 1),
(7, 5000, '2020-07-24 05:39', 1595561958, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komponen`
--

CREATE TABLE `tb_komponen` (
  `id` int(11) NOT NULL,
  `komponen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komponen`
--

INSERT INTO `tb_komponen` (`id`, `komponen`) VALUES
(1, 'model'),
(2, 'view'),
(3, 'controller'),
(4, 'helper');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_barang`
--

CREATE TABLE `tipe_barang` (
  `idTipe` int(11) NOT NULL,
  `namaTipe` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_ujian`
--

CREATE TABLE `tipe_ujian` (
  `id_tipe_ujian` int(11) NOT NULL,
  `tipe_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_ujian`
--

INSERT INTO `tipe_ujian` (`id_tipe_ujian`, `tipe_ujian`) VALUES
(1, 'UTS'),
(2, 'UAS'),
(3, 'harian'),
(4, 'keahlian\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `ujian_id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `tipe_soal` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_barang`
--

CREATE TABLE `unit_barang` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_barang`
--

INSERT INTO `unit_barang` (`id_unit`, `nama_unit`, `status`, `date`) VALUES
(2, 'lusin', 1, '2020-09-08 15:25:45'),
(3, 'PCS', 1, '2020-09-09 11:47:45'),
(4, 'ROLL', 1, '2020-09-09 11:47:53'),
(5, 'DUS', 1, '2020-09-09 11:48:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `status`, `role_id`, `date_created`, `last_update`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$9pknpmEqaCCxGXrbxdfxxeBsE8rgDcDwETgWGdxGb0SxTXvGlg1wW', 1, 1, '2020-08-12', '2020-08-12 14:16:08'),
(616, '11717500', 'legiyanto@gmail.com', '$2y$10$.HxEAlX0UlAwQlrTiH6aweHUKU0e70bn13zV.ICMts5Gskl4f82ka', 1, 3, '2020-08-24', '2020-08-24 02:07:01'),
(617, '11717501', 'user1@email.com', '$2y$10$ZAp/WVrKA3tHakAl4FJjtui8Q7T9AnwrXkbePVbcqtGAaHTtwwqkG', 1, 3, '2020-08-24', '2020-08-24 02:07:01'),
(618, '11717502', 'user2@email.com', '$2y$10$IlY6O/.i2DmBKbF32yE88eWjJm4DxYCmfASWkd1EnPjMGN/uL9TtK', 1, 3, '2020-08-24', '2020-08-24 02:07:01'),
(619, '11717503', 'user3@email.com', '$2y$10$C5/PNcV9qPUCZjj9pM/SzOHjdyNUYuGgKCy9C1msgzA2c2olwgV.u', 1, 3, '2020-08-24', '2020-08-24 02:07:02'),
(620, '11717504', 'user4@emai.com', '$2y$10$g90uCjYVW9m9DlBEsuufUuP46dZuBdw/uZFndCzQR3mpFQ5EztVPe', 1, 3, '2020-08-24', '2020-08-24 02:07:02'),
(621, '11717505', 'user5@email.com', '$2y$10$Tjsux7NdpoukxLhtLoes4eyqBfZt5p8Fl49KuFYo88pn1sV3IVQZq', 1, 3, '2020-08-24', '2020-08-24 02:07:02'),
(622, '11717506', 'user6@email.com', '$2y$10$dLz.w2HMTb9pzm3GpQl5C.TOlNoQtMy9xhSuIL0QI7lanA0z6bski', 1, 3, '2020-08-24', '2020-08-24 02:07:02'),
(1066, '11717399', 'user@gmail.com', '$2y$10$GvzcbyAccT/yQFJ23.gTeuyFpOlkykrwoSg.ehHHR9Uso.zK//VF6', 1, 4, '2020-09-13', '2020-09-13 06:33:39'),
(1067, '11717301', 'user@gmail.com', '$2y$10$8vyuBfZe5h7xJwQM8HbzSOCQxt7jwKE8BPDfDzW2Yn3o8n9NvD6Pa', 1, 4, '2020-09-13', '2020-09-13 06:33:39'),
(1068, '11717302', 'user@gmail.com', '$2y$10$jpfmVC6NmaLomJg0YH60.etO91pGc/d9j1A1Fk7nf1JsZkFDQ38Ju', 1, 4, '2020-09-13', '2020-09-13 06:33:39'),
(1069, '11717303', 'user@gmail.com', '$2y$10$FEu5WMC5qQumR.F4.zh/yOJbg4x4cPfqA8/TeKrQnis9MYfQh9/SO', 1, 4, '2020-09-13', '2020-09-13 06:33:39'),
(1070, '11717304', 'user@gmail.com', '$2y$10$IE0ZHboM1xc887Oy3/zwGefv9jjCaJs/Tmg8WLvtGybFQWyLjaSD.', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1071, '11717305', 'user@gmail.com', '$2y$10$jRZd3etXgpnTU8oH4ay1I.3iKrqKQABlhPoCNJnhG2bwMLRWjCD4e', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1072, '11717306', 'user@gmail.com', '$2y$10$3/X.4hSiu5t75.Ko45uVde2viBQ.9MqT8WPfhyYOeXp1hrhW7rA0y', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1073, '11717307', 'user@gmail.com', '$2y$10$00hmcKlWP2qcWE3e.cYDXuP3jCfpRNuZ3guy9VL1GEGWyxFd6see2', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1074, '11717308', 'user@gmail.com', '$2y$10$4LJzsxx8XTT4HEce6N9UQ.yEKhF7kL.iDzg8SE8iZ0SCOWS.EU93S', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1075, '11717309', 'user@gmail.com', '$2y$10$CyIC7/VL99eHZf9TVASq4e17PBMyDrEXFbPYHHoEYXItUygvkenYa', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1076, '11717310', 'user@gmail.com', '$2y$10$SOeuYnt3BwNAWZo5jJumNOVM9.vUWSbjRmGcMZ/FoCMtY.wTAtaEy', 1, 4, '2020-09-13', '2020-09-13 06:33:40'),
(1077, '11717311', 'user@gmail.com', '$2y$10$D29mFi7avcg6RC5xPaQrj.e0lQTy0KZdr4D3gRJC.14hTU8rMuFf6', 1, 4, '2020-09-13', '2020-09-13 06:33:41'),
(1078, '11717312', 'user@gmail.com', '$2y$10$Acbk/qNY4ZKkUxuX2phF3.I3PKvB74daYB9TIhw/pXm6NNRhm8ShS', 1, 4, '2020-09-13', '2020-09-13 06:33:41'),
(1079, '11717313', 'user@gmail.com', '$2y$10$Rp31QM7CQX5t.GMv5TLCL.zFMfUxTPs/AuTrH4yiryj1F7yhITm6e', 1, 4, '2020-09-13', '2020-09-13 06:33:41'),
(1080, '11717314', 'user@gmail.com', '$2y$10$QS8EhN5GBVSWLaGRry9vt.B35KWvWHTgIYq/rsMKMqQ8/A56gokU.', 1, 4, '2020-09-13', '2020-09-13 06:33:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(7, 2, 5),
(9, 5, 3),
(10, 2, 4),
(12, 5, 4),
(15, 5, 5),
(28, 3, 11),
(30, 4, 12),
(31, 1, 8),
(33, 1, 5),
(35, 1, 3),
(36, 3, 13),
(37, 1, 6),
(38, 1, 14),
(39, 1, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Profile'),
(3, 'Menu'),
(4, 'Input'),
(5, 'Data'),
(6, 'Kurikulum'),
(7, 'User'),
(8, 'TU'),
(11, 'Guru'),
(12, 'Siswa'),
(13, 'CBT'),
(14, 'Inventaris'),
(15, 'Piket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'guru'),
(4, 'siswa'),
(5, 'kepsek'),
(6, 'user'),
(7, 'TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-table', 1),
(2, 7, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 7, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-plus', 1),
(6, 5, 'Data Siswa', 'data/siswa', 'fas fa-fw fa-users', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-cog', 1),
(8, 7, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'Database User', 'admin/databaseuser', 'fas fa-fw fa-users', 0),
(11, 4, 'Materi', 'input/materi', 'fas fa-fw fa-chalkboard-teacher', 1),
(12, 4, 'Tugas', 'input/tugas', 'fas fa-fw fa-clipboard-list', 1),
(13, 4, 'Nilai', 'input/nilai', 'fas fa-fw fa-pen-square', 1),
(14, 1, 'Search Data User', 'root/cari', 'fas fa-fw fa-search', 0),
(15, 5, 'Data Guru', 'data/guru', 'fas fa-fw fa-chalkboard-teacher', 1),
(18, 4, 'Soal', 'input/soal', 'fas fa-fw fa-laptop-code', 1),
(21, 6, 'Gallery', 'setup/gallery', 'fas fa-fw fa-images', 0),
(23, 4, 'Hasil Ujian', 'input/ujian', 'fas fa-fw fa-clipboard-check', 1),
(24, 1, 'Data Backend', 'admin/backend', 'fas fa-fw fa-code', 1),
(28, 2, 'Homepage', 'profile/homepage', 'fas fa-home fa-fw', 1),
(29, 5, 'Data Jurusan', 'data/jurusan', 'fas fa-fw fa-archway', 1),
(30, 5, 'Data Kelas', 'data/kelas', 'fas fa-fw fa-chalkboard', 1),
(31, 1, 'Data Staff', 'admin/staff', 'fas fa-fw fa-user-tie', 1),
(32, 5, 'Data Mapel', 'data/mapel', 'fas fa-fw fa-book', 1),
(33, 1, 'Data User', 'admin/user', 'fas fa-fw fa-user', 1),
(34, 5, 'Data Ruangan', 'data/ruangan', 'fas fa-fw fa-store', 1),
(35, 5, 'Data Alumni', 'data/alumni', 'fas fa-fw fa-user-graduate', 1),
(36, 6, 'Data Jadwal', 'kurikulum/jadwal', 'fas fa-fw fa-table', 1),
(37, 11, 'Dashboard', 'guru', 'fas fa-fw fa-chart-line', 1),
(38, 11, 'Data Siswa', 'guru/siswa', 'fas fa-fw fa-user', 1),
(39, 12, 'Dashboard', 'siswa', 'fas fa-fw fa-chart-line', 1),
(43, 12, 'SPP', 'siswa/spp', 'fas fa-fw fa-dollar-sign', 1),
(44, 12, 'DSP', 'siswa/dsp', 'fas fa-fw fa-file-invoice-dollar', 1),
(45, 8, 'DSP', 'tu/dsp', 'fas fa-fw fa-file-invoice-dollar', 1),
(46, 8, 'SPP', 'tu/spp', 'fas fa-fw fa-dollar-sign', 1),
(47, 13, 'Data Ujian', 'cbt/ujian', 'fas fa-fw fa-table', 1),
(48, 13, 'Bank Soal', 'cbt/soal', 'fas fa-fw fa-database', 1),
(49, 6, 'Jadwal Ujian', 'kurikulum/jadwalujian', 'fas fa-fw fa-network-wired', 1),
(50, 14, 'Daftar Barang', 'inventaris/daftar', 'fas fa-fw fa-tools', 1),
(51, 14, 'Transaksi Barang', 'inventaris/transaksi', 'fas fa-fw fa-clipboard-list', 1),
(52, 15, 'Absen Guru', 'piket/guru', 'fas fa-fw fa-table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'riezkanaprianda@gmail.com', 'uxy6VQqiix4G6EfY7PTNhBAlHP6bhJ+b90vDI2ztcAI=', 1586529304),
(2, 'rizkanitclub@gmail.com', 'THc/lzGhW4lze9ify2BgR6qchsfGV/JEjhXIzyuWCb4=', 1586690970),
(3, 'rizkan@email.mt.id', 'OrKeP8zOg8no28ka6nwNG1s7Q9nbQgLpg+nZwiMC85E=', 1586691048),
(4, 'hahahaha@hahaha.com', 'oefXl7yQ0Qw6S4w5g0CuKHRVFg/EQ01XDNHh4lp5DKY=', 1586691126),
(5, 'user@gmnail.com', '2I30KauHoOwydMZCZlMHVND8B4TnzhFv6rAv8eGAEa4=', 1586691297),
(6, 'member@my.id', 'CxFAsqlhsTPbdqNxjNFfhWtiHl7KVSap70fKy/wYKLg=', 1586691323),
(7, 'rizkanlivira@gmail.com', 'GzhH3Rf8yR+mdA2mcmE6W8OsEFGSskCehe9EXBGzvnA=', 1586772819),
(8, 'admin@admin.com', '1OcyUMPofrSpvrO4lkw8WEztjwv6zc/X/UO1hayK48o=', 1586778849),
(9, 'rererere@gmail.com', 'EPneqmr5qwsAXmgVSk+8g4gblIzHVDq0yU714NWsHQ8=', 1587050919),
(10, 'hahahaha@gmail.com', 'Xjq2X6CuLL3+K0/vOB97ndwsjwEzfGFGVeeY+KrVIMU=', 1587050991),
(11, 'sampaikapan@gmail.com', 'Tk9xFggGVqTvqrPPC1imDrptlWoB7TYqRbIR/AFu8bQ=', 1587051376),
(12, 'hehehe@gmail.com', 'Peh4T+MxcjLxls0AVoaLl6Rjor5QWEnhlk/kEl9bk+E=', 1587051427),
(13, 'rizkanfirmansyah9@gmail.com', 'VjY3visZSMCBtEzKUpDE6zoeLrxx3S2jJymoW7A0hog=', 1587052082),
(14, 'firmansyahrizkan099@gmail.com', 'sQJp/unuDOq5ZfQyvPUTGyErEcX/95wTFdN8lnrn6bI=', 1587150900);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`angkatan_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cbt_ujian`
--
ALTER TABLE `cbt_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_blog`
--
ALTER TABLE `data_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_dpp`
--
ALTER TABLE `data_dpp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_file`
--
ALTER TABLE `data_file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_homepage`
--
ALTER TABLE `data_homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jawaban`
--
ALTER TABLE `data_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jenjang`
--
ALTER TABLE `data_jenjang`
  ADD PRIMARY KEY (`jenjang_id`);

--
-- Indeks untuk tabel `data_kas`
--
ALTER TABLE `data_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_komentar`
--
ALTER TABLE `data_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_materi`
--
ALTER TABLE `data_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_nilai_ujian`
--
ALTER TABLE `data_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_postingan`
--
ALTER TABLE `data_postingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_soal`
--
ALTER TABLE `data_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_spp`
--
ALTER TABLE `data_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_status`
--
ALTER TABLE `data_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tag`
--
ALTER TABLE `data_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`keuangan_id`);

--
-- Indeks untuk tabel `keuangan_detail`
--
ALTER TABLE `keuangan_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `materi_check`
--
ALTER TABLE `materi_check`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi_siswa`
--
ALTER TABLE `materi_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merk_barang`
--
ALTER TABLE `merk_barang`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indeks untuk tabel `setup_spp`
--
ALTER TABLE `setup_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staff_jabatan`
--
ALTER TABLE `staff_jabatan`
  ADD PRIMARY KEY (`staff_jabatan_id`);

--
-- Indeks untuk tabel `tb_data_webcode_backend`
--
ALTER TABLE `tb_data_webcode_backend`
  ADD PRIMARY KEY (`id_id`);

--
-- Indeks untuk tabel `tb_developer`
--
ALTER TABLE `tb_developer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komponen`
--
ALTER TABLE `tb_komponen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_barang`
--
ALTER TABLE `tipe_barang`
  ADD PRIMARY KEY (`idTipe`);

--
-- Indeks untuk tabel `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  ADD PRIMARY KEY (`id_tipe_ujian`);

--
-- Indeks untuk tabel `unit_barang`
--
ALTER TABLE `unit_barang`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `angkatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `cbt_ujian`
--
ALTER TABLE `cbt_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `data_blog`
--
ALTER TABLE `data_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_dpp`
--
ALTER TABLE `data_dpp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_file`
--
ALTER TABLE `data_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `data_homepage`
--
ALTER TABLE `data_homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `data_jawaban`
--
ALTER TABLE `data_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `data_jenjang`
--
ALTER TABLE `data_jenjang`
  MODIFY `jenjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_kas`
--
ALTER TABLE `data_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `data_komentar`
--
ALTER TABLE `data_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_materi`
--
ALTER TABLE `data_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_nilai_ujian`
--
ALTER TABLE `data_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_postingan`
--
ALTER TABLE `data_postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_spp`
--
ALTER TABLE `data_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_status`
--
ALTER TABLE `data_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_tag`
--
ALTER TABLE `data_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2164;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `materi_check`
--
ALTER TABLE `materi_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `materi_siswa`
--
ALTER TABLE `materi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `merk_barang`
--
ALTER TABLE `merk_barang`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `setup_spp`
--
ALTER TABLE `setup_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1277;

--
-- AUTO_INCREMENT untuk tabel `staff_jabatan`
--
ALTER TABLE `staff_jabatan`
  MODIFY `staff_jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_data_webcode_backend`
--
ALTER TABLE `tb_data_webcode_backend`
  MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tb_developer`
--
ALTER TABLE `tb_developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_komponen`
--
ALTER TABLE `tb_komponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tipe_barang`
--
ALTER TABLE `tipe_barang`
  MODIFY `idTipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_ujian`
--
ALTER TABLE `tipe_ujian`
  MODIFY `id_tipe_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `unit_barang`
--
ALTER TABLE `unit_barang`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1081;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
