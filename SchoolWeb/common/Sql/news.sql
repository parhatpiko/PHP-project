/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : news

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-09-03 17:18:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `author` varchar(30) NOT NULL,
  `is_published` tinyint(4) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`,`created_time`,`content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
