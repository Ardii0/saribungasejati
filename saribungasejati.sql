/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - saribungasejati
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`saribungasejati` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `saribungasejati`;

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `prioritas` enum('Utama','Samping') DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alamat` */

insert  into `alamat`(`id_alamat`,`id_user`,`nama_penerima`,`nomor_hp`,`kota`,`alamat`,`kode_pos`,`prioritas`) values 
(1,2,'Kevin S','0834394012','Jakarta','Jl. Banyumanik Raya no 4 RT08 RW09',2939,NULL);

/*Table structure for table `beli_langsung` */

DROP TABLE IF EXISTS `beli_langsung`;

CREATE TABLE `beli_langsung` (
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `beli_langsung` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`created_at`) values 
(1,'Madu Manis','2023-05-25 23:20:55');

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL DEFAULT 1,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `maps_iframe` text NOT NULL,
  `livechat_api` text NOT NULL,
  `whatsapp_number` varchar(30) NOT NULL,
  `facebook_url` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`alamat`,`no_telp`,`no_fax`,`email`,`maps_iframe`,`livechat_api`,`whatsapp_number`,`facebook_url`,`instagram_url`,`twitter_url`) values 
(1,'Jl. Kokrosono No.70, Bulu Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50179','(024)111','','kontak@smk-pws.sch.id','','','08112881800','https://www.facebook.com/','https://www.instagram.com/','https://twitter.com/');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `id_alamat` int(11) DEFAULT NULL,
  `status` enum('Telah Dikonfirmasi','Belum Dikonfirmasi') DEFAULT 'Belum Dikonfirmasi',
  `bukti_pembayaran` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `detail_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_konfirmasi` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(30) DEFAULT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`kode_produk`,`nama_produk`,`id_kategori`,`harga`,`stok`,`deskripsi`,`foto`,`created_at`) values 
(1,'PDK-LWBISRV','Madu Asli',1,50000,2,NULL,NULL,'2023-05-25 23:20:26');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`email`,`password`,`role`,`foto`) values 
(1,'Admin','admin@gmail.com','$2y$12$iyU4JEh/Dp2K/KC8pRN.UeCc1zuTsY7CdFxCxaHHmFTC6dtppb5Ni','Admin',NULL),
(2,'Kevin','ada@ada.com','$2y$12$xlS4vuGOJCcysYmZ/FKEf.1MnKW0jqACCpoTwWBREXq8s1mHgiaFC','User','Asa_Mitaka.jpeg'),
(3,'Jason','jason@gmail.com','$2y$12$MuGZgHqs.jtPeL4dshWRsOoy7SC7cu771IAYzDzpvVlsl4DJ.kcLy','User','niro-xious-fgasudasjh2s-min.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
