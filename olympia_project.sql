/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50550
Source Host           : localhost:3306
Source Database       : olympia_project

Target Server Type    : MYSQL
Target Server Version : 50550
File Encoding         : 65001

Date: 2016-09-01 17:02:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `thumb_version` tinyint(1) DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_active_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `admin_group_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'bactv', '$2y$13$PjelbPeOa6gp7bUht5TGc.iIMTIOSwr.Vsppxoxew8mqdCoXvR59e', 'bactruongvan174@gmail.com', 'Bac Truong Van', null, 'Web Deverloper', '1', '0', '0', '2016-08-24 10:47:34', '2016-08-24 10:47:37', '1', '1', '2016-08-29 16:14:39', '[\"1\"]');

-- ----------------------------
-- Table structure for admin_action
-- ----------------------------
DROP TABLE IF EXISTS `admin_action`;
CREATE TABLE `admin_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_action
-- ----------------------------
INSERT INTO `admin_action` VALUES ('1', '1', 'Index', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('2', '1', 'View', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('3', '1', 'Create', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('4', '1', 'Update', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('5', '1', 'Delete', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('6', '2', 'Index', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('7', '2', 'View', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('8', '2', 'Create', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('9', '2', 'Update', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('10', '2', 'Delete', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('11', '3', 'Index', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('12', '3', 'View', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('13', '3', 'Create', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('14', '3', 'Update', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('15', '3', 'Delete', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('16', '3', 'ChangeStatus', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('17', '4', 'Index', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('18', '4', 'View', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('19', '4', 'Create', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('20', '4', 'Update', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('21', '4', 'Delete', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('22', '4', 'ChangeStatus', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('23', '5', 'UpdateRouter', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('28', '1', 'ChangeStatus', '2016-08-29 08:46:14', '2016-08-29 08:46:14');
INSERT INTO `admin_action` VALUES ('27', '2', 'ChangeStatus', '2016-08-29 03:13:22', '2016-08-29 03:13:22');
INSERT INTO `admin_action` VALUES ('29', '8', 'Index', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_action` VALUES ('30', '8', 'View', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_action` VALUES ('31', '8', 'Create', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_action` VALUES ('32', '8', 'Update', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_action` VALUES ('33', '8', 'Delete', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_action` VALUES ('34', '8', 'ChangeStatus', '2016-08-29 16:54:51', '2016-08-29 16:54:51');
INSERT INTO `admin_action` VALUES ('35', '9', 'Index', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_action` VALUES ('36', '9', 'View', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_action` VALUES ('37', '9', 'Create', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_action` VALUES ('38', '9', 'Update', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_action` VALUES ('39', '9', 'Delete', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_action` VALUES ('40', '10', 'Index', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_action` VALUES ('41', '10', 'View', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_action` VALUES ('42', '10', 'Create', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_action` VALUES ('43', '10', 'Update', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_action` VALUES ('44', '10', 'Delete', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_action` VALUES ('45', '11', 'Index', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_action` VALUES ('46', '11', 'View', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_action` VALUES ('47', '11', 'Create', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_action` VALUES ('48', '11', 'Update', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_action` VALUES ('49', '11', 'Delete', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_action` VALUES ('50', '10', 'ChangeStatus', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('51', '12', 'Index', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('52', '12', 'View', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('53', '12', 'Create', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('54', '12', 'Update', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('55', '12', 'Delete', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('56', '13', 'Index', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('57', '13', 'View', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('58', '13', 'Create', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('59', '13', 'Update', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('60', '13', 'Delete', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('61', '14', 'Index', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('62', '14', 'View', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('63', '14', 'Create', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('64', '14', 'Update', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('65', '14', 'Delete', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_action` VALUES ('66', '12', 'ChangeStatus', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('67', '13', 'ChangeStatus', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('68', '14', 'ChangeStatus', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('69', '15', 'Index', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('70', '15', 'View', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('71', '15', 'Create', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('72', '15', 'Update', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('73', '15', 'Delete', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('74', '15', 'ChangeStatus', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_action` VALUES ('75', '11', 'ChangeStatus', '2016-08-31 16:23:34', '2016-08-31 16:23:34');
INSERT INTO `admin_action` VALUES ('76', '16', 'Index', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_action` VALUES ('77', '16', 'View', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_action` VALUES ('78', '16', 'Create', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_action` VALUES ('79', '16', 'Update', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_action` VALUES ('80', '16', 'Delete', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_action` VALUES ('81', '17', 'Index', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_action` VALUES ('82', '17', 'View', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_action` VALUES ('83', '17', 'Create', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_action` VALUES ('84', '17', 'Update', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_action` VALUES ('85', '17', 'Delete', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_action` VALUES ('86', '17', 'ChoosePlayer', '2016-09-01 10:24:50', '2016-09-01 10:24:50');
INSERT INTO `admin_action` VALUES ('87', '18', 'Index', '2016-09-01 13:46:14', '2016-09-01 13:46:14');
INSERT INTO `admin_action` VALUES ('88', '18', 'View', '2016-09-01 13:46:14', '2016-09-01 13:46:14');
INSERT INTO `admin_action` VALUES ('89', '18', 'Create', '2016-09-01 13:46:14', '2016-09-01 13:46:14');
INSERT INTO `admin_action` VALUES ('90', '18', 'Update', '2016-09-01 13:46:14', '2016-09-01 13:46:14');
INSERT INTO `admin_action` VALUES ('91', '18', 'Delete', '2016-09-01 13:46:14', '2016-09-01 13:46:14');

-- ----------------------------
-- Table structure for admin_controller
-- ----------------------------
DROP TABLE IF EXISTS `admin_controller`;
CREATE TABLE `admin_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_controller
-- ----------------------------
INSERT INTO `admin_controller` VALUES ('1', 'Admin', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('2', 'AdminGroup', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('3', 'Menu', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('4', 'Module', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('5', 'RouterPermission', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('8', 'News', '2016-08-29 16:32:01', '2016-08-29 16:32:01');
INSERT INTO `admin_controller` VALUES ('9', 'PartGame', '2016-08-29 17:24:25', '2016-08-29 17:24:25');
INSERT INTO `admin_controller` VALUES ('10', 'Question', '2016-08-29 17:38:33', '2016-08-29 17:38:33');
INSERT INTO `admin_controller` VALUES ('11', 'Student', '2016-08-30 21:24:46', '2016-08-30 21:24:46');
INSERT INTO `admin_controller` VALUES ('12', 'QuestionFormat', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_controller` VALUES ('13', 'QuestionLevel', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_controller` VALUES ('14', 'QuestionTopic', '2016-08-30 21:58:09', '2016-08-30 21:58:09');
INSERT INTO `admin_controller` VALUES ('15', 'TypeQuestion', '2016-08-30 22:42:08', '2016-08-30 22:42:08');
INSERT INTO `admin_controller` VALUES ('16', 'TypeGame', '2016-08-31 16:24:50', '2016-08-31 16:24:50');
INSERT INTO `admin_controller` VALUES ('17', 'Game', '2016-08-31 17:09:19', '2016-08-31 17:09:19');
INSERT INTO `admin_controller` VALUES ('18', 'QuestionPackage', '2016-09-01 13:46:14', '2016-09-01 13:46:14');

-- ----------------------------
-- Table structure for admin_group
-- ----------------------------
DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_group
-- ----------------------------
INSERT INTO `admin_group` VALUES ('1', 'Admin', 'Quản trị hệ thống', '[{\"controller_id\":1,\"actions\":[1,2,3,4,5,28]},{\"controller_id\":2,\"actions\":[6,7,8,9,10,27]},{\"controller_id\":3,\"actions\":[11,12,13,14,15,16]},{\"controller_id\":4,\"actions\":[17,18,19,20,21,22]},{\"controller_id\":5,\"actions\":[23]},{\"controller_id\":8,\"actions\":[29,30,31,32,33,34]},{\"controller_id\":9,\"actions\":[35,36,37,38,39]},{\"controller_id\":10,\"actions\":[40,41,42,43,44]},{\"controller_id\":11,\"actions\":[45,46,47,48,49]},{\"controller_id\":12,\"actions\":[51,52,53,54,55,66]},{\"controller_id\":13,\"actions\":[56,57,58,59,60,67]},{\"controller_id\":14,\"actions\":[61,62,63,64,65,68]},{\"controller_id\":15,\"actions\":[69,70,71,72,73,74]},{\"controller_id\":16,\"actions\":[76,77,78,79,80]},{\"controller_id\":17,\"actions\":[81,82,83,84,85,86]},{\"controller_id\":18,\"actions\":[87,88,89,90,91]}]', '2016-08-29 03:14:36', '2016-09-01 13:46:20', '1');

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `true` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('10', '2', 'A', '0');
INSERT INTO `answer` VALUES ('11', '2', 'C', '1');
INSERT INTO `answer` VALUES ('12', '2', 'DEF', '0');

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`sender_id`,`receiver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chat
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for forum_answer
-- ----------------------------
DROP TABLE IF EXISTS `forum_answer`;
CREATE TABLE `forum_answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of forum_answer
-- ----------------------------

-- ----------------------------
-- Table structure for forum_question
-- ----------------------------
DROP TABLE IF EXISTS `forum_question`;
CREATE TABLE `forum_question` (
  `id` int(11) NOT NULL,
  `type_question` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of forum_question
-- ----------------------------

-- ----------------------------
-- Table structure for game
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type_game` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `data_game` text COLLATE utf8_unicode_ci NOT NULL,
  `num_game` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('1', 'Cuộc thi tuần 1 - Tháng 1 - Quý 1 - Năm 1', '<p>Cuộc thi tuần 1 - Th&aacute;ng 1 - Qu&yacute; 1 - Năm 1</p>\r\n', '1', '2016-09-08 10:10:11', '[{\"user_id\":1,\"score\":0},{\"user_id\":2,\"score\":0},{\"user_id\":3,\"score\":0},{\"user_id\":4,\"score\":0}]', '1');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  `module_id` int(11) NOT NULL,
  `router` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'System Setting', '0', '1', 'menu/index', '2016-08-27 02:27:57', '2016-08-27 18:47:09', '1', '0', '<i class=\'fa fa fa-wrench\'> </i>', null);
INSERT INTO `menu` VALUES ('2', 'Menu Management', '1', '1', 'menu/index', '2016-08-27 02:28:32', '2016-08-29 20:10:12', '1', '0', '<i class=\'fa fa fa-align-justify\'> </i>', null);
INSERT INTO `menu` VALUES ('3', 'Module Management', '1', '1', 'module/index', '2016-08-27 02:29:49', '2016-08-28 03:30:02', '1', '0', '<i class=\'fa fa fa-chain\'> </i>', null);
INSERT INTO `menu` VALUES ('4', 'News Management', '0', '1', 'news/index', '2016-08-27 02:31:21', '2016-08-29 16:29:20', '1', '0', '<i class=\'fa fa fa-trophy\'> </i>', null);
INSERT INTO `menu` VALUES ('5', 'Admin Group Management', '7', '1', 'admin-group/index', '2016-08-27 02:32:00', '2016-08-28 04:18:10', '1', '0', '<i class=\'fa fa fa-group\'> </i>', null);
INSERT INTO `menu` VALUES ('6', 'Admin Management', '7', '1', 'admin/index', '2016-08-27 03:15:28', '2016-08-28 04:19:51', '1', '0', '<i class=\'fa fa fa-user\'> </i>', null);
INSERT INTO `menu` VALUES ('7', 'System Management', '0', '1', 'admin-group/index', '2016-08-27 04:21:58', '2016-08-29 07:52:54', '1', '0', '<i class=\'fa fa fa-outdent\'> </i>', null);
INSERT INTO `menu` VALUES ('8', 'Game Management', '0', '1', 'game/index', '2016-08-29 17:28:42', '2016-08-31 17:11:47', '1', '0', '<i class=\'fa fa fa-apple\'> </i>', null);
INSERT INTO `menu` VALUES ('9', 'Parts game', '8', '1', 'part-game/index', '2016-08-29 20:04:07', '2016-08-29 20:04:07', '1', '0', '<i class=\'fa fa fa-circle\'> </i>', null);
INSERT INTO `menu` VALUES ('10', 'Question Management', '0', '1', 'question/index', '2016-08-30 21:11:41', '2016-08-30 21:11:41', '1', '0', '<i class=\'fa fa fa-qrcode\'> </i>', null);
INSERT INTO `menu` VALUES ('11', 'List Question', '10', '1', 'question/index', '2016-08-30 21:12:23', '2016-08-30 21:12:23', '1', '0', '<i class=\'fa fa fa-beer\'> </i>', null);
INSERT INTO `menu` VALUES ('12', 'Student Management', '0', '1', 'student/index', '2016-08-30 21:25:43', '2016-08-30 21:25:43', '1', '0', '<i class=\'fa fa fa-user-md\'> </i>', null);
INSERT INTO `menu` VALUES ('13', 'List Student', '12', '1', 'student/index', '2016-08-30 21:26:09', '2016-08-30 21:26:09', '1', '0', '<i class=\'fa fa fa-calendar\'> </i>', null);
INSERT INTO `menu` VALUES ('14', 'Topic', '10', '1', 'question-topic/index', '2016-08-30 22:12:12', '2016-08-30 22:12:12', '1', '0', '<i class=\'fa fa fa-bullhorn\'> </i>', null);
INSERT INTO `menu` VALUES ('15', 'Format', '10', '1', 'question-format/index', '2016-08-30 22:13:01', '2016-08-30 22:13:01', '1', '0', '<i class=\'fa fa fa-cc-mastercard\'> </i>', null);
INSERT INTO `menu` VALUES ('16', 'Level', '10', '1', 'question-level/index', '2016-08-30 22:13:31', '2016-08-30 22:13:31', '1', '0', '<i class=\'fa fa fa-foursquare\'> </i>', null);
INSERT INTO `menu` VALUES ('17', 'Type Question', '10', '1', 'type-question/index', '2016-08-30 22:43:03', '2016-08-30 22:43:03', '1', '0', '<i class=\'fa fa fa-chain-broken\'> </i>', null);
INSERT INTO `menu` VALUES ('18', 'Type Game', '8', '1', 'type-game/index', '2016-08-31 16:23:15', '2016-08-31 16:23:15', '1', '0', '<i class=\'fa fa fa-camera\'> </i>', null);
INSERT INTO `menu` VALUES ('19', 'Competition', '8', '1', 'game/index', '2016-08-31 17:11:29', '2016-08-31 17:11:29', '1', '0', '<i class=\'fa fa fa-buysellads\'> </i>', null);
INSERT INTO `menu` VALUES ('20', 'Question Package', '10', '1', 'question-package/index', '2016-09-01 13:45:28', '2016-09-01 13:45:28', '1', '0', '<i class=\'fa fa fa-coffee\'> </i>', null);

-- ----------------------------
-- Table structure for module
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of module
-- ----------------------------
INSERT INTO `module` VALUES ('1', 'cms', 'Backend Management', '2016-08-24 11:55:33', '2016-08-27 10:49:36', '1', '0');
INSERT INTO `module` VALUES ('2', 'web', 'Frontend Management', '2016-08-24 11:56:15', '2016-08-27 10:49:51', '1', '0');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `post_time` datetime DEFAULT NULL COMMENT 'thoi gian upload',
  `thumb_version` tinyint(1) DEFAULT '0' COMMENT 'anh thumb',
  `status` tinyint(1) DEFAULT '0' COMMENT '0: inactive, 1: active',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for part_game
-- ----------------------------
DROP TABLE IF EXISTS `part_game`;
CREATE TABLE `part_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `number_question` int(11) DEFAULT NULL,
  `time_per_question` int(11) DEFAULT NULL,
  `total_time` int(11) DEFAULT NULL,
  `score_per_question` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of part_game
-- ----------------------------
INSERT INTO `part_game` VALUES ('1', 'start', '<p>Phần thi khởi động</p>\r\n', '2016-08-31 16:17:31', '2016-08-31 16:38:24', '12', null, '120', '10');
INSERT INTO `part_game` VALUES ('2', 'obstacle_race', '<p>Phần thi vượt chướng ngại vật</p>\r\n', '2016-08-31 16:19:01', '2016-08-31 16:39:19', '4', '20', null, '15');
INSERT INTO `part_game` VALUES ('3', 'accelerate', '<p>Phần thi tăng tốc</p>\r\n', '2016-08-31 16:19:32', '2016-08-31 16:40:01', '4', '30', null, null);
INSERT INTO `part_game` VALUES ('4', 'end', '<p>Phần thi về đ&iacute;ch</p>\r\n', '2016-08-31 16:19:56', '2016-08-31 16:40:32', '4', null, null, null);

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `question_topic` int(11) NOT NULL,
  `question_level` int(11) NOT NULL,
  `question_format` int(11) NOT NULL,
  `type_question` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0',
  `number_appear` int(11) DEFAULT '0',
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('2', '<p>dasds</p>\r\n', '1', '2', '2', '2', '2016-08-31 14:29:49', '2016-08-31 15:22:23', null, null, '1', '0', '0', '1');

-- ----------------------------
-- Table structure for question_format
-- ----------------------------
DROP TABLE IF EXISTS `question_format`;
CREATE TABLE `question_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question_format
-- ----------------------------
INSERT INTO `question_format` VALUES ('1', 'Văn bản', 'Câu hỏi kiểu văn bản', '1', '2016-08-30 22:25:11', '2016-08-30 22:25:11');
INSERT INTO `question_format` VALUES ('2', 'Hình ảnh', 'Câu hỏi kiểu hỉnh ảnh', '1', '2016-08-30 22:26:20', '2016-08-30 22:26:20');
INSERT INTO `question_format` VALUES ('3', 'Video', 'Câu hỏi kiểu Video', '1', '2016-08-30 22:26:39', '2016-08-30 22:26:39');
INSERT INTO `question_format` VALUES ('4', 'Âm thanh', 'Câu hỏi kiểu âm thanh', '1', '2016-08-30 22:27:00', '2016-08-30 22:27:00');

-- ----------------------------
-- Table structure for question_level
-- ----------------------------
DROP TABLE IF EXISTS `question_level`;
CREATE TABLE `question_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question_level
-- ----------------------------
INSERT INTO `question_level` VALUES ('1', 'Dễ', 'Câu hỏi mức độ dễ', '1', '2016-08-30 22:22:47', '2016-08-30 22:22:47');
INSERT INTO `question_level` VALUES ('2', 'Trung bình', 'Câu hỏi mức độ trung bình', '1', '2016-08-30 22:23:12', '2016-08-30 22:23:12');
INSERT INTO `question_level` VALUES ('3', 'Khó', 'Câu hỏi mức độ khó', '1', '2016-08-30 22:23:25', '2016-08-30 22:23:25');

-- ----------------------------
-- Table structure for question_package
-- ----------------------------
DROP TABLE IF EXISTS `question_package`;
CREATE TABLE `question_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `part_game` int(11) NOT NULL,
  `question_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `number_appear` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question_package
-- ----------------------------

-- ----------------------------
-- Table structure for question_topic
-- ----------------------------
DROP TABLE IF EXISTS `question_topic`;
CREATE TABLE `question_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question_topic
-- ----------------------------
INSERT INTO `question_topic` VALUES ('1', 'Toán học', 'Câu hỏi lĩnh vực toán học', '1', '2016-08-30 22:27:30', '2016-08-30 22:28:06');
INSERT INTO `question_topic` VALUES ('2', 'Vật lý', 'Câu hỏi lĩnh vực vật lý', '1', '2016-08-30 22:27:51', '2016-08-30 22:27:51');
INSERT INTO `question_topic` VALUES ('3', 'Hóa học', 'Câu hỏi lĩnh vực hóa học', '1', '2016-08-30 22:28:28', '2016-08-30 22:28:28');
INSERT INTO `question_topic` VALUES ('4', 'Văn học', 'Câu hỏi lĩnh vực văn học', '1', '2016-08-30 22:28:48', '2016-08-30 22:28:48');
INSERT INTO `question_topic` VALUES ('5', 'Lịch sử', 'Câu hỏi lĩnh vực lịch sử', '1', '2016-08-30 22:29:11', '2016-08-30 22:29:11');
INSERT INTO `question_topic` VALUES ('6', 'Địa lý', 'Câu hỏi lĩnh vực địa lý', '1', '2016-08-30 22:29:31', '2016-08-30 22:29:31');
INSERT INTO `question_topic` VALUES ('7', 'Tiếng Anh', 'Câu hỏi Tiếng Anh', '1', '2016-08-30 22:30:01', '2016-08-30 22:30:01');
INSERT INTO `question_topic` VALUES ('8', 'Văn hóa - Xã hội', 'Câu hỏi văn hóa - xã hội', '1', '2016-08-30 22:30:35', '2016-08-30 22:30:35');

-- ----------------------------
-- Table structure for slideshow
-- ----------------------------
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_version` tinyint(1) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of slideshow
-- ----------------------------

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `last_active_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: inactive',
  `deleted` tinyint(1) DEFAULT '0' COMMENT '0: not deleted, 1: deleted',
  `thumb_version` tinyint(1) DEFAULT NULL COMMENT 'avatar',
  `number_play_game` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'user1', '12345', 'user1@gmail.com', '12345', 'User 1', '2016-09-29', 'THPT Chuyen Hung Yen', 'Hung Yen', '2016-09-01 09:32:14', '2016-09-01 09:32:17', '2016-09-01 09:32:19', '1', '0', '0', '0');
INSERT INTO `student` VALUES ('2', 'user2', '12345', 'user2@gmail.com', '12345', 'User 2', '2016-09-13', 'THPT Chuyen Ngyen Trai', 'Hai Duong', '2016-09-01 09:33:42', '2016-09-01 09:33:45', '2016-09-01 09:33:49', '1', '0', null, '0');
INSERT INTO `student` VALUES ('3', 'user3', '12345', 'user3@gmail.com', '12345', 'User 3', '2016-09-05', 'THPT Chuyen Ha Long', 'Quang Ninh', '2016-09-20 09:34:35', '2016-09-01 09:34:38', '2016-09-01 09:34:41', '1', '0', null, '0');
INSERT INTO `student` VALUES ('4', 'user4', '12345', 'user4@gmail.com', '12345', 'User 4', '2016-09-01', 'THPT Chuyen KHTN', 'Ha Noi', '2016-09-05 09:35:23', '2016-09-22 09:35:27', '2016-09-01 09:35:30', '1', '0', null, '0');
INSERT INTO `student` VALUES ('5', 'user4 ', '12345', 'user5@gmail.com', '12345', 'User 5', '2016-09-08', 'THPT Chuyen DH Su Pham Ha Noi', 'Ha Noi', '2016-09-01 09:36:37', '2016-09-01 09:36:40', '2016-09-01 09:36:45', '1', '0', null, '0');
INSERT INTO `student` VALUES ('6', 'user6', '12345', 'user6@gmail.com', '12345', 'User 6', '2016-09-12', 'THPT Chuyen Lam Son', 'Thanh Hoa', '2016-09-01 09:37:23', '2016-09-01 09:37:26', '2016-09-01 09:37:31', '1', '0', null, '0');
INSERT INTO `student` VALUES ('7', 'user7', '12345', 'user7@gmail.com', '12345', 'User 7', '2016-09-01', 'THPT Chuyen Le Hong Phong', 'Nam Dinh', '2016-09-01 09:38:15', '2016-09-01 09:38:18', '2016-09-01 09:38:23', '1', '0', null, '0');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_test` int(11) NOT NULL,
  `part_game` int(11) DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `thumb_version` tinyint(1) DEFAULT '0',
  `number_appear` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of test
-- ----------------------------

-- ----------------------------
-- Table structure for test_score
-- ----------------------------
DROP TABLE IF EXISTS `test_score`;
CREATE TABLE `test_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_time` date DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of test_score
-- ----------------------------

-- ----------------------------
-- Table structure for type_game
-- ----------------------------
DROP TABLE IF EXISTS `type_game`;
CREATE TABLE `type_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_game
-- ----------------------------
INSERT INTO `type_game` VALUES ('1', 'game_week', 'Cuộc thi tuần', '2016-08-31 16:35:31', '2016-08-31 16:35:31');
INSERT INTO `type_game` VALUES ('2', 'game_month', 'Cuộc thi tháng', '2016-08-31 16:35:50', '2016-08-31 16:35:50');
INSERT INTO `type_game` VALUES ('3', 'game_quarters', 'Cuộc thi quý', '2016-08-31 16:36:12', '2016-08-31 16:36:12');
INSERT INTO `type_game` VALUES ('4', 'game_year', 'Cuộc thi năm', '2016-08-31 16:36:25', '2016-08-31 16:36:25');

-- ----------------------------
-- Table structure for type_question
-- ----------------------------
DROP TABLE IF EXISTS `type_question`;
CREATE TABLE `type_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_question
-- ----------------------------
INSERT INTO `type_question` VALUES ('1', 'Hỏi - đáp', 'Câu hỏi loại hỏi đáp', '2016-08-30 22:50:34', '2016-08-30 22:50:34', '1');
INSERT INTO `type_question` VALUES ('2', 'Trắc nghiệm', 'Câu hỏi trắc nghiệm', '2016-08-30 22:50:52', '2016-08-30 22:50:52', '1');

-- ----------------------------
-- Table structure for type_test
-- ----------------------------
DROP TABLE IF EXISTS `type_test`;
CREATE TABLE `type_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_test
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
