/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_contacts

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-07-02 14:57:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_contacts`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE `tbl_contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_contacts
-- ----------------------------
INSERT INTO `tbl_contacts` VALUES ('20', 'Christopher Columbus', 'chris@gmail.com', '0152553266');
INSERT INTO `tbl_contacts` VALUES ('21', 'Shaka Zulu', 'shaka@zulu.com', '0155112266');
INSERT INTO `tbl_contacts` VALUES ('22', 'Mahatma Ghandi', 'ghand@yahoo.com', '0116845660');
INSERT INTO `tbl_contacts` VALUES ('23', 'Hitler', 'ww2@hit.com', '0802146793');
