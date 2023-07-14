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

 Date: 23/04/2023 00:19:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for trans_log
-- ----------------------------
DROP TABLE IF EXISTS `trans_log`;
CREATE TABLE `trans_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` bigint NOT NULL,
  `seri` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pin` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT 0,
  `trans_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
