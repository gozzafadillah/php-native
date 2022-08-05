/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - hotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hotel`;

/*Table structure for table `checkin` */

DROP TABLE IF EXISTS `checkin`;

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_checkin` varchar(7) NOT NULL,
  `nm_penyewa` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `almt_penyewa` text DEFAULT NULL,
  `kd_kamar` varchar(7) DEFAULT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `lama_menginap` int(3) DEFAULT NULL,
  `jml_kamar_disewa` int(4) DEFAULT NULL,
  `hrg_sewa` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_checkin`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `checkin` */

insert  into `checkin`(`id`,`id_checkin`,`nm_penyewa`,`no_ktp`,`almt_penyewa`,`kd_kamar`,`nm_kamar`,`jns_kamar`,`tgl_checkin`,`tgl_checkout`,`lama_menginap`,`jml_kamar_disewa`,`hrg_sewa`,`total`) values 
(9,'1010-20','Maura Audirra','320009881213','JL, Sukajadi, Bandung','KMR_001','Melati','10x20','2022-08-04','2022-08-12',8,2,200000,3200000),
(11,'1010-22','Rafly','320009881213','JL, Elang No 2','KMR_001','Melati','10x20','2022-08-06','2022-08-14',8,1,200000,1600000),
(13,'1010-40','Rafly','320009881321','jl, Setiabudhi. No 38','KMR_001','Melati','10x20','2022-08-05','2022-08-12',7,5,200000,7000000);

/*Table structure for table `checkout` */

DROP TABLE IF EXISTS `checkout`;

CREATE TABLE `checkout` (
  `id` int(11) DEFAULT NULL,
  `id_checkout` varchar(7) NOT NULL,
  `nm_penyewa` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `almt_penyewa` text DEFAULT NULL,
  `kd_kamar` varchar(7) DEFAULT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `jml_kamar_disewa` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `checkout` */

insert  into `checkout`(`id`,`id_checkout`,`nm_penyewa`,`no_ktp`,`almt_penyewa`,`kd_kamar`,`nm_kamar`,`jns_kamar`,`tgl_checkin`,`tgl_checkout`,`jml_kamar_disewa`) values 
(0,'100-100','Rafly','320009881321','jl, Setiabudhi. No 38','KMR_001','Melati','10x20','2022-08-05','2022-08-12',5),
(0,'100-122','Rafly','320009881213','JL, Elang No 2','KMR_001','Melati','10x20','2022-08-06','2022-08-14',1),
(0,'100-123','Maura Audirra','320009881213','JL, Sukajadi, Bandung','KMR_001','Melati','10x20','2022-08-04','2022-08-12',2),
(0,'100-133','Rafly','320009881213','JL, Elang No 2','KMR_001','Melati','10x20','2022-08-06','2022-08-14',1);

/*Table structure for table `data_hotel` */

DROP TABLE IF EXISTS `data_hotel`;

CREATE TABLE `data_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kamar` varchar(7) NOT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `kps_kamar` int(2) DEFAULT NULL,
  `lok_kamar` varchar(10) DEFAULT NULL,
  `fas_kamar` text DEFAULT NULL,
  `jml_kamar` int(4) DEFAULT NULL,
  `hrg_sewa` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_kamar`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_hotel` */

insert  into `data_hotel`(`id`,`kd_kamar`,`nm_kamar`,`jns_kamar`,`kps_kamar`,`lok_kamar`,`fas_kamar`,`jml_kamar`,`hrg_sewa`) values 
(1,'KMR_001','Melati','10x20',4,'LT-2-003','AC,TV, WC',19,200000),
(2,'KMR_002','Mawar','10x40',3,'LT-3-001','AC, Kolam',10,250000);

/* Trigger structure for table `checkin` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ambilstok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ambilstok` AFTER INSERT ON `checkin` FOR EACH ROW BEGIN
	UPDATE data_hotel SET jml_kamar = jml_kamar - NEW.jml_kamar_disewa WHERE kd_kamar = NEW.kd_kamar; 
END */$$


DELIMITER ;

/* Trigger structure for table `checkout` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `beristock` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `beristock` AFTER INSERT ON `checkout` FOR EACH ROW BEGIN
	UPDATE data_hotel SET jml_kamar = jml_kamar + NEW.jml_kamar_disewa WHERE kd_kamar = NEW.kd_kamar;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
