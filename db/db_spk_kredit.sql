# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2022-07-04 20:07:43
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
  `nilai` float(11,2) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `minggu` varchar(2) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `keterangan` varchar(12) DEFAULT NULL,
  `id_akhir` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_akhir`)
) ENGINE=InnoDB AUTO_INCREMENT=2213 DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil_akhir"
#

INSERT INTO `hasil_akhir` VALUES (14,'Suyono',3.00,'2022-07-04','2','Jul','2017','Diterima',2263),(15,'Arief Wijaya',4.10,'2022-07-04','2','Jul','2017','Diterima',2264),(16,'Joko Suprapto',4.20,'2022-07-04','2','Jul','2017','Diterima',2265),(17,'Andre',3.00,'2022-07-04','2','Jul','2017','Diterima',2266),(18,'Stevi Fauzan',4.10,'2022-07-04','2','Jul','2017','Diterima',2267),(14,'Suyono',3.00,'2022-07-04','2','Jul','2018','Diterima',2268),(15,'Arief Wijaya',4.10,'2022-07-04','2','Jul','2018','Diterima',2269),(16,'Joko Suprapto',4.20,'2022-07-04','2','Jul','2018','Diterima',2270),(17,'Andre',3.00,'2022-07-04','2','Jul','2018','Diterima',2271),(18,'Stevi Fauzan',4.10,'2022-07-04','2','Jul','2018','Diterima',2272),(14,'Suyono',3.00,'2022-07-04','2','Jul','2019','Diterima',2273),(15,'Arief Wijaya',4.10,'2022-07-04','2','Jul','2019','Diterima',2274),(16,'Joko Suprapto',4.20,'2022-07-04','2','Jul','2019','Diterima',2275),(17,'Andre',3.00,'2022-07-04','2','Jul','2019','Diterima',2276),(18,'Stevi Fauzan',4.10,'2022-07-04','2','Jul','2019','Diterima',2277),(14,'Suyono',3.00,'2022-07-04','2','Jul','2022','Diterima',2278),(15,'Arief Wijaya',4.10,'2022-07-04','2','Jul','2022','Diterima',2279),(16,'Joko Suprapto',4.20,'2022-07-04','2','Jul','2022','Diterima',2280),(17,'Andre',3.00,'2022-07-04','2','Jul','2022','Diterima',2281),(18,'Stevi Fauzan',3.00,'2022-07-04','2','Jul','2022','Diterima',2282);

#
# Structure for table "hasil_tpa"
#

DROP TABLE IF EXISTS `hasil_tpa`;
CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon_kr` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `gaji_perbulan` float(10,2) DEFAULT NULL,
  `status_tempat_tinggal` float(10,2) DEFAULT NULL,
  `pekerjaan` float(10,2) DEFAULT NULL,
  `umur_motor` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `id_calon_kr` (`id_calon_kr`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

#
# Data for table "hasil_tpa"
#

INSERT INTO `hasil_tpa` VALUES (83,14,119,124.00,129.00,138.00,143.00),(84,15,120,127.00,130.00,137.00,143.00),(85,16,119,125.00,131.00,135.00,141.00),(86,17,119,124.00,129.00,138.00,143.00),(87,18,119,124.00,129.00,138.00,143.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "kreditur"
#

INSERT INTO `kreditur` VALUES (14,'-','Suyono','Pria','Kampung Nrogtog pinang','089606853329','','1983-02-01','Jakarta','S1','SPV Gudang','Butuh uang untuk biaya persalinan'),(15,'-','Arief Wijaya','Pria','JL. Sejahtera No 15 Pinang Tangerang','089606877777','','1977-01-17','Jakarta','S1','Admin ','Butuh uang untuk pelunasan motor'),(16,'-','Joko Suprapto','Pria','JL Srengseng jakarta barat','089608989999','','1971-12-16','Jakarta','S1','Driver','Butuh uang untuk biaya sekolah anak'),(17,'-','Andre','Pria','JL peninggilan raya no 22','089789876656','','1992-02-13','Jakarta','S1','Staff','Butuh uang untuk bayar cicilan '),(18,'-','Stevi Fauzan','Pria','Pondok Jagung tangsel','089767675543','','1996-07-24','Jakarta','S1','Staff','Butuh uang untuk kebutuhan hidup'),(19,'-','asd','Pria','Jl. Ciledug Raya','089606854454','','1999-10-09','asd','SD','asd','asd');

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (57,'usia',25.00,'Core Factor'),(58,'gaji_perbulan',25.00,'Core Factor'),(59,'status_tempat_tinggal',20.00,'Core Factor'),(60,'pekerjaan',15.00,'Secondary Fa'),(61,'umur_motor',15.00,'Secondary Fa');

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
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

#
# Data for table "sub_kriteria"
#

INSERT INTO `sub_kriteria` VALUES (119,57,'17 - 23',1.00),(120,57,'24 - 26',3.00),(121,57,'27 - 35',5.00),(122,57,'36 - 45',4.00),(123,57,'46 - 55',2.00),(124,58,'2.500.000 – 3.499.000 ',1.00),(125,58,'3.500.000 – 5.499.000',2.00),(126,58,'5.500.000 – 7.999.000',3.00),(127,58,'8.000.000 – 15.000.000',4.00),(128,58,'15.000.000 – 50.000.000',5.00),(129,59,'Kost',1.00),(130,59,'Kontrak',2.00),(131,59,'Milik Keluarga',4.00),(132,59,'Milik Sendiri',5.00),(133,59,'Milik Orang Tua',3.00),(134,60,'PNS',5.00),(135,60,'karyawan Swasta',4.00),(136,60,'Wiraswasta',3.00),(137,60,'Profesional',2.00),(138,60,'Pensiunan',1.00),(139,61,'1 Tahun',5.00),(140,61,'2 – 3 Tahun',4.00),(141,61,'4 – 5 Tahun',3.00),(142,61,'6 Tahun',2.00),(143,61,'7 Tahun',1.00);
