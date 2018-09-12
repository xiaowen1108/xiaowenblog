-- MySQL dump 10.13  Distrib 5.5.56, for Linux (x86_64)
--
-- Host: localhost    Database: xiaowen
-- ------------------------------------------------------
-- Server version	5.5.56-log

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
-- Table structure for table `wen_admin_users`
--

DROP TABLE IF EXISTS `wen_admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_admin_users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//主键ID',
  `name` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '//别名',
  `pwd` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='//后台管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_admin_users`
--


--
-- Table structure for table `wen_article`
--

DROP TABLE IF EXISTS `wen_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//文章ID',
  `cid` int(11) NOT NULL COMMENT '//分类ID',
  `uid` tinyint(4) NOT NULL COMMENT '//作者',
  `name` varchar(100) NOT NULL COMMENT '//文章名称',
  `tags` varchar(100) NOT NULL DEFAULT '' COMMENT '//标签，关键词',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '//描述',
  `cover` varchar(255) NOT NULL COMMENT '//封面图',
  `is_recom` tinyint(4) NOT NULL DEFAULT '0' COMMENT '//是否推荐',
  `like_num` int(11) NOT NULL DEFAULT '0' COMMENT '//点赞量',
  `sort` smallint(6) NOT NULL DEFAULT '255',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '//浏览量',
  `content` text NOT NULL COMMENT '//文章内容',
  `created_at` int(11) NOT NULL COMMENT '创建日期',
  `updated_at` int(11) NOT NULL COMMENT '//修改日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='//文章表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_article`
--


--
-- Table structure for table `wen_category`
--

DROP TABLE IF EXISTS `wen_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '//分类名称',
  `seo_title` varchar(100) NOT NULL COMMENT '//SEO标题',
  `seo_key` varchar(100) NOT NULL COMMENT '//SEO关键词',
  `seo_desc` varchar(255) NOT NULL COMMENT '//SEO描述',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '//点击量',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '//排序',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '//顶级分类',
  `created_at` int(11) NOT NULL COMMENT '//创建于',
  `updated_at` int(11) NOT NULL COMMENT '//修改于',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='//文章分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_category`
--

-- Table structure for table `wen_config`
--

DROP TABLE IF EXISTS `wen_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '//标题',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '//变量名',
  `content` text NOT NULL COMMENT '//变量值',
  `sort` smallint(6) NOT NULL DEFAULT '255' COMMENT '//排序',
  `tips` varchar(255) NOT NULL DEFAULT '' COMMENT '//描述',
  `field_type` varchar(50) NOT NULL DEFAULT '' COMMENT '//字段类型',
  `field_value` varchar(255) NOT NULL DEFAULT '' COMMENT '//类型值',
  `created_at` int(255) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_config`
--


--
-- Table structure for table `wen_links`
--

DROP TABLE IF EXISTS `wen_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//名称',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//标题',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//链接',
  `sort` int(11) NOT NULL DEFAULT '255' COMMENT '//排序',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_links`
--


--
-- Table structure for table `wen_nav`
--

DROP TABLE IF EXISTS `wen_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '//名称',
  `alias` varchar(50) NOT NULL DEFAULT '' COMMENT '//别名',
  `pid` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '//url',
  `sort` int(11) NOT NULL DEFAULT '255' COMMENT '//排序',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_nav`
--


--
-- Table structure for table `wen_tags`
--

DROP TABLE IF EXISTS `wen_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wen_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `article_num` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`,`article_num`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wen_tags`
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-12 12:20:53
