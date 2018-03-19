-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 01:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_c` int(10) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_c`, `total`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 72.60, '2018-03-17 20:08:06', '2018-03-17 20:08:06', 0),
(3, 1, 266.20, '2018-03-17 21:44:18', '2018-03-17 21:44:18', 0),
(4, 1, 266.20, '2018-03-17 21:46:10', '2018-03-17 21:46:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_p` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_c` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_p`, `comment`, `id_c`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hay', 1, '2018-03-18 09:48:00', NULL),
(3, 1, 'ads', 1, '2018-03-18 03:29:31', '2018-03-18 03:29:31'),
(4, 7, 'Tuyệt vời', 1, '2018-03-18 03:31:37', '2018-03-18 03:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `messages`, `created_at`, `updated_at`) VALUES
(1, 'Sau Nguyen', '0977695448', 'nts1997z@gmail.com', 'Sách rất hay tôi sẽ ủng hộ nhiều', '2018-03-18 04:05:30', '2018-03-18 04:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `phone`, `sex`, `age`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Han Nguyen', 'Hung Yen', 'hansena020897@gmail.com', '0977695448', 2, 21, 3, '2018-03-15 09:35:05', '2018-03-15 09:35:05'),
(2, 'Sau Nguyen', 'Hà Nội', 'nts1997z@gmail.com', '0977695448', 1, 21, 8, '2018-03-18 03:12:27', '2018-03-18 03:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_b` int(10) UNSIGNED NOT NULL,
  `id_p` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `id_b`, `id_p`, `created_at`, `updated_at`, `quantity`, `amount`) VALUES
(1, 2, 8, '2018-03-17 20:08:06', '2018-03-17 20:08:06', 1, 0),
(2, 3, 7, '2018-03-17 21:44:18', '2018-03-17 21:44:18', 2, 0),
(3, 4, 8, '2018-03-17 21:46:11', '2018-03-17 21:46:11', 2, 0),
(4, 4, 7, '2018-03-17 21:46:11', '2018-03-17 21:46:11', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_03_15_101833_creat_table_user', 1),
(2, '2018_03_15_102036_creat_table_type', 2),
(3, '2018_03_15_102055_creat_table_publish', 2),
(4, '2018_03_15_102428_creat_table_product', 3),
(6, '2018_03_15_162034_create_table_customer', 4),
(7, '2018_03_17_074801_create_table_bill', 5),
(8, '2018_03_18_024455_create_table_detail_bill', 6),
(9, '2018_03_18_093454_create_table_comment', 7),
(10, '2018_03_18_104555_create_table_contact', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_prd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `publication_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_publish` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `language` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `promotion` int(11) NOT NULL DEFAULT '0',
  `unit_on_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description_prd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_prd`, `price`, `img`, `author`, `num`, `publication_date`, `id_publish`, `id_type`, `language`, `pages`, `promotion`, `unit_on_order`, `created_at`, `updated_at`, `description_prd`, `import_price`) VALUES
(1, 'Java Performance', 50.00, '1sLdgxJ_ 2 (1).jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 3, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(2, 'Start Programming using HTML, CSS ANG Javascript', 50.00, '3MWptDG_ js.jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 5, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(3, 'PHP & MySQL novice to ninja', 50.00, '87U9jMR_ php.jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 9, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(4, 'CSS and HTML Web Design', 50.00, 'PmiLUc7_ must-read-html-css-books2.jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 5, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(5, 'ReactJS', 50.00, 'rEv77mY_ react.jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 7, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(6, 'Java concurrency in practice', 50.00, 'u8YOojH_ 1.jpg', 'Sau Nguyen', 10, '2015', 2, 1, 1, 300, 10, 11, NULL, '2018-03-15 09:39:46', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(7, 'Nha lanh dao khong chuc danh', 50.00, 'hmFySqt_ nha-lanh-dao-khong-chuc-danh.jpg', 'Sau Nguyen', 10, '2015', 2, 2, 1, 300, 10, 8, NULL, '2018-03-17 21:46:11', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40),
(8, 'Khởi nghiệp thông minh', 60.00, 'G2u9WLc_ Ryd4p9k_ khoi-nghiep-thong-minh-1.jpg', 'Sau Nguyen', 10, '2016', 2, 1, 2, 250, 0, 5, '2018-03-16 22:41:32', '2018-03-17 21:46:11', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 40);

-- --------------------------------------------------------

--
-- Table structure for table `publish`
--

CREATE TABLE `publish` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publish`
--

INSERT INTO `publish` (`id`, `name_pub`, `description_pub`, `phone_pub`, `email_pub`, `add_pub`, `created_at`, `updated_at`) VALUES
(1, 'Kim Dong', 'Nha xuat ban kim dong', '0912345692', 'kimdong@gmail.com', 'Ha Noi', NULL, NULL),
(2, 'Education', 'Nha xuat ban Giao duc', '0912345692', 'education@gmail.com', 'Ha Noi', NULL, NULL),
(3, 'International', 'Quoc Te', '0912345692', 'International@gmail.com', 'Ha Noi', NULL, '2018-03-16 21:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_t` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `created_at`, `updated_at`, `name_t`, `description`) VALUES
(1, NULL, '2018-03-16 21:01:07', 'Infomation', 'Cong nghe thong tin'),
(2, NULL, '2018-03-16 21:01:16', 'Business', 'Doanh nghiep'),
(5, '2018-03-16 08:58:05', '2018-03-16 08:58:05', 'Novel', 'Tieu thuyet'),
(6, '2018-03-16 21:00:55', '2018-03-16 21:00:55', 'Economy', 'Kinh Te');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(3, 'hansena020897@gmail.com', '$2y$10$9yT95O6skT1yKiAcNe99BOR5Pux.DZ8eWPIQZonjO4d0SCN7TNn1a', 2, 'SMQIhlX8UiFmZRdpGNv9zLyEM3XKUg9zXUVz7TqceBrRrMwzRlbYLvpiHTck', '2018-03-15 09:35:05', '2018-03-15 09:35:05', 'Han Nguyen'),
(5, 'admin', '$2y$10$RMi8h29iC1xjPslbn85jNu.9E/GG.J0.WQFwhx0rc7DIMMpSrfmGe', 1, 'Posud4Sj8hNVw92H2PhkUDAhrdChnDInuvmcHuq19rwc4d1kX0CdPr5Aw6Qt', NULL, NULL, 'Admin'),
(6, 'nts1997z', '$2y$10$sS36ukqLReCQgOZmPrAsN.nYVeQ2VUt6hH6Wd1.m1EZp7YVr60Oou', 1, NULL, NULL, NULL, 'Sau Nguyen'),
(7, 'minhnguyen', '$2y$10$hfY8s5ri8yI1O.JbPenz/.ZiylJZNfQGYi2TydYmNhv.7xDPQpkxe', 1, NULL, '2018-03-16 21:04:00', '2018-03-16 21:04:00', 'Minh Nguyen'),
(8, 'nts1997z@gmail.com', '$2y$10$NCrstk3O5eaiaSqjS5IsfubJs/iRzD3Q8SNgs1p5OOR6VYesrteP.', 2, NULL, '2018-03-18 03:12:27', '2018-03-18 03:12:27', 'Sau Nguyen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id_c_foreign` (`id_c`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_p_foreign` (`id_p`),
  ADD KEY `comment_id_c_foreign` (`id_c`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id_user_foreign` (`id_user`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_bill_id_b_foreign` (`id_b`),
  ADD KEY `detail_bill_id_p_foreign` (`id_p`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_type_foreign` (`id_type`),
  ADD KEY `product_id_publish_foreign` (`id_publish`);

--
-- Indexes for table `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publish`
--
ALTER TABLE `publish`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_id_c_foreign` FOREIGN KEY (`id_c`) REFERENCES `customer` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_c_foreign` FOREIGN KEY (`id_c`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comment_id_p_foreign` FOREIGN KEY (`id_p`) REFERENCES `product` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_id_b_foreign` FOREIGN KEY (`id_b`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `detail_bill_id_p_foreign` FOREIGN KEY (`id_p`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_publish_foreign` FOREIGN KEY (`id_publish`) REFERENCES `publish` (`id`),
  ADD CONSTRAINT `product_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
