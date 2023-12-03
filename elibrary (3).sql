-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 06:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `password`) VALUES
(1, 'raddva', 'Nadya Auradiva', '$2y$10$EzrtkEBkIefdBqb73EuCXuChveyzX.VdmWPNGlogXqaRVJTdaAk6C'),
(2, 'sarasmutiaaf', 'Saras Mutia Arofah', '$2y$10$2aqTVTOaIdOu.fX4cjdv1OuesMePSQ7LlF9ntuYuI8jUDZkwbTOJm');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_penulis` int(5) NOT NULL,
  `id_penerbit` int(5) NOT NULL,
  `kategori` enum('Buku','Komik','Novel') NOT NULL,
  `genre` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `slug`, `id_penulis`, `id_penerbit`, `kategori`, `genre`, `gambar`, `stok`, `deskripsi`, `file`) VALUES
('B0001', 'Penance', 'penance', 2, 4, 'Buku', 'Drama', 'pen.jpg', 198, '“Meski Tuhan mengampuni kalian, aku tidak.”Lima belas tahun lalu, seorang gadis kecil bernama Emily dibunuh di sebuah desa yang tenang. Empat anak perempuan yang waktu itu sedang bermain bersama Emily tidak bisa memberikan kesaksian yang berarti padahal mereka berjumpa dengan laki-laki pembunuhnya. Akibatnya, penyelidikan pun mandek. Ibu almarhumah Emily tidak terima, memanggil keempat anak tersebut, kemudian mengancam mereka, “Temukan pelakunya sebelum kasusnya kedaluwarsa, atau ganti rugi dengan cara yang bisa kuterima. Jika tidak, aku akan membalas dendam kepada kalian.”Ketika keempat anak yang menanggung beban besar di pundakmereka itu tumbuh dewasa, tragedi demi tragedy pun terjadi secara beruntun....', 'default.pdf'),
('B0002', 'Giselle', 'giselle', 1, 4, 'Novel', 'Misteri, Romance', 'gis.jpg', 107, 'Lima belas tahun yang lalu, prima balerina Himemiya Mayumi tak sengaja menusuk dirinya sendiri hingga mati dalam usahanya menyerang Karebayashi Reina, saat balet ', 'main.pdf'),
('B0004', 'Your Name', 'your-name', 3, 4, 'Novel', 'Novel Remaja', 'ynharu.jpg', 49, 'Karakter utama film animasi \"Kimi No Na wa\" ada dua yaitu Mitsuha Miyamizu yang tinggal di pedesaan dan Taki Tachibana yang tinggal di Tokyo. Ada pun sejumlah karakter pendukung yang membuat certa semakin menarik. Mereka berdua adalah siswa SMA di sekolah masing-masing. Mitsuha digambarkan sebagai gadis penuh semangat yang lahir dari keluarga pemegang kepercayaan sinto. Sedangkan Taki Tachibana memiliki gaya hidup yang berbeda sebagai remaja di ibu kota Tokyo sebagaimana sudah kekinian.  Anime ini memadukan genre fantasi dan romantis sehingga menjadi lebih menarik. Anime \"Kimi no Na wa\" bermula dari Mitsuha yang terbangun dari tidurnya dan menemui jiwanya ada di tubuh orang lain yaitu tubuh Taki Tachibana yang ada di Tokyo. Mitsuha dan Taki tak saling mengenal, tapi mereka membuat catatan di berbagai tempat agar saat tubuh mereka kembali normal, mereka bisa mengetahui hal-hal yang sudah dilakukan selama itu. Mereka akhirnya menyadari bahwa jiwanya selalu bertukar tubuh saat bangun tidur. Namun, suatu ketika akhirnya keduanya tidak lagi saling bertukar tubuh, sehingga Taki menjadi penasaran dan memutuskan untuk mencari Mitsuha ke desa Itomori. Sayangnya, Taki akhirnya menemukan fakta bahwa desa Itomori milik Mitsuha sudah lenyap sejak beberapa tahun lalu akibat tertimpa komet dan Mitsuha ada di daftar korban bencana tersebut. ', 'main.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_pinjam`, `id_buku`) VALUES
(10, 'B0004'),
(11, 'B0004'),
(12, 'B0001'),
(13, 'B0001'),
(14, 'B0001'),
(14, 'B0002');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_user` varchar(255) NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `id_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_user`, `id_buku`, `id_pinjam`) VALUES
('U0006', 'B0004', 10),
('U0006', 'B0004', 11),
('U0002', 'B0001', 12),
('U0002', 'B0001', 13);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(5) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Gramedia Pustaka Utama'),
(2, 'Deepublish'),
(3, 'Bukunesia'),
(4, 'Penerbit Haru'),
(5, 'Inari');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(5) NOT NULL,
  `nama_penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(1, 'Akiyoshi Rikako'),
(2, 'Minato Kanae'),
(3, 'Makoto Shinkai'),
(4, 'Sumino Yoru'),
(5, 'Ichikawa Takuji'),
(6, 'Yonezawa Honobu'),
(7, 'Chinen Mikito');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tenggat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `tenggat`) VALUES
(10, 'U0006', '2023-12-01', '2023-12-01', '2023-12-08'),
(11, 'U0006', '2023-12-01', '2023-12-01', '2023-12-08'),
(12, 'U0002', '2023-12-01', '2023-12-01', '2023-12-08'),
(13, 'U0002', '2023-12-01', '2023-12-01', '2023-12-08'),
(14, 'U0002', '2023-12-01', NULL, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `name`, `username`, `password`, `email`) VALUES
('U0001', 'Nadya Auradiva', 'raddva', '$2y$10$6eagz5wy48whNH7hBUJzzu2dQyn4SdS/XDs5dR1DeQatxhqWQ3k56', 'areraraas@gmail.com'),
('U0002', 'Saras Mutia Arf', 'sarasmutiaaf', '$2y$10$HxWUJfMBPqEmVicvC/BIj.0AmUdSBHb9b9lQfP5.s9tYm6fAW0iEG', 'sarasmutia163@gmail.com'),
('U0003', 'Sheila Syandana', 'sheiladsya', '$2y$10$uxyxNdBCgAhU3bl.l9SiOOjdMcxxSiazZb3HDYIKruBimHLLOK9RS', 'sheilasyandana@gmail.com'),
('U0004', 'Nadya Aura', 'nadyea', '$2y$10$zzyTHvug3fY6u1TBVW3/.ubaLBjefD/6c5vldwjtUbGXTlqtU5VsS', 'nadyea@gmail.com'),
('U0005', 'Nadya', 'auradiva', '$2y$10$Z.TfXf01.QrN./9Zi4EAYe9Qz8X4U04RoV7xdZQ5HqnVJdWJQLZwC', 'auradiva@gmail.com'),
('U0006', 'Saras Mutia Arf', 'sarasmut', '$2y$10$NuMrAJ21rL4F4ihkpz7qzucHWu4yECqbl1uXsTQHZ5Xyhnau7N36O', 'sarasmutia163@gmail.com'),
('U0007', 'saras', 'sarasmutiaa', '$2y$10$lsrO2m.L2DwmI5kzPF8Y3./7LKKrcKdwxjXG7ojYZ1lWItICKwhjS', 'sarasmutia163@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_list` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_list`, `id_user`, `id_buku`) VALUES
(5, 'U0004', 'B0002'),
(6, 'U0004', 'B0004'),
(7, 'U0005', 'B0002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `wishlist_ibfk_1` (`id_user`),
  ADD KEY `wishlist_ibfk_2` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`);

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `pinjam` (`id_pinjam`),
  ADD CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`id_pinjam`) REFERENCES `pinjam` (`id_pinjam`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
