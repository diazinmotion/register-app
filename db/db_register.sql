/*
 Navicat Premium Data Transfer

 Source Server         : Localhost - Invsys
 Source Server Type    : MySQL
 Source Server Version : 100308
 Source Host           : localhost:3306
 Source Schema         : db_register

 Target Server Type    : MySQL
 Target Server Version : 100308
 File Encoding         : 65001

 Date: 07/11/2021 07:52:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `rayon` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
BEGIN;
INSERT INTO `pengguna` VALUES (10, 'John Doe', 'Hello World', '08123456789', '2021-10-24 14:07:03', NULL, NULL, NULL, 'Kesetiaan');
INSERT INTO `pengguna` VALUES (11, 'John Doe', 'asdjashdkjahsd', '081234678', '2021-10-24 14:07:23', 0, NULL, NULL, 'Kesetiaan');
INSERT INTO `pengguna` VALUES (12, 'nama lengkap 1', 'asdjahsdjasd', '0812812', '2021-10-24 14:09:12', 0, NULL, NULL, 'Sukacita');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `full_name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin@survey-app.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Register');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
