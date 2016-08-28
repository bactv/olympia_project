/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : olympia_game

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-08-28 23:20:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
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
INSERT INTO `admin` VALUES ('1', 'bactv', '$2y$13$PjelbPeOa6gp7bUht5TGc.iIMTIOSwr.Vsppxoxew8mqdCoXvR59e', 'bactruongvan174@gmail.com', 'Bac Truong Van', null, 'Web Deverloper', '1', '0', '0', '2016-08-24 10:47:34', '2016-08-24 10:47:37', '1', '1', '2016-08-24 19:51:21', null);

-- ----------------------------
-- Table structure for `admin_action`
-- ----------------------------
DROP TABLE IF EXISTS `admin_action`;
CREATE TABLE `admin_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `admin_action` VALUES ('24', '6', 'Index', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('25', '6', 'Login', '2016-08-28 10:07:10', '2016-08-28 10:07:10');
INSERT INTO `admin_action` VALUES ('26', '6', 'Logout', '2016-08-28 10:07:10', '2016-08-28 10:07:10');

-- ----------------------------
-- Table structure for `admin_controller`
-- ----------------------------
DROP TABLE IF EXISTS `admin_controller`;
CREATE TABLE `admin_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_controller
-- ----------------------------
INSERT INTO `admin_controller` VALUES ('1', 'Admin', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('2', 'AdminGroup', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('3', 'Menu', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('4', 'Module', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('5', 'RouterPermission', '2016-08-28 09:39:38', '2016-08-28 09:39:38');
INSERT INTO `admin_controller` VALUES ('6', 'Site', '2016-08-28 09:39:38', '2016-08-28 09:39:38');

-- ----------------------------
-- Table structure for `admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_group
-- ----------------------------

-- ----------------------------
-- Table structure for `comment`
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
-- Table structure for `chat`
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
-- Table structure for `data_game`
-- ----------------------------
DROP TABLE IF EXISTS `data_game`;
CREATE TABLE `data_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_game` int(11) NOT NULL,
  `date` date NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`,`type_game`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of data_game
-- ----------------------------

-- ----------------------------
-- Table structure for `feedback`
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
-- Table structure for `forum_answer`
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
-- Table structure for `forum_question`
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
-- Table structure for `menu`
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'System Setting', '0', '1', 'menu/index', '2016-08-27 02:27:57', '2016-08-27 18:47:09', '1', '0', '<i class=\'fa fa fa-wrench\'> </i>', null);
INSERT INTO `menu` VALUES ('2', 'Cấu hình menu', '1', '1', 'menu/index', '2016-08-27 02:28:32', '2016-08-27 18:20:01', '1', '0', '<i class=\'fa fa fa-align-justify\'> </i>', null);
INSERT INTO `menu` VALUES ('3', 'Module Management', '1', '1', 'module/index', '2016-08-27 02:29:49', '2016-08-28 03:30:02', '1', '0', '<i class=\'fa fa fa-chain\'> </i>', null);
INSERT INTO `menu` VALUES ('4', 'Menu 3', '0', '1', 'question/index', '2016-08-27 02:31:21', '2016-08-27 10:07:43', '0', '0', null, null);
INSERT INTO `menu` VALUES ('5', 'Admin Group Management', '7', '1', 'admin-group/index', '2016-08-27 02:32:00', '2016-08-28 04:18:10', '1', '0', '<i class=\'fa fa fa-group\'> </i>', null);
INSERT INTO `menu` VALUES ('6', 'Admin Management', '7', '1', 'admin/index', '2016-08-27 03:15:28', '2016-08-28 04:19:51', '1', '0', '<i class=\'fa fa fa-user\'> </i>', null);
INSERT INTO `menu` VALUES ('7', 'System Management', '0', '1', 'admin/index', '2016-08-27 04:21:58', '2016-08-28 04:19:36', '1', '0', '<i class=\'fa fa fa-outdent\'> </i>', null);

-- ----------------------------
-- Table structure for `module`
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
-- Table structure for `news`
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
INSERT INTO `news` VALUES ('1', '[Tuần 1 - Quý 1 - Tháng 1 - Lần 1] Danh sách và lịch thi', 'Danh sách và lịch thi:\r\n- Ngày thi: 26/08/2016, 10h30\r\n- Danh sách thí sinh:\r\n+ Nguyễn Văn Nam - Trường THPT Chuyên Hưng Yên, Hưng Yên - Username: namnv\r\n+ Trần Văn Trực - Trường THPT Chuyên Lam Sơn, Thanh Hóa - Username: tructv\r\n+ Nguyễn Thị Thắm - Trường THPT Chuyên Nguyễn Trãi, Hải Dương - Username: thamnt\r\n+ Trần Huyền My - Trường THPT Chuyên Hạ Long, Quảng Linh - Username: myth\r\n', '1', '1', '2016-08-21 21:28:52', '2016-08-21 21:28:59', null, '0', '0', '0');
INSERT INTO `news` VALUES ('2', '[Tuần 1 - Quý 1 - Tháng 1 - Lần 1] Thông báo kết quả cuộc thi', 'Thông báo kết quả cuộc thi', '1', '1', '2016-08-22 21:31:22', '2016-08-22 21:31:29', null, '0', '0', '0');

-- ----------------------------
-- Table structure for `part_game`
-- ----------------------------
DROP TABLE IF EXISTS `part_game`;
CREATE TABLE `part_game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of part_game
-- ----------------------------

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `type_question` int(11) NOT NULL,
  `type_content` int(11) NOT NULL,
  `question_format` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0',
  `number_appear` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question
-- ----------------------------

-- ----------------------------
-- Table structure for `question_format`
-- ----------------------------
DROP TABLE IF EXISTS `question_format`;
CREATE TABLE `question_format` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of question_format
-- ----------------------------

-- ----------------------------
-- Table structure for `slideshow`
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
-- Table structure for `student`
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
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `last_active_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: inactive',
  `deleted` tinyint(1) DEFAULT '0' COMMENT '0: not deleted, 1: deleted',
  `thumb_version` tinyint(1) DEFAULT NULL COMMENT 'avatar',
  `number_play_game` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------

-- ----------------------------
-- Table structure for `test`
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
-- Table structure for `test_score`
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
-- Table structure for `type_content_question`
-- ----------------------------
DROP TABLE IF EXISTS `type_content_question`;
CREATE TABLE `type_content_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_content_question
-- ----------------------------

-- ----------------------------
-- Table structure for `type_game`
-- ----------------------------
DROP TABLE IF EXISTS `type_game`;
CREATE TABLE `type_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_game
-- ----------------------------

-- ----------------------------
-- Table structure for `type_question`
-- ----------------------------
DROP TABLE IF EXISTS `type_question`;
CREATE TABLE `type_question` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_question
-- ----------------------------

-- ----------------------------
-- Table structure for `type_test`
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
