# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-07-08 03:13:12
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'superadmin','Jambi','741','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','admin'),(10,'cmo','-','089606853329','-','cmo','99330263c899fa050dc18add519cae39','cmo'),(11,'finance','-','089606853322','-','finance','57336afd1f4b40dfd9f5731e35302fe5','finance');

#
# Structure for table "hasil_akhir"
#

DROP TABLE IF EXISTS `hasil_akhir`;
CREATE TABLE `hasil_akhir` (
  `id_calon_kr` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nilai` float(11,1) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `minggu` varchar(2) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `keterangan` varchar(12) DEFAULT NULL,
  `id_akhir` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_akhir`)
) ENGINE=InnoDB AUTO_INCREMENT=2375 DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil_akhir"
#

INSERT INTO `hasil_akhir` VALUES (14,'Suyono',3.2,'2022-07-07','2','Jul','2022','Ditolak',2372),(15,'Arief Wijaya',3.2,'2022-07-07','2','Jul','2022','Ditolak',2373),(16,'Joko Suprapto',3.2,'2022-07-07','2','Jul','2022','Ditolak',2374);

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `gaji_perbulan` float(10,1) DEFAULT NULL,
  `status_tempat_tinggal` float(10,1) DEFAULT NULL,
  `pekerjaan` float(10,1) DEFAULT NULL,
  `umur_motor` float(10,1) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (133,14,119,124.0,129.0,134.0,139.0),(136,15,119,124.0,129.0,134.0,139.0),(137,16,119,124.0,129.0,134.0,139.0);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Data for table "kreditur"
#

INSERT INTO `kreditur` VALUES (14,'-','Suyono','Wanita','Kampung Nrogtog pinang','089606853329','','1983-02-01','Jakarta','S1','SPV Gudang','Butuh uang untuk biaya persalinan'),(15,'-','Arief Wijaya','Pria','JL. Sejahtera No 15 Pinang Tangerang','089606877777','','1977-01-17','Jakarta','S1','Admin ','Butuh uang untuk pelunasan motor'),(16,'-','Joko Suprapto','Pria','JL Srengseng jakarta barat','089608989999','','1971-12-16','Jakarta','S1','Driver','Butuh uang untuk biaya sekolah anak'),(17,'-','Andre','Pria','JL peninggilan raya no 22','089789876656','','1992-02-13','Jakarta','S1','Staff','Butuh uang untuk bayar cicilan '),(18,'-','Stevi Fauzan','Pria','Pondok Jagung tangsel','089767675543','','1996-07-24','Jakarta','S1','Staff','Butuh uang untuk kebutuhan hidup'),(19,'-','asd','Pria','Jl. Ciledug Raya','089606854454','','1999-10-09','asd','SD','asd','asd'),(20,'-','qwe','Pria','qwe','123','','1888-10-06','jkt','SD','asd','asd');

#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(32) DEFAULT NULL,
  `bobot` float(5,1) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (57,'usia',25.0,'Core Factor'),(58,'gaji_perbulan',25.0,'Core Factor'),(59,'status_tempat_tinggal',20.0,'Core Factor'),(60,'pekerjaan',15.0,'Secondary Fa'),(61,'umur_motor',15.0,'Secondary Fa');

#
# Structure for table "match_"
#

DROP TABLE IF EXISTS `match_`;
CREATE TABLE `match_` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL,
  `nilai_gap` int(11) DEFAULT NULL,
  `nilai_bobot` float(11,1) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `kriteria` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

#
# Data for table "match_"
#

INSERT INTO `match_` VALUES (16,14,1,-2,3.0,'2022-07-07','Usia','Suyono'),(17,14,1,-2,3.0,'2022-07-07','Gaji Perbulan','Suyono'),(18,14,1,-2,3.0,'2022-07-07','Status Tempat Tinggal','Suyono'),(19,14,5,2,3.5,'2022-07-07','Pekerjaan','Suyono'),(20,14,5,2,3.5,'2022-07-07','Umur Motor','Suyono'),(21,15,1,-2,3.0,'2022-07-07','Usia','Arief Wijaya'),(22,15,1,-2,3.0,'2022-07-07','Gaji Perbulan','Arief Wijaya'),(23,15,1,-2,3.0,'2022-07-07','Status Tempat Tinggal','Arief Wijaya'),(24,15,5,2,3.5,'2022-07-07','Pekerjaan','Arief Wijaya'),(25,15,5,2,3.5,'2022-07-07','Umur Motor','Arief Wijaya'),(26,16,1,-2,3.0,'2022-07-07','Usia','Joko Suprapto'),(27,16,1,-2,3.0,'2022-07-07','Gaji Perbulan','Joko Suprapto'),(28,16,1,-2,3.0,'2022-07-07','Status Tempat Tinggal','Joko Suprapto'),(29,16,5,2,3.5,'2022-07-07','Pekerjaan','Joko Suprapto'),(30,16,5,2,3.5,'2022-07-07','Umur Motor','Joko Suprapto');

#
# Structure for table "sub_kriteria"
#

DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,1) DEFAULT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

#
# Data for table "sub_kriteria"
#

INSERT INTO `sub_kriteria` VALUES (119,57,'17 - 23',1.0),(120,57,'24 - 26',3.0),(121,57,'27 - 35',5.0),(122,57,'36 - 45',4.0),(123,57,'46 - 55',2.0),(124,58,'2.500.000 – 3.499.000 ',1.0),(125,58,'3.500.000 – 5.499.000',2.0),(126,58,'5.500.000 – 7.999.000',3.0),(127,58,'8.000.000 – 15.000.000',4.0),(128,58,'15.000.000 – 50.000.000',5.0),(129,59,'Kost',1.0),(130,59,'Kontrak',2.0),(131,59,'Milik Keluarga',4.0),(132,59,'Milik Sendiri',5.0),(133,59,'Milik Orang Tua',3.0),(134,60,'PNS',5.0),(135,60,'karyawan Swasta',4.0),(136,60,'Wiraswasta',3.0),(137,60,'Profesional',2.0),(138,60,'Pensiunan',1.0),(139,61,'1 Tahun',5.0),(140,61,'2 – 3 Tahun',4.0),(141,61,'4 – 5 Tahun',3.0),(142,61,'6 Tahun',2.0),(143,61,'7 Tahun',1.0);
