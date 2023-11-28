-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 02.59
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(8) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Irvan Pramana', 'admin', '0f359740bd1cda994f8b55330c86d845'),
(3, 'Fernando', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(8) NOT NULL,
  `nama_brand` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `nama_brand`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Xiaomi'),
(4, 'Infinix'),
(6, 'Oppo'),
(8, 'Vivo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id_customer` int(8) NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customers`
--

INSERT INTO `tbl_customers` (`id_customer`, `nama_customer`, `email`, `password`, `created_at`) VALUES
(4, 'Irvan Pramana Putra', 'darknet1255@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-10-30 08:08:50'),
(5, 'irvan pramana', 'irvandotdev@gmail.com', '0f359740bd1cda994f8b55330c86d845', '2023-11-21 07:08:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_orders`
--

CREATE TABLE `tbl_detail_orders` (
  `id_details` int(11) NOT NULL,
  `no_order` varchar(50) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_orders`
--

INSERT INTO `tbl_detail_orders` (`id_details`, `no_order`, `id_product`, `qty`) VALUES
(1, '20231127VTEOXSY1', 14, 1),
(2, '20231128DG9UMNXY', 16, 1),
(3, '20231128BAMT5RK2', 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_order` int(8) NOT NULL,
  `id_customer` int(8) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_penerima` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `courier` varchar(20) NOT NULL,
  `layanan_courier` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL,
  `ongkir` int(8) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_bayar` text,
  `provider` varchar(50) DEFAULT 'midtrans',
  `status` smallint(6) DEFAULT '0',
  `no_resi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_orders`
--

INSERT INTO `tbl_orders` (`id_order`, `id_customer`, `no_order`, `tgl_order`, `nama_penerima`, `no_telp`, `provinsi`, `kota`, `alamat`, `courier`, `layanan_courier`, `weight`, `ongkir`, `total_bayar`, `bukti_bayar`, `provider`, `status`, `no_resi`) VALUES
(1, 4, '20231127VTEOXSY1', '2023-11-27 18:21:35', 'Irvan Pramana', '085156025161', '9,Jawa Barat', '79,Bogor Kota', 'Perum haji. Blok A no 180. Kec. Bogor Utara Kel.Cimahpar 16155', 'tiki', 'REG', 1000, 9000, 1833000, NULL, 'midtrans', 2, 'TIKI-12712551792'),
(2, 4, '20231128DG9UMNXY', '2023-11-27 23:33:24', 'Irvan pramana putra', '085156025161', '9,Jawa Barat', '79,Bogor Kota', 'Jln. Untung partowijoyo 2 no 108 \r\nRt3/rw3 kel.cimahpar \r\nkec.bogor utara', 'jne', 'CTC', 1000, 10000, 3510000, NULL, 'midtrans', 3, 'JNE-6172126612'),
(3, 4, '20231128BAMT5RK2', '2023-11-28 01:40:23', 'Irvan pramana putra', '085156025161', '9,Jawa Barat', '79,Bogor Kota', 'Jln. Untung partowijoyo 2 no 108\r\nRt3/rw3 kel.cimahpar\r\nkec.bogor utara', 'pos', 'Pos Nextday', 1000, 16000, 1840000, NULL, 'midtrans', 3, 'POS-127816256125');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(8) NOT NULL,
  `title` varchar(25) NOT NULL,
  `id_category` int(8) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `title`, `id_category`, `description`, `price`, `weight`, `discount`, `img`) VALUES
(14, 'Samsung Galaxy A13', 1, '<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Release Date :&nbsp;</span>2022</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Screen size :&nbsp;</span>6.6 inches</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Resolution :&nbsp;</span>1080 x 2408 pixels</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">OS :&nbsp;</span>Android 12, upgradable to Android 13, One UI 5.1</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Main Camera :&nbsp;</span>50 MP (wide), 5 MP (ultrawide), 2 MP (macro), 2 MP (depth)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Selfie Camera :&nbsp;</span>8 MP (wide)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">SIM Card :&nbsp;</span>Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Sensors :&nbsp;</span>Fingerprint (side-mounted), accelerometer, compass</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Network :&nbsp;</span>GSM / HSPA / LTE</p>\r\n</div>\r\n</div>', 1920000, 1000, 5, 'samsung.png'),
(15, 'Samsung Galaxy S21 Ultra ', 1, '<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Release Date :&nbsp;</span>2021, January 14</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Screen Size :&nbsp;</span>6.5 inches</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Resolution :&nbsp;</span>1080 x 2400 pixels</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">OS :&nbsp;</span>Android 12, One UI 4.1</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Main Camera :&nbsp;</span>64 MP (wide), 12 MP (ultrawide), 5 MP (macro), 5 MP (depth)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Selfie Camera :&nbsp;</span>32 MP (wide)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">SIM Card :&nbsp;</span>Nano-SIM</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Sensors :&nbsp;</span>Fingerprint (under display, optical), accelerometer, gyro, compass, barometer Virtual proximity sensing</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Network :&nbsp;</span>GSM / HSPA / LTE/ 5G</p>\r\n</div>\r\n</div>', 17030000, 1000, 10, 'Galaxy_S21_Ultra_5G1.jpg'),
(16, 'Oppo Reno 6 Aurora', 6, '<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Release Date :&nbsp;</span>2021</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Camera :&nbsp;</span>64 MP (wide), 8 MP (ultrawide), 2 MP (macro), 2 MP (depth)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Selfie :&nbsp;</span>44 MP</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Screen Size :&nbsp;</span>6.4 inches</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Resolution :&nbsp;</span>1080 x 2400 pixels</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">SIM Card :&nbsp;</span>Dual SIM (Nano-SIM, dual stand-by)</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Sensors :&nbsp;</span>Fingerprint (under display, optical), accelerometer, gyro, proximity, compass</p>\r\n</div>\r\n</div>\r\n<div class=\"matrix-table__item\" data-v-5b447398=\"\">\r\n<div class=\"product-specification-item\" data-v-1e7e1322=\"\" data-v-5b447398=\"\">\r\n<p data-v-1e7e1322=\"\"><span class=\"product-specification-item__name\" data-v-1e7e1322=\"\">Network :&nbsp;</span>GSM / HSPA / LTE</p>\r\n</div>\r\n</div>', 3500000, 1000, 0, 'Reno6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shop_settings`
--

CREATE TABLE `tbl_shop_settings` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_shop_settings`
--

INSERT INTO `tbl_shop_settings` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `email`) VALUES
(1, 'BeliHp', 22, '<p>Desa Cimahpar, RT/RW : 003/003, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat, 16155</p>', 'admin@beligadget.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id_slider` int(11) NOT NULL,
  `nama_slider` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`id_slider`, `nama_slider`, `link`, `img`, `status`) VALUES
(1, 'Diskon Gebyar', 'http://localhost/beligadget/', 'carousel.png', 1),
(7, 'Diskon Apple', 'http://localhost/beligadget/', 'slider1.png', 0),
(8, 'Diskon Lepi', 'http://localhost/beligadget/', 'slider2.png', 0),
(11, 'Anjay Mabar', 'http://localhost/beligadget/store/detail_product/14', 'WhatsApp_Image_2023-11-26_at_13_40_02_d3a8caae.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  ADD PRIMARY KEY (`id_details`);

--
-- Indeks untuk tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tbl_shop_settings`
--
ALTER TABLE `tbl_shop_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id_customer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_order` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_shop_settings`
--
ALTER TABLE `tbl_shop_settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
