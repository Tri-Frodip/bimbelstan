-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2021 at 05:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jago_cpns`
--

--
-- Truncate table before insert `parts`
--

TRUNCATE TABLE `parts`;
--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`, `format_validation`, `created_at`, `updated_at`) VALUES
(13, 'Tes Wawasan Kebangsaan', 'normal', '2021-09-08 07:12:36', '2021-09-08 07:12:36'),
(14, 'Tes Intelegensia Umum', 'normal', '2021-09-08 07:38:26', '2021-09-08 07:38:26'),
(15, 'Tes Karakteristik Pribadi', 'custom', '2021-09-08 07:53:51', '2021-09-08 07:53:51');

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;
--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `part_id`, `question`, `created_at`, `updated_at`) VALUES
(26, 13, 'Dokuritsu Junbi Cosakai adalah nama jepang dari...', '2021-09-08 07:13:41', '2021-09-08 07:16:44'),
(27, 13, 'SidangBPUPKI yangpertama dilaksanakan pada..', '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(28, 13, 'Nama“PiagamJakarta”dari hasil rumusanPanitiaKecil dalamsidangBPUPKI dicetuskan oleh....', '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(29, 13, 'Soekarno menyampaikan pidatonya dihadapan sidang BPUPKI pada...', '2021-09-08 07:18:05', '2021-09-08 07:18:34'),
(30, 13, 'Bangsa Indonesia mengembangkan perilaku luhur yang menggambarkan sikap dan suasana kekeluargaan dan kegotong royongan, sikap adil, seimbang antara hak dan kewajiban, menghormati orang lain, suka menolong, suka menghargai hasilkarya oranglain,dan gemar ikut dalam kegiatan untuk memajukan masyarakat yang merata dan berkeadilan sosial. Merupakan pengamalan pancasila sila', '2021-09-08 07:22:20', '2021-09-08 07:22:20'),
(31, 13, 'Bangsa  Indonesia adalah bangsa yang percaya dan  takwa  kepada  Tuhan  YME sesuai  agama dan kepercayaan tiap-tiap orang dengan dasar  kemanusiaan yang adil  dan beradab.  Merupakan pengamalan pancasilasila', '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(32, 13, 'Bangsa Indonesia memiliki kedudukan yang sama baik hak maupun kewajiban didalam masyarakat.Bangsa Indonesia tidak boleh memaksakan kehendak dan selalu mengutamakan musyawarah dalam mengambil keputusan serta menghormati dan menjunjung tinggi serta memiliki itikad baik juga tanggung jawab atas hasil kesepakatan dalam musyawarah. Merupakan pengamalan pancasila sila', '2021-09-08 07:28:16', '2021-09-08 07:28:16'),
(33, 13, 'Bangsa  Indonesia  bisa   menempatkan  persatuan  dan  kesatuan  serta  keselamatan  dan kepentingan negara dan bangsa diatas kepentingan pribadi/golongan. Bersedia rela berkorban, cinta tanah air, menumbuhkan rasa bangga terhadap tanah air, memelihara ketertiban dunia, mengembangkan persatuan Indonesia, dan   memajukan hubungan demi persatuan serta kesatuan Indonesia. Merupakan pengamalan pancasila sila', '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(34, 13, 'Pancasila sebagai ideologi terkemuka memiliki makna yang menuntut warga untuk...', '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(35, 13, 'Pembangunan ekonomi Indonesia yang berdasarkan Pancasila menganut sistem ekonomi...', '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(36, 14, 'Sinonim Andal', '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(37, 14, 'Sinonim Kisi-kisi', '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(38, 14, 'Antonim Emigrasi', '2021-09-08 07:41:52', '2021-09-08 07:41:52'),
(39, 14, 'Antonim Induksi', '2021-09-08 07:42:47', '2021-09-08 07:42:47'),
(40, 14, 'Analogi Raja : Ratu', '2021-09-08 07:44:20', '2021-09-08 07:44:20'),
(41, 14, 'Analogi Singa : Taring', '2021-09-08 07:45:29', '2021-09-08 07:45:29'),
(42, 14, 'x/y adalah suatu pecahan, jika x ditambah 1 dan y ditambah 2 , maka hasil nya adalah 3/5. Jika x dikurangi 1 dan y ditambah 4, maka hasil nya adalah....', '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(43, 14, 'Berapakah 90 % dari 5/6', '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(44, 14, 'Dari pecahan di bawah ini yang terbesar adalah.....', '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(45, 14, 'Banyak garis yang dapat dibuat dari 8 titik yang tersedia, dengan tidak ada 3 titik yang segaris adalah ...', '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(46, 15, 'Atasan bagi saya adalah...', '2021-09-08 07:57:58', '2021-09-08 07:57:58'),
(47, 15, 'Jika diberikan tugas kantor yang berat oleh atasan, maka saya..', '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(48, 15, 'Saya dipercayakan mengelola kegiatan yang belum dipublikasikan dan masih harus dijaga kerahasiaanya. Ketika saya berada di antara teman-teman dekat di kantor, saya..', '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(49, 15, 'Setiap hari, saya masuk kantor paling cepat dibandingkan pegawai lainnya. Yang saya lakukan setelah tiba adalah...', '2021-09-08 08:06:26', '2021-09-08 08:06:26'),
(50, 15, 'Saya diminta untuk lembur kerja sedangkan saya sudah berjanji kepada anak saya untuk mengantarnya ke pesta ulang tahun sahabatnya. Sikap saya..', '2021-09-08 08:09:52', '2021-09-08 08:09:52'),
(51, 15, 'Pada saat menghadapi tugas yang berat dan menuntut kemampuan tinggi, saya.. ', '2021-09-08 08:12:54', '2021-09-08 08:12:54'),
(52, 15, 'Anda senang jika datang ke sebuah restoran yang...', '2021-09-08 08:14:25', '2021-09-08 08:14:25'),
(53, 15, 'Jika sedang bekerja di bawah tekanan, maka Anda akan... ', '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(54, 15, 'Anda lebih memilih untuk menghabiskan liburan di... ', '2021-09-08 08:16:49', '2021-09-08 08:16:49'),
(55, 15, 'Ketika ada seorang rekan kerja yang salah dalam melakukan suatu hal, Anda akan...', '2021-09-08 08:19:00', '2021-09-08 08:19:00');

--
-- Truncate table before insert `choices`
--

TRUNCATE TABLE `choices`;
--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `text`, `is_correct`, `created_at`, `updated_at`) VALUES
(121, 26, 'Panitia sembilan', 0, '2021-09-08 07:13:41', '2021-09-08 07:13:41'),
(122, 26, 'BPUPKI', 5, '2021-09-08 07:13:42', '2021-09-08 07:13:42'),
(123, 26, 'PPKI', 0, '2021-09-08 07:13:42', '2021-09-08 07:13:42'),
(124, 26, 'KNIP', 0, '2021-09-08 07:13:42', '2021-09-08 07:13:42'),
(125, 26, 'Piagam Jakarta', 0, '2021-09-08 07:13:42', '2021-09-08 07:16:44'),
(126, 27, '1 Maret – 1 Juni 1945', 0, '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(127, 27, '29 Mei – 22 Juni 1945 ', 0, '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(128, 27, '1 Juni – 22 Juni 1945', 0, '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(129, 27, '7 Agustus – 18Agustus 1945', 0, '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(130, 27, '29 Mei – 1Juni 1945', 5, '2021-09-08 07:15:19', '2021-09-08 07:15:19'),
(131, 28, ' Ir. Soekarno', 0, '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(132, 28, 'Muh. Hatta', 0, '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(133, 28, 'K.H. Wahid Hasyim', 0, '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(134, 28, 'Ahmad Subardjo', 0, '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(135, 28, 'Mr. Muhammad Yamin', 5, '2021-09-08 07:16:27', '2021-09-08 07:16:27'),
(136, 29, '29 Mei 1945', 0, '2021-09-08 07:18:05', '2021-09-08 07:18:05'),
(137, 29, '1 Juni 1945', 5, '2021-09-08 07:18:06', '2021-09-08 07:18:06'),
(138, 29, '22 Juni 1945', 0, '2021-09-08 07:18:06', '2021-09-08 07:18:06'),
(139, 29, '17 Agustus 1945 ', 0, '2021-09-08 07:18:06', '2021-09-08 07:18:06'),
(140, 29, '18 Agustus 1945', 0, '2021-09-08 07:18:06', '2021-09-08 07:18:06'),
(141, 30, 'Sila pertama ', 0, '2021-09-08 07:22:20', '2021-09-08 07:22:20'),
(142, 30, 'Sila kedua', 0, '2021-09-08 07:22:21', '2021-09-08 07:22:21'),
(143, 30, 'Sila ketiga', 0, '2021-09-08 07:22:21', '2021-09-08 07:22:21'),
(144, 30, 'Sila keempat', 0, '2021-09-08 07:22:21', '2021-09-08 07:22:21'),
(145, 30, 'Sila kelima', 5, '2021-09-08 07:22:21', '2021-09-08 07:22:21'),
(146, 31, 'Sila pertama', 5, '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(147, 31, 'Sila kedua', 0, '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(148, 31, 'Sila ketiga', 0, '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(149, 31, 'Sila keempat', 0, '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(150, 31, 'Sila kelima', 0, '2021-09-08 07:26:31', '2021-09-08 07:26:31'),
(151, 32, 'Sila pertama', 0, '2021-09-08 07:28:16', '2021-09-08 07:28:16'),
(152, 32, 'Sila kedua', 0, '2021-09-08 07:28:16', '2021-09-08 07:28:16'),
(153, 32, 'Sila ketiga', 0, '2021-09-08 07:28:16', '2021-09-08 07:28:16'),
(154, 32, 'Sila keempat', 5, '2021-09-08 07:28:17', '2021-09-08 07:28:17'),
(155, 32, 'Sila kelima', 0, '2021-09-08 07:28:17', '2021-09-08 07:28:17'),
(156, 33, 'Sila pertama`', 0, '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(157, 33, 'Sila kedua', 0, '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(158, 33, 'Sila ketiga', 5, '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(159, 33, 'Sila keempat', 0, '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(160, 33, 'Sila kelima', 0, '2021-09-08 07:31:31', '2021-09-08 07:31:31'),
(161, 34, 'Mewaspadai budaya asing', 0, '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(162, 34, 'Melestarikan nilai budayanya', 0, '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(163, 34, 'Bersikap kritis dan rasional', 5, '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(164, 34, 'Menerima secara bebas budaya asing ', 0, '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(165, 34, 'Mempelajari budaya asing', 0, '2021-09-08 07:33:25', '2021-09-08 07:33:25'),
(166, 35, 'Liberal', 0, '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(167, 35, 'Monopoli dan persaingan bebas', 0, '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(168, 35, 'Yang tidak mengakui kepemilikan individu', 0, '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(169, 35, 'Berdasarkan moralitas Ketuhanan dan kemanusiaan', 5, '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(170, 35, 'Yang disertai penindasan dalam mencapai cita-citanya', 0, '2021-09-08 07:37:06', '2021-09-08 07:37:06'),
(171, 36, 'Bebal', 0, '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(172, 36, 'Tangguh', 5, '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(173, 36, 'Terbelakang', 0, '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(174, 36, 'Lingkungan', 0, '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(175, 36, 'Amdal', 0, '2021-09-08 07:39:48', '2021-09-08 07:39:48'),
(176, 37, 'Terali', 5, '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(177, 37, 'Pola Kerja', 0, '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(178, 37, 'Alat Hitung', 0, '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(179, 37, 'Tabel', 0, '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(180, 37, 'Gambaran', 0, '2021-09-08 07:41:03', '2021-09-08 07:41:03'),
(181, 38, 'Pengungsian', 0, '2021-09-08 07:41:53', '2021-09-08 07:41:53'),
(182, 38, 'Pemindahan', 0, '2021-09-08 07:41:53', '2021-09-08 07:41:53'),
(183, 38, 'Pemukiman', 0, '2021-09-08 07:41:53', '2021-09-08 07:41:53'),
(184, 38, 'Imigrasi', 5, '2021-09-08 07:41:53', '2021-09-08 07:41:53'),
(185, 38, 'Transmigrasi', 0, '2021-09-08 07:41:53', '2021-09-08 07:41:53'),
(186, 39, 'Deduksi', 5, '2021-09-08 07:42:47', '2021-09-08 07:42:47'),
(187, 39, 'Redusi', 0, '2021-09-08 07:42:47', '2021-09-08 07:42:47'),
(188, 39, 'Reduksi', 0, '2021-09-08 07:42:47', '2021-09-08 07:42:47'),
(189, 39, 'Agitasi', 0, '2021-09-08 07:42:48', '2021-09-08 07:42:48'),
(190, 39, 'Kandungan', 0, '2021-09-08 07:42:48', '2021-09-08 07:42:48'),
(191, 40, 'Rukun : Sentosa', 0, '2021-09-08 07:44:20', '2021-09-08 07:44:20'),
(192, 40, 'Ayah : Ibu', 5, '2021-09-08 07:44:21', '2021-09-08 07:44:21'),
(193, 40, 'Kakak : Adik', 0, '2021-09-08 07:44:21', '2021-09-08 07:44:21'),
(194, 40, 'Tua : Muda', 0, '2021-09-08 07:44:21', '2021-09-08 07:44:21'),
(195, 40, 'Adil : Makmur', 0, '2021-09-08 07:44:21', '2021-09-08 07:44:21'),
(196, 41, 'Jerapah : Leher', 0, '2021-09-08 07:45:29', '2021-09-08 07:45:29'),
(197, 41, 'Landak : Kulit', 0, '2021-09-08 07:45:29', '2021-09-08 07:45:29'),
(198, 41, 'Kuda : Kaki', 0, '2021-09-08 07:45:29', '2021-09-08 07:45:29'),
(199, 41, 'Ular : Bisa', 5, '2021-09-08 07:45:30', '2021-09-08 07:45:30'),
(200, 41, 'Dinosaurus : Ekor', 0, '2021-09-08 07:45:30', '2021-09-08 07:45:30'),
(201, 42, '1/7', 5, '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(202, 42, '2/7', 0, '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(203, 42, '1/6', 0, '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(204, 42, '2/6', 0, '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(205, 42, '2/3', 0, '2021-09-08 07:48:01', '2021-09-08 07:48:01'),
(206, 43, '2/6', 0, '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(207, 43, '5/4', 0, '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(208, 43, '3/6', 0, '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(209, 43, '3/4', 5, '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(210, 43, '4/6', 0, '2021-09-08 07:49:12', '2021-09-08 07:49:12'),
(211, 44, '68/125', 0, '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(212, 44, '65/121', 0, '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(213, 44, '67/123', 5, '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(214, 44, '69/127', 0, '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(215, 44, '62/124', 0, '2021-09-08 07:50:49', '2021-09-08 07:50:49'),
(216, 45, '336', 0, '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(217, 45, '240', 0, '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(218, 45, '120', 0, '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(219, 45, '42', 0, '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(220, 45, '28', 5, '2021-09-08 07:52:40', '2021-09-08 07:52:40'),
(221, 46, 'Seseorang yang berhak mengatur bawahanya', 1, '2021-09-08 07:57:58', '2021-09-08 07:57:58'),
(222, 46, 'Seseorang yang mempunyai pangkat yang lebih tinggi dari saya', 2, '2021-09-08 07:57:59', '2021-09-08 07:57:59'),
(223, 46, 'Seseorang yang mempunyai pemahaman yang lebih baik daripada saya dalam hal pekerjaan', 3, '2021-09-08 07:57:59', '2021-09-08 07:57:59'),
(224, 46, 'Seseorang yang harus saya hormati pendapatnya', 5, '2021-09-08 07:57:59', '2021-09-08 07:57:59'),
(225, 46, 'Seseorang yang manjadi tempat saya bertanya jika mengalami masala dalam pekerjaan saya', 4, '2021-09-08 07:57:59', '2021-09-08 07:57:59'),
(226, 47, 'Jujur mengatakan pada atasan tugasnya terlalu berat', 5, '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(227, 47, 'Meminta keringanan', 4, '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(228, 47, 'Meminta rekan kerja membantu', 4, '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(229, 47, 'Berusaha menyelesaikan sebaik-baiknya', 3, '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(230, 47, 'Membiarkan, karena nantinya atasan pasti menyuruh orang lain membantu saya', 1, '2021-09-08 07:59:49', '2021-09-08 07:59:49'),
(231, 48, 'Suka menerima masukan demi masukan dalam rangka pengembangan tugas baru saya', 5, '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(232, 48, 'Membicarakan hal-hal lain yang tidak ada kaitanya dengan tugas baru saya', 3, '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(233, 48, 'Membatasi pembicaraan agar tidak menyangkut ke hal-hal tugas baru saya', 2, '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(234, 48, 'Akan merasa gelisah dan kurang senang bila mereka mulai membicarakan tugas baru', 1, '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(235, 48, 'Akan mengalihkan ke pembicaraan lain bila mereka sudah mulai menyinggung tugas baru saya', 4, '2021-09-08 08:03:47', '2021-09-08 08:03:47'),
(236, 49, 'Masuk keruangan dan membaca Koran', 3, '2021-09-08 08:06:27', '2021-09-08 08:06:27'),
(237, 49, 'Santai di luar gedung kantor untuk menikmati udara pagi', 2, '2021-09-08 08:06:28', '2021-09-08 08:06:28'),
(238, 49, 'Masuk keruangan dan mengobrol dengan rekan sejawat', 1, '2021-09-08 08:06:28', '2021-09-08 08:06:28'),
(239, 49, 'Masuk keruangan dan membuat rencana kerja', 5, '2021-09-08 08:06:28', '2021-09-08 08:06:28'),
(240, 49, 'Masuk keruangan dan memulai pekerjaan yang tertunda kemarin', 4, '2021-09-08 08:06:28', '2021-09-08 08:06:28'),
(241, 50, 'Pulang dengan diam diam, tanpa sepengetahuan pimpinan', 3, '2021-09-08 08:09:52', '2021-09-08 08:09:52'),
(242, 50, 'Berpura pura sakitagar dapat diizinkan untuk segera pulang', 2, '2021-09-08 08:09:52', '2021-09-08 08:09:52'),
(243, 50, 'Menghubungi anak saya menjelaskan agar naik taksi saja', 4, '2021-09-08 08:09:53', '2021-09-08 08:09:53'),
(244, 50, 'Bekerja lembur, karena yakin anak saya pasti memaklumi', 1, '2021-09-08 08:09:53', '2021-09-08 08:09:53'),
(245, 50, 'Meminta izin pimpinan mengantar anak saya kemudian kembali ke kantor untuk bekerja lembur', 5, '2021-09-08 08:09:53', '2021-09-08 08:09:53'),
(246, 51, 'Meninggalkan tugas begitu saja', 1, '2021-09-08 08:12:54', '2021-09-08 08:12:54'),
(247, 51, 'Berusaha mencari penyelesaian yang tidak membutuhkan waktu panjang', 4, '2021-09-08 08:12:54', '2021-09-08 08:12:54'),
(248, 51, 'Berusaha sedikit demi sedikit untuk menyelesaikan walau memakan waktu panjang ', 5, '2021-09-08 08:12:54', '2021-09-08 08:12:54'),
(249, 51, 'Meminta bantuan teman untuk menyelesaikan tugas itu', 3, '2021-09-08 08:12:55', '2021-09-08 08:12:55'),
(250, 51, 'Menyuruh teman menggantikan saya', 2, '2021-09-08 08:12:55', '2021-09-08 08:12:55'),
(251, 52, 'Pelayanya ramah dan cekatan', 5, '2021-09-08 08:14:26', '2021-09-08 08:14:26'),
(252, 52, 'Cepat membuat pesanan Anda', 4, '2021-09-08 08:14:26', '2021-09-08 08:14:26'),
(253, 52, 'Makananya enak walau lama', 3, '2021-09-08 08:14:26', '2021-09-08 08:14:26'),
(254, 52, 'Murah', 2, '2021-09-08 08:14:26', '2021-09-08 08:14:26'),
(255, 52, 'Mahal', 1, '2021-09-08 08:14:26', '2021-09-08 08:14:26'),
(256, 53, 'Stres', 2, '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(257, 53, 'Biasa-biasa saja', 5, '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(258, 53, 'Berusaha agar tetap tersenyum', 4, '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(259, 53, 'Marah dengan siapapun yang menemui Anda', 1, '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(260, 53, 'Membutuhkan waktu sendiri', 3, '2021-09-08 08:15:51', '2021-09-08 08:15:51'),
(261, 54, 'Eropa', 4, '2021-09-08 08:16:49', '2021-09-08 08:16:49'),
(262, 54, 'Singapura', 3, '2021-09-08 08:16:49', '2021-09-08 08:16:49'),
(263, 54, 'Jayapura', 5, '2021-09-08 08:16:49', '2021-09-08 08:16:49'),
(264, 54, 'Bali', 2, '2021-09-08 08:16:49', '2021-09-08 08:16:49'),
(265, 54, 'Rumah saja', 1, '2021-09-08 08:16:50', '2021-09-08 08:16:50'),
(266, 55, 'Mengungkapkan kesalahannya segera', 5, '2021-09-08 08:19:00', '2021-09-08 08:19:00'),
(267, 55, 'Terus mencari cara bagaimana cara memberitahunya', 2, '2021-09-08 08:19:00', '2021-09-08 08:19:00'),
(268, 55, 'Diam saja hingga ia sadar sendiri', 1, '2021-09-08 08:19:00', '2021-09-08 08:19:00'),
(269, 55, 'Meminta bantuan rekan lain yang lebih dekat kepadanya ', 3, '2021-09-08 08:19:00', '2021-09-08 08:19:00'),
(270, 55, 'Meminta bantuan atasan untuk menyampaikannya', 4, '2021-09-08 08:19:00', '2021-09-08 08:19:00');

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
