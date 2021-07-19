-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 05:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `rules` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `alamat`, `hp`, `rules`, `status`, `foto`) VALUES
(3, 'admin a', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'pekanbaru', '0812345678', 'super', 'non', 'defuld.jpg'),
(4, 'admin biasa', 'admin@admin.com', 'c4ca4238a0b923820dcc509a6f75849b', 'pekanbaru', '', 'admin', '', 'defuld.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id_custom`, `id_pesanan`, `id_item`) VALUES
(2, 'Custom152739271', 1),
(3, 'Custom152739271', 2),
(4, 'Custom152739271', 3);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_item`
--

CREATE TABLE `daftar_item` (
  `id_daf` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_item`
--

INSERT INTO `daftar_item` (`id_daf`, `paket_id`, `item_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 3, 2),
(5, 3, 3),
(6, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `item_makanan`
--

CREATE TABLE `item_makanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_paket`
--

CREATE TABLE `item_paket` (
  `id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_paket`
--

INSERT INTO `item_paket` (`id`, `item`, `harga`, `gambar`) VALUES
(1, 'kursi', '1500000', '238329053463685_d621a3a4-394f-4265-9c25-96e4a9ed5456_1080_1080.jpg'),
(2, 'tenda', '2500000', '79781810WhatsApp Image 2021-07-08 at 12.45.49 PM.jpeg'),
(3, 'pelaminan', '15000000', '88027208WhatsApp Image 2021-07-08 at 12.44.41 PM.jpeg'),
(4, 'Inda Lirta Padisma', '1500000', '62098426WhatsApp Image 2021-07-08 at 12.45.49 PM.jpeg'),
(5, 'inda lirta padisma as', '1500000', '40975120WhatsApp Image 2021-07-08 at 12.45.10 PM.jpeg'),
(6, 'inda p', '2500000', '83219165WhatsApp Image 2021-07-08 at 12.44.41 PM.jpeg'),
(7, 'inda p', '1500000', '58754083463685_d621a3a4-394f-4265-9c25-96e4a9ed5456_1080_1080.jpg'),
(8, 'kursi', '2500000', '21985584WhatsApp Image 2021-07-08 at 12.45.10 PM.jpeg'),
(9, 'Inda Lirta Padisma', '1500000', '66822490WhatsApp Image 2021-07-08 at 12.44.57 PM.jpeg'),
(10, 'Inda Lirta Padisma', '1500000', '77580208WhatsApp Image 2021-07-08 at 12.45.10 PM.jpeg'),
(11, 'Inda Lirta Padisma', '2500000', '36463763WhatsApp Image 2021-07-08 at 12.45.49 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_makanan`
--

CREATE TABLE `kategori_makanan` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_makanan`
--

INSERT INTO `kategori_makanan` (`id_kategori`, `kategori`) VALUES
(5, 'makanan utama'),
(6, 'makanan pembuka'),
(7, 'makanan penutup / pencuci mulut');

-- --------------------------------------------------------

--
-- Table structure for table `ketring`
--

CREATE TABLE `ketring` (
  `id_ketring` int(110) NOT NULL,
  `pesanan_id` varchar(110) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ketring`
--

INSERT INTO `ketring` (`id_ketring`, `pesanan_id`, `jumlah`, `id_makanan`) VALUES
(2, '140006439', 100000, 5),
(4, '140006439', 100, 6),
(5, '1', 500, 7),
(6, '1', 500, 9),
(7, '1', 500, 10),
(8, 'Custom152739271', 500, 5),
(9, 'Custom152739271', 100, 6),
(10, 'Custom152739271', 400, 7),
(11, 'Custom152739271', 500, 8),
(12, 'Custom152739271', 500, 9),
(13, 'Custom152739271', 500, 10),
(14, 'Custom152739271', 500, 11);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `makanan` varchar(225) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `id_kategori`, `makanan`, `harga`, `gambar`) VALUES
(5, 5, 'ayam goreng', '10000', '86727961ayam.jpeg'),
(6, 5, 'rendang', '15000', '4034420rendang.jpeg'),
(7, 5, 'gulai ayam', '13000', '34933372gulai.jpg'),
(8, 6, 'puding coklat', '5000', '43445422pudingcoklat.jpg'),
(9, 6, 'puding pandan', '5000', '8539296pudingpandan.jpeg'),
(10, 7, 'pisang', '3000', '50490706pisang.jpg'),
(11, 7, 'apel', '5000', '43171761apel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `paket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `paket`) VALUES
(1, 'paket A'),
(2, 'Custom'),
(3, 'paket B');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `name`, `email`, `password`, `hp`, `foto`) VALUES
(1, 'Inda Lirta Padisma', 'indalirta@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '081277967050', 'defuld.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `reg` int(100) NOT NULL,
  `bukti` varchar(225) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pesanan_id`, `jumlah`, `reg`, `bukti`, `tgl_bayar`) VALUES
(4, 1, '1000000', 1234567, '99688355pisang.jpg', '2021-07-19'),
(5, 140006439, '1000000', 1234567, '36062918pudingpandan.jpeg', '2021-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(100) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_pesta` date NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `pelanggan_id`, `paket_id`, `tgl_pesan`, `tgl_pesta`, `alamat`, `status`) VALUES
('1', 1, 1, '2021-06-17', '2021-07-16', 'jl. fajar labuah baru barat pekanbaru riau', 'selesai'),
('140006439', 1, 3, '2021-07-17', '2021-07-31', 'jl. fajar labuah baru barat pekanbaru riau', 'konfirmasi'),
('2', 1, 1, '2021-07-09', '2021-07-30', 'pekanbaru', 'konfirmasi'),
('Custom152739271', 1, 2, '2021-07-17', '2021-07-24', 'jl. fajar labuah baru barat pekanbaru riau', 'konfirmasi'),
('paket A113823362', 1, 1, '2021-07-17', '2021-07-24', 'jl. fajar labuah baru barat pekanbaru riau', 'konfirmasi'),
('paket A191699080', 1, 1, '2021-07-17', '2021-07-31', 'jl. fajar labuah baru barat pekanbaru riau', 'cancel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indexes for table `daftar_item`
--
ALTER TABLE `daftar_item`
  ADD PRIMARY KEY (`id_daf`);

--
-- Indexes for table `item_makanan`
--
ALTER TABLE `item_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_paket`
--
ALTER TABLE `item_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_makanan`
--
ALTER TABLE `kategori_makanan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ketring`
--
ALTER TABLE `ketring`
  ADD PRIMARY KEY (`id_ketring`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftar_item`
--
ALTER TABLE `daftar_item`
  MODIFY `id_daf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_makanan`
--
ALTER TABLE `item_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_paket`
--
ALTER TABLE `item_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_makanan`
--
ALTER TABLE `kategori_makanan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ketring`
--
ALTER TABLE `ketring`
  MODIFY `id_ketring` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
