-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 04:43 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gitar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kd_admin` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama`, `alamat`, `telp`, `uname`, `pass`) VALUES
('ADM-001', 'admin', 'admin', '080000000', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `body`
--

CREATE TABLE `body` (
  `kd_body` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body`
--

INSERT INTO `body` (`kd_body`, `nama`, `harga`, `gambar`, `merek`) VALUES
('bd_001', 'Body Tua', 15000, 'gambar/neraca_lajur.png', 'Radiant'),
('bd_002', 'Bd Tua d', 250000, 'gambar/pendapatan.png', 'Start'),
('bd_003', 'Kneap', 3000, 'gambar/add.png', 'Leign');

-- --------------------------------------------------------

--
-- Table structure for table `bridge`
--

CREATE TABLE `bridge` (
  `kd_bridge` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bridge`
--

INSERT INTO `bridge` (`kd_bridge`, `nama`, `harga`, `gambar`, `merek`) VALUES
('br_001', 'qw', 2200, 'gambar/1191310595acopy_zpsf810e98f.png', 'Yamaha'),
('br_002', 'Bridge old', 15000, 'gambar/admin.png', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `chat_admin`
--

CREATE TABLE `chat_admin` (
  `id_chat_a` int(22) NOT NULL,
  `tgl` datetime NOT NULL,
  `isi_chat` text NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kd_admin` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_admin`
--

INSERT INTO `chat_admin` (`id_chat_a`, `tgl`, `isi_chat`, `kd_pelanggan`, `status`, `kd_admin`) VALUES
(11, '2017-01-24 12:08:48', 'pie?', '3', '0', 'ADM'),
(12, '2017-01-24 12:09:41', 'ada apa', '3', '0', 'ADM'),
(13, '2017-01-24 12:09:48', 'uyyy', '3', '0', 'ADM');

-- --------------------------------------------------------

--
-- Table structure for table `chat_anggota`
--

CREATE TABLE `chat_anggota` (
  `id_chat_p` int(255) NOT NULL,
  `tgl` datetime NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `isi_chat` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_anggota`
--

INSERT INTO `chat_anggota` (`id_chat_p`, `tgl`, `kd_pelanggan`, `isi_chat`, `status`) VALUES
(39, '2017-01-24 12:06:02', '3', 'mas..', '0'),
(40, '2017-01-24 12:11:13', '3', 'adadas', '0'),
(41, '2017-02-20 22:48:34', '2', 'mas ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `det_pemesanan`
--

CREATE TABLE `det_pemesanan` (
  `kd_det_pemesanan` varchar(32) NOT NULL,
  `kd_pemesanan` varchar(32) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `hrg_produk` double(22,0) NOT NULL,
  `jml_produk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fret`
--

CREATE TABLE `fret` (
  `kd_fret` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fret`
--

INSERT INTO `fret` (`kd_fret`, `nama`, `harga`, `gambar`, `merek`) VALUES
('fr_001', 'fret Tua X', 15000, 'gambar/icon-transaksi-aman.png', 'Star'),
('fr_002', 'freet ds', 9000, 'gambar/add.png', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `headstock`
--

CREATE TABLE `headstock` (
  `kd_headstock` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headstock`
--

INSERT INTO `headstock` (`kd_headstock`, `nama`, `harga`, `gambar`, `merek`) VALUES
('hs_001', 'headstock Tua S', 15000, 'gambar/images.png', 'Yamaha'),
('hs_002', 'asd', 15000, 'gambar/buku_besar.png', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kayu`
--

CREATE TABLE `jenis_kayu` (
  `kd_kayu` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kayu`
--

INSERT INTO `jenis_kayu` (`kd_kayu`, `nama`, `harga`, `gambar`, `merek`) VALUES
('ky_002', 'asd', 9000, 'gambar/add.png', 'Yamaha'),
('ky_003', 'asd', 9000, 'gambar/artikel1.png', 'Star');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `usernm` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama`, `alamat`, `telp`, `usernm`, `pass`, `email`) VALUES
(2, 'Hendro', 'asdasd', '081226591015', 'asd', 'asd', 'riadia72@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `bank` varchar(32) NOT NULL,
  `kd_pemesanan` varchar(32) NOT NULL,
  `nm_rek` varchar(32) NOT NULL,
  `no_rek` varchar(32) NOT NULL,
  `nota_bukti` text NOT NULL,
  `status` varchar(5) NOT NULL,
  `tgl_transfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pemesanan` varchar(32) NOT NULL,
  `kd_pelanggan` varchar(13) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `hrg_total` double(22,0) NOT NULL,
  `ongkir` double(22,0) NOT NULL,
  `status` int(255) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(32) NOT NULL,
  `no_resi` varchar(32) NOT NULL,
  `kd_pemesanan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `kd_pickup` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`kd_pickup`, `nama`, `harga`, `gambar`, `merek`) VALUES
('pk_001', 'amins', 15000, 'gambar/039017-green-jelly-icon-transport-travel-transportation-bicycle-motor.png', 'Yamaha'),
('pk_002', 'asd', 15000, 'gambar/investor.png', 'Radiant');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(32) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `gambar`, `jumlah`, `berat`) VALUES
('pr_001', 'Gitar Listrik Star origin', 150000, 'gambar/_c801726_image_0.jpg', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk_custom`
--

CREATE TABLE `produk_custom` (
  `id_produk_custom` varchar(13) NOT NULL,
  `kd_pelanggan` varchar(13) NOT NULL,
  `kd_headstock` varchar(32) NOT NULL,
  `kd_fret` varchar(32) NOT NULL,
  `kd_body` varchar(32) NOT NULL,
  `kd_bridge` varchar(32) NOT NULL,
  `kd_pickup` varchar(32) NOT NULL,
  `kd_warna` varchar(32) NOT NULL,
  `kd_senar` varchar(32) NOT NULL,
  `kd_jenis_kayu` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `senar`
--

CREATE TABLE `senar` (
  `kd_senar` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senar`
--

INSERT INTO `senar` (`kd_senar`, `nama`, `harga`, `gambar`, `merek`) VALUES
('sn_001', 'sdf', 2200, 'gambar/admin.png', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `kd_warna` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` double(22,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`kd_warna`, `nama`, `harga`, `gambar`, `merek`) VALUES
('wn_001', 'asd', 15000, 'gambar/1191310595acopy_zpsf810e98f.png', 'Argu'),
('wn_002', 'dsd', 15000, 'gambar/pengeluaran.png', 'Radiant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `body`
--
ALTER TABLE `body`
  ADD PRIMARY KEY (`kd_body`);

--
-- Indexes for table `bridge`
--
ALTER TABLE `bridge`
  ADD PRIMARY KEY (`kd_bridge`);

--
-- Indexes for table `chat_admin`
--
ALTER TABLE `chat_admin`
  ADD UNIQUE KEY `unique_id_chat_admin` (`id_chat_a`);

--
-- Indexes for table `chat_anggota`
--
ALTER TABLE `chat_anggota`
  ADD UNIQUE KEY `unique_id_char_user` (`id_chat_p`);

--
-- Indexes for table `fret`
--
ALTER TABLE `fret`
  ADD PRIMARY KEY (`kd_fret`);

--
-- Indexes for table `headstock`
--
ALTER TABLE `headstock`
  ADD PRIMARY KEY (`kd_headstock`);

--
-- Indexes for table `jenis_kayu`
--
ALTER TABLE `jenis_kayu`
  ADD PRIMARY KEY (`kd_kayu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`kd_pickup`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_custom`
--
ALTER TABLE `produk_custom`
  ADD PRIMARY KEY (`id_produk_custom`);

--
-- Indexes for table `senar`
--
ALTER TABLE `senar`
  ADD PRIMARY KEY (`kd_senar`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`kd_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_admin`
--
ALTER TABLE `chat_admin`
  MODIFY `id_chat_a` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `chat_anggota`
--
ALTER TABLE `chat_anggota`
  MODIFY `id_chat_p` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kd_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
