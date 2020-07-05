-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: anp_method
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berkas`
--

DROP TABLE IF EXISTS `berkas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biodata_id` int(11) DEFAULT NULL,
  `nama_berkas1` varchar(255) DEFAULT NULL,
  `alamat_berkas1` varchar(255) DEFAULT NULL,
  `nama_berkas2` varchar(255) DEFAULT NULL,
  `alamat_berkas2` varchar(255) DEFAULT NULL,
  `nama_berkas3` varchar(255) DEFAULT NULL,
  `alamat_berkas3` varchar(255) DEFAULT NULL,
  `nama_berkas4` varchar(255) DEFAULT NULL,
  `alamat_berkas4` varchar(255) DEFAULT NULL,
  `nama_berkas5` varchar(255) DEFAULT NULL,
  `alamat_berkas5` varchar(255) DEFAULT NULL,
  `nama_berkas6` varchar(255) DEFAULT NULL,
  `alamat_berkas6` varchar(255) DEFAULT NULL,
  `nama_berkas7` varchar(255) DEFAULT NULL,
  `alamat_berkas7` varchar(255) DEFAULT NULL,
  `nama_berkas8` varchar(255) DEFAULT NULL,
  `alamat_berkas8` varchar(255) DEFAULT NULL,
  `nama_berkas9` varchar(255) DEFAULT NULL,
  `alamat_berkas9` varchar(255) DEFAULT NULL,
  `nama_berkas10` varchar(255) DEFAULT NULL,
  `alamat_berkas10` varchar(255) DEFAULT NULL,
  `nama_berkas11` varchar(255) DEFAULT NULL,
  `alamat_berkas11` varchar(255) DEFAULT NULL,
  `nama_berkas12` varchar(255) DEFAULT NULL,
  `alamat_berkas12` varchar(255) DEFAULT NULL,
  `nama_berkas13` varchar(255) DEFAULT NULL,
  `alamat_berkas13` varchar(255) DEFAULT NULL,
  `nama_berkas14` varchar(255) DEFAULT NULL,
  `alamat_berkas14` varchar(255) DEFAULT NULL,
  `nama_berkas15` varchar(255) DEFAULT NULL,
  `alamat_berkas15` varchar(255) DEFAULT NULL,
  `nama_berkas16` varchar(255) DEFAULT NULL,
  `alamat_berkas16` varchar(255) DEFAULT NULL,
  `nama_berkas17` varchar(255) DEFAULT NULL,
  `alamat_berkas17` varchar(255) DEFAULT NULL,
  `nama_berkas18` varchar(255) DEFAULT NULL,
  `alamat_berkas18` varchar(255) DEFAULT NULL,
  `nama_berkas19` varchar(255) DEFAULT NULL,
  `alamat_berkas19` varchar(255) DEFAULT NULL,
  `nama_berkas20` varchar(255) DEFAULT NULL,
  `alamat_berkas20` varchar(255) DEFAULT NULL,
  `nama_berkas21` varchar(255) DEFAULT NULL,
  `alamat_berkas21` varchar(255) DEFAULT NULL,
  `nama_berkas22` varchar(255) DEFAULT NULL,
  `alamat_berkas22` varchar(255) DEFAULT NULL,
  `nama_berkas23` varchar(255) DEFAULT NULL,
  `alamat_berkas23` varchar(255) DEFAULT NULL,
  `nama_berkas24` varchar(255) DEFAULT NULL,
  `alamat_berkas24` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berkas`
--

LOCK TABLES `berkas` WRITE;
/*!40000 ALTER TABLE `berkas` DISABLE KEYS */;
/*!40000 ALTER TABLE `berkas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biodata`
--

DROP TABLE IF EXISTS `biodata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `work_unit` varchar(255) DEFAULT NULL,
  `jabatan` int(255) DEFAULT NULL,
  `prodi` int(255) DEFAULT NULL,
  `jurusan` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biodata`
--

LOCK TABLES `biodata` WRITE;
/*!40000 ALTER TABLE `biodata` DISABLE KEYS */;
INSERT INTO `biodata` VALUES (1,'Hector Pfannerstill III','4916752',7,'Hackettview','2020-07-01 ','laki-laki','s1','Administrasi','Administrasi','Logistik Bisnis',1,3,16),(2,'Hector Pfannerstill IIIc','4916752',8,'Hackettview','2020-08-04 ','laki-laki','s1','Administrasi','Administrasi','Logistik Bisnis',1,3,16);
/*!40000 ALTER TABLE `biodata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Guru Besar'),(2,'Lektor Kepala'),(3,'Lektor'),(4,'Asisten Ahli');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,'Pendidikan Agama'),(2,'Jaringan Komputer'),(3,'Database'),(4,'Algoritma Pemograman'),(5,'Web Programming'),(6,'Android Programming'),(7,'SAP'),(8,'Metode Penelitian'),(9,'Sistem Informasi Geografis'),(10,'Multimedia'),(11,'Bahasa Inggris'),(12,'Bahasa Indonesia'),(13,'Pengantar Akuntansi'),(14,'Metode Numerik'),(15,'Manajemen'),(16,'Logistik');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1593893200),('m130524_201442_init',1593893251),('m190124_110200_add_verification_token_column_to_user_table',1593893251),('m200704_200056_create_biodata_table',1593893251),('m200704_200457_create_prodi_table',1593893251),('m200704_200539_create_jurusan_table',1593893251),('m200704_200610_create_jabatan_table',1593893251),('m200704_213534_create_berkas_table',1593898924);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(255) DEFAULT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'D4TI','D4 Teknik Informatika'),(2,'D4LB','D4 Logistik Bisnis'),(3,'D4MB','D4 Manajemen Bisnis'),(4,'D4AK','D4 Akuntansi Keuangan'),(5,'D3TI','D3 Teknik Informatika'),(6,'D3LB','D3 Logistik Bisnis'),(7,'D3MB','D3 Manajemen Bisnis'),(8,'D3AK','D3 Akuntansi'),(9,'D3MI','D3 Manajemen Informatika');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','aF9jU-GMC5mR9S5leecxnOZJ4Rjjc4Xh','$2y$13$eL4stmBpblVlM5VbW.IMQOqDKoXPm4t98GOxtDcmDNkfo7EgWmSOu',NULL,'admin@admin.com',10,1593893361,1593893361,'rD-4I2tgh9BRPNNM0y1v579k3onh5QA7_1593893361'),(6,'wHector Pfannerstill III1asd','TkUMWOSgdCGm_HJ2Kk4xCSYcIfHwSIV4','$2y$13$NajA.h9zmZZcfzAZByNRXuvFHPL2fxi3mu23n4K7CjWW43na35EjS',NULL,'h@h.9cwsad',10,1593896675,1593896675,'qAWjojSZHZRdUCQ358aku8wM4ItantEU_1593896675'),(7,'Hector Pfannerstill III','LVAI_OBQymxeyn3JKF89FgpP86MHzd9E','$2y$13$choVSog7kGyJeGReLnxf2u2IniIz46dc3E1FC0tjqssj.xpO.kGEi',NULL,'h@h.c',10,1593896759,1593896759,'xys1SQ9FanmnYQqF6thGuJTNq9fEzRXA_1593896759'),(8,'Hector Pfannerstill IIIc','2TWtk7YvYOCG7KDb2Kz5wQZJsBIJF0rJ','$2y$13$MxYcpIenCRkrLAJiushVaOFg.9pozEEKYiaULmFHZNqufdCDNxqDi',NULL,'h@h.cc',10,1593896994,1593896994,'s1s4xgT7M11KbhiPgkNEhbTytDvuGXhq_1593896994');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-05 12:49:36
