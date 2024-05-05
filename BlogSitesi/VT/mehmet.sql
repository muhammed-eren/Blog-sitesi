/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : mehmet

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 21/04/2024 14:00:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bildirimler
-- ----------------------------
DROP TABLE IF EXISTS `bildirimler`;
CREATE TABLE `bildirimler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `bildirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bildirimler
-- ----------------------------
INSERT INTO `bildirimler` VALUES (6, 'asd', 'dsfg');
INSERT INTO `bildirimler` VALUES (7, 'asd', 'Selam aq');

-- ----------------------------
-- Table structure for bloglar
-- ----------------------------
DROP TABLE IF EXISTS `bloglar`;
CREATE TABLE `bloglar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `resim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `baslik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `blogYazi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `paylasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bloglar
-- ----------------------------
INSERT INTO `bloglar` VALUES (29, 'uploads/pngwing.com (1).png', 'amk', 'Spor', 'sdf', 'asd');
INSERT INTO `bloglar` VALUES (34, 'uploads/x5_1119035559o8x.jpg', 'dfgs', 'Yaşam', 'sdfg', 'admin');
INSERT INTO `bloglar` VALUES (37, NULL, 'sdfg', 'Aşk', 'sdfg', 'asd');
INSERT INTO `bloglar` VALUES (43, NULL, 'sdf', 'Aşk', 'sdf', 'asd');
INSERT INTO `bloglar` VALUES (44, NULL, 'ASDF', 'Aşk', 'ASDF', 'asd');
INSERT INTO `bloglar` VALUES (45, NULL, 'asdf', 'Aşk', 'asdf', 'asd');
INSERT INTO `bloglar` VALUES (46, 'uploads/pngwing.com (1).png', 'afs', 'Sağlık', 'asdf', 'asd');
INSERT INTO `bloglar` VALUES (47, 'uploads/x5_1119035559o8x.jpg', 'asdf', 'Aşk', 'asdf', 'asd');

-- ----------------------------
-- Table structure for kategoriler
-- ----------------------------
DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategoriler
-- ----------------------------
INSERT INTO `kategoriler` VALUES (16, 'Yaşam');
INSERT INTO `kategoriler` VALUES (21, 'Spor');
INSERT INTO `kategoriler` VALUES (22, 'Sağlık');
INSERT INTO `kategoriler` VALUES (24, 'Aşk');

-- ----------------------------
-- Table structure for kullanicilar
-- ----------------------------
DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE `kullanicilar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kullaniciadi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `sifre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `pp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kullanicilar
-- ----------------------------
INSERT INTO `kullanicilar` VALUES (1, 'asd', 'asd', 'asd', 'assets/img/pngwing.com.png');
INSERT INTO `kullanicilar` VALUES (2, 'ad', 'asd', 'asd', 'assets/img/pngwing.com.png');
INSERT INTO `kullanicilar` VALUES (8, 'admin', 'admin@gmail.com', 'admin', 'assets/img/pngwing.com.png');
INSERT INTO `kullanicilar` VALUES (9, 'Mehmet', 's', 'b', 'assets/img/pngwing.com.png');

-- ----------------------------
-- Table structure for yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `yyapan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `yorum` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `blogid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
INSERT INTO `yorumlar` VALUES (54, 'ad', 'asmnflasömd', 31);
INSERT INTO `yorumlar` VALUES (55, 'ad', 'Merhaba', 31);
INSERT INTO `yorumlar` VALUES (58, 'ad', 'sdf', 32);
INSERT INTO `yorumlar` VALUES (59, 'ad', 'af', 32);
INSERT INTO `yorumlar` VALUES (60, 'admin', 'sdfsdf', 35);
INSERT INTO `yorumlar` VALUES (61, 'admin', 'fsadfa', 34);
INSERT INTO `yorumlar` VALUES (62, 'admin', 'dfs', 47);
INSERT INTO `yorumlar` VALUES (63, 'admin', 'asdf', 47);

SET FOREIGN_KEY_CHECKS = 1;
