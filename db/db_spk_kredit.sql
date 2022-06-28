# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-06-28 11:44:52
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

INSERT INTO `admin` VALUES (1,'admin','Jambi','741','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','admin'),(10,'cmo','-','089606853329','-','cmo','99330263c899fa050dc18add519cae39','cmo'),(11,'finance','-','089606853322','-','finance','57336afd1f4b40dfd9f5731e35302fe5','finance');

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

INSERT INTO `hasil_akhir` VALUES (14,'Suyono',4.30),(15,'Arief Wijaya',4.10),(16,'Joko Suprapto',4.20),(17,'Andre',3.60),(18,'Stevi Fauzan',4.10);

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (70,14,90.00,92.00,101.00,104.00,110.00),(71,15,88.00,95.00,98.00,105.00,111.00),(72,16,87.00,93.00,99.00,103.00,109.00),(73,17,91.00,96.00,97.00,106.00,108.00),(74,18,88.00,94.00,98.00,102.00,111.00);

#
# Structure for table "kreditur"
#

DROP TABLE IF EXISTS `kreditur`;
CREATE TABLE `kreditur` (
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
  `alasan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Data for table "kreditur"
#

INSERT INTO `kreditur` VALUES (14,'-','Suyono','Pria','Kampung Nrogtog pinang','089606853329','','1983-02-01','Jakarta','S1','SPV Gudang','Butuh uang untuk biaya persalinan'),(15,'-','Arief Wijaya','Pria','JL. Sejahtera No 15 Pinang Tangerang','089606877777','','1977-01-17','Jakarta','S1','Admin ','Butuh uang untuk pelunasan motor'),(16,'-','Joko Suprapto','Pria','JL Srengseng jakarta barat','089608989999','','1971-12-16','Jakarta','S1','Driver','Butuh uang untuk biaya sekolah anak'),(17,'-','Andre','Pria','JL peninggilan raya no 22','089789876656','','1992-02-13','Jakarta','S1','Staff','Butuh uang untuk bayar cicilan '),(18,'-','Stevi Fauzan','Pria','Pondok Jagung tangsel','089767675543','','1996-07-24','Jakarta','S1','Staff','Butuh uang untuk kebutuhan hidup');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (40,'Usia',25.00,'Core Factor'),(41,'Gaji_Perbulan',25.00,'Core Factor'),(42,'Status_Tempat_Tinggal',20.00,'Core Factor'),(43,'Pekerjaan',15.00,'Secondary Fa'),(44,'Umur_Motor',15.00,'Secondary Fa');

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

INSERT INTO `sub_kriteria` VALUES (87,40,'17 - 23 Tahun',1.00),(88,40,'24 - 26 Tahun',3.00),(89,40,'27 - 35 Tahun',5.00),(90,40,'36 - 45 Tahun',4.00),(91,40,'46 - 55 Tahun',2.00),(92,41,'2.500.000 - 3.499.000',1.00),(93,41,'3.500.000 – 5.499.000 ',2.00),(94,41,'5.500.000 – 7.999.000',3.00),(95,41,'8.000.000 – 15.000.000',4.00),(96,41,'15.000.000 – 50.000.000',5.00),(97,42,'Kost',1.00),(98,42,'Kontrak',2.00),(99,42,'Milik Keluarga',4.00),(100,42,'Milik Sendiri',5.00),(101,42,'Milik Orang Tua',3.00),(102,43,'PNS',5.00),(103,43,'Karyawan Swasta',4.00),(104,43,'Wiraswasta',3.00),(105,43,'Profesional',2.00),(106,43,'Pensiunan',1.00),(107,44,'1 Tahun',5.00),(108,44,'2 – 3 Tahun',4.00),(109,44,'4 – 5 Tahun',3.00),(110,44,'6 Tahun',2.00),(111,44,'7 Tahun',1.00);
