/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : news

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-09-08 18:00:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'PHPStorm 配置运行PHP项目 _ baidu_20144723的专栏 _ 博客频道 _ CSDN.pdf', 'upload/item_pdf/_1504540865PHPStorm 配置运行PHP项目 _ baidu_20144723的专栏 _ 博客频道 _ CSDN.pdf');
INSERT INTO `item` VALUES ('2', 'file_name', 'upload/item_pdf/_1504541823win10怎么添加新用户.pdf');
INSERT INTO `item` VALUES ('3', 'file_name', 'upload/item_pdf/_1504541901PHPStorm 配置运行PHP项目 _ baidu_20144723的专栏 _ 博客频道 _ CSDN.pdf');
INSERT INTO `item` VALUES ('4', 'file_name', 'upload/item_pdf/_1504544330Provide_System_Rights.pdf');
INSERT INTO `item` VALUES ('5', 'file_name', 'upload/item_pdf/_1504544398PHPStorm 配置运行PHP项目 - baidu_20144723的专栏 - 博客频道 - CSDN.pdf');
INSERT INTO `item` VALUES ('6', 'file_name', 'upload/item_pdf/_1504544403Quickly Fix - The Disk Structure Is Corrupted and Unreadable.pdf');
INSERT INTO `item` VALUES ('7', 'file_name', 'upload/item_pdf/_1504544573JetBrain_Activating_Url.pdf');
INSERT INTO `item` VALUES ('8', 'file_name', 'upload/item_pdf/_1504545527Lost Windows 10 Password_ Get The Best Windows 10 Password Key.pdf');
INSERT INTO `item` VALUES ('9', 'file_name', 'upload/item_pdf/_1504545554login2.zip');
INSERT INTO `item` VALUES ('10', 'file_name', 'upload/item_pdf/_1504545582inst.exe');
INSERT INTO `item` VALUES ('11', 'file_name', 'upload/item_pdf/_1504545660kuwokg3206.zip');
