-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 02.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `broadcasts`
--

CREATE TABLE `broadcasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `broadcasts`
--

INSERT INTO `broadcasts` (`id`, `title`, `language`, `image`, `youtube`, `created_at`, `updated_at`) VALUES
(2, 'Broadcast 3', 'Indonesia', 'logo_main.png', 'qry89D4PWlQ', '2021-01-01 06:10:11', '2021-01-01 06:10:11'),
(3, 'Broadcast 2', 'English', 'logo_main-799b7.png', 'MPlGWKm-jdg', '2021-01-01 06:10:49', '2021-01-01 06:10:49'),
(4, 'Broadcast 1', 'Korean', 'logo_main-4a58c.png', 'QzmcOCj7gjc', '2021-01-01 06:29:28', '2021-01-01 06:29:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `match_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stadium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_1` bigint(20) UNSIGNED NOT NULL,
  `team_2` bigint(20) UNSIGNED NOT NULL,
  `match_group_id` bigint(20) UNSIGNED NOT NULL,
  `match_round_id` bigint(20) UNSIGNED NOT NULL,
  `match_status_id` bigint(20) UNSIGNED NOT NULL,
  `match_finish_id` bigint(20) UNSIGNED DEFAULT NULL,
  `score_team_1` int(11) DEFAULT 0,
  `score_team_2` int(11) DEFAULT 0,
  `score_additional_team_1` int(11) DEFAULT 0,
  `score_additional_team_2` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matches`
--

INSERT INTO `matches` (`id`, `match_date`, `match_time`, `match_location`, `match_details`, `stadium`, `team_1`, `team_2`, `match_group_id`, `match_round_id`, `match_status_id`, `match_finish_id`, `score_team_1`, `score_team_2`, `score_additional_team_1`, `score_additional_team_2`, `image`, `youtube`, `created_at`, `updated_at`) VALUES
(6, '2021-01-02', '19:00:00', 'Jakarta', '<p>Desc</p>\r\n', 'GBK', 1, 2, 1, 3, 3, 3, 0, 0, 5, 4, 'broad-img-8996c.jpg', NULL, '2021-01-01 04:27:57', '2021-01-01 04:27:57'),
(7, '2021-01-02', '13:00:00', 'Jakarta', '<p>desc</p>\r\n', 'GBK', 2, 1, 1, 2, 2, 2, 4, 5, 0, 0, 'broad-img-86e20.jpg', NULL, '2021-01-01 04:28:16', '2021-01-01 04:28:16'),
(8, '2021-01-02', '19:00:00', 'Jakarta', '<p>Desc</p>\r\n', 'GBK', 1, 2, 1, 1, 1, 2, 3, 3, 3, 5, 'broad-img-8996c.jpg', NULL, '2021-01-01 04:27:57', '2021-01-01 04:27:57'),
(9, '2021-01-11', '19:00:00', 'Jakarta', '<p>Desc</p>\r\n', 'GBK', 1, 2, 1, 2, 1, 3, 0, 0, 4, 5, 'broad-img-8996c.jpg', NULL, '2021-01-01 04:27:57', '2021-01-01 04:27:57'),
(10, '2021-01-12', '19:00:00', 'Jakarta', '<p>Desc</p>\r\n', 'GBK', 1, 7, 1, 2, 1, 2, 0, 0, 5, 3, 'broad-img-8996c.jpg', NULL, '2021-01-01 04:27:57', '2021-01-01 04:27:57'),
(11, '2021-01-01', '19:00:00', 'Jakarta', '<p>Desc</p>\r\n', 'GBK', 7, 2, 1, 2, 3, 3, 0, 0, 5, 4, 'broad-img-8996c.jpg', NULL, '2021-01-01 04:27:57', '2021-01-01 04:27:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `match_finishes`
--

CREATE TABLE `match_finishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `match_finishes`
--

INSERT INTO `match_finishes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Half-time', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(2, 'Full-time', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(3, 'Penalties', '2020-12-17 08:17:25', '2020-12-17 08:17:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `match_groups`
--

CREATE TABLE `match_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `match_groups`
--

INSERT INTO `match_groups` (`id`, `name`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'MCountDown', 1, '2020-12-17 08:21:56', '2020-12-17 08:21:56'),
(2, 'FIFA 2019', 2, '2021-01-01 09:02:13', '2021-01-01 09:02:13'),
(3, 'INKIGAYO', 1, '2021-01-02 01:20:45', '2021-01-02 01:20:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `match_rounds`
--

CREATE TABLE `match_rounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `match_rounds`
--

INSERT INTO `match_rounds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Penyisihan', '2020-12-17 08:22:03', '2020-12-17 08:22:03'),
(2, 'Quarter Final', '2020-12-17 08:22:12', '2020-12-17 08:22:12'),
(3, 'Semi Final', '2020-12-17 08:22:16', '2020-12-17 08:22:16'),
(4, 'Final', '2020-12-17 08:22:20', '2020-12-17 08:22:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `match_statuses`
--

CREATE TABLE `match_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `match_statuses`
--

INSERT INTO `match_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Upcoming', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(2, 'Live', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(3, 'Finished', '2020-12-17 08:17:25', '2020-12-17 08:17:25');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_12_17_101617_create_roles_table', 1),
(6, '2020_12_17_101700_add_role_to_users_table', 1),
(7, '2020_12_17_125228_create_news_categories_table', 1),
(8, '2020_12_17_130143_create_news_table', 1),
(9, '2020_12_17_132354_create_teams_table', 1),
(10, '2020_12_17_133926_add_phone_to_users_table', 1),
(11, '2020_12_17_135828_create_broadcasts_table', 1),
(12, '2020_12_17_141111_create_match_groups_table', 1),
(13, '2020_12_17_141137_create_match_rounds_table', 1),
(14, '2020_12_17_142044_create_match_statuses_table', 1),
(15, '2020_12_17_142635_create_match_finishes_table', 1),
(16, '2020_12_17_143221_create_matches_table', 1),
(17, '2020_12_17_152715_create_team_members_table', 2),
(18, '2021_01_01_154221_add_match_group_to_teams_table', 3),
(19, '2019_01_01_154418_create_statuses_table', 4),
(20, '2021_01_01_154703_add_status_to_match_groups_table', 5),
(21, '2021_01_01_234841_create_product_categories_table', 6),
(22, '2021_01_01_235542_create_products_table', 7),
(23, '2021_01_01_235841_create_product_cats_table', 8),
(24, '2021_01_02_000223_create_product_images_table', 9),
(25, '2021_01_02_011300_add_slug_to_products_table', 10),
(29, '2021_01_02_013516_create_product_buys_table', 11),
(30, '2021_01_02_031041_create_product_checkouts_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `tags`, `image`, `news_category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Legends Rajai Video Game dan Esports di Asia Tenggara', 'title-news-1', '<p><a href=\"https://wartakota.tribunnews.com/tag/mobile-legends-bang-bang-mlbb\">Mobile&nbsp;Legends:&nbsp;Bang&nbsp;Bang&nbsp;(MLBB)</a>&nbsp;dan liga utama&nbsp;<em>mobile&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/video-game\">video&nbsp;game</a></em>&nbsp;bergenre&nbsp;<em>multiplayer online battle arena</em>&nbsp;(MOBA) itu,&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/mobile-legends-professional-league\">Mobile&nbsp;Legends&nbsp;Professional&nbsp;League</a>&nbsp;(MPL), menjadi yang terdepan di industri&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/esports\">eSports</a>&nbsp;di kawasan&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/asia-tenggara\">Asia&nbsp;Tenggara</a>&nbsp;pada tahun 2020.</p>\r\n\r\n<p>Lucas Mao, Managing Director&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/moonton\">Moonton</a>&nbsp;Games, pengembang dan penerbit MLBB, mengakui tahun 2020 sebagai tahun yang penuh tantangan.</p>\r\n\r\n<p>Meski demikian, pihaknya terus berkomitmen untuk memberikan hiburan terbaik bagi para penggemar MLBB, sekaligus menyediakan&nbsp;<em>platform</em>&nbsp;kepada generasi muda untuk menggapai impiannya.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Mobile Legends', 'mpl-indonesia-realme.jpg', 2, 4, '2021-01-01 03:38:32', '2021-01-01 03:38:32'),
(2, '5 Tim Esports Terkaya di Dunia Tahun 2020', 'title-news-2', '<p><strong>Merdeka.com -&nbsp;</strong>Beberapa waktu lalu jelang akhir tahun, majalah bisnis Forbes merilis daftar perusahaan atau organisasi esports paling kaya di dunia tahun ini.</p>\r\n\r\n<p>Karena semua turnamen esports harus digelar online karena pandemi Covid-19, berbagai pihak dan bisnis pendukung pertandingan pun ikutan terkena dampaknya.</p>\r\n\r\n<p>Berbeda dari tahun lalu dimana sejumlah perusahaan atau organisasi esports banjir dana segar dari investor, tahun ini kucurannya lebih sedikit.</p>\r\n\r\n<p>Dikutip dari Forbes via Tekno Liputan6.com, nilai rata-rata sepuluh tim teratas di dalam daftar ini mencapai USD 240 juta pada 2020 dengan kenaikan 54 persen pada 2019.</p>\r\n\r\n<p>Sementara itu menurut Newzoo, pendapatan seluruh industri yang diharapkan melonjak 16 persen menjadi USD 1,1 miliar pada 2020, malah turun USD 150 juta setelah pandemi membatalkan sebagian besar acara.</p>\r\n\r\n<p>Terlepas dari hal tersebut, siapa tim esports paling tajir pada tahun ini? Tanpa panjang lebar, simak daftar lengkapnya sebagaimana dikutip dari Forbes.</p>\r\n\r\n<ol>\r\n	<li>Team SoloMid &mdash; USD 410 juta atau Rp 5,7 triliun.</li>\r\n	<li>Cloud9 &mdash; USD 350 juta atau Rp 4,9 trilun.</li>\r\n	<li>Team Liquid &mdash; USD 310 juta atau Rp 4,3 triliun.</li>\r\n	<li>FaZe Clan &mdash; USD 305 juta atau Rp 4,3 tiliun.</li>\r\n	<li>100 Thieves &mdash; USD 190 juta atau Rp 2,6 triliun.</li>\r\n</ol>\r\n', 'Esports', '5-tim-esports-terkaya-di-dunia-tahun-2020.jpg', 2, 4, '2021-01-01 03:38:32', '2021-01-01 03:38:32'),
(3, 'Esports Star Indonesia Masuk Grand Final, Ini Dia Para Pesertanya', 'title-news-3', '<p><strong>Bola.com, Jakarta -</strong>&nbsp;Event esports,&nbsp;<strong><a href=\"https://www.bola.com/moto-gp\" target=\"_blank\">Esports Star Indonesia</a></strong>&nbsp;bakal menggelar babak grand final, Sabtu 5 Desember 2020 pukul 19.00 WIB. Grand Final Esports Star Indonesia diprediksi penuh kejutan dan teka-teki.</p>\r\n\r\n<p>Siapapun yang berhasil sebagai player terbaik (MVP) akan langsung direkrut oleh RRQ, klub esports profesional papan atas di Indonesia. Untuk tim juara pastinya akan membawa pulang hadiah uang tunai ratusan juta rupiah.</p>\r\n\r\n<p>Sepuluh grand finalis&nbsp;<strong><a href=\"https://www.bola.com/moto-gp\" target=\"_blank\">Esports Star Indonesia</a></strong>&nbsp;yang tersisa telah melewati 2 bulan masa karantina, 14 episode kompetisi, hingga akhirnya mereka harus bisa membuktikan untuk tampil sebagai yang terbaik.</p>\r\n\r\n<p>Di Tim Blue Rhinos ada Aville (Bandung), Aeden (Cimahi), JBun (Sentebang), Bankai (Jakarta) dan Maxi (Jakarta). Sementara untuk tim Red Tigers diisi Saint de Lucaz (Bandung), Zerologic (Bandung), Cello (Jakarta), OG (Jakarta), dan Hansel (Jakarta).</p>\r\n\r\n<p>&quot;Perkembangan e-Sports di Indonesia yang sangat luar biasa saat ini, merupakan momentum yang tepat bagi GTV untuk melahirkan bintang e-Sports kebanggaan Indonesia,&quot; Valencia H. Tanoesoedibjo, Managing Director GTV mengungkapkan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Esports', 'esports-1.jpg', 1, 4, '2021-01-01 03:38:32', '2021-01-01 03:38:32'),
(4, 'Opinion: The Top 6 Rising Esports of 2021', 'title-news-4', '<p>The COVID-19 pandemic threw the esports world out of its typical routines. Many of the most important annual tournaments never took place. We learned what happens to certain ecosystems without live events, and those struggles will be carried on into the new year until the pandemic is finally resolved.</p>\r\n\r\n<p>Still, there were important bright spots throughout the year. The release of&nbsp;<a href=\"https://esportsobserver.com/tag/valorant\"><em>Valorant</em></a>&nbsp;created major upheaval in the shooter space.&nbsp;<a href=\"https://esportsobserver.com/tag/rainbow-six-siege\"><em>Rainbow Six Siege</em></a>&nbsp;was able to take center stage early in the year, showcasing the value in a developer collaborating with its community.</p>\r\n', 'Highlight', 'esports-2.jpg', 1, 4, '2021-01-01 03:38:32', '2021-01-01 03:38:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Highlight', 'highlight', NULL, '2021-01-01 03:37:16'),
(2, 'Esports', 'soccer', NULL, '2021-01-01 05:22:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `price`, `description`, `tags`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'ESL Performance Player Jersey', 'esl-performance-player-jersey', '8989-9989', '862500', '<p>Description :</p>\r\n\r\n<ul>\r\n	<li>Material: 100% polyester</li>\r\n	<li>Sublimation print</li>\r\n	<li>Color: black and grey</li>\r\n	<li>Dry fit quality</li>\r\n	<li>Care tips: Machine washable at 30&deg;C. Iron low, tumble dry low. Do not dry clean, bleach.</li>\r\n</ul>\r\n', 'Kaos, Pria', 'jersey-1.jpg', NULL, '2021-01-01 23:07:03'),
(2, 'DreamHack Dad Hat', 'dreamhack-dad-hat', '978-9991', '344999', '<p>Description :</p>\r\n\r\n<ul>\r\n	<li>Material: 100% cotton</li>\r\n	<li>3D rubber print on front</li>\r\n	<li>Woven Flaglable</li>\r\n	<li>One size fits all</li>\r\n</ul>\r\n', 'Cap', 'cap-1.jpg', NULL, '2021-01-01 23:15:02'),
(3, 'Misfits Keyring', 'misfits-keyring', '9893-23', '51500', '<p>Description :</p>\r\n\r\n<p>Official Misfits Keyring made from metal.</p>\r\n', 'Keychain', 'keyring-1.jpg', NULL, '2021-01-01 23:17:05'),
(4, 'Mousesports x Snipes Hoodie Anthracite', 'mousesports-x-snipes-hoodie-anthracite', '73-4934', '1035000', '<p>Description :</p>\r\n\r\n<p>This cool Mouz hoodie shows off our sponsors. It&#39;s part of the current official player gear that the Pros wear during official appearances.&nbsp;&nbsp;</p>\r\n\r\n<ul>\r\n	<li>80% Cotton / 20% Polyester - with fleece lined interior</li>\r\n	<li>the colors give the hoodie depth: the red part has a print of small grey dots, which creates a cool gradient on the hood-area</li>\r\n	<li>Sponsor logos are subject to change without notice and images are for illustration purposes only</li>\r\n	<li>A percentage of all sales goes directly to the team</li>\r\n</ul>\r\n', 'Hoodie', 'hoodie-1.jpg', NULL, '2021-01-01 23:19:04'),
(5, 'Team Secret Authentic Pro Jersey', 'team-secret-authentic-pro-jersey', '243-5149', '1207500', '<p>Description :</p>\r\n\r\n<p>Official Team Secret Player Jersey</p>\r\n', 'Jersey', 'jersey-2.jpg', NULL, '2021-01-01 23:21:17'),
(6, 'ORITY GO Backpack - SK Gaming Edition', 'ority-go-backpack-sk-gaming-edition', '6424-2811', '2068500', '<p>Description :</p>\r\n\r\n<p>DETAILS</p>\r\n\r\n<ul>\r\n	<li>Size: 32 x 19 x 47 cm (W/D/H) &nbsp;</li>\r\n	<li>Weight: 1350 g (empty)</li>\r\n	<li>Volume: approx. 25 liters &nbsp;</li>\r\n	<li>Main Material: Polyester (recycled) &nbsp;</li>\r\n	<li>Country of Origin: Vietnam</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>FEATURES Water-repellent outside material (1500mm). &nbsp;</p>\r\n\r\n<ul>\r\n	<li>Carry-on size. &nbsp;</li>\r\n	<li>Easy-access (to equipment and travel documents). &nbsp;</li>\r\n	<li>Fabrics made from recycled plastic bottles. &nbsp;</li>\r\n	<li>Exchangeable SKIN (front). &nbsp;</li>\r\n	<li>Padded compartment for glasses. &nbsp;</li>\r\n	<li>Ergonomically shaped shoulder-straps.</li>\r\n	<li>Hook and loop surface inside for ORITY accessories. &nbsp;</li>\r\n	<li>Elastic strap for bottle fixation.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SUITABLE FOR THE FOLLOWING EQUIPMENT</p>\r\n\r\n<ul>\r\n	<li>15,6&quot; laptop (up to 30 x 5 x 46 cm (W/D/H)) &nbsp;</li>\r\n	<li>Tablet, Switch or eBook (up to 23 x 2,5 x 24 cm (W/D/H))</li>\r\n</ul>\r\n', 'Bag', 'bag-1.jpg', NULL, '2021-01-01 23:25:36'),
(7, 'Team SoloMid Cap', 'team-solomid-cap', '73-71829', '689999', '<p>Description :</p>\r\n\r\n<p>- Adjustable 7-panel snapback</p>\r\n\r\n<p>- Embroidered airholes</p>\r\n', 'Cap', 'cap-2.jpg', NULL, '2021-01-01 23:29:06'),
(8, 'G2 Esports Casual Hoodie', 'g2-esports-casual-hoodie', '712-2311', '1120999', '<p>Description :</p>\r\n\r\n<p>The official G2 Esports Dual Tone cotton fleece hoodie features a high quality embroidery of the G2 Esports logo in the front. Support your favorite team in style while enjoying maximum comfort!</p>\r\n\r\n<ul>\r\n	<li>Material: 100% cotton</li>\r\n	<li>Colour: Grey</li>\r\n	<li>Logo embroidery on chest</li>\r\n	<li>Kangaroo pocket</li>\r\n</ul>\r\n', 'Hoodie', 'hoodie-2.jpg', NULL, '2021-01-01 23:30:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_buys`
--

CREATE TABLE `product_buys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Bag', 'bag', NULL, '2021-01-01 22:57:47'),
(5, 'Cap', 'cap', NULL, '2021-01-01 22:57:54'),
(6, 'Hoodie', 'hoodie', NULL, '2021-01-01 22:58:07'),
(7, 'Jersey', 'jersey', NULL, '2021-01-01 22:58:23'),
(8, 'Keychain', 'keychain', NULL, '2021-01-01 22:58:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_cats`
--

CREATE TABLE `product_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_cats`
--

INSERT INTO `product_cats` (`id`, `product_id`, `product_category_id`) VALUES
(5, 1, 7),
(6, 2, 5),
(7, 3, 8),
(8, 4, 6),
(9, 5, 7),
(11, 6, 4),
(12, 7, 5),
(13, 8, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_checkouts`
--

CREATE TABLE `product_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibayar` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_checkouts`
--

INSERT INTO `product_checkouts` (`id`, `kode`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `city`, `zip`, `note`, `address`, `address_detail`, `company_name`, `jumlah`, `dibayar`, `created_at`, `updated_at`) VALUES
(1, 'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8', 2, 'Reza', 'Nurfachmi', 'aaezha@gmail.com', '08898', 'Indonesia', 'Wonosobo', '0898', 'Catatnnya', NULL, NULL, NULL, '2700000', '0', '2021-01-01 20:37:21', '2021-01-01 20:37:21'),
(2, 'K6eGn7YLo4PozbxLhCaOTjyx8epuiW', 5, 'Jasmine', 'Aurely', 'aurelysj@gmail.com', '081218328787', 'Indonesia', 'BEKASI-JATI SAMPURNA', '17435', '-', NULL, NULL, NULL, '500000', '0', '2021-01-02 07:28:04', '2021-01-02 07:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(15, 1, 'jersey-1-000e6.jpg', NULL, NULL),
(16, 2, 'cap-1-951f2.jpg', NULL, NULL),
(17, 3, 'keyring-1-60d9c.jpg', NULL, NULL),
(18, 4, 'hoodie-1-c5d14.jpg', NULL, NULL),
(19, 5, 'jersey-2-ca638.jpg', NULL, NULL),
(20, 6, 'bag-1-c3de7.jpg', NULL, NULL),
(21, 7, 'cap-2-52d4e.jpg', NULL, NULL),
(22, 8, 'hoodie-2-975c7.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_pays`
--

CREATE TABLE `product_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_pay_method_id` bigint(20) UNSIGNED NOT NULL,
  `product_checkout_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `confirmed_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_pay_methods`
--

CREATE TABLE `product_pay_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(2, 'Member', '2020-12-17 08:17:25', '2020-12-17 08:17:25'),
(3, 'Administrator', '2021-01-04 16:35:33', '2021-01-04 16:35:33'),
(4, 'Member', '2021-01-04 16:35:33', '2021-01-04 16:35:33'),
(5, 'Administrator', '2021-01-04 17:03:04', '2021-01-04 17:03:04'),
(6, 'Member', '2021-01-04 17:03:04', '2021-01-04 17:03:04'),
(7, 'Administrator', '2021-01-04 17:10:06', '2021-01-04 17:10:06'),
(8, 'Member', '2021-01-04 17:10:06', '2021-01-04 17:10:06'),
(9, 'Administrator', '2021-01-04 17:23:39', '2021-01-04 17:23:39'),
(10, 'Member', '2021-01-04 17:23:39', '2021-01-04 17:23:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', NULL, NULL),
(2, 'Tidak Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `match_group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'NCT 127', 'nct-127.jpg', 3, 3, '2020-12-17 08:20:39', '2020-12-17 08:20:39'),
(2, 'NCT Dream', 'nct-dream-1.jpg', 3, 2, '2020-12-17 08:20:52', '2020-12-17 08:20:52'),
(7, 'WayV', 'wayv.jpg', 1, 4, '2021-01-01 08:54:32', '2021-01-01 08:54:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 'Syalal', 1, '2020-12-17 08:31:09', '2020-12-17 08:31:09'),
(2, 'Adi', 1, '2020-12-17 08:31:13', '2020-12-17 08:31:13'),
(3, 'Akbar (GK)', 2, '2020-12-17 08:31:21', '2020-12-17 08:31:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `phone`, `role_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Company', 'admin@gmail.com', NULL, 1, NULL, '$2y$10$IWAEYF8Vzd7oN5tRcHGV2epJs4OmT5qha4/FoIHOSdGUkxL8.zilm', NULL, NULL, 'V8iGkY7vu2nNgnF3PaZOkCffYkGo8vBSneNxNlkz8tomGluhhfKfZn0H4hAW', '2020-12-17 08:17:25', '2021-01-01 21:08:08'),
(2, 'Member', 'Last', 'member@gmail.com', '0812', 2, NULL, '$2y$10$xR/2k9Utm7Eokgeb1.A00uoAoiaWi5PI2BSHv4zqttQXoyt4m1Tia', NULL, NULL, 'ZxTUqUi4aGJeK3yUabF4vSXHHkGR5Q1qCWxEPe8lVe6vf05Smd5G8iOYMoWQ', '2020-12-17 08:20:24', '2020-12-17 08:20:24'),
(3, 'Member', 'Lagi', 'member2@gmail.com', '0898', 2, NULL, '$2y$10$YbbP/.EF8l6w4ne7LdAer.GYX0mGFipge5qxkBXED4uLGP6Pzu6HC', NULL, NULL, 'c9VdpeO94Da2V6umOKBlV8tbeaOcpgmtcIy79rLiaNMIG7HUkbW2UaKasIPt', '2021-01-01 03:34:19', '2021-01-01 03:34:19'),
(4, 'Member', 'Lagi', 'member3@gmail.com', NULL, 2, NULL, '$2y$10$pJh8UP3pgEx4qxboh7dJY.W1li5rpzJzOloUEwsMF9e7ZPJo.NWhO', NULL, NULL, NULL, '2021-01-01 03:35:21', '2021-01-01 03:35:21'),
(5, 'jazzy', 'aw', 'aurelysj@gmail.com', NULL, 2, NULL, '$2y$10$o4puX7ruW5Mf.vD693lfU.W6LC2jhQnguSLymotrvr.Fvx73GwmCi', NULL, NULL, NULL, '2021-01-02 02:25:06', '2021-01-02 02:25:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `broadcasts`
--
ALTER TABLE `broadcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_team_1_foreign` (`team_1`),
  ADD KEY `matches_team_2_foreign` (`team_2`),
  ADD KEY `matches_match_group_id_foreign` (`match_group_id`),
  ADD KEY `matches_match_round_id_foreign` (`match_round_id`),
  ADD KEY `matches_match_status_id_foreign` (`match_status_id`),
  ADD KEY `matches_match_finish_id_foreign` (`match_finish_id`);

--
-- Indeks untuk tabel `match_finishes`
--
ALTER TABLE `match_finishes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `match_groups`
--
ALTER TABLE `match_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_groups_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `match_rounds`
--
ALTER TABLE `match_rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `match_statuses`
--
ALTER TABLE `match_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_news_category_id_foreign` (`news_category_id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_buys`
--
ALTER TABLE `product_buys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_buys_user_id_foreign` (`user_id`),
  ADD KEY `product_buys_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cats_product_id_foreign` (`product_id`),
  ADD KEY `product_cats_product_category_id_foreign` (`product_category_id`);

--
-- Indeks untuk tabel `product_checkouts`
--
ALTER TABLE `product_checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_checkouts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `product_pays`
--
ALTER TABLE `product_pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_pays_user_id_foreign` (`user_id`),
  ADD KEY `product_pays_product_pay_method_id_foreign` (`product_pay_method_id`),
  ADD KEY `product_pays_product_checkout_id_foreign` (`product_checkout_id`);

--
-- Indeks untuk tabel `product_pay_methods`
--
ALTER TABLE `product_pay_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_foreign` (`user_id`),
  ADD KEY `teams_match_group_id_foreign` (`match_group_id`);

--
-- Indeks untuk tabel `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_members_team_id_foreign` (`team_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `broadcasts`
--
ALTER TABLE `broadcasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `match_finishes`
--
ALTER TABLE `match_finishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `match_groups`
--
ALTER TABLE `match_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `match_rounds`
--
ALTER TABLE `match_rounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `match_statuses`
--
ALTER TABLE `match_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product_buys`
--
ALTER TABLE `product_buys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `product_checkouts`
--
ALTER TABLE `product_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `product_pays`
--
ALTER TABLE `product_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_pay_methods`
--
ALTER TABLE `product_pay_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_match_finish_id_foreign` FOREIGN KEY (`match_finish_id`) REFERENCES `match_finishes` (`id`),
  ADD CONSTRAINT `matches_match_group_id_foreign` FOREIGN KEY (`match_group_id`) REFERENCES `match_groups` (`id`),
  ADD CONSTRAINT `matches_match_round_id_foreign` FOREIGN KEY (`match_round_id`) REFERENCES `match_rounds` (`id`),
  ADD CONSTRAINT `matches_match_status_id_foreign` FOREIGN KEY (`match_status_id`) REFERENCES `match_statuses` (`id`),
  ADD CONSTRAINT `matches_team_1_foreign` FOREIGN KEY (`team_1`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matches_team_2_foreign` FOREIGN KEY (`team_2`) REFERENCES `teams` (`id`);

--
-- Ketidakleluasaan untuk tabel `match_groups`
--
ALTER TABLE `match_groups`
  ADD CONSTRAINT `match_groups_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_buys`
--
ALTER TABLE `product_buys`
  ADD CONSTRAINT `product_buys_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `productss` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_checkouts`
--
ALTER TABLE `product_checkouts`
  ADD CONSTRAINT `product_checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_pays`
--
ALTER TABLE `product_pays`
  ADD CONSTRAINT `product_pays_product_checkout_id_foreign` FOREIGN KEY (`product_checkout_id`) REFERENCES `product_checkouts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_pays_product_pay_method_id_foreign` FOREIGN KEY (`product_pay_method_id`) REFERENCES `product_pay_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_pays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_match_group_id_foreign` FOREIGN KEY (`match_group_id`) REFERENCES `match_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
