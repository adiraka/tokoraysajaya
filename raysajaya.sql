/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.26 : Database - dbraisyajaya
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbraisyajaya` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbraisyajaya`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_27_045343_buat_tabel_buku',2),('2016_04_27_054927_buat_tabel_kategori',2),('2016_04_27_055211_buat_tabel_pelanggan',2),('2016_04_27_060106_buat_tabel_transaksi',2),('2016_04_27_060445_buat_tabel_transaksi_detail',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('adiraka8@gmail.com','ef2de28caf49a03894f11137b8a96dc4beace04fc771ba9e2bc1907efc1b1593','2016-04-20 16:04:42');

/*Table structure for table `tb_buku` */

DROP TABLE IF EXISTS `tb_buku`;

CREATE TABLE `tb_buku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tahun` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_buku` */

insert  into `tb_buku`(`id`,`kode_buku`,`judul`,`pengarang`,`kategori_id`,`tahun`,`isbn`,`harga`,`stock`,`foto`) values (12,'S00123','Laravel 5.2 + MaterializeCss + Ajax','Adi Raka Siwi, M.Kom',29,'2017','123-0123a',250000,4,'2016-05-09-34361.jpg'),(13,'XX1234','Menelusuri PHP dan MySQL','Adi Raka Siwi, M.Kom',29,'2016','123123',300000,12,'2016-05-11-50214.jpg');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id`,`nama`) values (15,'Agama dan Spritiualitas'),(16,'Antik Dan Langka'),(17,'Arsitektur'),(18,'Astrologi dan Mistik'),(19,'Atlas dan Wisata'),(20,'Bahasa dan Sastra'),(21,'Biografi'),(22,'Budaya'),(23,'Dunia Bayi dan Anak'),(24,'Ekonomi dan Bisnis'),(25,'Ensiklopedia dan Kamus'),(26,'Filsafat dan Idiologi'),(27,'Hobi'),(28,'Humor'),(29,'Ilmu dan Teknologi'),(30,'Ilmu Pangan dan Kuliner'),(31,'Kesehatan'),(32,'Komik'),(33,'Komunikasi'),(34,'Majalah dan Koran'),(35,'Militer dan Perang'),(36,'Novel dan Cerita'),(37,'Parenting dan Family'),(38,'Pendidikan'),(39,'Politik dan Hukum'),(40,'Psikologi'),(41,'Sejarah'),(42,'Seni'),(43,'Silat dan Legenda'),(44,'Umum');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id`,`nama`,`jenis_kelamin`,`alamat`,`telepon`) values (1,'Delon','Pria','Padang','081245678765'),(2,'Susi Paramita','Wanita','Ma Ancak?','123213'),(4,'Jon','Pria','Dimana Saja','123123');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id`,`tanggal`,`nama_pelanggan`,`telepon`,`total`,`created_at`) values (8,'2016-05-12','Joni','081237651234',500000,'2016-05-12 17:10:44');

/*Table structure for table `tb_transaksi_detail` */

DROP TABLE IF EXISTS `tb_transaksi_detail`;

CREATE TABLE `tb_transaksi_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_transaksi_detail` */

insert  into `tb_transaksi_detail`(`id`,`transaksi_id`,`buku_id`,`jumlah`,`subtotal`) values (6,8,12,2,500000);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Adi Raka Siwi','adiraka8@gmail.com','$2y$10$0VEDwu87wUxZvmfDKQhCAOnhiNCHoLqQsZTlFgnwQU1e559bv4joO','oAH7vJBJxE8JbTxcevjDT0DdLysXbBfWM6Gb8FS762qNfu9eK0Kiz35tlDO6','2016-04-20 16:02:56','2016-05-11 17:09:32'),(2,'Budi Handuk','budianduk@gmail.com','$2y$10$X9lW5Nf6bIS.muB7QDcktenKmBUyGCNvsTwUhVqyAcI3aGBXQ.gx2','eDQKPa5ZfPG3dSXIVtb0W5dMmaBWYTc6g1GTiW97ILmTbOef1yR1xXSFASgr','2016-04-21 07:35:24','2016-04-21 10:26:56'),(3,'Jhon Cena','jon@gmail.com','$2y$10$npul1uJVyHK5YvdQFKvLZOd3VbFpbQxQBRyYFTi.dyJqzBV9CakKi','om7FRtfxy01ZKP23Q4ukltq8CO9P47bBsycSnizqYDBqAOAQ4EM4Ys5sLYBQ','2016-04-21 07:36:56','2016-04-21 07:37:05'),(4,'Admin Ganteng','admin@admin.com','$2y$10$aFKIt31x.m6GRoQ4XWchbufsJr/JRJ2YnP.RYjne/rIuvxshEI4DK','DfXWljUcf3GR5rrIqEjpj4QrvNq6GCorX00uz9HvFKABcctfa1cOgcC7LEMg','2016-04-21 13:13:40','2016-04-21 18:15:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
