-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 02:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receta`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulli` varchar(255) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `klikuar` int(11) NOT NULL DEFAULT 0,
  `data_postimit` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `titulli`, `pershkrimi`, `fotografia`, `klikuar`, `data_postimit`) VALUES
(1, 1, 'Blog test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'blog/Tacos_1594418868.png', 2, '2021-02-20 00:07:48'),
(2, 1, 'Supë me perime', 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', 'blog/SupeMePerime_1594759457.jpg', 0, '2021-02-26 22:45:35'),
(3, 1, 'Supë me perime2', 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', 'blog/SupeMePerime_1594759535.jpg', 3, '2021-03-08 10:10:37'),
(4, 1, 'Supë me perime3', 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', 'blog/SupeMePerime_1594759558.jpg', 4, '2021-03-03 12:41:58'),
(5, 1, 'Blog i ri test 15', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'blog/Fasule_1594839070.jpg', 1, '2021-03-11 23:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `pershkrimi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `emri`, `pershkrimi`) VALUES
(1, 'Embelsira', 'Embelsira te lehta'),
(2, 'Fast Food', 'Ushqime te ndryshme nga fast food'),
(3, 'Pasta', 'Pasta fasta'),
(4, 'Tradicionale', 'Ushtime tonat tradicionale');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `emri_mbiemri` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `nr_tel` varchar(60) DEFAULT NULL,
  `mesazhi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `emri_mbiemri`, `email`, `nr_tel`, `mesazhi`) VALUES
(1, 'Elvis Mulaj', 'elvis.mulaj@gmail.com', '', 'as ad asd asd as da sd adas d ad asd asd as da das d asd asd as das d asd asd ad asd as dadsd as das\\r\\nNr:tel: '),
(2, 'Elvis Mulaj', 'elvis.mulaj@gmail.comm', '213', 'asdas asd asd as dsa das da sdasd asd as das d asd as das dasd asds\\r\\nNr:tel: 213');

-- --------------------------------------------------------

--
-- Table structure for table `recetat`
--

CREATE TABLE `recetat` (
  `id` int(11) NOT NULL,
  `titulli` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `shteti_id` int(11) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `perberesit` text DEFAULT NULL,
  `pergaditja` text DEFAULT NULL,
  `data_postimit` timestamp NULL DEFAULT current_timestamp(),
  `aprovuar` tinyint(4) DEFAULT 0,
  `fotografia` varchar(255) DEFAULT NULL,
  `balline` tinyint(4) DEFAULT 0,
  `klikuar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recetat`
--

INSERT INTO `recetat` (`id`, `titulli`, `user_id`, `kategoria_id`, `shteti_id`, `pershkrimi`, `perberesit`, `pergaditja`, `data_postimit`, `aprovuar`, `fotografia`, `balline`, `klikuar`) VALUES
(2, 'Edhe nje recete e re test', 1, 1, 1, 'eeeee', 'eeeee2', 'eeeee3', '2021-03-07 22:43:01', 1, 'recetat/Dredhez_1594763433.jpg', 1, 3),
(4, 'Supë me perime', 1, 2, 2, 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', 'Një supë e lehtë, plot shije, e thjeshtë në përgatitje por e pasur në vitamina dhe minerale. Kjo është pjata fantastike që sigurisht zgjon organizmin duke i ofruar atij gjallëri, energji dhe imunitet të fortë.', '2021-03-08 20:43:01', 1, 'recetat/SupeMePerime_1594759381.jpg', 1, 1),
(5, 'Embelsire me dredhëz', 1, 1, 1, 'Torta me luleshtrydhe e çokollatë është një ëmbëlsirë e dëshiruar nga të gjithë, si fëmijë e të rritur. Eshtë një tortë shumë e lehtë per tu përgaditur dhe e shpejtë', 'Torta me luleshtrydhe e çokollatë është një ëmbëlsirë e dëshiruar nga të gjithë, si fëmijë e të rritur. Eshtë një tortë shumë e lehtë per tu përgaditur dhe e shpejtë2', 'Torta me luleshtrydhe e çokollatë është një ëmbëlsirë e dëshiruar nga të gjithë, si fëmijë e të rritur. Eshtë një tortë shumë e lehtë per tu përgaditur dhe e shpejtë3', '2021-03-10 21:50:33', 1, 'recetat/Dredhez_1594763433.jpg', 1, 4),
(6, 'Byrek me djathë', 1, 2, 2, 'Byreku me djath është plot kalcium.Për shkak se përmban mjaft yndyrna shtazore nuk duhet ta gatuani shumë shpesh mbrenda javës.', 'Byreku me djath është plot kalcium.Për shkak se përmban mjaft yndyrna shtazore nuk duhet ta gatuani shumë shpesh mbrenda javës.2', 'Byreku me djath është plot kalcium.Për shkak se përmban mjaft yndyrna shtazore nuk duhet ta gatuani shumë shpesh mbrenda javës.3', '2021-03-14 21:52:17', 1, 'recetat/Byrek_1594763537.jpg', 1, 12),
(7, 'Receta e Rites', 2, 2, 1, 'Pershkrim i lehte', 'Pershkrim i lehte2', 'Pershkrim i lehte3', '2021-03-15 18:44:47', 1, 'recetat/EmbPranveres_1594838687.jpg', 1, 2),
(8, 'Receta e Elzes', 3, 2, 2, 'Sufllaqe te lehta dhe te shishme Donec eget eros nisl. Proin pulvinar urna vel libero porttitor bibendum. Mauris non leo nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras sagittis rhoncus enim vehicula faucibus. Integer aliquam elementum nisl in tempor.<br />\r\n<br />\r\nMorbi vulputate eros et dignissim sagittis. Vivamus vitae bibendum mi. Proin gravida pulvinar congue. Integer vel varius enim, et iaculis turpis. Proin in nulla id eros tempus pulvinar. Fusce consectetur, lacus et varius condimentum, eros urna iaculis erat, non molestie lacus erat quis nulla. Sed fringilla tortor nec nisi luctus, et rutrum orci tristique.', 'Donec eget eros nisl. Proin pulvinar urna vel libero porttitor bibendum. Mauris non leo nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras sagittis rhoncus enim vehicula faucibus. Integer aliquam elementum nisl in tempor.<br />\r\n<br />\r\nMorbi vulputate eros et dignissim sagittis. Vivamus vitae bibendum mi. Proin gravida pulvinar congue. Integer vel varius enim, et iaculis turpis. Proin in nulla id eros tempus pulvinar. Fusce consectetur, lacus et varius condimentum, eros urna iaculis erat, non molestie lacus erat quis nulla. Sed fringilla tortor nec nisi luctus, et rutrum orci tristique.', 'Donec eget eros nisl. Proin pulvinar urna vel libero porttitor bibendum. Mauris non leo nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras sagittis rhoncus enim vehicula faucibus. Integer aliquam elementum nisl in tempor.<br />\r\n<br />\r\nMorbi vulputate eros et dignissim sagittis. Vivamus vitae bibendum mi. Proin gravida pulvinar congue. Integer vel varius enim, et iaculis turpis. Proin in nulla id eros tempus pulvinar. Fusce consectetur, lacus et varius condimentum, eros urna iaculis erat, non molestie lacus erat quis nulla. Sed fringilla tortor nec nisi luctus, et rutrum orci tristique.', '2021-03-16 23:54:01', 1, 'recetat/79d1425c7ee752db714f5e97bf3d6c8d_1597967641.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rreth_nesh`
--

CREATE TABLE `rreth_nesh` (
  `id` int(11) NOT NULL,
  `titulli` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rreth_nesh`
--

INSERT INTO `rreth_nesh` (`id`, `titulli`, `text`) VALUES
(1, 'Kush jemi ne', '<p>Receta ime është faqe e krijuar me shumë dashuri dhe përkushtim që të sjellë në shtëpit tuaja receta duke filluar nga tradicionalja deri në pjatat evropiane.Llojllojshmëria e këtyre recetave është gërshëtim I recetave personale nga ana jonë dhe po ashtu të postuara me shumë dashuri edhe nga persona të cilët kanë ndarë pjatat e tyre tek ne.</p>\r\n\r\n            <p>Receta ime për herë të parë u krijua ne vitin 2020, dhe deri më tani kemi pasur një suksesë shumë të mire dhe po ashtu një kualitet të tillë.Të gjitha recetat e postuara në faqen tonë janë receta të cilat së pari janë provuar nga ne para se të postohen dhe të shikohen nga ju. Deri më tani kemi pasur nje diversitet ushqimorë, dhe së shpejti do të sigurohemi që të sjellim edhe kulturën aziatike në pjatat e juaja.</p>\r\n\r\n            <p>Fokusi kryesor I faqës sonë padyshim  që janë ushqimet tradicionale shqiptare. Me një kujdes dhe përkushtim kemi siguruar receta nga tradita jonë, duke filluar nga tradita të ndryshme shqipfolëse.Shpresoj që edhe ju do të jepni kontributin tuaj duke postuar receten tuaj ne faqen tonë.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `shtetet`
--

CREATE TABLE `shtetet` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `fotografia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shtetet`
--

INSERT INTO `shtetet` (`id`, `emri`, `fotografia`) VALUES
(1, 'Kosova', 'shtetet/Kosove_1594848176.jpg'),
(2, 'Shqiperia', 'shtetet/Shqiperi_1594848148.jpg'),
(3, 'Evropa', 'shtetet/Evrope_1594848242.jpg'),
(4, 'Bota', 'shtetet/Bote_1594848251.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(60) NOT NULL,
  `mbiemri` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `biografia` text DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `email`, `password`, `biografia`, `level`) VALUES
(1, 'Elvis', 'Mulaj', 'elvismulaj@gmail.com', '$2y$10$umnAJfqCPDSJQ46c2o0jkOyByyQXYG43BWZq5FZYxvznDHZ3xLDQm', 'Student ne UBT', 2),
(2, 'Blerina', 'Berjani', 'blerina@gmail.com', '$2y$10$gHKyAwLHQroztCupu1trDukOlA07JQQmUqxfUHKWn757mCeUdamTu', 'Studente ne UBT', 1),
(3, 'Elvis', 'Mulaj', 'elvis@gmail.com', '$2y$10$vXCa.hH2Z3HN0D7e4iLQzO3itiuctz3NZzjdTdapbB07Asd8Ys3OK', 'Studente ne UBT', 2),
(4, 'Shqipdoni', 'Arsimi', 'flakron@gmail.com', '$2y$10$krj8EQJlHYoHbqPG7Bpi9OvWMU91HqWRvah4csz/ZdVrmtwt93pjW', 'Student ne UBT', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recetat`
--
ALTER TABLE `recetat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rreth_nesh`
--
ALTER TABLE `rreth_nesh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shtetet`
--
ALTER TABLE `shtetet`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recetat`
--
ALTER TABLE `recetat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rreth_nesh`
--
ALTER TABLE `rreth_nesh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shtetet`
--
ALTER TABLE `shtetet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
