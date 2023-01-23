-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2022 pada 07.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelindo_master_truck_lm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nib_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_nib_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmku_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pmku_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statement_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `user_id`, `owner_name`, `contact`, `addr_company`, `nib_company`, `file_nib_company`, `npwp_company`, `file_npwp_company`, `pmku_company`, `file_pmku_company`, `pic_nama`, `pic_contact`, `email`, `statement_form`, `created_at`, `updated_at`) VALUES
(17, 17, 'ILCS', NULL, 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 'Dzulbihar', '089613658060', 'dzulbiharfer@gmail.com', NULL, '2022-10-23 10:33:17', '2022-10-23 10:33:17'),
(18, 18, 'PDS', '089613658060', 'Surabaya', '22222', '1666543139_(NIB) nomor induk berusaha.jpg', '22.222.222.2-222.222', '1666543139_(NPWP).jpg', '22222', '1666543139_(PMKU) pemberitahuan melakukan kegiatan usaha.jpeg', 'Isnan', '089613658060', 'pelindosemarang3@gmail.com', '1666543139_(SIUP) Surat Izin Usaha Perdagangan.jpg', '2022-10-23 10:34:47', '2022-10-23 16:38:59'),
(19, 19, 'BIMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'musicdunia98@gmail.com', NULL, '2022-10-23 14:03:17', '2022-10-23 14:03:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses Pengajuan',
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drive_license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_date` date NOT NULL,
  `display_cust` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `done` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `id_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INTPKS',
  `opername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done_date` date DEFAULT NULL,
  `ins_date` date DEFAULT NULL,
  `upd_ts` date DEFAULT NULL,
  `id_rfid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `remaks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statement_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sudah_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulus_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id`, `company_id`, `status`, `owner_name`, `email`, `pic_nama`, `name`, `nik`, `birthday`, `gender`, `addr`, `hp1`, `hp2`, `phone`, `fax`, `mobile`, `drive_license`, `valid_date`, `display_cust`, `done`, `id_license`, `id_customer`, `customer`, `site_id`, `opername`, `done_date`, `ins_date`, `upd_ts`, `id_rfid`, `remaks`, `statement_form`, `file_sim`, `file_ktp`, `file_foto`, `sudah_ujian`, `lulus_ujian`, `nilai_ujian`, `alasan_blokir`, `tanggal_blokir`, `nama_blokir`, `tanggal_pengajuan`, `tanggal_setujui`, `nama_setujui`, `created_at`, `updated_at`) VALUES
(5, 17, 'Sudah Disetujui', 'ILCS', 'dzulbiharfer@gmail.com', 'Dzulbihar', '33333', '33333', '2022-10-09', 'Laki-laki', '33333', '+6289613658060', NULL, NULL, NULL, NULL, '33333', '2022-10-16', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, '2022-10-23', NULL, '-', NULL, '1666530043_(HO) Surat Izin Gangguan HO.jpg', '1666530043_SIM A truk.jpeg', '1666530043_KTP.jpg', '1666530043_foto1.jpg', 'Sudah Ujian', 'Lulus Ujian', '90', 'malas', '', '', '2022-10-23 20:00:43', '2022-10-23 20:06:56', 'Admin TPKS', '2022-10-23 13:06:15', '2022-10-23 13:20:46'),
(6, 18, 'Diblokir', 'PDS', 'pelindosemarang3@gmail.com', 'Isnan', '44444', '44444', '2022-10-16', 'Laki-laki', '44444', '+6289613658060', NULL, NULL, NULL, NULL, '44444', '2022-10-16', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, '-', NULL, '1666530129_(NIB) nomor induk berusaha.jpg', '1666530129_SIM A truk.jpeg', '1666530129_KTP.jpg', '1666530129_foto2.jpg', NULL, NULL, NULL, 'salah', '2022-10-24 15:25:07', 'Admin TPKS', '2022-10-23 20:02:09', '2022-10-24 15:24:55', 'Admin TPKS', '2022-10-23 13:02:09', '2022-10-24 08:25:07'),
(7, 18, 'Proses Pengajuan', 'PDS', 'pelindosemarang3@gmail.com', 'Isnan', '66666', '66666', '2022-09-29', 'Laki-laki', '66666', '+6289613658060', NULL, NULL, NULL, NULL, '66666', '2022-10-24', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, '-', NULL, '1666599222_(HO) Surat Izin Gangguan HO.jpg', '1666599222_SIM A truk.jpeg', '1666599222_KTP.jpg', '1666599222_foto2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 15:13:42', NULL, NULL, '2022-10-24 08:13:42', '2022-10-24 08:13:42'),
(8, 18, 'Sudah Disetujui', 'PDS', 'pelindosemarang3@gmail.com', 'Isnan', '88888', '88888', '2022-10-01', 'Laki-laki', '88888', '+6298613658060', NULL, NULL, NULL, NULL, '88888', '2022-10-14', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, '-', NULL, '1666599302_(PMKU) pemberitahuan melakukan kegiatan usaha.jpeg', '1666599303_SIM A truk.jpeg', '1666599303_KTP.jpg', '1666599303_foto1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 15:15:02', '2022-10-24 15:25:23', 'Admin TPKS', '2022-10-24 08:15:02', '2022-10-24 08:25:23'),
(10, 18, 'Proses Pengajuan', 'PDS', 'pelindosemarang3@gmail.com', 'Isnan', '00000', '00000', '2022-10-14', 'Laki-laki', '00000', '+6280613658060', NULL, NULL, NULL, NULL, '00000', '2022-10-15', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, '-', NULL, '1666599561_(HO) Surat Izin Gangguan HO.jpg', '1666599561_SIM A truk.jpeg', '1666599562_KTP.jpg', '1666599562_foto1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 15:19:21', NULL, NULL, '2022-10-24 08:19:21', '2022-10-24 08:19:22'),
(11, 18, 'Proses Pengajuan', 'PDS', 'pelindosemarang3@gmail.com', 'Isnan', '22222', '22222', '2022-09-28', 'Laki-laki', '222224', '+628913658060_', NULL, NULL, NULL, NULL, '22222', '2022-10-08', 'Y', 'N', NULL, NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, '-', NULL, '1666599632_(NIB) nomor induk berusaha.jpg', '1666600435_(HO) Surat Izin Gangguan HO.jpg', '1666599632_KTP.jpg', '1666599632_foto2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 15:20:32', NULL, NULL, '2022-10-24 08:20:32', '2022-10-24 08:33:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver_history`
--

CREATE TABLE `driver_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penghapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_dihapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drive_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `display_cust` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done_date` date DEFAULT NULL,
  `ins_date` date DEFAULT NULL,
  `upd_ts` date DEFAULT NULL,
  `id_rfid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statement_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sudah_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulus_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pengambilan_rfid_tag`
--

CREATE TABLE `jadwal_pengambilan_rfid_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rfid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Diambil',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_pengambilan_rfid_tag`
--

INSERT INTO `jadwal_pengambilan_rfid_tag` (`id`, `owner_name`, `pic_nama`, `email`, `police_no`, `id_rfid`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ILCS', 'Dzulbihar', 'dzulbiharfer@gmail.com', '11111', '82983t129', '2022-10-23', 'Sudah Diambil', '2022-10-23 11:36:37', '2022-10-23 11:36:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drive_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Ujian',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id`, `owner_name`, `pic_nama`, `email`, `name`, `drive_license`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ILCS', 'Dzulbihar', 'dzulbiharfer@gmail.com', '33333', '33333', '2022-10-23', 'Belum Ujian', '2022-10-23 13:08:47', '2022-10-23 13:08:47'),
(4, 'ILCS', 'Dzulbihar', 'dzulbiharfer@gmail.com', '33333', '33333', '2022-11-05', 'Sudah Ujian', '2022-10-23 13:11:30', '2022-10-23 13:11:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_ujians`
--

CREATE TABLE `materi_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi_ujians`
--

INSERT INTO `materi_ujians` (`id`, `nama_pertanyaan`, `isi_pertanyaan`, `lampiran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Identitas Lengkap', 'Identitas Lengkap', 'Tidak', 'Aktif', '2022-10-18 08:22:46', '2022-10-18 08:24:25'),
(2, 'Pengalaman Kerja', 'Pengalaman Kerja', 'Ya', 'Aktif', '2022-10-18 08:22:57', '2022-10-18 08:24:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_09_22_183534_create_company_table', 1),
(5, '2022_09_22_183551_create_truck_table', 1),
(6, '2022_09_22_183618_create_truck_history_table', 1),
(7, '2022_09_22_183649_create_driver_table', 1),
(8, '2022_09_22_183740_create_driver_history_table', 1),
(9, '2022_09_22_183751_create_violations_table', 1),
(10, '2022_09_22_183814_create_violations_history_table', 1),
(11, '2022_09_22_183836_create_ms_chassis_code_table', 1),
(12, '2022_09_22_183854_create_ms_kota_table', 1),
(13, '2022_09_22_183905_create_ms_merk_table', 1),
(14, '2022_09_22_183924_create_ms_jenis_pelanggaran_table', 1),
(15, '2022_09_22_183938_create_ms_bentuk_pelanggaran_table', 1),
(16, '2022_09_22_183953_create_ms_email_table', 1),
(17, '2022_09_22_184004_create_jadwal_ujian_table', 1),
(18, '2022_09_22_184016_create_jadwal_pengambilan_rfid_tag_table', 1),
(19, '2022_09_22_184028_create_materi_ujians_table', 1),
(20, '2022_09_22_184042_create_proses_ujians_table', 1),
(21, '2022_09_22_184052_create_w_a_jadwal_ujians_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_bentuk_pelanggaran`
--

CREATE TABLE `ms_bentuk_pelanggaran` (
  `bentuk_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_bentuk_pelanggaran`
--

INSERT INTO `ms_bentuk_pelanggaran` (`bentuk_pelanggaran`, `bentuk_jenis`, `status`, `created_at`, `updated_at`) VALUES
('Turun dari kabin tanpa APD', 'Ringan', 'Aktif', '2022-10-22 14:18:05', '2022-10-22 14:18:05'),
('Membawa kernet di dalam kabin', 'Ringan', 'Aktif', '2022-10-22 14:18:16', '2022-10-22 14:18:16'),
('Merokok', 'Ringan', 'Aktif', '2022-10-22 14:18:26', '2022-10-22 14:18:26'),
('Membuang sampah di sembarang tempat', 'Ringan', 'Aktif', '2022-10-22 14:18:40', '2022-10-22 14:18:40'),
('Melawan petugas', 'Berat', 'Aktif', '2022-10-22 14:18:54', '2022-10-22 14:18:54'),
('Memainkan hp saat mengemudi', 'Berat', 'Aktif', '2022-10-22 14:19:08', '2022-10-22 14:19:08'),
('Menabrak petugas, alat atau fasilitas yang mengakibatkan korban jiwa dan/atau kerusakan berat', 'Berat', 'Aktif', '2022-10-22 14:19:17', '2022-10-22 14:19:17'),
('Melawan / memotong arus', 'Berat', 'Aktif', '2022-10-22 14:19:30', '2022-10-22 14:19:30'),
('Menyenggol / menyerempet alat atau fasilitas yang mengakibatkan kerusakan', 'Berat', 'Aktif', '2022-10-22 14:19:41', '2022-10-22 14:19:41'),
('Mengunggah dokumentasi baik foto atau video ke media social tanpa seizin managemen TPKS', 'Berat', 'Aktif', '2022-10-22 14:19:53', '2022-10-22 14:19:53'),
('Mengkonsumsi alcohol', 'Berat', 'Aktif', '2022-10-22 14:20:03', '2022-10-22 14:20:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_chassis_code`
--

CREATE TABLE `ms_chassis_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_chassis_code`
--

INSERT INTO `ms_chassis_code` (`id`, `chassis`, `status`, `created_at`, `updated_at`) VALUES
(1, '20', 'Aktif', '2022-10-05 05:49:27', '2022-10-05 05:49:27'),
(2, '40', 'Aktif', '2022-10-05 05:49:33', '2022-10-05 05:49:33'),
(3, '20/40', 'Aktif', '2022-10-05 05:49:41', '2022-10-05 05:49:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_email`
--

CREATE TABLE `ms_email` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat_email_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengirim_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_rfid_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_rfid_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_rfid_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_rfid_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_rfid_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_jadwal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_jadwal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_jadwal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_jadwal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_jadwal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_user_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_user_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_user_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_user_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_user_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_user_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_user_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_user_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_user_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_user_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_user_tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_user_tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_user_tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_user_tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_user_tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_user_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_user_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_user_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_user_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_user_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_user_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_user_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_user_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_user_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_user_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_truck_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_truck_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_truck_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_truck_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_truck_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_daftar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_approve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_delete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_block` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek_driver_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_driver_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_1_driver_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_2_driver_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_driver_unblock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_email`
--

INSERT INTO `ms_email` (`id`, `alamat_email_admin`, `nama_pengirim_admin`, `subjek_rfid_tag`, `header_rfid_tag`, `body_1_rfid_tag`, `body_2_rfid_tag`, `footer_rfid_tag`, `subjek_jadwal_ujian`, `header_jadwal_ujian`, `body_1_jadwal_ujian`, `body_2_jadwal_ujian`, `footer_jadwal_ujian`, `subjek_user_daftar`, `header_user_daftar`, `body_1_user_daftar`, `body_2_user_daftar`, `footer_user_daftar`, `subjek_user_aktif`, `header_user_aktif`, `body_1_user_aktif`, `body_2_user_aktif`, `footer_user_aktif`, `subjek_user_tidak_aktif`, `header_user_tidak_aktif`, `body_1_user_tidak_aktif`, `body_2_user_tidak_aktif`, `footer_user_tidak_aktif`, `subjek_user_block`, `header_user_block`, `body_1_user_block`, `body_2_user_block`, `footer_user_block`, `subjek_user_unblock`, `header_user_unblock`, `body_1_user_unblock`, `body_2_user_unblock`, `footer_user_unblock`, `subjek_truck_daftar`, `header_truck_daftar`, `body_1_truck_daftar`, `body_2_truck_daftar`, `footer_truck_daftar`, `subjek_truck_approve`, `header_truck_approve`, `body_1_truck_approve`, `body_2_truck_approve`, `footer_truck_approve`, `subjek_truck_reject`, `header_truck_reject`, `body_1_truck_reject`, `body_2_truck_reject`, `footer_truck_reject`, `subjek_truck_delete`, `header_truck_delete`, `body_1_truck_delete`, `body_2_truck_delete`, `footer_truck_delete`, `subjek_truck_block`, `header_truck_block`, `body_1_truck_block`, `body_2_truck_block`, `footer_truck_block`, `subjek_truck_unblock`, `header_truck_unblock`, `body_1_truck_unblock`, `body_2_truck_unblock`, `footer_truck_unblock`, `subjek_driver_daftar`, `header_driver_daftar`, `body_1_driver_daftar`, `body_2_driver_daftar`, `footer_driver_daftar`, `subjek_driver_approve`, `header_driver_approve`, `body_1_driver_approve`, `body_2_driver_approve`, `footer_driver_approve`, `subjek_driver_reject`, `header_driver_reject`, `body_1_driver_reject`, `body_2_driver_reject`, `footer_driver_reject`, `subjek_driver_delete`, `header_driver_delete`, `body_1_driver_delete`, `body_2_driver_delete`, `footer_driver_delete`, `subjek_driver_block`, `header_driver_block`, `body_1_driver_block`, `body_2_driver_block`, `footer_driver_block`, `subjek_driver_unblock`, `header_driver_unblock`, `body_1_driver_unblock`, `body_2_driver_unblock`, `footer_driver_unblock`, `created_at`, `updated_at`) VALUES
(1, 'ahmad.dzulbihar69@gmail.com', 'TPKS', 'Jadwal Pengambilan RFID tag', 'Jadwal Pengambilan RFID tag', 'Diberitahukan kepada perusahaan, bahwa RFID Anda sudah kami tambahkan.', 'Kemudian untuk penjadwalan pengambilan RFID tag bisa diambil pada tanggal:', 'Pelindo III, Wilayah Jawa Tengah', 'Jadwal Ujian Driver', 'Jadwal Ujian Driver', 'Diberitahukan kepada perusahaan, bahwa Data  Anda sudah kami tambahkan.', 'Kemudian untuk penjadwalan ujian driver bisa dilaksanakan pada tanggal:', 'Pelindo III, Wilayah Jawa Tengah', 'Pendaftaran Akun User', 'Pendaftaran Akun User', 'Perusahaan baru telah melakukan pendaftaran Akun', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/master_user', 'Pelindo III, Wilayah Jawa Tengah', 'Persetujuan Akun User', 'Persetujuan Akun User', 'Akun Anda sudah terverifikasi, silakan bisa menggunakan akun Anda', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Persetujuan Akun User', 'Pembatalan Persetujuan Akun User', 'Akun Anda batal terverifikasi, silakan menunggu persetujuan Admin kembali', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pemblokiran Akun User', 'Pemblokiran Akun User', 'Akun Anda sudah terblokir, silakan hubungi Admin untuk informasi lebih lanjut', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Pemblokiran Akun User', 'Pembatalan Pemblokiran Akun User', 'Akun Anda batal terblokir, silakan bisa menggunakan akun Anda kembali', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pendaftaran Truk', 'Pendaftaran Truk', 'Perusahaan baru telah melakukan pengajuan pendaftarkan RFID Truk Trailer', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/master_truck', 'Pelindo III, Wilayah Jawa Tengah', 'Persetujuan Truk', 'Persetujuan Truk', 'Pemberitahuan bahwa Pendaftaran Truk Anda sudah kami setujui', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Persetujuan Truk', 'Pembatalan Persetujuan Truk', 'Pemberitahuan bahwa Pendaftaran Truk Anda batal kami setujui', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Penghapusan Truk', 'Penghapusan Truk', 'Pemberitahuan bahwa Data Truk Anda telah kami hapus', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pemblokiran Truk', 'Pemblokiran Truk', 'Pemberitahuan bahwa Data Truk Anda sudah kami blokir', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Pemblokiran Truk', 'Pembatalan Pemblokiran Truk', 'Pemberitahuan bahwa Data Truk Anda sudah kami aktifkan kembali', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pendaftaran Driver', 'Pendaftaran Driver', 'Perusahaan baru telah melakukan pengajuan pendaftarkan Driver Eksternal', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/master_driver', 'Pelindo III, Wilayah Jawa Tengah', 'Persetujuan Driver', 'Persetujuan Driver', 'Pemberitahuan bahwa Pendaftaran Driver Anda sudah kami setujui', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Persetujuan Driver', 'Pembatalan Persetujuan Driver', 'Pemberitahuan bahwa Pendaftaran Driver Anda batal kami setujui', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Penghapusan Driver', 'Penghapusan Driver', 'Pemberitahuan bahwa Data Driver Anda telah kami hapus', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pemblokiran Driver', 'Pemblokiran Driver', 'Pemberitahuan bahwa Data Driver Anda sudah kami blokir', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', 'Pembatalan Pemblokiran Driver', 'Pembatalan Pemblokiran Driver', 'Pemberitahuan bahwa Data Driver Anda sudah kami aktifkan kembali', 'periksa lebih lanjut http://localhost:8080/vbs_oracle/home', 'Pelindo III, Wilayah Jawa Tengah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jenis_pelanggaran`
--

CREATE TABLE `ms_jenis_pelanggaran` (
  `jenis_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_jenis_pelanggaran`
--

INSERT INTO `ms_jenis_pelanggaran` (`jenis_pelanggaran`, `status`, `created_at`, `updated_at`) VALUES
('Berat', 'Aktif', '2022-10-22 14:11:50', '2022-10-22 14:11:50'),
('Ringan', 'Aktif', '2022-10-22 14:13:07', '2022-10-22 14:13:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kota`
--

CREATE TABLE `ms_kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_kota`
--

INSERT INTO `ms_kota` (`id`, `kota`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', 'Aktif', '2022-10-05 05:18:30', '2022-10-05 05:18:30'),
(2, 'Surabaya', 'Aktif', '2022-10-05 05:18:40', '2022-10-05 05:18:40'),
(3, 'Semarang', 'Aktif', '2022-10-05 05:18:56', '2022-10-05 05:18:56'),
(4, 'Makasar', 'Aktif', '2022-10-05 05:19:03', '2022-10-05 05:19:03'),
(5, 'Banten', 'Aktif', '2022-10-05 05:19:10', '2022-10-05 05:19:10'),
(6, 'Medan', 'Aktif', '2022-10-05 05:19:16', '2022-10-05 05:19:16'),
(7, 'Balikpapan', 'Aktif', '2022-10-05 05:19:25', '2022-10-05 05:19:25'),
(8, 'Kendari', 'Aktif', '2022-10-05 05:19:42', '2022-10-05 05:19:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_merk`
--

CREATE TABLE `ms_merk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_merk`
--

INSERT INTO `ms_merk` (`id`, `kode_item`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quester', 'Quester', 'Aktif', '2022-10-05 05:06:10', '2022-10-05 05:06:29'),
(2, 'Mitsubishi', 'Mitsubishi', 'Aktif', '2022-10-05 05:06:21', '2022-10-05 05:06:21'),
(3, 'Hino', 'Hino', 'Aktif', '2022-10-05 05:06:37', '2022-10-05 05:06:37'),
(4, 'Tata', 'Tata', 'Aktif', '2022-10-05 05:06:45', '2022-10-05 05:06:45'),
(5, 'Volvo', 'Volvo', 'Aktif', '2022-10-05 05:06:55', '2022-10-05 05:06:55'),
(6, 'Isuzu', 'Isuzu', 'Aktif', '2022-10-05 05:07:03', '2022-10-05 05:07:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmad.dzulbihar69@gmail.com', '$2y$10$7WmXt0ZxP1Ztk6YalBjZreCEJAg4GOTT.vzY35Bz.0cbUcr1Anq5e', '2022-10-02 02:57:51'),
('dzulbiharfer@gmail.com', '$2y$10$JjqwEFbBQHNvxjul.3Zj1O.qnz4E1lN0GBqp6du2.NJu2fSqZAh0u', '2022-10-02 03:02:09'),
('pelindosemarang3@gmail.com', '$2y$10$JmeqN7AxywBb6wOYm8F5TutTSUD414H1OOoGuXWhNWjPKB5ZKQn.6', '2022-10-23 10:41:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_ujians`
--

CREATE TABLE `proses_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `truck`
--

CREATE TABLE `truck` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses Pengajuan',
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stnk_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_lisence` date NOT NULL,
  `foto_stnk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_made` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truck_weight` int(11) NOT NULL,
  `foto_truck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kir_truck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis_weight` int(11) NOT NULL,
  `foto_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kir_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INTPKS',
  `truck_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upd_ts` date DEFAULT NULL,
  `opername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_weiht_ht_ch` int(11) DEFAULT NULL,
  `bbg_yn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `otl_yn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `id_rfid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `alasan_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `truck`
--

INSERT INTO `truck` (`id`, `company_id`, `status`, `owner_name`, `pic_nama`, `email`, `police_no`, `stnk_no`, `machine_no`, `design_no`, `expired_lisence`, `foto_stnk`, `trade_mark`, `year_made`, `state`, `truck_weight`, `foto_truck`, `foto_kir_truck`, `chassis_code`, `jenis_chassis`, `chassis_weight`, `foto_chassis`, `foto_kir_chassis`, `id_customer`, `customer`, `site_id`, `truck_code`, `upd_ts`, `opername`, `gate_no`, `total_weiht_ht_ch`, `bbg_yn`, `otl_yn`, `id_rfid`, `alasan_blokir`, `tanggal_blokir`, `nama_blokir`, `tanggal_pengajuan`, `tanggal_setujui`, `nama_setujui`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 17, 'Proses Pengajuan', 'ILCS', 'Dzulbihar', 'dzulbiharfer@gmail.com', '11111', '11111', '11111', '11111', '2022-10-16', '1666524514_STNK truck.jpg', 'Quester', '11111', 'Jakarta', 11111, '1666524514_Head Truk.jpg', '1666524514_KIR Truk.jpg', '20', '20', 11111, '1666524514_Chasis Truk.jpg', '1666524619_(PMKU) pemberitahuan melakukan kegiatan usaha.jpeg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, NULL, 'N', 'N', '-', 'malas', '', '', '2022-10-23 18:28:34', '', '', '2022-10-23 11:34:05', '2022-10-23 11:36:06', NULL),
(7, 18, 'Sudah Disetujui', 'PDS', 'Isnan', 'pelindosemarang3@gmail.com', '44444', '44444', '44444', '44444', '2022-10-24', '1666570336_STNK truck.jpg', 'Quester', '44444', 'Jakarta', 44444, '1666570336_Head Truk.jpg', '1666570336_KIR Truk.jpg', '20', '20', 44444, '1666570336_Chasis Truk.jpg', '1666570336_KIR Truk.jpg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, NULL, 'N', 'N', '875186732', 'salah', '', '', '2022-10-24 07:12:16', '2022-10-24 10:21:57', 'Admin TPKS', '2022-10-24 00:12:16', '2022-10-24 03:22:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `truck_history`
--

CREATE TABLE `truck_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penghapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_dihapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stnk_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `machine_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_lisence` date DEFAULT NULL,
  `foto_stnk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_made` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truck_weight` int(11) DEFAULT NULL,
  `foto_truck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kir_truck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chassis_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_chassis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chassis_weight` int(11) DEFAULT NULL,
  `foto_chassis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kir_chassis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truck_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upd_ts` date DEFAULT NULL,
  `opername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_weiht_ht_ch` int(11) DEFAULT NULL,
  `bbg_yn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otl_yn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rfid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_setujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `truck_history`
--

INSERT INTO `truck_history` (`id`, `penghapus`, `alasan_dihapus`, `company_id`, `status`, `owner_name`, `pic_nama`, `email`, `police_no`, `stnk_no`, `machine_no`, `design_no`, `expired_lisence`, `foto_stnk`, `trade_mark`, `year_made`, `state`, `truck_weight`, `foto_truck`, `foto_kir_truck`, `chassis_code`, `jenis_chassis`, `chassis_weight`, `foto_chassis`, `foto_kir_chassis`, `id_customer`, `customer`, `site_id`, `truck_code`, `upd_ts`, `opername`, `gate_no`, `total_weiht_ht_ch`, `bbg_yn`, `otl_yn`, `id_rfid`, `alasan_blokir`, `tanggal_blokir`, `nama_blokir`, `tanggal_pengajuan`, `tanggal_setujui`, `nama_setujui`, `created_at`, `updated_at`) VALUES
(5, 'PDS', 'Dihapus User', 18, 'Sudah Disetujui', 'PDS', 'Isnan', 'pelindosemarang3@gmail.com', '22222', '22222', '22222', '22222', '2022-10-23', '1666524576_STNK truck.jpg', 'Quester', '22222', 'Surabaya', 22222, '1666524576_Head Truk.jpg', '1666524576_KIR Truk.jpg', '20', '20', 22222, '1666524576_Chasis Truk.jpg', '1666524576_KIR Truk.jpg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'lupa', NULL, NULL, NULL, '2022-10-23 18:29:36', '2022-10-23 20:25:52', 'Admin TPKS', '2022-10-24 03:35:57', '2022-10-24 03:35:57'),
(8, 'PDS', 'Dihapus User', 18, 'Proses Pengajuan', 'PDS', 'Isnan', 'pelindosemarang3@gmail.com', '66666', '66666', '66666', '66666', '2022-10-24', '1666570395_STNK truck.jpg', 'Quester', '66666', 'Jakarta', 66666, '1666570396_Head Truk.jpg', '1666570396_KIR Truk.jpg', '20', '20', 66666, '1666570396_Chasis Truk.jpg', '1666581944_(HO) Surat Izin Gangguan HO.jpg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, '11111', NULL, 'N', 'N', '-', NULL, NULL, NULL, '2022-10-24 07:13:15', NULL, NULL, '2022-10-24 03:34:16', '2022-10-24 03:34:16'),
(9, 'PDS', 'Dihapus User', 18, 'Proses Pengajuan', 'PDS', 'Isnan', 'pelindosemarang3@gmail.com', '88888', '88888', '88888', '88888', '2022-10-24', '1666570459_STNK truck.jpg', 'Quester', '88888', 'Jakarta', 88888, '1666570459_Head Truk.jpg', '1666570459_KIR Truk.jpg', '20', '20', 88888, '1666570459_Chasis Truk.jpg', '1666570459_KIR Truk.jpg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, NULL, 'N', 'N', '-', NULL, NULL, NULL, '2022-10-24 07:14:19', NULL, NULL, '2022-10-24 03:34:43', '2022-10-24 03:34:43'),
(12, 'PDS', 'Dihapus User', 18, 'Proses Pengajuan', 'PDS', 'Isnan', 'pelindosemarang3@gmail.com', '00000', '00000', '00000', '00000', '2022-10-24', '1666580582_STNK truck.jpg', 'Quester', '00000', 'Jakarta', 0, '1666580582_Head Truk.jpg', '1666580582_KIR Truk.jpg', '20', '20', 0, '1666580582_Chasis Truk.jpg', '1666580582_KIR Truk.jpg', NULL, NULL, 'INTPKS', NULL, NULL, NULL, NULL, NULL, 'N', 'N', '-', NULL, NULL, NULL, '2022-10-24 10:03:02', NULL, NULL, '2022-10-24 03:33:15', '2022-10-24 03:33:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_blokir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_disetujui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disetujui_oleh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `owner_name`, `status`, `email`, `email_verified_at`, `password`, `password2`, `alasan_blokir`, `tgl_pengajuan`, `tgl_disetujui`, `disetujui_oleh`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin TPKS', 'Aktif', 'ahmad.dzulbihar69@gmail.com', NULL, '$2y$10$0pZ6u7FK8WJHhvZTeBUwJegsBkLDOpZPBJX4YlnAufQSH2RC4oG1O', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-24 01:42:21', '2022-09-24 01:42:21'),
(17, 'user', 'ILCS', 'Aktif', 'dzulbiharfer@gmail.com', NULL, '$2y$10$jhUJNqrPH3irSe4tbRX2WeIs7BePEKaLwpWo2CA30kUj3PNmiqgxG', '$2y$10$vci0IrnJcToWVtth5KkiKOAzSXNSkwNWYrCNw.t2vqGiXziWh71Ze', '', '2022-10-23 17:33:17', '2022-10-23 21:00:37', 'Admin TPKS', NULL, '2022-10-23 10:33:17', '2022-10-23 13:51:32'),
(18, 'user', 'PDS', 'Aktif', 'pelindosemarang3@gmail.com', NULL, '$2y$10$Jhys5dldz4jv4sL6/W8IleWB6lUKtnFiypjZ9f0cUex.Dk.jMwpxi', '$2y$10$lh53PUz50pHIMB4pyHyzdOYBMGvyvLCw9nFVDu0YPLtKam5TWssjq', NULL, '2022-10-23 17:34:47', '2022-10-23 23:59:21', 'Admin TPKS', NULL, '2022-10-23 10:34:47', '2022-10-23 14:02:27'),
(19, 'admin', 'BIMA', 'Aktif', 'musicdunia98@gmail.com', NULL, '$2y$10$AfNsW9lC8Rm4JjvkBdR4Hu4MwKJbEoN9/ytqacH4x.nbYSi4pX2jq', '$2y$10$0.UySTko0ZszQlH8Lbt5sep21fOenVuqC47ffVSyvazP92gahuQ3G', NULL, '2022-10-23 21:03:17', NULL, NULL, NULL, '2022-10-23 14:03:17', '2022-10-23 14:03:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `violations`
--

CREATE TABLE `violations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentuk_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_kejadian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `violations`
--

INSERT INTO `violations` (`id`, `driver_id`, `nama_perusahaan`, `nama_driver`, `bentuk_pelanggaran`, `jenis_pelanggaran`, `alasan`, `kapan`, `dimana`, `jumlah_kejadian`, `pelanggaran`, `foto`, `police_no`, `created_at`, `updated_at`) VALUES
(7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-23 13:00:43', '2022-10-23 13:00:43'),
(8, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-23 13:02:09', '2022-10-23 13:02:09'),
(9, 5, 'ILCS', '33333', 'Turun dari kabin tanpa APD', 'Ringan', 'lupa', '2022-10-23T20:21', 'dermaga', NULL, NULL, NULL, '11111', '2022-10-23 13:21:50', '2022-10-23 13:21:50'),
(11, 5, 'ILCS', '33333', 'Merokok', 'Ringan', 'lupa', '2022-10-28T20:22', 'dermaga', NULL, NULL, NULL, '11111', '2022-10-23 13:22:32', '2022-10-23 13:22:32'),
(12, 5, 'ILCS', '33333', 'Menabrak petugas, alat atau fasilitas yang mengakibatkan korban jiwa dan/atau kerusakan berat', 'Berat', 'lupa', '2022-10-23T20:22', 'dermaga', NULL, NULL, NULL, '11111', '2022-10-23 13:22:57', '2022-10-23 13:22:57'),
(13, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-24 08:13:42', '2022-10-24 08:13:42'),
(14, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-24 08:15:03', '2022-10-24 08:15:03'),
(15, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-24 08:16:48', '2022-10-24 08:16:48'),
(16, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-24 08:19:22', '2022-10-24 08:19:22'),
(17, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggaran', NULL, NULL, '2022-10-24 08:20:32', '2022-10-24 08:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `violations_history`
--

CREATE TABLE `violations_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penghapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_dihapus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentuk_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_kejadian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `violations_history`
--

INSERT INTO `violations_history` (`id`, `penghapus`, `alasan_dihapus`, `driver_id`, `nama_perusahaan`, `nama_driver`, `bentuk_pelanggaran`, `jenis_pelanggaran`, `alasan`, `kapan`, `dimana`, `jumlah_kejadian`, `pelanggaran`, `foto`, `police_no`, `created_at`, `updated_at`) VALUES
(10, 'Admin TPKS', 'Salah ketik', 5, 'ILCS', '33333', 'Membawa kernet di dalam kabin', 'Ringan', 'lupa', '2022-10-23T20:22', 'dernaga', NULL, NULL, NULL, '11111', '2022-10-23 13:23:13', '2022-10-23 13:23:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `w_a_jadwal_ujians`
--

CREATE TABLE `w_a_jadwal_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `driver_history`
--
ALTER TABLE `driver_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_pengambilan_rfid_tag`
--
ALTER TABLE `jadwal_pengambilan_rfid_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi_ujians`
--
ALTER TABLE `materi_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_chassis_code`
--
ALTER TABLE `ms_chassis_code`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_email`
--
ALTER TABLE `ms_email`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_kota`
--
ALTER TABLE `ms_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_merk`
--
ALTER TABLE `ms_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `proses_ujians`
--
ALTER TABLE `proses_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `truck_history`
--
ALTER TABLE `truck_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `violations_history`
--
ALTER TABLE `violations_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `w_a_jadwal_ujians`
--
ALTER TABLE `w_a_jadwal_ujians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `driver`
--
ALTER TABLE `driver`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `driver_history`
--
ALTER TABLE `driver_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pengambilan_rfid_tag`
--
ALTER TABLE `jadwal_pengambilan_rfid_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `materi_ujians`
--
ALTER TABLE `materi_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `ms_chassis_code`
--
ALTER TABLE `ms_chassis_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_email`
--
ALTER TABLE `ms_email`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ms_kota`
--
ALTER TABLE `ms_kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ms_merk`
--
ALTER TABLE `ms_merk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proses_ujians`
--
ALTER TABLE `proses_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `truck`
--
ALTER TABLE `truck`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `truck_history`
--
ALTER TABLE `truck_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `violations`
--
ALTER TABLE `violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `violations_history`
--
ALTER TABLE `violations_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `w_a_jadwal_ujians`
--
ALTER TABLE `w_a_jadwal_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
