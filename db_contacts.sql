/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_contacts

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-07-01 23:06:04
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
INSERT INTO `tbl_contacts` VALUES ('19', 'Chrsi', 'rock@dgf.com', '01224');
INSERT INTO `tbl_contacts` VALUES ('20', 'Pharell', 'p@sds', '21321');
INSERT INTO `tbl_contacts` VALUES ('21', 'Pharey', 'phaere', '54546');
INSERT INTO `tbl_contacts` VALUES ('22', 'Kidult', 'lkl', '2222');
INSERT INTO `tbl_contacts` VALUES ('23', 'kidultooo', 'ghfgh', '666');
