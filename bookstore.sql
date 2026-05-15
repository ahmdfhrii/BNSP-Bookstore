-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2026 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `slug`, `author`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengantar Pemrograman Javascript', 'pengantar-pemrograman-javascript', 'Jubilee Enterprise', 'Berisi panduan lengkap yang disusun untuk membantu siapa saja, baik pemula maupun pembelajar mandiri, yang ingin menguasai bahasa pemrograman paling populer di dunia web.', 99000, 15, 'images/books/js.png', '2026-05-13 09:53:01', '2026-05-14 03:13:40'),
(2, 3, 'Bumi Manusia', 'bumi-manusia', 'Pramoedya Ananta Toer', 'Kisah epik Minke di era kebangkitan nasional yang penuh dengan intrik dan perjuangan.', 180000, 20, 'images/books/bumi-manusia.png', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(3, 8, 'Atomic Habits', 'atomic-habits', 'James Clear', 'Cara mudah dan terbukti untuk membentuk kebiasaan baik dan menghilangkan kebiasaan buruk setiap harinya.', 86400, 100, 'images/books/atomic-habbits.png', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(4, 4, 'The Psychology of Money', 'the-psychology-of-money', 'Morgan Housel', 'Pelajaran abadi mengenai kekayaan, ketamakan, dan kebahagiaan dalam mengelola keuangan.', 90000, 25, 'images/books/the-psychologyof-money.png', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(10, 1, 'Sistem Basis Data', 'sistem-basis-data', 'Fera Damayanti, dkk', 'Konsep, Desain, dan Implementasi Modern', 80000, 150, 'images/books/1PwqLIGi4y6b56UfbT96HpaDtggbmdpXeCmuAJxU.png', '2026-05-14 20:26:48', '2026-05-14 20:26:48'),
(11, 4, 'Akuntansi Paling Mudah untuk UMKM', 'akuntansi-paling-mudah-untuk-umkm', 'Sri Rahayu', 'Akuntansi merupakan salah satu hal penting yang perlu dipraktikkan oleh para pelaku usaha, seperti UMKM. Akuntansi berfungsi mengubah data transaksi menjadi informasi keuangan yang dapat menggambarkan kinerja serta keadaan UMKM. Hal ini penting untuk diketahui oleh para pengambil keputusan maupun pihak yang tidak terlibat langsung dalam proses bisnis, seperti investor dan kreditur. Akan tetapi, masih ada pelaku UMKM yang belum memahami pentingnya praktik akuntansi ini dalam mendukung kemajuan UMKM.', 40000, 198, 'images/books/Jj38ITMR04BPBxvambPjusiLPzTpRlkyGiUKsObu.jpg', '2026-05-14 20:30:21', '2026-05-14 20:30:21'),
(12, 3, 'Ekspedisi Paus Yunus', 'ekspedisi-paus-yunus', 'Ahmad Mustafa', 'Satu kapal selam rakitan, dua remaja nekat, dan jutaan misteri di dasar Palung Agung.\r\n\r\nBagi Yunus Bahari, laut bukan sekadar rahim purba tempat kehidupan bermula, tetapi juga tempat peradaban lain bersembunyi di dasarnya. Keyakinan itulah yang membuat ahli maritim tersebut dianggap gila karena berusaha mencarinya ke Palung Agung. Sayang, dia tewas secara misterius dalam ekspedisinya ke palung tersebut.', 90000, 50, 'images/books/1CHisVxwUwrFBkYiMsUkoaJgNF9J7xYPVZU7LVt0.jpg', '2026-05-14 20:32:11', '2026-05-14 20:32:11'),
(13, 6, 'Gachiakuta 11', 'gachiakuta-11', 'Kei Urana', 'Rudo dkk berhasil menghalau Raider, tapi pertarungan seputar hewan bernoda dan Seri Watchman belum menunjukkan tanda-tanda akan berakhir. Pihak yang mengawasi manusia dan menjaga ketertiban di Dunia Bawah, ‘Hell’s Guard’, menaruh perhatian pada konflik mereka.', 70000, 88, 'images/books/rgKlOXp0JfmnLmNLFwJY9RpKstH3F4QfBQFjacAk.jpg', '2026-05-14 20:34:04', '2026-05-14 20:34:04'),
(14, 7, 'Pulang', 'pulang', 'Tere Liye', 'Disclaimer\r\nBuku novel yang berjudul Pulang ini merupakan karya dari penulis novel yang banyak digemari karya-karyanya, yaitu Tere Liye. Novel ini dapat dinikmati oleh pembaca baik di kalangan remaja maupun orang dewasa.\r\n\r\nKisah ini menceritkan perjalanan sosok pria bernama Bujang yang begitu suskses dalam bisnis shadow economy yang ia geluti. Kepandaian dan keteguhan prinsipnya telah mengantarkannya ke puncak kesuksesan. Sebagai seorang mafia, Bujang sangat disegani oleh pelaku bisnis shadow economy dari berbagai negara lain. Bahkan seorang presiden dibuat tak berkutik di hadapanya.', 100000, 80, 'images/books/T4sjYsL9Xvmk94LN7oucGoJsRccWBVgxwpRrr3GE.jpg', '2026-05-14 20:35:47', '2026-05-14 20:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', 'teknologi', '2026-05-13 09:53:01', '2026-05-14 21:19:49'),
(2, 'Pendidikan', 'pendidikan', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(3, 'Fiksi', 'fiksi', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(4, 'Bisnis & Ekonomi', 'bisnis-ekonomi', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(5, 'Sains & Alam', 'sains-alam', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(6, 'Komik', 'komik', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(7, 'Novel', 'novel', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(8, 'Pengembangan Diri', 'pengembangan-diri', '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(9, 'apaya', 'apaya', '2026-05-14 21:21:05', '2026-05-14 21:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_13_045819_create_categories_table', 1),
(5, '2026_05_13_045828_create_books_table', 1),
(6, '2026_05_13_045838_create_orders_table', 1),
(7, '2026_05_13_045845_create_order_items_table', 1),
(8, '2026_05_14_124339_create_carts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `invoice_number`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 'INV-MVWXSQAB', 900000, 'completed', '2026-05-14 06:42:52', '2026-05-14 06:57:06'),
(6, 1, 'INV-7FA9C7TZ', 360000, 'completed', '2026-05-14 06:47:58', '2026-05-14 07:31:53'),
(9, 5, 'INV-HFACUMSO', 720000, 'completed', '2026-05-14 08:49:02', '2026-05-14 09:17:42'),
(10, 5, 'INV-K0KDOPDH', 1116000, 'pending', '2026-05-14 09:36:14', '2026-05-14 09:36:14'),
(11, 5, 'INV-EVAWQP6U', 563400, 'processing', '2026-05-14 09:36:40', '2026-05-14 09:37:31'),
(12, 1, 'INV-JQT70BKN', 266400, 'completed', '2026-05-14 20:15:13', '2026-05-14 20:16:53'),
(13, 1, 'INV-VOTYVSZH', 120000, 'pending', '2026-05-14 20:38:59', '2026-05-14 20:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(6, 5, 2, 5, 180000, '2026-05-14 06:42:53', '2026-05-14 06:42:53'),
(7, 6, 4, 4, 90000, '2026-05-14 06:47:58', '2026-05-14 06:47:58'),
(10, 9, 2, 4, 180000, '2026-05-14 08:49:02', '2026-05-14 08:49:02'),
(11, 10, 1, 4, 99000, '2026-05-14 09:36:14', '2026-05-14 09:36:14'),
(12, 10, 4, 8, 90000, '2026-05-14 09:36:14', '2026-05-14 09:36:14'),
(13, 11, 3, 1, 86400, '2026-05-14 09:36:40', '2026-05-14 09:36:40'),
(14, 11, 1, 3, 99000, '2026-05-14 09:36:40', '2026-05-14 09:36:40'),
(15, 11, 2, 1, 180000, '2026-05-14 09:36:40', '2026-05-14 09:36:40'),
(16, 12, 3, 1, 86400, '2026-05-14 20:15:13', '2026-05-14 20:15:13'),
(17, 12, 2, 1, 180000, '2026-05-14 20:15:13', '2026-05-14 20:15:13'),
(18, 13, 11, 3, 40000, '2026-05-14 20:38:59', '2026-05-14 20:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GwetqvP9N7aoeQ5XQbiE20Xo3UAz06xxmpdsiAHX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOHFpbGVSVnYxMFF4d0tvVFpCYXczNmZBaTlESElzdUN0NVk3cUhxRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1778818873);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `dob`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Fachri', 'ahmdfhri', 'admin@example.com', NULL, '$2y$12$J4lea3ZpEJMa/eSnPJePD.nhGKvBXWAFmmKhMb0sE3.SH.RQXIMOS', 'admin', '081234567890', 'Kantor Pusat Bookstore', '2000-01-01', 'Laki-Laki', NULL, '2026-05-13 09:53:01', '2026-05-13 09:53:01'),
(3, 'yanti', 'yantixyz', 'yanti@example.com', NULL, '$2y$12$/b/vJArY8Vqj0F9Ko4HMiOQvV4WxyX1G4lhq04RkfvuMFTHeBvfwK', 'customer', '0895412946795', 'bogorrrrr', '2026-05-13', 'Perempuan', NULL, '2026-05-14 02:16:48', '2026-05-14 02:36:46'),
(5, 'cecep bin cucup', 'cicip', 'cacicup@gmail.com', NULL, '$2y$12$NzEJRcZ0bWa8SSp.dI.9q.sOmndQpyAXEFQRUOeTTT3k/L8CEO1qC', 'admin', '089612345678', 'belakang kebon alang alang', '1945-01-14', 'Perempuan', NULL, '2026-05-14 08:43:27', '2026-05-14 08:46:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_number_unique` (`invoice_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_book_id_foreign` (`book_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
