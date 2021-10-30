-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 06:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneytree`
--

-- --------------------------------------------------------

--
-- Table structure for table `moneydata`
--

CREATE TABLE `moneydata` (
  `Username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `coins` int(255) DEFAULT NULL,
  `num_transaction` int(255) DEFAULT NULL,
  `Loan_Count` int(255) DEFAULT NULL,
  `LoanAmount` int(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moneydata`
--

INSERT INTO `moneydata` (`Username`, `coins`, `num_transaction`, `Loan_Count`, `LoanAmount`) VALUES
('aaaaa', 100, 0, 0, 0),
('aaaaaaaaa', 100, 0, 0, 0),
('beci', 105, 0, 0, 0),
('berat', 1165, 3, 11, 0),
('berat123', 140, 2, 1, 100),
('BeratAhmetaj', 545, 3, 1, 500),
('besamaaa', 100, 0, 0, 0),
('MKberat', 50, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactionsdata`
--

CREATE TABLE `transactionsdata` (
  `UsersTransaction` int(255) DEFAULT 0,
  `transaction_id` int(100) NOT NULL,
  `FromUser` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `ToUser` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Amount` int(255) NOT NULL,
  `Smetka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactionsdata`
--

INSERT INTO `transactionsdata` (`UsersTransaction`, `transaction_id`, `FromUser`, `ToUser`, `Amount`, `Smetka`, `Reason`, `Date`) VALUES
(1, 34, 'berat', 'beci', 5, '', '', '2021-03-06 14:49:31.200133'),
(2, 35, 'berat', 'berat', 53, '', '', '2021-03-12 12:33:24.674613'),
(3, 36, 'berat', 'berat', 20, '', '', '2021-03-12 12:33:28.094401'),
(1, 37, 'MKberat', 'berat', 50, '54354', 'tt', '2021-03-13 11:52:22.488554'),
(1, 38, 'BeratAhmetaj', 'Berat', 10, '', 'podarok', '2021-03-23 12:37:39.050699'),
(2, 39, 'BeratAhmetaj', 'berat', 10, '', 'a', '2021-03-23 12:37:45.584463'),
(3, 40, 'BeratAhmetaj', 'berat', 35, '', 'a', '2021-03-23 12:37:50.844233'),
(1, 41, 'berat123', 'berat', 50, '', 'testiranje', '2021-05-15 07:34:21.510844'),
(2, 42, 'berat123', 'berat', 10, '', 'test2', '2021-05-15 07:34:30.924580');

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `Id` int(255) NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Pass` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `EMBG` int(255) DEFAULT NULL,
  `NameSurname` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `LivingAdress` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CreditCard` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CVV` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Expiry` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`Id`, `Email`, `Pass`, `Username`, `EMBG`, `NameSurname`, `LivingAdress`, `CreditCard`, `CVV`, `Expiry`) VALUES
(16, 'beratahmetaj02@gmail.com', '$2y$10$OqIo26yNJOW0mL/l0hG59eYgIKhgkkOIHB.FTgppehMb.xfbAOfeG', 'berat', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '4534 5345 3453 4534', '565', '12/21'),
(17, 'beratahmetaj02@gmail.com', '$2y$10$GcpWB5DuJewyBZX5apKNEej5mYQzwa/n9WqRY3IFpHrWRJ93Pr0w.', 'beci', 2147483647, 'besam ahmetaj', 'Skopje, Macedonia', '5324 2342 3423 4234', '433', '12/22'),
(18, 'beratahmetaj02@gmail.com', '$2y$10$ughuLeQFnpzsGMHAopt7MOlVwM7Wt4mQ0mHIHDR6rkLIsuGdbdHeC', 'aaaaa', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '4534 5345 3453 4534', '656', '12/22'),
(19, 'beratahmetaj02@gmail.com', '$2y$10$rWz/rJwy8bXA3Fb4J0WZzO8S/c3tKUMXVGy/ID0nCGNAf0eGIJSqq', 'aaaaaaaaa', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '4534 5345 3453 4534', '555', '12/21'),
(20, 'beratahmetaj02@gmail.com', '$2y$10$HCeiw9vkAhJhb4bpYeXBHO.Tzji.66YDm7Ynn0yfwJlV2PWxPJ3nK', 'MKberat', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '4534 5345 3453 4534', '545', '12/22'),
(21, 'besam.ahmetaj0070@gmail.com', '$2y$10$L1j86yRMrPkk.DtqdUy3CuMuqpoUxtPT7E1/T3iJVJ.MsJas6pX0O', 'besamaaa', 2147483647, 'besam ahmetaj', 'Skopje', '4534 5345 3453 4534', '343', '12/25'),
(22, 'beratahmetaj02@gmail.com', '$2y$10$iX4OLhrjiAng.CC3Udh7k.poT1LM2K0iu70bKh8wemvdMwFOy1cXy', 'BeratAhmetaj', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '4534 5345 3453 4534', '345', '12/22'),
(23, 'beratahmetaj02@gmail.com', '$2y$10$zfWKwNvLmCrAPGs6aDEp9.N.ow.KEfsY8vTHtMb/G8yfAOEw8iUd2', 'berat123', 2147483647, 'berat ahmetaj', 'Skopje, Macedonia', '3457 897934 53453', '543', '03/21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moneydata`
--
ALTER TABLE `moneydata`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `transactionsdata`
--
ALTER TABLE `transactionsdata`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `FromUser` (`FromUser`),
  ADD KEY `ToUser` (`ToUser`),
  ADD KEY `UsersTransaction` (`UsersTransaction`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactionsdata`
--
ALTER TABLE `transactionsdata`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moneydata`
--
ALTER TABLE `moneydata`
  ADD CONSTRAINT `money_constraint` FOREIGN KEY (`Username`) REFERENCES `usersdata` (`Username`);

--
-- Constraints for table `transactionsdata`
--
ALTER TABLE `transactionsdata`
  ADD CONSTRAINT `FromUser Const` FOREIGN KEY (`FromUser`) REFERENCES `usersdata` (`Username`),
  ADD CONSTRAINT `ToUser Const` FOREIGN KEY (`ToUser`) REFERENCES `usersdata` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
