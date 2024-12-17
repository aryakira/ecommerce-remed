-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 05:51 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'Dr. Marteens Boot', 'Core 1460 Bex Unisex Boots - Black Smooth\r\n\r\nRincian\r\nSKU: A8F96SHA126F41GS\r\nWarna: Black\r\nHeels: Flat, Funnel\r\nJenis Jari Kaki: Sepatu Closed Toe\r\nBentuk Jari Kaki: Bulat', 3599100.00, 'jyzoopvy.png', '2024-12-16 04:12:01'),
(11, 'Dr. Marteens', 'The black 3-eye 1461 shoe is reworked with the ‘Crystal Teeth’ from the album artwork across the vamp. The upper is constructed from hardwearing Backhand and Smooth leathers with a NIN embossed rubber grain toe-cap. Set on a black commando tread sole with a yellow welt stitch. Each pair is equipped with a set of NIN and a set of pure black laces.', 2599100.00, 'psq2u1px.png', '2024-12-17 03:12:47'),
(13, 'Converse', '- Sneakers desain high-top untuk old-skool style yang ikonik\r\n- Warna Forest/Olive (hijau)\r\n- Upper kanvas\r\n- Insole tekstil\r\n- Rubber outsole\r\n- Tali depan\r\n- Round toe\r\n- Produk unisex\r\nWarna pada gambar dapat sedikit berbeda dengan warna asli produk akibat pencahayaan saat proses photoshoot.', 1079100.00, 'a8f12wqq.png', '2024-12-17 03:36:19'),
(14, 'Converse Chuck Taylor', '- Low top sneakers bergaya klasik dalam nuansa solid tone\r\n- Kanvas upper\r\n- Tekstil insole\r\n- Rubber outsole\r\n- Tali depan\r\n- Rounded toe\r\n- Produk unisex\r\nWarna pada gambar dapat sedikit berbeda dengan warna asli produk akibat pencahayaan saat proses photoshoot.', 1099000.00, 'jmp6sscq.png', '2024-12-17 03:40:01'),
(15, 'Dr. Marteens x Sex Pistols', 'As the Sex Pistols Steve Jones tore into television host Bill Grundy live on-air in 1976, he dragged punk unceremoniously into the mainstream. 44 years on, the explosive interview remains one of punks most iconic moments. And the ideal inspiration for our second Sex Pistols collaboration. Celebrating the 1460s 60th anniversary as well as the Pistols emergence, this boot is emblazoned with Sex Pistols, Anarchy and God Save The Queen lettering. The 8-eye boots are finished with white welt stitching and a white scripted heel loop.', 3999100.00, 'tvg8x4er.png', '2024-12-17 03:47:47'),
(16, 'Converse Chuck Taylor 70s', '- Sneakers desain classic dengan warna solid\r\n- Warna hitam\r\n- Kanvas upper\r\n- Tekstil insole\r\n- Rubber outsole\r\n- Tali depan\r\n- Round toe\r\nWarna pada gambar dapat sedikit berbeda dengan warna asli produk akibat pencahayaan saat proses photoshoot.', 1079100.00, 'poo25h0d.png', '2024-12-17 03:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'user@gmail.com', '$2y$10$lI4Z4BVjZxLn7J6ALXQENOj1I31TTKUZGr0YoMTHjbXheq5Resu.G', '2024-12-16 03:28:23'),
(2, 'admin', 'user@gmail.com', '$2y$10$8CKieehIsKZSXxc8O3wZNOWCRJ7zJH9ou90TRNIDXLLNhKFkR7//G', '2024-12-16 03:28:27'),
(3, 'admin', 'user@gmail.com', '$2y$10$5ixdz4smUOAr7M3JK7csYuMSaKmupjoG4rYUatUrNkPpnhkzk/68C', '2024-12-16 03:28:57'),
(4, 'arya', 'iijo2744@gmail.com', '$2y$10$/lSY45VAITf3Je6n3pMXT.i5pZMKV9CFcjTWeq08.hdIH78mdj3TC', '2024-12-16 03:30:03'),
(5, 'arya', 'iijo2744@gmail.com', '$2y$10$nqsdVEH3THk02skBS6421uaqcWPyXN36mbGLmRDWX7oSJ5cFqzMj.', '2024-12-16 03:30:23'),
(6, 'admin', 'lualurr@gmail.com', '$2y$10$FKV.TbYrDw/91drJaBdYN.RC2cbTSjW3.agWZ5H0fxNFVVTceH3UC', '2024-12-16 03:30:42'),
(7, 'dapa', 'monyet@gmail.com', '$2y$10$R5iKOQmtQi7zUrcq3yl/vukiJNcmWAh.tqLnQIeGMyNPW1giETCB2', '2024-12-17 04:04:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
