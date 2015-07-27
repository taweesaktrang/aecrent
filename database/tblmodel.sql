/*
MySQL Data Transfer
Source Host: localhost
Source Database: dbrent1
Target Host: localhost
Target Database: dbrent1
Date: 23/02/2015 22:11:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tblmodel
-- ----------------------------
DROP TABLE IF EXISTS `tblmodel`;
CREATE TABLE `tblmodel` (
  `modelid` varchar(3) NOT NULL default '',
  `modelname` varchar(255) default NULL,
  `yeehorid` varchar(2) default NULL,
  `price` int(11) default NULL,
  `detail` text,
  `picshow01` varchar(150) default NULL,
  `picshow02` varchar(150) default NULL,
  `picshow03` varchar(150) default NULL,
  `picshow04` varchar(150) default NULL,
  `picshow05` varchar(150) default NULL,
  `picshow06` varchar(150) default NULL,
  PRIMARY KEY  (`modelid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tblmodel` VALUES ('001', 'All New FINO', '01', '250', '', 'model001_0.gif', 'm001_1.jpg', 'm001_2.jpg', 'm001_3.jpeg', null, null);
INSERT INTO `tblmodel` VALUES ('002', 'Filano หัวฉีดใหม่', '01', '250', '', 'm002_0.jpg', 'm002_1.jpg', 'm002_2.jpg', 'm002_3.jpg', '', '');
INSERT INTO `tblmodel` VALUES ('003', 'Nouvo SX GP Edition', '01', '250', '', 'm003_0.jpg', 'm003_1.jpg', 'm003_2.jpg', '', '', '');
INSERT INTO `tblmodel` VALUES ('004', 'Yamaha Mio 125i', '02', '250', '', 'm004_0.jpg', 'm004_1.jpeg', 'model004_2.jpeg', 'm004_3.jpeg', '', '');
