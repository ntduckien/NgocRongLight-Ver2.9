/*
 Navicat Premium Data Transfer

 Source Server         : nguyenduckien
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : god99

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 23/04/2023 00:19:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for momo
-- ----------------------------
CREATE TABLE IF NOT EXISTS `mbbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postingDate` varchar(255) NOT NULL,
  `transactionDate` varchar(255) NOT NULL,
  `accountNo` varchar(255) NOT NULL,
  `creditAmount` varchar(255) NOT NULL,
  `debitAmount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `availableBalance` varchar(255) NOT NULL,
  `refNo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
