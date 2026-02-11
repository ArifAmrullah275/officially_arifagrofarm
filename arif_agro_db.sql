-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2026 pada 05.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arif_agro_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_mitra`
--

CREATE TABLE `about_mitra` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_mitra`
--

INSERT INTO `about_mitra` (`id`, `nama`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Kementerian Pertanian RI', '1767928250_159340e87ac9d185b3fa.png', '2026-01-09 10:10:50', '2026-01-09 10:10:50'),
(3, 'Universitas Arif Agro Nusantara', '1767928272_ed52929303608d3d0569.jpg', '2026-01-09 10:11:12', '2026-01-09 10:11:12'),
(4, 'PT. Astra Agro Lestari', '1767928290_fabd841567ad357e56c2.jpg', '2026-01-09 10:11:30', '2026-01-09 10:11:30'),
(5, 'Bank BJB', '1767928310_d6b7cd59091e564af0ab.png', '2026-01-09 10:11:50', '2026-01-09 10:11:50'),
(6, 'Bank BNI', '1767928322_8100ca9e9cce52b20095.png', '2026-01-09 10:12:02', '2026-01-09 10:12:02'),
(7, 'Bank BRI', '1767928332_4676903193427edbf9c5.jpg', '2026-01-09 10:12:12', '2026-01-09 10:12:12'),
(8, 'Badan Usaha Milik Negara (BUMN)', '1767928351_ed33531eb1f9b9d0a244.png', '2026-01-09 10:12:31', '2026-01-09 10:12:31'),
(9, 'PT. East West Seed Indonesia (ESWINDO)', '1767928394_8257ed9451175b0630b6.png', '2026-01-09 10:13:14', '2026-01-09 10:13:14'),
(10, 'ID FOOD', '1767928407_ef209f83f48193afd951.png', '2026-01-09 10:13:27', '2026-01-09 10:13:27'),
(11, 'Institut Pertanian Bogor', '1767928424_84b6cd39609d20f881ef.png', '2026-01-09 10:13:44', '2026-01-09 10:13:44'),
(12, 'Institut teknologi Bandung', '1767928442_b0c51cdf0e02e65cdb4f.png', '2026-01-09 10:14:02', '2026-01-09 10:14:02'),
(13, 'Pemerintah Provinsi Jawa Barat', '1767928464_9d78452f201bb4ae3795.png', '2026-01-09 10:14:24', '2026-01-09 10:14:24'),
(14, 'Mitra tani Modern', '1767928498_b40968390d55a384ab01.jpeg', '2026-01-09 10:14:58', '2026-01-09 10:14:58'),
(15, 'PT. Pindad Indonesia', '1767928527_5ca72e1cd9482013d344.png', '2026-01-09 10:15:27', '2026-01-09 10:15:27'),
(16, 'Politeknik Pembangunan Pertanian Bogor', '1767928597_26aa530a82bba1119a1d.png', '2026-01-09 10:16:37', '2026-01-09 10:16:37'),
(17, 'PT. Perkebunan Nusantara (PTPN)', '1767928623_42cb6aef2d67cbefb1f8.png', '2026-01-09 10:17:03', '2026-01-09 10:17:03'),
(18, 'PT. Pupuk Indonesia', '1767928646_fe690ad1b9105475593e.png', '2026-01-09 10:17:26', '2026-01-09 10:17:26'),
(19, 'PT. Pupuk Kujang Cikampek', '1767928666_6f9a506f0e430635cae5.png', '2026-01-09 10:17:46', '2026-01-09 10:17:46'),
(20, 'PT. Sang Hyang Seri', '1767928690_392a8e001ef9ae2194e8.png', '2026-01-09 10:18:10', '2026-01-09 10:18:10'),
(22, 'Pemerintah Kabupaten Subang', '1767928750_62f19fe9a73ab351beee.png', '2026-01-09 10:19:10', '2026-01-09 10:19:10'),
(23, 'Tentara Nasional Republik Indonesia', '1767928775_30961a35cf55d48a2697.png', '2026-01-09 10:19:35', '2026-01-09 10:19:35'),
(24, 'Universitas Subang', '1767928793_e97fcf8ae173100d5c42.png', '2026-01-09 10:19:53', '2026-01-09 10:19:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_profile`
--

CREATE TABLE `about_profile` (
  `id` int(11) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `tahun_berdiri` varchar(10) DEFAULT NULL,
  `jumlah_mitra` varchar(50) DEFAULT NULL,
  `luas_lahan` varchar(50) DEFAULT NULL,
  `persen_organik` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_profile`
--

INSERT INTO `about_profile` (`id`, `slogan`, `deskripsi`, `visi`, `misi`, `tahun_berdiri`, `jumlah_mitra`, `luas_lahan`, `persen_organik`, `updated_at`) VALUES
(1, 'Bergerak Mewujudkan Revolusi Industri Pertanian Modern', 'Arif Agro Farm adalah perusahaan yang bergerak di bidang pertanian dan peternakan terpadu, serta pengembangan teknologi pertanian modern yang berorientasi pada efisiensi, keberlanjutan, dan peningkatan produktivitas. Perusahaan ini berdiri sejak tahun 2021 sebagai respons terhadap tantangan sektor agribisnis yang membutuhkan inovasi berbasis teknologi dan manajemen modern.\r\n\r\nArif Agro Farm didirikan oleh Ir. Muhammad Arif Amrullah, S.Kom., M.P., M.Si, yang sekaligus menjabat sebagai Founder dan Chief Executive Officer (CEO). Dengan latar belakang keilmuan yang kuat di bidang teknologi, pertanian, dan manajemen sumber daya, perusahaan ini mengintegrasikan pendekatan ilmiah, digitalisasi, serta praktik pertanian berkelanjutan dalam setiap lini usahanya.\r\n\r\nDalam operasionalnya, Arif Agro Farm mengembangkan berbagai kegiatan usaha meliputi:\r\n1. Produksi pertanian (tanaman pangan, hortikultura, dan komoditas unggulan)\r\n2. Peternakan modern dengan sistem manajemen pakan, kesehatan ternak, dan produksi yang terukur\r\n3. Penerapan teknologi pertanian modern, seperti pertanian presisi, otomatisasi, sistem monitoring berbasis data, serta pemanfaatan teknologi informasi untuk mendukung pengambilan keputusan\r\n4. Pengembangan dan pendampingan agribisnis, termasuk edukasi dan kolaborasi dengan petani, peternak, dan mitra usaha\r\n\r\nArif Agro Farm berkomitmen untuk mendukung ketahanan pangan, meningkatkan kesejahteraan petani dan peternak, serta menciptakan sistem pertanian yang produktif, ramah lingkungan, dan berdaya saing tinggi. Perusahaan juga menjunjung tinggi nilai inovasi, profesionalisme, integritas, dan keberlanjutan sebagai landasan utama dalam menjalankan usaha.\r\n\r\nDengan visi menjadi perusahaan agribisnis terdepan berbasis teknologi modern di era revolusi industri, Arif Agro Farm terus berinovasi dan memperluas jaringan kerja sama strategis guna memberikan kontribusi nyata bagi pembangunan sektor pertanian dan peternakan di Indonesia.', 'Menjadi perusahaan agribisnis terdepan berbasis teknologi modern di era revolusi industri', '1. Mengembangkan sistem pertanian dan peternakan terpadu yang efisien, produktif, dan berkelanjutan dengan memanfaatkan teknologi modern.\r\n2. Menerapkan inovasi teknologi pertanian (smart farming) untuk meningkatkan kualitas, kuantitas, dan daya saing produk agribisnis.\r\n3. Meningkatkan kapasitas sumber daya manusia melalui edukasi, pelatihan, dan pendampingan berbasis ilmu pengetahuan dan teknologi.\r\n4. Membangun kemitraan strategis dengan petani, peternak, akademisi, pemerintah, dan sektor industri guna memperkuat ekosistem agribisnis modern.\r\n5. Menghasilkan produk pertanian dan peternakan yang berkualitas tinggi, aman, dan ramah lingkungan untuk mendukung ketahanan pangan nasional.\r\n5. Mengintegrasikan transformasi digital dan manajemen berbasis data dalam seluruh proses bisnis perusahaan.', '2021', '22', '100Ha', '100%', '2026-01-05 20:27:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_teams`
--

CREATE TABLE `about_teams` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  `linkedin` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_teams`
--

INSERT INTO `about_teams` (`id`, `nama`, `jabatan`, `foto`, `linkedin`, `email`, `instagram`, `created_at`, `updated_at`) VALUES
(8, 'Muhammad Arif Amrullah, S.Kom., M.P., M.Si., P.hd', 'Direktur Utama', '1767653408_482b29c9b520651a3aa4.jpeg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'muhammadarif28392@gmail.com', '@arif_amrullah275', '2026-01-05 22:50:08', '2026-01-06 15:14:53'),
(9, 'Arrafly Aziz Saputra,, S.Kom., M.Kom., M.Sc.', 'Direktur Keuangan & Umum', '1767711292_df3067684b95ff8e6a14.jpeg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'aziz@gmail.com', '@arrxfinly_a_s_', '2026-01-06 14:54:52', '2026-01-06 15:13:01'),
(10, 'Hildan Fauzirahman, S.H., M.Kom., M.P.', 'Direktur Operasi & Produksi', '1767711395_1145def55ed5fd6c22fd.jpeg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'hildan@gmail.com', '@zi_fuuzi', '2026-01-06 14:56:35', '2026-01-06 15:13:54'),
(11, 'Andre Wibowo, S.Kom., M.Kom.', 'Direktur Manajemen Risiko', '1767711451_93c8d89e9a746c966708.jpeg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'andre@gmail.com', '@andre._29', '2026-01-06 14:57:31', '2026-01-06 15:14:10'),
(12, 'Adam Faturachman, S.Kom., M.Kom., M.Si.', 'Komisiaris Utama', '1767712262_bedf9f758e5b9f54f2c7.jpg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'adam@gmail.com', '@adamftrrchmn_', '2026-01-06 15:11:02', '2026-01-06 15:14:24'),
(13, 'Ramdan Prayitno, S.Kom., M.I.Kom., M.M.', 'Komisiaris Independen', '1767713680_d448447fbbd5972a4961.jpg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'ramdan@gmail.com', '@ramdanprayitno', '2026-01-06 15:34:40', '2026-01-06 15:34:40'),
(14, 'Divi Agung Satria, S.Kom., M.Kom., M.Si., M.M.', 'Pemegang Saham', '1767713907_8503be6ab589819d809f.jpg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'divi@gmail.com', '@_dvsatria', '2026-01-06 15:38:27', '2026-01-06 15:38:27'),
(15, 'Ardi Ilahi Roby, S.Kom., M.E., M.,Sc', 'Pemegang Saham', '1767714506_4239da78125487eec734.jpg', 'www.linkedin.com/in/muhammad-arif-amrullah-88563933b', 'ardi@gmail.com', '@ardi_air', '2026-01-06 15:48:26', '2026-01-06 15:48:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `expired_at` date DEFAULT NULL,
  `link` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `announcements`
--

INSERT INTO `announcements` (`id`, `judul`, `tanggal`, `expired_at`, `link`) VALUES
(12, 'Panen Raya di Kawasan Lahan Desa Kosar', '2026-01-07', '2026-01-09', '#'),
(13, 'Kunjungan Menteri Pertanian Ke Kawasan Lahana Pertanian PT. Arif Agro Farm', '2026-01-08', '2026-01-15', '#');

-- --------------------------------------------------------

--
-- Struktur dari tabel `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `career_id` int(11) DEFAULT NULL,
  `nama_pelamar` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `file_cv` varchar(255) DEFAULT NULL,
  `status` enum('pending','review','interview','rejected') DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `applications`
--

INSERT INTO `applications` (`id`, `career_id`, `nama_pelamar`, `email`, `telepon`, `file_cv`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Adam Faturachman', 'adam@gmail.com', '0821221938795', '1767827093_395b9f29d4413a7a7375.pdf', 'review', '2026-01-08 06:04:53', '2026-01-08 06:12:38'),
(2, 6, 'Ardi Ilahi Roby', 'ardi@gmail.com', '088332579864', '1767827797_f1e649f05743def57241.pdf', 'rejected', '2026-01-08 06:16:37', '2026-01-08 09:42:48'),
(3, 6, 'Dede haidar', 'haidar@gmail.com', '083827914570', '1767827972_26051e836490127f874e.pdf', 'pending', '2026-01-08 06:19:32', '2026-01-08 06:19:32'),
(4, 6, 'Adam Faturachman', 'adam@gmail.com', '082126482319', '1767857765_4f2a7269eefc61b0f241.pdf', 'pending', '2026-01-08 14:36:05', '2026-01-08 14:36:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kualifikasi` text NOT NULL,
  `batas_lamaran` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `careers`
--

INSERT INTO `careers` (`id`, `posisi`, `tipe`, `lokasi`, `deskripsi`, `kualifikasi`, `batas_lamaran`, `created_at`, `updated_at`) VALUES
(3, 'Staff Admin', 'Full Time', 'Subang', 'Mengelola operasional kantor sehari-hari, termasuk mengurus dokumen, mengelola arsip fisik & digital, menangani komunikasi (telepon, email, surat), mengatur jadwal dan agenda, mengelola inventaris kantor (ATK, dll.), serta membantu koordinasi antar departemen dan persiapan laporan, memastikan semua tugas administratif berjalan lancar dan efisien.', 'Pendidikan Min. SMA | Pengalaman 5 Bulan | Domisili Subang', '2026-01-20', '2026-01-07 02:05:14', '2026-01-07 02:05:14'),
(6, 'Field Operator', 'Full Time', 'Subang', 'Bertanggung jawab terhadap operasional produksi', 'Pendidikan Min S1 Teknik Lingkungan', '2026-01-16', '2026-01-08 02:34:28', '2026-01-08 06:15:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('kegiatan','produk','teknologi') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Panen Raya Padi', 'kegiatan', '1767932578_5d014130cc5739c544da.jpg', '2026-01-09 11:22:58', '2026-01-09 11:22:58'),
(5, 'Kawasan Lahan Pertanian Padi Arif Agro Farm', 'teknologi', '1767932613_5f9547f18cd1cfaf61ce.jpeg', '2026-01-09 11:23:33', '2026-01-09 11:23:33'),
(6, 'Produk Padi Unggulan Inpari 32', 'produk', '1767932648_bfa77fae9e310f21fe56.jpg', '2026-01-09 11:24:08', '2026-01-09 11:24:08'),
(7, 'Lahan Utama PT. Arif Agro Farm', 'teknologi', '1767937546_be7c377332be5cbde824.jpeg', '2026-01-09 12:45:46', '2026-01-09 12:45:46'),
(8, 'Dirut Memimpin Organisasi Petani di Jawa Barat', 'kegiatan', '1767937639_18eb60c1aa092c415c26.jpeg', '2026-01-09 12:47:19', '2026-01-09 12:47:19'),
(9, 'Dirut Menjadi Pemateri dalam Kegiatan Workshop Pertanian', 'kegiatan', '1767937667_c26888fc4f8c3d3c44d8.jpeg', '2026-01-09 12:47:47', '2026-01-09 12:47:47'),
(10, 'Dirut Menjadi Pemateri dalam Kegiatan Pelatihan Petani Milenial', 'kegiatan', '1767937705_28abdece3f5680eb964b.jpeg', '2026-01-09 12:48:25', '2026-01-09 12:48:25'),
(11, 'Dirut Menjadi Pembicara dalam Seminar', 'kegiatan', '1767937727_9c8b875c9078ff2e250c.jpeg', '2026-01-09 12:48:47', '2026-01-09 12:48:47'),
(12, 'Pertemuan Dirut, Direksi Operasional, dan Komisiaris Utama', 'kegiatan', '1767937777_3599ffa0e7a4fdba3739.jpeg', '2026-01-09 12:49:37', '2026-01-09 12:49:37'),
(13, 'Hasil Panen Mentimun', 'produk', '1767937797_b1591cf0e09d01c3a721.jpeg', '2026-01-09 12:49:57', '2026-01-09 12:49:57'),
(14, 'Hasil Panen Padi', 'produk', '1767937814_a2cb22a69dac0620295b.jpeg', '2026-01-09 12:50:14', '2026-01-09 12:50:14'),
(15, 'Kolaborasi Dirut dan Musisi', 'kegiatan', '1767937842_d2aac2818f200308cf90.jpeg', '2026-01-09 12:50:42', '2026-01-09 12:50:42'),
(16, 'Kantor PT. Arif Agro Farm', 'teknologi', '1767937901_b7f81918fd18b12c3ed6.jpeg', '2026-01-09 12:51:41', '2026-01-09 12:51:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('unread','read','replied') DEFAULT 'unread',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `nama`, `email`, `subjek`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Ardi Ilahi Roby', 'ardi@gmail.com', '2', 'konsultasi pertanian', 'read', '2026-01-08 02:59:15', NULL),
(23, 'Adam Faturachman', 'adam@gmail.com', '1', 'Pesan bibit durian bawor', 'read', '2026-01-08 03:04:21', NULL),
(24, 'Dede haidar', 'haidar@gmail.com', '3', 'Ingin bekerja sama pertanian durian', 'read', '2026-01-08 03:11:58', NULL),
(25, 'aziz saputra', 'aziz@gmail.com', '2', 'Konsutasi bibit padi terbaik apa saja', 'read', '2026-01-08 03:15:25', NULL),
(26, 'hildan fauzirahman', 'hildan@gmail.com', '4', 'Ingin berkunjung ke pabrik', 'read', '2026-01-08 03:20:36', NULL),
(27, 'divi agung satria', 'divi@gmail.com', '4', 'Ingin mengajukan kerjasama untuk saham', 'read', '2026-01-08 06:21:41', NULL),
(28, 'Arif Amrullah', 'adam@gmail.com', '3', 'Ingin kerjasama suplai bibit durian', 'unread', '2026-01-08 09:36:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten_singkat` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(255) DEFAULT 'default_news.jpg',
  `link_baca` varchar(255) DEFAULT '#',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `judul`, `konten_singkat`, `kategori`, `tags`, `tanggal`, `foto`, `link_baca`, `created_at`, `updated_at`) VALUES
(3, 'Sukses Panen Raya Padi Organik di Lahan Kosar Cipeundeuy Subang', 'SUBANG, 6 Januari 2026 – Kabar gembira datang dari sektor agribisnis perusahaan. Hari ini, kami berhasil melaksanakan panen raya padi organik di lahan seluas 10 hektar yang berlokasi di Kabupaten Subang, Jawa Barat.\r\n\r\nProgram penanaman padi organik ini merupakan wujud komitmen perusahaan dalam mendukung ketahanan pangan serta penerapan metode pertanian yang ramah lingkungan (sustainable farming). Padi yang dipanen hari ini merupakan varietas unggulan yang dirawat tanpa menggunakan pestisida kimia sintetis, melainkan memanfaatkan pupuk organik dan sistem pengairan yang terjaga.\r\n\r\n\"Hasil panen kali ini menunjukkan peningkatan kualitas bulir padi yang signifikan dibandingkan musim sebelumnya. Ini membuktikan bahwa transisi ke metode organik tidak hanya menyehatkan tanah, tetapi juga menghasilkan produk premium yang bernilai ekonomi tinggi,\" ujar perwakilan manajemen di lokasi panen.\r\n\r\nBeras organik hasil panen ini rencananya akan segera diproses dan didistribusikan untuk memenuhi permintaan pasar lokal yang semakin sadar akan pentingnya gaya hidup sehat. Ke depannya, perusahaan berencana memperluas area tanam organik ini hingga 20 hektar pada akhir tahun 2026.', 'kegiatan', 'organik, panen, subang, pertanian, beras', '2026-01-06', '1767739839_e299fb27e583c3f3d189.jpeg', '#sukses-panen-raya-padi-organik-kosar-cipeundeuy-subang', '2026-01-06 22:50:39', '2026-01-06 22:50:39'),
(4, 'Penerapan Teknologi IoT untuk Efisiensi Kebun', 'SUBANG, 7 Januari 2026 – Memasuki era pertanian 4.0, perusahaan resmi melakukan transformasi digital di lahan perkebunan dengan mengimplementasikan sistem Smart Farming berbasis Internet of Things (IoT). Langkah strategis ini dimulai hari ini dengan pengaktifan sistem irigasi presisi otomatis di seluruh zona kebun utama.\r\n\r\nTeknologi yang diterapkan memungkinkan pemantauan kondisi lahan secara real-time melalui dashboard digital. Sensor-sensor yang tertanam di tanah akan mengirimkan data kelembapan, suhu, dan kadar nutrisi tanah secara akurat. Ketika sensor mendeteksi tanah mulai kering di bawah ambang batas tertentu, sistem irigasi akan menyala secara otomatis dan berhenti tepat saat kebutuhan air tanaman terpenuhi.\r\n\r\n\"Penerapan IoT ini bukan hanya soal mengikuti tren teknologi, tetapi soal efisiensi sumber daya. Dengan sistem ini, kami memproyeksikan penghematan penggunaan air hingga 40% dan pengurangan biaya operasional tenaga kerja manual,\" ungkap Kepala Divisi Teknologi Pertanian perusahaan.\r\n\r\nSelain efisiensi air, teknologi ini diharapkan dapat menstandarisasi kualitas hasil panen karena tanaman mendapatkan nutrisi dan air yang konsisten. Ke depannya, perusahaan berencana mengintegrasikan sistem ini dengan stasiun cuaca mini untuk prediksi pola tanam yang lebih akurat.', 'kegiatan', 'teknologi, iot, inovasi, smart farming, efisiensi', '2026-01-07', '1767740335_7b8ff4c10494557f5404.jpeg', '#penerapan-teknologi-iot-kebun', '2026-01-06 22:58:55', '2026-01-06 22:58:55'),
(5, 'Upaya Hijau: Perusahaan Resmi Luncurkan Program Penanaman 1.000 Pohon di Subang', 'SUBANG, 9 Januari 2026 – Dalam rangka memperkuat komitmen terhadap kelestarian lingkungan, perusahaan resmi meluncurkan program keberlanjutan melalui penanaman 1.000 bibit pohon di area Subang, Jawa Barat. Kegiatan ini merupakan bagian dari inisiatif tahunan perusahaan untuk mendukung target net-zero emission.\r\n\r\nDirektur Utama perusahaan menyampaikan bahwa kegiatan ini bukan sekadar seremoni, melainkan langkah nyata dalam menjaga ekosistem lokal dan memberikan dampak positif bagi masyarakat sekitar. \"Kami percaya bahwa pertumbuhan bisnis harus berjalan selaras dengan tanggung jawab lingkungan. Pohon yang kita tanam hari ini adalah investasi untuk udara bersih di masa depan,\" ujarnya.\r\n\r\nAcara ini turut dihadiri oleh jajaran manajemen, perwakilan pemerintah daerah, serta relawan dari karyawan perusahaan. Selain penanaman pohon, perusahaan juga memberikan edukasi mengenai pengelolaan limbah organik kepada komunitas tani setempat agar tercipta ekosistem yang mandiri dan berkelanjutan.\r\n\r\nMelalui program ini, diharapkan kesadaran akan pentingnya menjaga alam semakin meningkat di lingkungan internal maupun eksternal perusahaan.', 'kegiatan', 'lingkungan, CSR, penanaman pohon, keberlanjutan, subang', '2026-01-09', '1767938878_9466fa70f818b17b3d44.jpg', '#', '2026-01-09 13:07:58', '2026-01-09 13:07:58'),
(6, 'Mengenal Teknologi IoT untuk Efisiensi Penyiraman Tanaman Hidroponik', 'SUBANG, 12 Januari 2026 – Era pertanian 4.0 membawa perubahan besar pada cara kita bercocok tanam, salah satunya melalui integrasi teknologi Internet of Things (IoT) pada sistem hidroponik. Bagi para pegiat tani modern, memahami cara kerja IoT adalah kunci untuk meningkatkan efisiensi dan kualitas hasil panen secara signifikan.\r\n\r\nApa Itu IoT dalam Hidroponik? Secara sederhana, IoT adalah jaringan perangkat elektronik yang saling terhubung melalui internet. Dalam sistem hidroponik, perangkat ini terdiri dari sensor kelembapan, sensor pH, dan sensor suhu yang dipasang langsung pada media tanam atau tandon nutrisi. Data dari sensor-sensor ini kemudian dikirimkan secara real-time ke perangkat smartphone milik petani.\r\n\r\nKeunggulan Utama Sistem Otomatisasi:\r\n\r\nEfisiensi Sumber Daya: Dengan sistem otomatis, penyiraman hanya akan dilakukan saat sensor mendeteksi tingkat kelembapan yang rendah. Hal ini secara efektif mampu menghemat penggunaan air dan listrik.\r\n\r\nPresisi Nutrisi: IoT memungkinkan pemantauan kadar nutrisi (PPM) secara akurat. Tanaman dipastikan mendapatkan asupan nutrisi yang presisi sesuai dengan fase pertumbuhannya, tanpa risiko kekurangan atau kelebihan dosis.\r\n\r\nMonitoring Jarak Jauh: Petani tidak perlu berada di lokasi setiap saat. Selama terhubung dengan internet, kondisi tanaman dapat dipantau dari mana saja, meminimalisir risiko kegagalan panen akibat kelalaian manusia.\r\n\r\nPenerapan teknologi ini membuktikan bahwa pertanian modern kini tidak lagi melelahkan, melainkan lebih berbasis pada data dan teknologi. Bagi pemula, memulai edukasi mengenai alat-alat IoT dasar dapat menjadi langkah awal untuk mengubah hobi menanam menjadi bisnis yang berkelanjutan dan produktif.', 'edukasi', 'Edukasi, Hidroponik, IoT, Modern', '2026-01-12', '1767939549_518768069e7494e8f0e2.jpg', '#edukasi-teknologi-iot-hidroponik', '2026-01-09 13:19:09', '2026-01-09 13:19:09'),
(7, 'Permintaan Sayuran Organik Meningkat, Peluang Besar bagi Petani Lokal', 'SUBANG – Tren gaya hidup sehat yang semakin berkembang di masyarakat kini memicu lonjakan permintaan sayuran organik di pasar domestik. Fenomena ini menjadi angin segar bagi sektor pertanian di wilayah Subang dan sekitarnya, mengingat potensi lahan yang masih sangat mendukung untuk pengembangan pertanian ramah lingkungan.\r\n\r\nBerdasarkan pantauan langsung di Arif Agro Farm, komoditas seperti selada dan bayam organik saat ini menjadi produk yang paling banyak dicari oleh konsumen maupun pemasok ritel modern. Kualitas sayuran yang bebas dari residu kimia menjadi alasan utama konsumen mulai beralih ke produk organik meskipun dengan harga yang sedikit lebih tinggi.\r\n\r\nPeningkatan permintaan ini merupakan peluang bisnis yang sangat menjanjikan bagi para pelaku usaha tani lokal. Dengan beralih ke metode penanaman tanpa bahan kimia sintetis, petani tidak hanya berkontribusi pada kesehatan konsumen dan kelestarian tanah, tetapi juga berkesempatan mengejar nilai jual yang jauh lebih kompetitif di pasar premium.\r\n\r\nPihak pengelola Arif Agro Farm menyatakan bahwa edukasi mengenai cara bertani organik akan terus digalakkan. Harapannya, lebih banyak petani lokal di Subang yang mampu menghasilkan produk berkualitas tinggi guna memenuhi kebutuhan pasar yang terus tumbuh pesat di awal tahun 2026 ini.', 'info-pasar', 'Organik, Bisnis, Info, Arif agro farm', '2026-01-14', '1767939726_a61aa4ebf5dcf44f4778.jpeg', '#info-pasar-permintaan-sayuran-organik', '2026-01-09 13:22:06', '2026-01-09 13:22:06'),
(8, '5 Tips Menjaga Kualitas Nutrisi Hidroponik saat Cuaca Ekstrem', 'SUBANG, 19 Januari 2026 – Perubahan cuaca yang tidak menentu di wilayah Subang belakangan ini menjadi tantangan tersendiri bagi para petani hidroponik. Menjaga kestabilan suhu dan kualitas nutrisi menjadi kunci utama keberhasilan panen, terutama saat menghadapi cuaca panas ekstrem yang dapat merusak akar tanaman.\r\n\r\nBerikut adalah 5 tips efektif untuk menjaga kualitas nutrisi hidroponik Anda:\r\n\r\nGunakan Peredam Panas pada Tandon: Salah satu cara paling efektif adalah dengan membungkus tandon nutrisi menggunakan bahan peredam panas atau aluminium foil. Hal ini berfungsi untuk menjaga suhu larutan agar tetap sejuk meskipun cuaca di luar sangat terik.\r\n\r\nRutin Cek Kepekatan Larutan (PPM): Selalu lakukan pengecekan kepekatan larutan atau PPM setiap pagi hari sebelum suhu meningkat. Penguapan air yang tinggi saat panas dapat membuat konsentrasi nutrisi menjadi terlalu pekat dan berisiko membakar akar.\r\n\r\nOptimalisasi Sirkulasi Udara: Pastikan sirkulasi udara di dalam greenhouse tetap terjaga dengan baik agar hawa panas tidak terperangkap di dalamnya. Penggunaan exhaust fan atau pembukaan ventilasi secara maksimal sangat disarankan.\r\n\r\nPengaturan Jadwal Pengaliran Nutrisi: Pada saat cuaca ekstrem, atur durasi pengaliran nutrisi lebih sering untuk memastikan akar tetap basah dan suhu media tanam tetap stabil.\r\n\r\nPenambahan Air Baku Secara Berkala: Jika volume air di tandon menurun drastis akibat penguapan, segera tambahkan air baku untuk menstabilkan suhu dan kepekatan tanpa merusak keseimbangan pH nutrisi.\r\n\r\nDengan menerapkan langkah-langkah di atas, para petani di Subang diharapkan dapat meminimalisir risiko tanaman layu dan menjaga produktivitas kebun hidroponik mereka tetap optimal di tengah cuaca yang menantang.', 'tips', 'Tips, Hidroponik, Modern', '2026-01-19', '1767939908_c207598560d95371b610.jpg', '#tips-menjaga-nutrisi-hidroponik', '2026-01-09 13:25:08', '2026-01-09 13:25:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('pending','proses','selesai','batal') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `nama_pemesan`, `no_hp`, `alamat`, `jumlah`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(15, 5, 'Arif Amrullah', '083827914570', 'Kp. Kosar 3, Kosar, Cipeundeuy, Subang', 32, 'Antar ke rumah', 'selesai', '2026-01-08 02:16:16', '2026-01-08 02:16:49'),
(16, 12, 'Hildan', '085183407865', 'Binong, Subang', 1, 'Langsung antar ke rumah', 'pending', '2026-01-08 14:31:06', '2026-01-08 14:31:06'),
(17, 12, 'Hildan', '085183407865', 'Binong, Subang', 1, 'Langsung antar ke rumah', 'pending', '2026-01-08 14:31:07', '2026-01-08 14:34:13'),
(18, 8, 'Hildan', '085183407865', 'Binong', 1, 'Kirim ke rumah langsung', 'pending', '2026-01-10 06:21:12', '2026-01-10 06:21:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_label` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default_product.jpg',
  `link_aksi` varchar(255) DEFAULT '/kontak',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `deskripsi`, `kategori`, `harga_label`, `foto`, `link_aksi`, `created_at`, `updated_at`) VALUES
(3, 'Kangkung ', 'Kangkung hidroponik yang bersih, sehat, higienis, dan segar.', 'sayuran', 'Rp. 10.000/pac', '1767715988_8a605fd152d7ebded869.jpg', '/kontak', '2026-01-06 16:13:08', '2026-01-06 16:13:25'),
(4, 'Pakcoy', 'Pakcoy hidroponik yang segar, higienis, dan sehat serta berkualitas.', 'sayuran', 'Rp. 10.000/pac', '1767716147_1eed06db4df5cac2256d.jpg', '/kontak', '2026-01-06 16:15:47', '2026-01-06 16:15:47'),
(5, 'Durian Montong', 'Durian Montong adalah varietas durian populer yang terkenal dengan daging buahnya yang tebal, legit, berwarna kuning cerah, rasa manis lezat, dan aroma khasnya.', 'buah', 'Rp. 700.000/pcs', '1767716578_98f44014318cfb521c4e.jpg', '/kontak', '2026-01-06 16:22:58', '2026-01-06 16:22:58'),
(6, 'Durian Bawor', 'Durian Bawor adalah varietas durian unggulan dari Banyumas, Jawa Tengah, terkenal karena ukurannya yang jumbo, daging buah tebal, manis legit, berwarna kuning keemasan/oranye dengan sedikit rasa pahit, biji tipis, dan aroma khas.', 'buah', 'Rp. 1.295.000/pcs', '1767716676_2c4fc78efba3d6da93ca.jpg', '/kontak', '2026-01-06 16:24:36', '2026-01-06 16:24:36'),
(7, 'Alpukat', 'Alpukat adalah buah tropis (dari genus Persea) yang dikenal dengan daging buahnya yang lembut, kaya akan lemak tak jenuh tunggal (lemak baik), serat, vitamin, dan mineral', 'buah', 'Rp. 75.000/kg', '1767716785_6e55b8bf0cdf405396f0.jpg', '/kontak', '2026-01-06 16:26:25', '2026-01-06 16:26:25'),
(8, 'Selada', 'sayuran daun yang umum dikonsumsi mentah sebagai lalapan atau bahan utama salad karena rasanya segar, kandungan airnya tinggi, serta kaya nutrisi seperti vitamin A dan K, serat, dan mineral', 'sayuran', 'Rp. 10.000/pac', '1767716881_1254379f337b200e406d.jpeg', '/kontak', '2026-01-06 16:28:01', '2026-01-06 16:28:01'),
(9, 'Pohon Durian Montong', 'Bibit Durian Montong adalah bibit durian unggulan dari Thailand yang diperbanyak dengan okulasi/cangkok, punya ciri batang kokoh, daun rimbun, dan cepat berbuah (3-5 tahun). ', 'bibit', 'Rp. 250.000/pcs', '1767749290_9e094dd1368ad25d4fc0.jpg', '/kontak', '2026-01-07 01:28:10', '2026-01-07 01:28:10'),
(10, 'Inpari 32', 'Benih padi Inpari 32 adalah varietas padi sawah irigasi unggul yang populer karena hasil tinggi (rata-rata 8-8,42 ton/ha) dan rasa nasi pulen, turunan Ciherang, tahan HDB strain III, cocok lahan dataran rendah < 600 mdpl, dengan varian seperti HDB, Jumbo, Maxipro, Promeo, menawarkan ketahanan penyakit dan pertumbuhan lebih baik.  ', 'bibit', 'Rp. 90.000/pax', '1767749369_b95409a28044d9df88bd.jpg', '/kontak', '2026-01-07 01:29:29', '2026-01-07 01:29:29'),
(11, 'Tasco Knapsack Power Sprayer ', 'Tasco Knapsack Power Sprayer adalah alat semprot gendong bertenaga listrik (elektrik) atau bensin (2-tak/4-tak) yang praktis untuk pertanian, berfungsi menyemprot hama atau pupuk dengan tekanan tinggi, hemat tenaga, dan mudah digunakan, tersedia dalam berbagai kapasitas (14L, 17L, 20L) dan model seperti ES-14X, ES-17, TF-700, serta TF-820', 'alsintan', 'Rp. 649.000/unit', '1767749564_6e2eb99e52b73268feea.jpg', '/kontak', '2026-01-07 01:32:44', '2026-01-07 01:44:08'),
(13, 'Cengek Merah', 'Cengek merah adalah cabai kecil yang memiliki rasa pedas yang sangat tinggi. Dalam bahasa Indonesia, cengek merah sering digunakan dalam masakan, terutama dalam sambal, untuk memberikan rasa pedas yang khas. Cengek ini juga dikenal sebagai cabai rawit dan sering digunakan dalam berbagai masakan Indonesia, seperti sambal dan gulai. Selain itu, cengek merah juga memiliki manfaat kesehatan, seperti sumber antioksidan dan vitamin.', 'sayuran', 'Rp. 30.000/kg', '1767929711_274f1b8319527999ed54.jpg', '/kontak', '2026-01-09 10:35:11', '2026-01-09 10:35:11'),
(14, 'Cengek Hijau', 'Cengek hijau adalah jenis cabai rawit yang masih muda, dengan karakteristik pedas yang khas. Cengek hijau memiliki warna hijau saat muda dan berubah menjadi merah saat matang. Tanaman ini tumbuh tinggi sekitar 60-100 cm dan sering digunakan dalam masakan, seperti sambal, tumisan, dan hidangan tradisional lainnya. Selain itu, cengek hijau kaya akan vitamin C dan antioksidan, yang baik untuk kesehatan.', 'sayuran', 'Rp. 40.000/kg', '1767929763_6cdb4ce8afdb2084511f.jpg', '/kontak', '2026-01-09 10:36:03', '2026-01-09 10:36:03'),
(15, 'Jamur Tiram', 'Jamur tiram adalah jenis jamur pangan yang dikenal dengan nama ilmiah Pleurotus ostreatus. Jamur ini memiliki ciri-ciri tubuh buah berwarna putih hingga krem dengan tudung berbentuk setengah lingkaran mirip cangkang tiram. Jamur tiram banyak dibudidayakan karena pertumbuhannya yang cepat dan rasanya yang lezat, serta sering diolah menjadi berbagai masakan seperti tumisan dan sup. Selain itu, jamur ini juga memiliki nilai gizi yang tinggi dan khasiat obat.', 'sayuran', 'Rp. 15.000/kg', '1767929818_86d64bd797f88cd0f2ee.jpg', '/kontak', '2026-01-09 10:36:58', '2026-01-09 10:36:58'),
(16, 'Bawang Merah', 'Bawang merah adalah sejenis bawang yang berasal dari Iran dan Pakistan, dan merupakan salah satu bumbu masak utama di dunia. Nama latinnya adalah Allium cepa L. var. aggregatum, dan bawang merah memiliki banyak varietas yang digunakan dalam berbagai masakan. Bawang merah juga dikenal sebagai tanaman semusim yang banyak diproduksi di Indonesia, terutama di daerah Jawa Barat, Jawa Tengah, dan Jawa Timur. ', 'sayuran', 'Rp. 25.000/kg', '1767929867_cf1ede865762f929cec6.jpg', '/kontak', '2026-01-09 10:37:47', '2026-01-09 10:37:47'),
(17, 'Bawang Putih', 'Bawang putih adalah tanaman umbi-umbian dari genus Allium sativum yang dikenal luas sebagai garlic dalam bahasa Inggris. Tanaman ini memiliki sejarah penggunaan selama lebih dari 7.000 tahun, terutama di Asia Tengah, dan menjadi bahan penting dalam berbagai masakan di seluruh dunia karena aroma dan rasa yang khas. Selain itu, bawang putih juga dikenal memiliki berbagai manfaat kesehatan.', 'sayuran', 'Rp. 20.000/kg', '1767929920_e912735bb2bcb5edd41e.jpeg', '/kontak', '2026-01-09 10:38:40', '2026-01-09 10:38:40'),
(18, 'Cabe Merah', 'Cabe merah adalah buah dari tanaman Capsicum annuum, yang termasuk dalam famili Solanaceae. Buah ini biasanya berwarna merah dan dapat digunakan sebagai bumbu dalam masakan, memberikan rasa pedas dan manfaat kesehatan seperti meningkatkan metabolisme dan melindungi sel-sel tubuh dari kerusakan akibat radikal bebas. Cabe merah juga mengandung senyawa aktif seperti capsaicin, yang memberikan rasa pedas dan berbagai manfaat kesehatan, termasuk sebagai antioksidan dan antibakteri.', 'sayuran', 'Rp. 10.000/kg', '1767929977_c4fc7fcfe26eec29fd7d.jpg', '/kontak', '2026-01-09 10:39:37', '2026-01-09 10:39:37'),
(19, 'Cabe Hijau', 'Cabe hijau adalah buah dari tanaman Capsicum yang belum matang sepenuhnya. Buah ini berwarna hijau segar, memiliki rasa yang lebih ringan dan sedikit asam dibandingkan cabai merah, serta tingkat kepedasan bervariasi tergantung pada varietas. Cabe hijau umumnya digunakan dalam masakan Indonesia, seperti sambal, tumisan, dan sebagai bumbu segar di nasi goreng dan ayam penyet. Selain itu, cabai hijau kaya akan vitamin C dan senyawa capsaicin, yang memberikan rasa pedas dan berbagai manfaat kesehatan, seperti meningkatkan metabolisme dan melindungi tubuh dari radikal bebas.', 'sayuran', 'Rp. 15.000/kg', '1767930023_c643c2bc1fcae0036663.jpg', '/kontak', '2026-01-09 10:40:23', '2026-01-09 10:40:23'),
(20, 'Timun', 'Timun adalah tumbuhan yang menghasilkan buah yang dapat dimakan, dikenal juga sebagai mentimun atau ketimun (Cucumis sativus). Timun sering digunakan dalam berbagai hidangan, seperti lalapan, acar, dan salad, karena kandungan airnya yang tinggi dan rasanya yang segar. Selain itu, timun juga memiliki banyak manfaat kesehatan, seperti membantu hidrasi dan menyediakan nutrisi penting bagi tubuh.', 'sayuran', 'Rp. 8.000/kg', '1767930110_6778b6536cfc03e9e934.png', '/kontak', '2026-01-09 10:41:50', '2026-01-09 10:41:50'),
(21, 'Wortel', 'Wortel adalah sayuran umbi berwarna oranye yang termasuk dalam keluarga Apiaceae, dengan nama ilmiah Daucus carota subsp. sativus. Wortel merupakan tumbuhan biennial yang menyimpan karbohidrat dalam jumlah besar di bagian akarnya. Selain itu, wortel juga dikenal sebagai sumber serat makanan dan mengandung berbagai vitamin serta mineral penting.', 'sayuran', 'Rp. 7000/kg', '1767930152_f94c70beb1065052dae8.jpg', '/kontak', '2026-01-09 10:42:32', '2026-01-09 10:42:32'),
(22, 'Mangga Simanalagi', 'Mangga simanalagi adalah salah satu varietas mangga yang populer di Indonesia. Buah ini memiliki kulit berwarna hijau dengan bintik-bintik putih kecil, daging buahnya kuning tebal dan halus, serta rasa yang manis dan aromanya harum. Mangga simanalagi dikenal memiliki kandungan nutrisi yang baik, seperti vitamin C, vitamin A, dan serat, yang bermanfaat bagi kesehatan. Selain itu, mangga ini juga memiliki daya simpan yang baik, sehingga cocok untuk dipasarkan baik di dalam negeri maupun diekspor.', 'buah', 'Rp. 25.000/kg', '1767930761_53e25eb2197ee17bb7c3.jpg', '/kontak', '2026-01-09 10:52:41', '2026-01-09 10:52:41'),
(23, 'Kelengkeng', 'Lengkeng adalah tanaman buah yang berasal dari Asia Tenggara, khususnya dari Indonesia. Tanaman ini termasuk dalam famili Sapindaceae dan memiliki nama ilmiah Dimocarpus longan. Buah lengkeng berbentuk bulat, berwarna cokelat kekuningan, dan memiliki daging buah yang berwarna putih. Lengkeng dikenal memiliki manfaat kesehatan yang tinggi, seperti meningkatkan daya ingat, kesehatan kulit, dan kualitas tidur. Selain itu, lengkeng juga memiliki nilai ekonomi yang tinggi dalam industri farmasi dan kuliner.', 'buah', 'Rp. 20.000/kg', '1767930870_a6800e6437ad6d9de78a.jpg', '/kontak', '2026-01-09 10:54:30', '2026-01-09 10:54:30'),
(24, 'Rambutan', 'Rambutan adalah tanaman buah tropis yang berasal dari wilayah Asia Tenggara, khususnya Indonesia, Malaysia, dan Thailand. Nama \"rambutan\" berasal dari bahasa Melayu yang berarti \"rambut,\" merujuk pada ciri khas kulit buahnya yang berbulu. Rambutan termasuk dalam keluarga Sapindaceae dan tumbuh di daerah yang banyak curah hujan.', 'buah', 'Rp. 10.000/kg', '1767930939_60b89389e87c51ee64ff.jpg', '/kontak', '2026-01-09 10:55:39', '2026-01-09 10:55:39'),
(25, 'Nanas Simadu', 'Nanas Simadu adalah jenis nanas yang dikenal dengan cita rasa manis dan kandungan air yang tinggi, menjadikannya sangat populer di kalangan penggemar. Buah ini berasal dari daerah Subang, Indonesia, dan memiliki ukuran besar serta rasa manis-asam yang khas. Nanas Simadu tidak sembarangan dihasilkan, karena hanya beberapa hasil panen dari satu kebun dapat menghasilkan buah ini. Harga nanas Simadu umumnya lebih tinggi dibandingkan nanas biasa, dan banyak petani berupaya memproduksinya untuk menarik minat konsumen.', 'buah', 'Rp. 25.000/pcs', '1767931036_a9d9b917e76f64e9f238.jpg', '/kontak', '2026-01-09 10:57:16', '2026-01-09 10:57:16'),
(26, 'Manggis', 'Manggis (Garcinia mangostana L.) adalah buah tropis yang dikenal sebagai \"ratu buah\" karena rasanya yang manis dan lezat. Buah ini memiliki kulit yang tebal dan berwarna ungu, serta daging buah yang berair dan berwarna putih. Manggis berasal dari Asia Tenggara dan tumbuh subur di daerah beriklim hangat dan lembap. Selain rasanya yang enak, manggis juga kaya akan manfaat kesehatan, termasuk menjaga kesehatan jantung dan memberikan perlindungan antioksidan.', 'buah', 'Rp. 30.000/kg', '1767931103_e0f9df6ef74c2eaccd59.jpg', '/kontak', '2026-01-09 10:58:23', '2026-01-09 10:58:23'),
(27, 'Salak', 'Salak, atau dalam bahasa ilmiah disebut Salacca zalacca, adalah buah tropis yang berasal dari Indonesia. Buah ini dikenal juga sebagai snake fruit karena kulitnya yang bersisik menyerupai kulit ular. Salak memiliki daging buah yang manis hingga sedikit asam dan tekstur yang renyah. Pohon salak tumbuh di daerah tropis, seperti Jawa, Sumatera, dan Bali, dan merupakan tanaman palma yang memiliki duri.', 'buah', 'Rp. 20.000/kg', '1767931189_0671dd557b1bfbf49810.jpg', '/kontak', '2026-01-09 10:59:49', '2026-01-09 10:59:49'),
(28, 'Bibit Rambutan', 'Bibit rambutan adalah biji tanaman rambutan yang digunakan untuk menanam pohon rambutan. Teknik penyemaian bibit rambutan melibatkan beberapa langkah penting, seperti pemilihan buah rambutan yang sehat, pengambilan biji yang bernas, penyemaian dalam media tanam yang sesuai, dan perawatan bibit agar tumbuh dengan baik. Dengan menerapkan teknik penyemaian yang tepat, diharapkan dapat menghasilkan bibit rambutan berkualitas yang akan menghasilkan pohon rambutan sehat dan produktif.', 'bibit', 'Rp. 50.000/unit', '1767931267_04d6a9f0f612e6e0ed7a.jpg', '/kontak', '2026-01-09 11:01:07', '2026-01-09 11:01:07'),
(29, 'Bibit Alpukat', 'Bibit alpukat adalah metode perbanyakan alpukat yang paling sederhana dan sering digunakan oleh pekebun rumahan. Prosesnya melibatkan penanaman langsung biji alpukat yang berasal dari buah matang. Keunggulan bibit alpukat adalah biaya relatif murah dan tidak memerlukan keahlian khusus dalam perbanyakanannya. Namun, kekurangan utama dari bibit alpukat adalah waktu berbuah yang lama, berkisar antara 5 hingga 10 tahun, dan kualitas buah yang dihasilkan tidak dapat diprediksi. ', 'bibit', 'Rp. 60.000/unit', '1767931377_b42d9ab2b6b2e20922f7.jpg', '/kontak', '2026-01-09 11:02:57', '2026-01-09 11:02:57'),
(30, 'Bibit Kelapa', 'Bibit kelapa dalam adalah pilihan unggul untuk budidaya kelapa di Indonesia, dikenal dengan ukuran buah yang besar dan masa produktif yang panjang.', 'bibit', 'Rp. 40.000/unit', '1767931426_b230504a48e8d72a86dc.jpeg', '/kontak', '2026-01-09 11:03:46', '2026-01-09 11:03:46'),
(31, 'TASCO TAC-328', 'Mesin rumpu Tasco adalah alat pemotong rumput yang dirancang untuk memberikan performa optimal dalam pemotongan rumput di berbagai jenis medan. Salah satu model terkenal adalah TASCO TAC-328, yang dilengkapi dengan mesin berkualitas tinggi, desain ergonomis, dan bobot yang seimbang, sehingga memungkinkan pengguna untuk bekerja dengan nyaman dan efisien. Mesin ini cocok digunakan di area perkebunan, taman, dan lahan rumput yang luas, serta menawarkan kinerja yang tangguh dan efisien.', 'alsintan', 'Rp. 900.000/unit', '1767932191_53b9d192103ed28815e5.png', '/kontak', '2026-01-09 11:16:31', '2026-01-09 11:16:31'),
(32, 'Traktor Quick g1000', 'Traktor Quick G1000 adalah traktor tangan roda dua yang terkenal dengan performa yang kuat dan stabil. Traktor ini menggunakan motor penggerak Kubota dengan tenaga bervariasi antara 8,5-11 HP, dan dirancang untuk mengolah lahan kering maupun basah. Sejak diluncurkan pada tahun 1993, traktor ini telah menjadi legenda dan andalan bagi petani di Indonesia, dikenal dengan kekuatan dan keawetannya. Desainnya yang sederhana juga memudahkan perawatan dan operasional.', 'alsintan', 'Rp. 30.000.000/unit', '1767932323_335e09f396f8f7ee63e7.jpg', '/kontak', '2026-01-09 11:18:43', '2026-01-09 11:18:43'),
(33, 'Combine Harvester', 'Mesin Pemanen Padi modern', 'alsintan', 'Rp. 400.000.000/unit', '1768104567_6a3b0cc88a9489b1ee94.png', '/kontak', '2026-01-11 11:09:27', '2026-01-11 11:09:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_list`
--

CREATE TABLE `services_list` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `ikon` varchar(50) DEFAULT 'bi-box-seam',
  `link_aksi` varchar(255) DEFAULT '/kontak',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services_list`
--

INSERT INTO `services_list` (`id`, `judul`, `deskripsi`, `ikon`, `link_aksi`, `created_at`) VALUES
(1, 'Suplai Sayur & Buah', 'Penyediaan stok sayur dan buah segar berkualitas grade A untuk kebutuhan Customer kami.', 'bi-cart-check-fill', '/kontak', '2026-01-05 22:45:42'),
(2, 'Instalasi Smart Farming', 'Jasa desain dan pemasangan sistem irigasi tetes otomatis berbasis IoT.', 'bi-router-fill', '/kontak', '2026-01-05 22:45:42'),
(3, 'Konsultasi & Pelatihan', 'Program pelatihan intensif budidaya hidroponik dan pertanian organik.', 'bi-people-fill', '/kontak', '2026-01-05 22:45:42'),
(5, 'Agro Wisata Edu', 'Kegiatan berlibur sambil belajar bertani modern dengan teknologi pertanian masa kini.', 'bi bi-backpack3-fill', '/kontak', '2026-01-06 06:45:33'),
(6, 'Penyedia Bibit', 'Menyediakan bibit yang unggul dan berkualitas serta sesuai dengan standar nasional pertanian.', 'bi bi-tree-fill', '/kontak', '2026-01-06 22:57:24'),
(7, 'Suplai Pupuk Organik', 'Penyediaan stok pupuk organik asli 100% dari sampah organik dan kotoran hewan yang di fermentasi', 'bi bi-recycle', '/kontak', '2026-01-06 23:01:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_stats`
--

CREATE TABLE `services_stats` (
  `id` int(11) NOT NULL,
  `stat1_value` varchar(50) DEFAULT '24/7',
  `stat1_label` varchar(100) DEFAULT 'Konsultasi Teknis',
  `stat2_value` varchar(50) DEFAULT 'High Tech',
  `stat2_label` varchar(100) DEFAULT 'Berbasis IoT',
  `stat3_value` varchar(50) DEFAULT 'Fresh',
  `stat3_label` varchar(100) DEFAULT 'Jaminan Kualitas',
  `stat4_value` varchar(50) DEFAULT 'Expert',
  `stat4_label` varchar(100) DEFAULT 'Tim Ahli',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services_stats`
--

INSERT INTO `services_stats` (`id`, `stat1_value`, `stat1_label`, `stat2_value`, `stat2_label`, `stat3_value`, `stat3_label`, `stat4_value`, `stat4_label`, `updated_at`) VALUES
(1, '24/7', 'Konsultasi Teknis', 'High Tech', 'Berbasis IoT', 'Fresh', 'Jaminan Kualitas', 'Expert', 'Tim Ahli', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
(1, 'Arif Amrullah', 'arif@gmail.com', '$2y$10$kDe14tmQNtE8BUrpfOZ3cO7pagJHUUACYAFqG4KcG7HyfOsPlqhDy', '2026-01-06 00:55:15'),
(2, 'mas arif 27', 'masarif@gmail.com', '$2y$10$8zMhWiqfjM5R9XozBB9j2eQ.5vBVtjvNbY.6BQCn1rYfzInFWHVYe', '2026-01-10 14:40:49'),
(3, 'andreowo', 'dre@gmail.com', '$2y$10$OnJwl5VyrKHH8p1T.OvTIeFpci44AxoUZoRQb49wZbL9SdQWN6r8y', '2026-01-10 14:42:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_mitra`
--
ALTER TABLE `about_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `about_profile`
--
ALTER TABLE `about_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `about_teams`
--
ALTER TABLE `about_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_id` (`career_id`);

--
-- Indeks untuk tabel `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services_list`
--
ALTER TABLE `services_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services_stats`
--
ALTER TABLE `services_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_mitra`
--
ALTER TABLE `about_mitra`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `about_profile`
--
ALTER TABLE `about_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `about_teams`
--
ALTER TABLE `about_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `services_list`
--
ALTER TABLE `services_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `services_stats`
--
ALTER TABLE `services_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
