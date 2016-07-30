-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: dimanaya
-- ------------------------------------------------------
-- Server version	5.7.12

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
-- Table structure for table `event_stream`
--

DROP TABLE IF EXISTS `event_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_stream` (
  `event_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `event_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aggregate_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `aggregate_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `causation_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `causation_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_stream_m_v_uix` (`aggregate_id`,`aggregate_type`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_stream`
--

LOCK TABLES `event_stream` WRITE;
/*!40000 ALTER TABLE `event_stream` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('20160302154744'),('20160712014332'),('20160713041816'),('20160713041827'),('20160713042926');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kategori` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_konten`
--

DROP TABLE IF EXISTS `tb_konten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_konten` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `judul_posting` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `detail_posting` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kategori` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `id_register` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `media` longtext COLLATE utf8_unicode_ci NOT NULL,
  `likers` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_konten`
--

LOCK TABLES `tb_konten` WRITE;
/*!40000 ALTER TABLE `tb_konten` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_konten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kota`
--

DROP TABLE IF EXISTS `tb_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kota` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kota` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kabupaten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_provinsi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kota`
--

LOCK TABLES `tb_kota` WRITE;
/*!40000 ALTER TABLE `tb_kota` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_tlp` int(11) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `npwp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_usaha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-14 15:40:25
