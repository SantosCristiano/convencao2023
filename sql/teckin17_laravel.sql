-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 03:53 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teckin17_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `acompanhantes`
--

CREATE TABLE `acompanhantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nomeparticipante` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rgparticipante` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpfparticipante` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datanascimento` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franqueadoparticipante` tinyint(1) DEFAULT NULL,
  `valorparticipante` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cadastros`
--

CREATE TABLE `cadastros` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orgaoexpedidor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franqueado` tinyint(1) NOT NULL DEFAULT 1,
  `razaosocial` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `acompanhante` tinyint(1) NOT NULL,
  `numeroacompanhantes` int(11) DEFAULT NULL,
  `tipoacomodacao` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer` tinyint(1) NOT NULL,
  `aeroporto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horariovolta` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historics`
--

CREATE TABLE `historics` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('I','O','T') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `total_before` double(10,2) NOT NULL,
  `total_after` double(10,2) NOT NULL,
  `user_id_transaction` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_20_151702_create_balances_table', 1),
(4, '2019_01_20_183043_create_historics_table', 1),
(5, '2019_02_23_180202_create_cadastros_table', 1),
(6, '2019_02_23_192621_create_checkins_table', 1),
(7, '2019_02_23_194445_create_pagamentos_table', 1),
(8, '2019_03_06_143934_create_acompanhantes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `valortotal` double(10,2) NOT NULL,
  `formapagamento` int(11) NOT NULL,
  `valorparcelado` double(10,2) NOT NULL,
  `vencimento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', '', NULL, '', '2022-11-23 14:48:51', '2022-11-23 14:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acompanhantes_user_id_foreign` (`user_id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balances_user_id_foreign` (`user_id`);

--
-- Indexes for table `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cadastros_email_unique` (`email`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Indexes for table `historics`
--
ALTER TABLE `historics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historics_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagamentos_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acompanhantes`
--
ALTER TABLE `acompanhantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historics`
--
ALTER TABLE `historics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD CONSTRAINT `acompanhantes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cadastros` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cadastros` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `historics`
--
ALTER TABLE `historics`
  ADD CONSTRAINT `historics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cadastros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
