/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - pegawai
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pegawai` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pegawai`;

/*Table structure for table `tbl_data_pegawai` */

DROP TABLE IF EXISTS `tbl_data_pegawai`;

CREATE TABLE `tbl_data_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_peg` varchar(255) NOT NULL,
  `nm_peg` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jns_klm` varchar(255) DEFAULT NULL,
  `agm` varchar(255) DEFAULT NULL,
  `gol` varchar(255) DEFAULT NULL,
  `jbtn` varchar(255) DEFAULT NULL,
  `almt` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_peg`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_data_pegawai` */

insert  into `tbl_data_pegawai`(`id`,`kd_peg`,`nm_peg`,`tgl_lahir`,`jns_klm`,`agm`,`gol`,`jbtn`,`almt`,`no_tlp`) values 
(15,'10119310','Fadillah','2000-08-03','laki-laki','islam','kanan','CEO','JL Cibarengok','0852940506232'),
(14,'10119319','Rafly React','2022-08-03','laki-laki','islam','kanan','Co-CEO','JL Elang no 1','0852940503262');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
