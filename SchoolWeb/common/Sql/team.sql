/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : news

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-09-11 02:16:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for team
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_topic` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `commander_name` varchar(255) NOT NULL,
  `commander_major` varchar(255) NOT NULL,
  `commander_collage` varchar(255) NOT NULL,
  `commander_email` varchar(255) NOT NULL,
  `commander_cell` varchar(255) NOT NULL,
  `member1_name` varchar(255) NOT NULL,
  `member1_major` varchar(255) NOT NULL,
  `member1_collage` varchar(255) NOT NULL,
  `member1_email` varchar(255) NOT NULL,
  `member1_cell` varchar(255) NOT NULL,
  `member2_name` varchar(255) NOT NULL,
  `member2_major` varchar(255) NOT NULL,
  `member2_collage` varchar(255) NOT NULL,
  `member2_email` varchar(255) NOT NULL,
  `member2_cell` varchar(255) NOT NULL,
  `member3_name` varchar(255) NOT NULL,
  `member3_major` varchar(255) NOT NULL,
  `member3_collage` varchar(255) NOT NULL,
  `member3_email` varchar(255) NOT NULL,
  `member3_cell` varchar(255) NOT NULL,
  `member4_name` varchar(255) NOT NULL,
  `member4_major` varchar(255) NOT NULL,
  `member4_collage` varchar(255) NOT NULL,
  `member4_email` varchar(255) NOT NULL,
  `member4_cell` varchar(255) NOT NULL,
  `guide_teacher` varchar(255) NOT NULL,
  `guide_contact` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `key_tag` varchar(255) NOT NULL,
  `about_item` text NOT NULL,
  `veri_code` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `display_flag` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `year` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of team
-- ----------------------------
INSERT INTO `team` VALUES ('35', 'fdfd', 'fdfsfsf', 'sfs', 'dsfsfs', 'fsf', 'dsdsds@qq.com', 'fsfsf', 'ssfsf', 'sfsfsf', 'sfsff', 'sfsf', 'sfsf', 'sfsfsfs', 'ssfs', 'fsf', 'sfs', 'fsfsf', 'ss', 'sfsf', 'ss', 'sfsf', 'fssfsf', 'fs', 'sfsf', 'ssfs', 'ss', 'sfsfsfs', 'fdfs', 'fsfs', '.././BackEnd/upload/team_pic/php2979.jpg', 'fssdf', '<p>sdfsff</p><p><br/></p>', '2017091050989949', '1', '允许', '2017-09-10 18:15:30', '2017');
