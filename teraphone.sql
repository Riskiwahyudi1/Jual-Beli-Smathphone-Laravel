-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2024 pada 16.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teraphone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Gaming Smarthone', 'gaming-smartphone', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(2, 'Flagship Smatphone', 'flagship-smarthphone', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(3, 'Camera Quality', 'camera-quality', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(4, 'Mid Range', 'mid-range', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(5, 'Low Range', 'low-range', '2024-06-12 13:23:38', '2024-06-12 13:23:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `produk_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-06-12 14:00:28', '2024-06-12 14:00:28'),
(3, 3, 1, '2024-06-12 14:54:43', '2024-06-12 14:54:43'),
(4, 1, 1, '2024-06-12 15:10:06', '2024-06-12 15:10:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_04_224023_create_produks_table', 1),
(6, '2024_04_06_074726_create_kategoris_table', 1),
(7, '2024_04_09_145342_create_transaksis_table', 1),
(8, '2024_05_07_152155_create_keranjangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `user_id`, `nama_produk`, `deskripsi`, `harga`, `stok`, `terjual`, `diskon`, `brand`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Non quam aut.', '<p>Maxime voluptas sunt suscipit totam. Perferendis nihil ab consectetur alias. Modi nisi corporis laborum voluptate magnam. Error quasi necessitatibus aut velit hic et aut et.<p></p>Praesentium ut voluptates odit. Porro est odio est rem tempora similique deserunt ut. Ex blanditiis architecto qui et vel. Magni et alias neque explicabo minus harum. Qui placeat rem ut provident.<p></p>Aliquid et ipsum architecto neque. Maxime maxime ut non ut facilis mollitia deserunt. Aut molestias facilis dolore quo commodi ipsum qui consectetur.<p></p>Est ea facilis ipsum. Maxime et quas velit.<p></p>Aut voluptates incidunt tempora voluptatum voluptates. Hic et aut ea expedita enim. Minus rerum non at quia.<p></p>Tempore in eaque adipisci explicabo beatae dolorem quis. Impedit delectus ullam repellendus. Et aut et possimus occaecati.<p></p>Autem eos voluptate aliquam non. Enim sequi vel distinctio hic libero. Aut tempora cum dolorum libero facere magni molestiae quis.<p></p>Molestiae fugit officiis expedita tempora aliquam. Porro dolor nesciunt voluptate quo quo. Odit nemo corrupti quo officia fugit iusto officia. Voluptatem optio eligendi quos aspernatur impedit odio fuga.<p></p>Debitis quam natus in officia. Aspernatur vitae id possimus corporis quod. Quo sint doloribus in soluta minima. Placeat non eos excepturi iure vel ut occaecati.', '580940', 446, 6702, 10, 'Xiomi', '[\"1Poco102.jpg\", \"2Poco102.jpg\", \"3Poco102.jpg\", \"4Poco102.jpg\", \"5Poco102.jpg\"]\r\n', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(2, 3, 1, 'In debitis nihil aut et.', '<p>Id fugiat et rerum fugiat tenetur voluptatem. Minus voluptates ut maxime et vel ad. Excepturi omnis iusto rerum corrupti ut. Quo nesciunt repudiandae odit voluptatibus ipsam accusamus voluptatem.<p></p>Totam doloribus officia velit libero. Modi iste harum et necessitatibus. Totam sunt quia ea nihil laudantium ratione ab.<p></p>Modi sunt doloremque quas ut repudiandae corporis voluptate. Dolor praesentium nobis fugiat dolorem id quam quasi asperiores. Fuga et a praesentium dolores amet voluptas.<p></p>Et quis culpa rem consequatur. Nobis ad officia officiis corporis culpa rem. Ab harum impedit recusandae rerum quo facilis.<p></p>Quasi eius aperiam nihil illo. Commodi quisquam qui veniam consequatur. Repudiandae suscipit ea non eum. Officia nobis sint ipsam rerum excepturi ipsum. Mollitia nobis aut veritatis.<p></p>Inventore dolore nulla velit est distinctio temporibus. Aut quos ut dolore commodi voluptates necessitatibus harum. Labore atque minus quam libero aut ipsam. Deleniti nobis aut tenetur quos. Ut natus porro est nobis.<p></p>Et eos expedita at iusto sunt. Reprehenderit eum voluptatem facere. Ipsum quo harum saepe aut.<p></p>Atque ut eum repudiandae aut animi. Maiores qui eaque consectetur sed et. Consequatur sit doloremque quisquam voluptatem nulla molestiae. Et consequuntur perspiciatis quasi voluptatem eos voluptas.', '4885740', 629, 6364, 74, 'Asus', '[\"1Poco102.jpg\", \"2Poco102.jpg\", \"3Poco102.jpg\", \"4Poco102.jpg\", \"5Poco102.jpg\"]\r\n', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(3, 3, 1, 'diskon 0', '<p>Maxime voluptas sunt suscipit totam. Perferendis nihil ab consectetur alias. Modi nisi corporis laborum voluptate magnam. Error quasi necessitatibus aut velit hic et aut et.<p></p>Praesentium ut voluptates odit. Porro est odio est rem tempora similique deserunt ut. Ex blanditiis architecto qui et vel. Magni et alias neque explicabo minus harum. Qui placeat rem ut provident.<p></p>Aliquid et ipsum architecto neque. Maxime maxime ut non ut facilis mollitia deserunt. Aut molestias facilis dolore quo commodi ipsum qui consectetur.<p></p>Est ea facilis ipsum. Maxime et quas velit.<p></p>Aut voluptates incidunt tempora voluptatum voluptates. Hic et aut ea expedita enim. Minus rerum non at quia.<p></p>Tempore in eaque adipisci explicabo beatae dolorem quis. Impedit delectus ullam repellendus. Et aut et possimus occaecati.<p></p>Autem eos voluptate aliquam non. Enim sequi vel distinctio hic libero. Aut tempora cum dolorum libero facere magni molestiae quis.<p></p>Molestiae fugit officiis expedita tempora aliquam. Porro dolor nesciunt voluptate quo quo. Odit nemo corrupti quo officia fugit iusto officia. Voluptatem optio eligendi quos aspernatur impedit odio fuga.<p></p>Debitis quam natus in officia. Aspernatur vitae id possimus corporis quod. Quo sint doloribus in soluta minima. Placeat non eos excepturi iure vel ut occaecati.', '580940', 446, 6702, 0, 'Xiomi', '[\"1Poco102.jpg\", \"2Poco102.jpg\", \"3Poco102.jpg\", \"4Poco102.jpg\", \"5Poco102.jpg\"]\r\n', '2024-06-12 13:23:38', '2024-06-12 13:23:38'),
(4, 3, 1, 'In debitis nihil aut et.', '<p>Id fugiat et rerum fugiat tenetur voluptatem. Minus voluptates ut maxime et vel ad. Excepturi omnis iusto rerum corrupti ut. Quo nesciunt repudiandae odit voluptatibus ipsam accusamus voluptatem.<p></p>Totam doloribus officia velit libero. Modi iste harum et necessitatibus. Totam sunt quia ea nihil laudantium ratione ab.<p></p>Modi sunt doloremque quas ut repudiandae corporis voluptate. Dolor praesentium nobis fugiat dolorem id quam quasi asperiores. Fuga et a praesentium dolores amet voluptas.<p></p>Et quis culpa rem consequatur. Nobis ad officia officiis corporis culpa rem. Ab harum impedit recusandae rerum quo facilis.<p></p>Quasi eius aperiam nihil illo. Commodi quisquam qui veniam consequatur. Repudiandae suscipit ea non eum. Officia nobis sint ipsam rerum excepturi ipsum. Mollitia nobis aut veritatis.<p></p>Inventore dolore nulla velit est distinctio temporibus. Aut quos ut dolore commodi voluptates necessitatibus harum. Labore atque minus quam libero aut ipsam. Deleniti nobis aut tenetur quos. Ut natus porro est nobis.<p></p>Et eos expedita at iusto sunt. Reprehenderit eum voluptatem facere. Ipsum quo harum saepe aut.<p></p>Atque ut eum repudiandae aut animi. Maiores qui eaque consectetur sed et. Consequatur sit doloremque quisquam voluptatem nulla molestiae. Et consequuntur perspiciatis quasi voluptatem eos voluptas.', '4885740', 629, 6364, 74, 'Asus', '[\"1Poco102.jpg\", \"2Poco102.jpg\", \"3Poco102.jpg\", \"4Poco102.jpg\", \"5Poco102.jpg\"]\r\n', '2024-06-12 13:23:38', '2024-06-12 13:23:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penjual` varchar(255) NOT NULL,
  `ongkir` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `produk_id`, `user_id`, `status`, `jumlah`, `penjual`, `ongkir`, `bukti_pembayaran`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Dibatalkan', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 14:54:16', '2024-06-12 14:56:46'),
(2, 2, 1, 'Dibatalkan', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 14:55:30', '2024-06-12 14:56:43'),
(3, 3, 1, 'Dibatalkan', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 14:55:30', '2024-06-12 14:56:43'),
(4, 4, 1, 'Dibatalkan', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 14:55:30', '2024-06-12 14:56:43'),
(6, 2, 1, 'menunggu-pembayaran', 1, 'RiskiWahyudi', '30000', '1718212641_1.jpg', '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 15:10:57', '2024-06-12 17:17:21'),
(7, 3, 1, 'menunggu-pembayaran', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 15:10:57', '2024-06-12 15:10:57'),
(8, 1, 1, 'menunggu-pembayaran', 1, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-12 16:55:44', '2024-06-12 16:55:44'),
(9, 1, 1, 'menunggu-pembayaran', 2, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-13 13:01:53', '2024-06-13 13:01:53'),
(10, 2, 1, 'menunggu-pembayaran', 3, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-13 13:01:53', '2024-06-13 13:01:53'),
(11, 3, 1, 'menunggu-pembayaran', 5, 'RiskiWahyudi', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-13 13:01:53', '2024-06-13 13:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'RiskiWahyudi', 'riskiwahyudi1306@gmail.com', NULL, '$2y$12$yjGw/B4u6c8nkDc3t9zWBui8AQver2mBzQ8M1Nd.NcO6kWCNB2o32', NULL, '2024-06-12 13:25:15', '2024-06-12 13:25:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
