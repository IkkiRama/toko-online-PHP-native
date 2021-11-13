-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2021 pada 00.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online_trainit_remake_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'kimak', 'a', 'Rifki Romadhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto_produk`, `id_produk`, `nama_foto_produk`) VALUES
(1, 7, '60c5bf5c6faa6.jpg'),
(2, 7, '60c5bf5c97c18.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Meja Dan Kursi'),
(2, 'Pintu'),
(6, 'KOn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 100000),
(2, 'Surabaya', 200000),
(3, 'Purbalingga', 20000),
(4, 'Dagan', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `email_pelanggan` varchar(200) NOT NULL,
  `telepon_pelanggan` int(11) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `password_pelanggan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `password_pelanggan`) VALUES
(1, 'Revatama Kimak', 'reva@gmail.com', 123456789, 'Pengalusan', 'reva'),
(4, 'Rifki Romadhan', 'rifki@gmail.com', 122345678, 'Dagan', 'rifki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_penyetor` varchar(200) NOT NULL,
  `bank_penyetor` varchar(200) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `foto_bukti_pembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_pembelian`, `nama_penyetor`, `bank_penyetor`, `jumlah_pembelian`, `foto_bukti_pembayaran`) VALUES
(1, 1, 15, 'Kasmad', 'BCA', 1020000, '60c313d27b008.jpg'),
(2, 1, 16, 'ANjay', 'BRI', 500000, '60c4b27bc6b69.jpg'),
(3, 1, 17, 'kontol', 'BNI', 420000, '60c4baa076a88.jpg'),
(4, 4, 18, 'PUKKI', 'Bank Riau', 1600000, '60c4c29db56c4.jpg'),
(5, 4, 20, 'Jabud', 'BRI', 7800000, '60c4c8bd3a571.png'),
(6, 4, 22, 'KIMAKKKKK', 'Bank A', 21600000, '60c5926b3511e.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `alamat_pengiriman` varchar(200) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `resi_pengiriman` varchar(20) NOT NULL,
  `status_pembelian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `alamat_pengiriman`, `nama_kota`, `tarif`, `total_pembelian`, `resi_pengiriman`, `status_pembelian`) VALUES
(9, 4, '2021-06-10', 'Jln Tikus', 'Surabaya', 200000, 1700000, '0', 'PENDING'),
(12, 1, '2021-06-11', 'Jln AHMAD KIMAK', 'Surabaya', 200000, 2300000, '0', 'PENDING'),
(13, 1, '2021-06-11', 'a', 'Jakarta', 100000, 800000, '0', 'PENDING'),
(14, 1, '2021-06-11', 'a', 'Jakarta', 100000, 500000, '0', 'PENDING'),
(15, 1, '2021-06-11', 'Jln Palkontolero', 'Purbalingga', 20000, 1020000, '0', 'MENUNGGU KONFIRMASI'),
(16, 1, '2021-06-11', 'a', 'Jakarta', 100000, 500000, 'JP0232132', 'SEDANG DIKIRIM'),
(17, 1, '2021-06-12', 'a', 'Purbalingga', 20000, 420000, '0', 'SEDANG DIKEMAS'),
(18, 4, '2021-06-12', 'Jln KOnTOl', 'Surabaya', 200000, 1600000, 'JP021123', 'SEDANG DIKIRIM'),
(19, 4, '2021-06-12', 'Jln ANjay Raya', 'Jakarta', 100000, 20100000, '0', 'PENDING'),
(20, 4, '2021-06-12', 'Jln Dagan Rt 09 Rw 00001', 'Jakarta', 100000, 7800000, '0', 'MENUNGGU KONFIRMASI'),
(21, 4, '2021-06-13', 'JLn Pengalusan', 'Surabaya', 200000, 50200000, '0', 'PENDING'),
(22, 4, '2021-06-13', 'Jln Punkimak', 'Surabaya', 200000, 21600000, 'JP23211321322133', 'SEDANG DIKIRIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_produk`, `id_pembelian`, `jumlah`, `nama`, `harga`, `stok`, `berat`) VALUES
(10, 1, 9, 2, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(11, 2, 9, 1, 'Meja Dan Kursi Minimalis 2', 700000, 100, 40000),
(23, 1, 12, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(24, 2, 12, 1, 'Meja Dan Kursi Minimalis 2', 700000, 100, 40000),
(25, 3, 12, 1, 'Meja Dan Kursi Minimalis 3', 1000000, 100, 90000),
(26, 2, 13, 1, 'Meja Dan Kursi Minimalis 2', 700000, 100, 40000),
(27, 1, 14, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(28, 3, 15, 1, 'Meja Dan Kursi Minimalis 3', 1000000, 100, 90000),
(29, 1, 16, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(30, 1, 17, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(31, 1, 18, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(32, 3, 18, 1, 'Meja Dan Kursi Minimalis 3', 1000000, 100, 90000),
(33, 3, 19, 20, 'Meja Dan Kursi Minimalis 3', 1000000, 100, 90000),
(34, 2, 20, 11, 'Meja Dan Kursi Minimalis 2', 700000, 100, 40000),
(35, 3, 21, 50, 'Meja Dan Kursi Minimalis 3', 1000000, 100, 90000),
(36, 1, 22, 1, 'Meja Dan Kursi Minimalis 1', 400000, 100, 200),
(37, 2, 22, 30, 'Meja Dan Kursi Minimalis 2', 700000, 100, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `stok_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(1, 6, 'Meja Dan Kursi Minimalis 1', 400000, 120, 200, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?', '60c1e0eac949c.jpg'),
(2, 1, 'Meja Dan Kursi Minimalis 2', 700000, 70, 40000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?', '60c1e114a5c98.jpg'),
(3, 2, 'Meja Dan Kursi Minimalis 3', 1000000, 50, 90000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi non itaque autem mollitia nam, voluptas nisi vero debitis numquam maiores illum ab, quibusdam necessitatibus voluptates dolorum, rem et iure odio. Consectetur quisquam provident doloribus animi officiis delectus molestias, cum ex dicta, eligendi perferendis libero accusamus. Possimus debitis commodi quo totam sed amet. Tempora, modi rem necessitatibus cupiditate itaque error! Deserunt ullam iure recusandae dignissimos sed ad officiis, quis libero ratione doloremque, repudiandae. Vero, unde? Magni nostrum, asperiores aut debitis porro, iste alias blanditiis placeat. Magnam temporibus, maxime dolores, iste in ipsam, repudiandae maiores consectetur non necessitatibus ipsum quae ex velit?', '60c1e12dda0a7.jpg'),
(5, 2, 'Pintu Kece Jaman NOw', 300000, 300, 200, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quibusdam porro earum quidem, cum veniam repellendus commodi! Harum repellendus vel reiciendis modi voluptas molestiae iure nostrum est, quis aspernatur suscipit illum quaerat laborum vero reprehenderit soluta voluptatibus non facere illo libero. Itaque quas, ullam vero officiis ipsum amet placeat, natus ab praesentium pariatur dicta illo, voluptates. Minima cumque cupiditate molestiae amet totam labore placeat sint soluta delectus inventore, nesciunt deleniti blanditiis fugiat dolor facilis in. Incidunt, iusto hic eius corporis. Illum dolore esse quidem temporibus iusto possimus magni consequuntur dolor asperiores soluta iure repudiandae voluptate eveniet vero cum et molestias facere, consequatur accusantium nulla perferendis veniam repellendus. Ullam sequi culpa repellat amet tenetur, tempora recusandae impedit molestias quia pariatur. Ratione debitis sequi perspiciatis ipsa corporis eligendi repellat? Dolores saepe dolore repellat nemo ipsam quo deleniti, aspernatur magni libero adipisci, totam, minima maxime vel id commodi atque quibusdam? Odio a sequi nulla officiis quas distinctio beatae fugit, vel, recusandae molestiae omnis culpa laboriosam ab minus, placeat perspiciatis exercitationem, delectus vero illo! Commodi, consectetur omnis doloribus modi animi officiis odit est eum. Animi deserunt, quae cupiditate ut dolores itaque ipsum suscipit doloribus odio commodi architecto atque assumenda error necessitatibus dolorum quod voluptate et recusandae dolorem adipisci incidunt tempora fugit magnam. Laudantium consectetur facere excepturi doloremque temporibus quas non eos ab, sint molestiae voluptatem beatae modi cum officiis eum sequi voluptate sunt iste eius. Error reprehenderit soluta laborum voluptates illo fugit praesentium, sapiente amet. Laudantium consectetur harum dignissimos nihil culpa eveniet pariatur minima, exercitationem veniam beatae animi minus? Non quo sequi doloremque quaerat adipisci, animi magnam eaque dignissimos, pariatur autem, rerum. Id, autem itaque culpa laboriosam maiores illum repellendus enim hic dolore vel, at animi dolor nulla iure, sint. Voluptas, explicabo quae quis sapiente cupiditate deserunt recusandae quam, provident perspiciatis laudantium, corrupti error?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quibusdam porro earum quidem, cum veniam repellendus commodi! Harum repellendus vel reiciendis modi voluptas molestiae iure nostrum est, quis aspernatur suscipit illum quaerat laborum vero reprehenderit soluta voluptatibus non facere illo libero. Itaque quas, ullam vero officiis ipsum amet placeat, natus ab praesentium pariatur dicta illo, voluptates. Minima cumque cupiditate molestiae amet totam labore placeat sint soluta delectus inventore, nesciunt deleniti blanditiis fugiat dolor facilis in. Incidunt, iusto hic eius corporis. Illum dolore esse quidem temporibus iusto possimus magni consequuntur dolor asperiores soluta iure repudiandae voluptate eveniet vero cum et molestias facere, consequatur accusantium nulla perferendis veniam repellendus. Ullam sequi culpa repellat amet tenetur, tempora recusandae impedit molestias quia pariatur. Ratione debitis sequi perspiciatis ipsa corporis eligendi repellat? Dolores saepe dolore repellat nemo ipsam quo deleniti, aspernatur magni libero adipisci, totam, minima maxime vel id commodi atque quibusdam? Odio a sequi nulla officiis quas distinctio beatae fugit, vel, recusandae molestiae omnis culpa laboriosam ab minus, placeat perspiciatis exercitationem, delectus vero illo! Commodi, consectetur omnis doloribus modi animi officiis odit est eum. Animi deserunt, quae cupiditate ut dolores itaque ipsum suscipit doloribus odio commodi architecto atque assumenda error necessitatibus dolorum quod voluptate et recusandae dolorem adipisci incidunt tempora fugit magnam. Laudantium consectetur facere excepturi doloremque temporibus quas non eos ab, sint molestiae voluptatem beatae modi cum officiis eum sequi voluptate sunt iste eius. Error reprehenderit soluta laborum voluptates illo fugit praesentium, sapiente amet. Laudantium consectetur harum dignissimos nihil culpa eveniet pariatur minima, exercitationem veniam beatae animi minus? Non quo sequi doloremque quaerat adipisci, animi magnam eaque dignissimos, pariatur autem, rerum. Id, autem itaque culpa laboriosam maiores illum repellendus enim hic dolore vel, at animi dolor nulla iure, sint. Voluptas, explicabo quae quis sapiente cupiditate deserunt recusandae quam, provident perspiciatis laudantium, corrupti error?', '60c59cd8e5d6a.jpg'),
(6, 2, 'Pintu Kece Jaman Old', 500000, 100, 300, 'kontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllllkontollllllllllllllllllllllllllllllllllllllllllllllllllllll', '60c59d697db1a.jpg'),
(7, 2, 'KImak', 500000, 100, 20, 'ANJAY', '60c5bf5c5a453.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
