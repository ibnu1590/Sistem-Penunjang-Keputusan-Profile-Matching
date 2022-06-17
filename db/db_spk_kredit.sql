# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-06-17 15:33:59
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'admin','Jambi','741','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','admin');

#
# Structure for table "hasil_akhir"
#

DROP TABLE IF EXISTS `hasil_akhir`;
CREATE TABLE `hasil_akhir` (
  `id_calon_kr` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nilai` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil_akhir"
#

INSERT INTO `hasil_akhir` VALUES (7,'mr.x',4.30),(8,'mr.y',4.10),(9,'mr.z',4.20);

#
# Structure for table "hasil_spk"
#

DROP TABLE IF EXISTS `hasil_spk`;
CREATE TABLE `hasil_spk` (
  `id_spk` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `hasil_spk` float(10,2) DEFAULT NULL,
  `minggu` varchar(2) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  PRIMARY KEY (`id_spk`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_spk"
#

INSERT INTO `hasil_spk` VALUES (45,5,98.00,'2','11','2019'),(46,6,92.00,'2','11','2019'),(47,7,89.00,'2','11','2019'),(48,8,98.00,'2','11','2019'),(49,9,100.00,'2','11','2019'),(52,7,9.25,'2','06','2022'),(53,8,10.75,'2','06','2022'),(54,9,8.50,'2','06','2022'),(56,8,10.75,'3','06','2022'),(57,9,8.50,'3','06','2022');

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `DISIPLIN` float(10,2) DEFAULT NULL,
  `KREATIFITAS` float(10,2) DEFAULT NULL,
  `KOMITMEN` float(10,2) DEFAULT NULL,
  `PRESTASI` float(10,2) DEFAULT NULL,
  `LOYALITAS` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (66,7,65.00,69.00,76.00,78.00,85.00),(67,8,64.00,68.00,75.00,81.00,84.00),(68,9,66.00,70.00,73.00,79.00,86.00);

#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_calon_kr` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ttl` date NOT NULL,
  `TempatLahir` varchar(200) NOT NULL,
  `PendidikanTerakhir` varchar(100) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `TglBergabung` date NOT NULL,
  `skill` varchar(200) DEFAULT NULL,
  `pengalaman` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "karyawan"
#

INSERT INTO `karyawan` VALUES (7,'PRO','mr.x','Wanita','Jl.Berdikari RT.23 Payo selincah Kec. Jambi Timur ','081232434567','girl.png','1965-12-20','jambi','SD','Karyawan Produksi','2005-06-27','',''),(8,'PRO','mr.y','Wanita','Jl.Berdikari Rt 23.Selincah ','085312897687','girl.png','1980-04-27','jambi','SMA','Wakil Ka Packing Produksi','2012-10-06','',''),(9,'PRO','mr.z','Wanita','Lrg Kakak Tua RT 01 Selincah   ','08987645676','girl.png','1975-10-23','jambi','SMA','Kepala Packing Produksi','2008-11-10','','');

#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(32) DEFAULT NULL,
  `bobot` float(5,2) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (34,'DISIPLIN',3.00,'Secondary Fa'),(35,'KREATIFITAS',3.00,'Secondary Fa'),(36,'KOMITMEN',3.00,'Core Factor'),(37,'PRESTASI',3.00,'Core Factor'),(38,'LOYALITAS',3.00,'Core Factor');

#
# Structure for table "sub_kriteria"
#

DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,2) NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

#
# Data for table "sub_kriteria"
#

INSERT INTO `sub_kriteria` VALUES (11,13,'terlambat 0 kali',10.00),(12,13,'terlambat 1 kali',9.00),(13,13,'terlambat 2 kali',8.00),(14,13,'terlambat 3 kali',7.00),(15,13,'terlambat 4 kali',6.00),(16,13,'terlambat 5 kali',5.00),(17,13,'terlambat 6 kali',4.00),(18,13,'terlambat 7 kali',3.00),(19,13,'terlambat 8 kali',2.00),(20,13,'terlambat 9 kali',1.00),(21,13,'terlambat >10 kali',0.00),(22,14,'Baik Sekali',5.00),(23,14,'baik',4.00),(24,14,'cukup',3.00),(25,14,'kurang',2.00),(26,14,'kurang sekali',1.00),(27,15,'Baik Sekali',5.00),(28,15,'baik',4.00),(29,15,'cukup',3.00),(30,15,'kurang',2.00),(31,15,'kurang sekali',1.00),(32,16,'Baik Sekali',5.00),(33,16,'baik',4.00),(34,16,'cukup',3.00),(35,16,'kurang',2.00),(36,16,'kurang sekali',1.00),(37,28,'Baik Sekali',5.00),(38,28,'baik',4.00),(39,28,'cukup',3.00),(40,28,'kurang',2.00),(41,28,'kurang sekali',1.00),(42,29,'Baik Sekali',5.00),(43,29,'baik',4.00),(44,29,'cukup',3.00),(45,29,'kurang',2.00),(46,29,'kurang sekali',1.00),(47,30,'Baik Sekali',5.00),(48,30,'baik',4.00),(49,30,'cukup',3.00),(50,30,'kurang',2.00),(51,30,'kurang sekali',1.00),(52,31,'Baik Sekali',5.00),(53,31,'baik',4.00),(54,31,'cukup',3.00),(55,31,'kurang',2.00),(56,31,'kurang sekali',1.00),(57,32,'Baik Sekali',5.00),(58,32,'baik',4.00),(59,32,'cukup',3.00),(60,32,'kurang',2.00),(61,32,'kurang sekali',1.00),(62,34,'Tidak Memuaskan',0.00),(63,34,'Perlu Perbaikan',1.00),(64,34,'Memenuhi Harapan',2.00),(65,34,'Melebihi Harapan',3.00),(66,34,'Luar Biasa',4.00),(67,35,'Tidak Memuaskan',0.00),(68,35,'Perlu Perbaikan',1.00),(69,35,'Memenuhi Harapan',2.00),(70,35,'Melebihi Harapan',3.00),(71,35,'Luar Biasa',4.00),(72,36,'Tidak Memuaskan',0.00),(73,36,'Perlu Perbaikan',1.00),(74,36,'Memenuhi Harapan',2.00),(75,36,'Melebihi Harapan',3.00),(76,36,'Luar Biasa',4.00),(77,37,'Tidak Memuaskan',0.00),(78,37,'Perlu Perbaikan',1.00),(79,37,'Memenuhi Harapan',2.00),(80,37,'Melebihi Harapan',3.00),(81,37,'Luar Biasa',4.00),(82,38,'Tidak Memuaskan',0.00),(83,38,'Perlu Perbaikan',1.00),(84,38,'Memenuhi Harapan',2.00),(85,38,'Melebihi Harapan',3.00),(86,38,'Luar Biasa',4.00);
