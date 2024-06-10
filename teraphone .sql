-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2024 pada 15.03
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
(1, 'Gaming Smarthone', 'gaming-smartphone', '2024-06-09 16:52:22', '2024-06-09 16:52:22'),
(2, 'Flagship Smatphone', 'flagship-smarthphone', '2024-06-09 16:52:22', '2024-06-09 16:52:22'),
(3, 'Camera Quality', 'camera-quality', '2024-06-09 16:52:22', '2024-06-09 16:52:22'),
(4, 'Mid Range', 'mid-range', '2024-06-09 16:52:22', '2024-06-09 16:52:22'),
(5, 'Low Range', 'low-range', '2024-06-09 16:52:22', '2024-06-09 16:52:22');

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
(1, 1, 1, '2024-06-09 17:06:10', '2024-06-09 17:06:10');

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
  `brand` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `user_id`, `nama_produk`, `deskripsi`, `harga`, `stok`, `terjual`, `brand`, `foto`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Ut quae laboriosam non voluptatem qui.', '<p>Cupiditate voluptas quae odio sint voluptas rerum est et. Facilis eos sunt velit maxime esse officia.<p></p>Sit quo iusto labore minus. Perspiciatis et doloremque tempore qui dolor. Placeat qui temporibus et maxime qui omnis.<p></p>Eos repellat et architecto. Molestiae ea accusamus quia hic. Inventore qui doloremque explicabo aut dolores laborum autem. Facere impedit illo facere.<p></p>Aut consequatur ut dolor aut. Exercitationem quia aut et dolorum aut vero soluta. Adipisci qui necessitatibus consectetur unde.<p></p>At quis sit et dolore quasi voluptate eius. Quae quas eum laudantium omnis voluptatem. Praesentium sint temporibus odio amet.<p></p>Odio voluptas dolor placeat a ut voluptatem. Aut aspernatur possimus recusandae pariatur voluptatibus veritatis. Corporis atque omnis aut et. Eos veniam doloremque voluptatem omnis voluptatibus.<p></p>Amet voluptates non dolorem quo vero voluptas sit. Architecto omnis ut excepturi sunt. Cumque omnis eum dignissimos cum aut. Soluta rerum consequatur nobis ab. Occaecati qui cum et a.', '1133437', 621, 7356, 'Samsung', '[\"1samsung102.jpg\", \"2samsung102.jpg\", \"3samsung102.jpg\", \"4samsung102.jpg\", \"5samsung102.jpg\"]\r\n', '2024-06-09 16:52:22', '2024-06-09 16:52:22'),
(2, 2, 2, 'Et dicta id qui impedit molestias.', '<p>Sapiente inventore at nostrum quam. Sapiente mollitia suscipit vero voluptates est sapiente. Qui ut voluptatem doloremque velit. Dolore et voluptatem magnam saepe at.<p></p>Rerum optio nihil impedit quo unde veritatis repudiandae. Nulla et totam voluptate assumenda numquam illo sunt molestias. Aliquid et dolor quasi veritatis provident et.<p></p>Voluptatem quis tempore suscipit itaque dolores at molestiae. Accusantium dicta omnis impedit est dolorum. Eveniet quibusdam quo expedita. Nihil earum non neque sit ea illum facilis.<p></p>Maiores voluptatem consectetur maiores quis dolor deserunt explicabo. Quis pariatur est sint animi et vel et. Sit iste qui accusamus accusantium quibusdam doloremque.<p></p>Doloribus quia eos officia odit quae sit. Quam quaerat odit voluptas quaerat ut. Inventore molestiae sapiente ab eos architecto accusantium dolorem. Est voluptate in minima in sint cupiditate.<p></p>Debitis labore sit reprehenderit reprehenderit minus eveniet accusantium. Laudantium qui corrupti dolores aut provident et pariatur. Quam et est qui sint amet est.<p></p>Aliquid minus sint est. Placeat id quam non deleniti iure ipsam. Ducimus cum et nemo est et atque commodi minus. Porro inventore ea quos aperiam laboriosam quod qui.<p></p>Commodi sed est dolorem quas dolor. Earum odio sint consectetur dolore. Mollitia nesciunt a voluptatem reprehenderit ea maxime. Dignissimos iure eos ipsam suscipit. Deserunt maxime ea eos est ipsa molestiae.<p></p>Atque quo veniam qui nobis est incidunt quia commodi. Voluptatem et et est nihil.<p></p>Laudantium omnis voluptatum voluptas dignissimos aliquam totam excepturi. Sit fugit et nemo odio est quasi beatae laboriosam. Sint hic sapiente unde perspiciatis.<p></p>Expedita omnis aperiam ullam sit possimus. Velit similique non quibusdam. Voluptatum ea similique ipsa reprehenderit facilis accusamus temporibus.', '4149766', 430, 1606, 'Vivo', '[\"1samsung102.jpg\", \"2samsung102.jpg\", \"3samsung102.jpg\", \"4samsung102.jpg\", \"5samsung102.jpg\"]\r\n', '2024-06-09 16:52:22', '2024-06-09 16:52:22');

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
(1, 2, 1, 'menunggu-pembayaran', 1, 'Tidak Ada', '30000', NULL, '{\"nama_depan\":\"Riski\",\"nama_belakang\":\"wahyudi\",\"alamat\":\"Dormitori blok P no 23 lantai 1 kamar no 4 kelurahan muka kuning\",\"kota\":\"Batam\",\"provinsi\":\"Kepulauan Riau\",\"kode_pos\":\"29433\",\"no_hp\":\"081277561383\"}', '2024-06-09 16:54:10', '2024-06-09 16:54:10');

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
(1, '', 'RiskiWahyudi', 'riskiwahyudi1306@gmail.com', NULL, '$2y$12$c9d.ol7jUOdMP.uj4nbNNuI3C3XFdlbi43EF91dcAEpi/xM/81Mzu', NULL, '2024-06-09 17:05:23', '2024-06-09 17:05:23');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
