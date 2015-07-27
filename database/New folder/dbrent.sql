/*
MySQL Data Transfer
Source Host: localhost
Source Database: dbrent
Target Host: localhost
Target Database: dbrent
Date: 27/06/2015 11:04:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tblbank
-- ----------------------------
DROP TABLE IF EXISTS `tblbank`;
CREATE TABLE `tblbank` (
  `bankid` varchar(13) NOT NULL default '',
  `bookname` varchar(160) default NULL,
  `bankname` varchar(160) default NULL,
  `shortname` varchar(10) default NULL,
  PRIMARY KEY  (`bankid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblbooking
-- ----------------------------
DROP TABLE IF EXISTS `tblbooking`;
CREATE TABLE `tblbooking` (
  `bookingid` int(11) NOT NULL auto_increment,
  `memberid` int(11) default NULL,
  `modelid` varchar(3) default '',
  `begindate` varchar(10) default NULL,
  `finishdate` varchar(10) default NULL,
  `amountday` int(11) default NULL,
  `price` int(11) default NULL,
  `total` int(11) default NULL,
  `statusid` varchar(1) default NULL,
  `deviceid` varchar(1) default NULL,
  PRIMARY KEY  (`bookingid`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblcc
-- ----------------------------
DROP TABLE IF EXISTS `tblcc`;
CREATE TABLE `tblcc` (
  `ccid` varchar(2) NOT NULL default '',
  `ccname` varchar(5) default NULL,
  PRIMARY KEY  (`ccid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblcolor
-- ----------------------------
DROP TABLE IF EXISTS `tblcolor`;
CREATE TABLE `tblcolor` (
  `colorid` varchar(2) NOT NULL default '0',
  `colorname` varchar(150) default NULL,
  PRIMARY KEY  (`colorid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblmember
-- ----------------------------
DROP TABLE IF EXISTS `tblmember`;
CREATE TABLE `tblmember` (
  `memberid` int(11) NOT NULL auto_increment,
  `titlename` varchar(20) default NULL,
  `membername` varchar(150) default NULL,
  `address` varchar(255) default NULL,
  `provinceid` int(11) default NULL,
  `telephone` varchar(150) default NULL,
  `zip` varchar(150) default NULL,
  `email` varchar(150) default NULL,
  `username` varchar(20) default NULL,
  PRIMARY KEY  (`memberid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

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
-- Table structure for tblmotorcy
-- ----------------------------
DROP TABLE IF EXISTS `tblmotorcy`;
CREATE TABLE `tblmotorcy` (
  `motorcyid` int(11) NOT NULL auto_increment,
  `registerno` varchar(20) default NULL,
  `machineno` varchar(30) default NULL,
  `chassisno` varchar(30) default NULL,
  `typeid` varchar(2) default NULL,
  `modelid` varchar(3) default NULL,
  `yeehorid` varchar(2) default NULL,
  `colorid` varchar(2) default NULL,
  `ccname` varchar(3) default NULL,
  `description` varchar(255) default NULL,
  `statusbuy` varchar(1) default NULL,
  `pricecost` double default NULL,
  PRIMARY KEY  (`motorcyid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblnews
-- ----------------------------
DROP TABLE IF EXISTS `tblnews`;
CREATE TABLE `tblnews` (
  `newsid` int(11) NOT NULL auto_increment,
  `newsname` varchar(255) default NULL,
  `detail` text,
  `newsdate` date default NULL,
  `picshow01` varchar(180) default NULL,
  `activate` varchar(1) default NULL,
  PRIMARY KEY  (`newsid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblpayment
-- ----------------------------
DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE `tblpayment` (
  `paymentid` int(11) NOT NULL auto_increment,
  `bookingid` int(11) default NULL,
  `paymentdate` varchar(10) default NULL,
  `bankid` varchar(13) default NULL,
  `total` int(11) default NULL,
  `payee` varchar(255) default NULL,
  PRIMARY KEY  (`paymentid`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblplace
-- ----------------------------
DROP TABLE IF EXISTS `tblplace`;
CREATE TABLE `tblplace` (
  `placeid` varchar(5) NOT NULL,
  `placename` varchar(250) default NULL,
  `detail` text,
  `location` text,
  `travel` text,
  `picture01` varchar(255) default NULL,
  `picture02` varchar(255) default NULL,
  `picture03` varchar(255) default NULL,
  `picture04` varchar(255) default NULL,
  PRIMARY KEY  (`placeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblprovince
-- ----------------------------
DROP TABLE IF EXISTS `tblprovince`;
CREATE TABLE `tblprovince` (
  `provinceid` int(5) NOT NULL auto_increment,
  `provincecode` varchar(2) collate utf8_unicode_ci NOT NULL,
  `provincename` varchar(150) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`provinceid`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for tblshop
-- ----------------------------
DROP TABLE IF EXISTS `tblshop`;
CREATE TABLE `tblshop` (
  `shopid` varchar(5) NOT NULL,
  `shopname` varchar(250) default NULL,
  `detail` text,
  `location` text,
  `travel` text,
  `picture01` varchar(255) default NULL,
  `picture02` varchar(255) default NULL,
  `picture03` varchar(255) default NULL,
  `picture04` varchar(255) default NULL,
  PRIMARY KEY  (`shopid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblstatus
-- ----------------------------
DROP TABLE IF EXISTS `tblstatus`;
CREATE TABLE `tblstatus` (
  `statusid` varchar(1) NOT NULL default '',
  `statusname` varchar(150) default NULL,
  PRIMARY KEY  (`statusid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbltitle
-- ----------------------------
DROP TABLE IF EXISTS `tbltitle`;
CREATE TABLE `tbltitle` (
  `titleid` int(3) NOT NULL auto_increment,
  `titlename` varchar(50) default NULL,
  `titleshort` varchar(10) default NULL,
  PRIMARY KEY  (`titleid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbltype
-- ----------------------------
DROP TABLE IF EXISTS `tbltype`;
CREATE TABLE `tbltype` (
  `typeid` varchar(2) NOT NULL default '',
  `typename` varchar(150) default NULL,
  PRIMARY KEY  (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbluser
-- ----------------------------
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `username` varchar(20) NOT NULL default '',
  `upassword` varchar(20) default NULL,
  `userlevel` varchar(2) default NULL,
  `fullname` varchar(100) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblyeehor
-- ----------------------------
DROP TABLE IF EXISTS `tblyeehor`;
CREATE TABLE `tblyeehor` (
  `yeehorid` varchar(2) NOT NULL default '',
  `yeehorname` varchar(150) default NULL,
  `detail` text,
  `yeehorpic` varchar(100) default NULL,
  PRIMARY KEY  (`yeehorid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tblbank` VALUES ('9030198702', 'นายธนาคาร', 'ธนาคารกรุงไทย', 'KTB');
INSERT INTO `tblbank` VALUES ('4012534578', 'นายแบงค์', 'ธนาคารกรุงไทย', '');
INSERT INTO `tblbooking` VALUES ('26', '26', '004', '09-06-2015', '10-06-2015', '1', '250', '250', '1', 'W');
INSERT INTO `tblbooking` VALUES ('25', '26', '004', '08-06-2015', '09-06-2015', '1', '250', '250', '2', 'W');
INSERT INTO `tblbooking` VALUES ('27', '26', '004', '14-06-2015', '17-06-2015', '4', '250', '1000', '2', 'W');
INSERT INTO `tblbooking` VALUES ('39', '26', '002', '18-06-2015', '21-06-2015', '4', '250', '1000', '1', 'M');
INSERT INTO `tblbooking` VALUES ('40', '26', '001', '20-06-2015', '23-06-2015', '4', '250', '1000', '1', 'M');
INSERT INTO `tblbooking` VALUES ('41', '26', '001', '18-06-2015', '21-06-2015', '4', '250', '1000', '1', 'M');
INSERT INTO `tblbooking` VALUES ('38', '26', '002', '18-06-2015', '19-06-2015', '1', '250', '250', '1', 'M');
INSERT INTO `tblbooking` VALUES ('43', '26', '004', '--', '02-01-1970', '1', '250', '250', '1', 'M');
INSERT INTO `tblbooking` VALUES ('44', '26', '004', '', '02-01-1970', '1', '250', '250', '1', 'W');
INSERT INTO `tblbooking` VALUES ('45', '26', '004', '--', '02-01-1970', '1', '250', '250', '1', 'M');
INSERT INTO `tblcc` VALUES ('01', '100');
INSERT INTO `tblcc` VALUES ('02', '125');
INSERT INTO `tblcc` VALUES ('03', '150');
INSERT INTO `tblcolor` VALUES ('01', 'สีขาว');
INSERT INTO `tblcolor` VALUES ('02', 'สีแดง');
INSERT INTO `tblcolor` VALUES ('03', 'สีดำ');
INSERT INTO `tblcolor` VALUES ('04', 'สีน้ำเงิน');
INSERT INTO `tblmember` VALUES ('26', 'นาย', 'เออีซีเรนท์123', '', '64', '0801258468', '92000', 'a@hotmail.com', 'aecrent');
INSERT INTO `tblmember` VALUES ('28', 'นางสาว', 'สมาย คลับ', '', '64', '', '', '', 'smile');
INSERT INTO `tblmember` VALUES ('35', '', '', '', '0', 'p', '', 'a@hotmail.com', '');
INSERT INTO `tblmodel` VALUES ('001', 'All New FINO', '01', '250', '', 'model001_0.gif', 'm001_1.jpg', 'm001_2.jpg', 'm001_3.jpeg', null, null);
INSERT INTO `tblmodel` VALUES ('002', 'Filano หัวฉีดใหม่', '01', '250', '', 'm002_0.jpg', 'm002_1.jpg', 'm002_2.jpg', 'm002_3.jpg', '', '');
INSERT INTO `tblmodel` VALUES ('003', 'Nouvo SX GP Edition', '01', '250', '', 'm003_0.jpg', 'm003_1.jpg', 'm003_2.jpg', '', '', '');
INSERT INTO `tblmodel` VALUES ('004', 'Yamaha Mio 125i', '02', '250', '', 'm004_0.jpg', 'm004_1.jpeg', 'model004_2.jpeg', 'm004_3.jpeg', '', '');
INSERT INTO `tblmotorcy` VALUES ('1', 'กข 183', 'M7826453', 'S1789561', '01', '003', '01', '01', '125', 'iiii                                                            ', 'N', '0');
INSERT INTO `tblmotorcy` VALUES ('3', 'กจ 4467', 'JF361E-0054032', 'MLHJF3615C5054032', '01', '003', '01', '02', '125', '                                                                                                                        ', null, '0');
INSERT INTO `tblnews` VALUES ('1', 'ข่าวสาร 012', 'ข่าวสารประชาสัมพันธ์ 01', '2013-12-28', '0001027_1.jpg.jpg', 'Y');
INSERT INTO `tblnews` VALUES ('2', 'ข่าวสาร 0212', 'ข่าวสารประชาสัมพันธ์ 0212', '2013-12-28', 'e1956.jpg', 'Y');
INSERT INTO `tblpayment` VALUES ('35', '23', '24-02-2015', '4012534578', '3000', 'dgdfgdfg');
INSERT INTO `tblpayment` VALUES ('36', '23', '24-02-2015', '4012534578', '2500', 'เออีซีเรนท์123');
INSERT INTO `tblpayment` VALUES ('37', '23', '26-02-2015', '4012534578', '2500', 'เออีซีเรนท์123');
INSERT INTO `tblpayment` VALUES ('38', '25', '08-06-2015', '4012534578', '250', 'เออีซีเรนท์123');
INSERT INTO `tblpayment` VALUES ('39', '27', '14-06-2015', '4012534578', '1000', 'เออีซีเรนท์123');
INSERT INTO `tblplace` VALUES ('00001', 'อ่าวนาง', '                                ', '                                ', '', 'p00001_0.gif', '', '', '');
INSERT INTO `tblplace` VALUES ('00002', 'สุสานหอย 75 ล้านปี', '                                ', '                                ', '', 'p00002_0.jpg', 'p00002_1.jpg', '', '');
INSERT INTO `tblprovince` VALUES ('1', '10', 'กรุงเทพมหานคร   ');
INSERT INTO `tblprovince` VALUES ('2', '11', 'สมุทรปราการ   ');
INSERT INTO `tblprovince` VALUES ('3', '12', 'นนทบุรี   ');
INSERT INTO `tblprovince` VALUES ('4', '13', 'ปทุมธานี   ');
INSERT INTO `tblprovince` VALUES ('5', '14', 'พระนครศรีอยุธยา   ');
INSERT INTO `tblprovince` VALUES ('6', '15', 'อ่างทอง   ');
INSERT INTO `tblprovince` VALUES ('7', '16', 'ลพบุรี   ');
INSERT INTO `tblprovince` VALUES ('8', '17', 'สิงห์บุรี   ');
INSERT INTO `tblprovince` VALUES ('9', '18', 'ชัยนาท   ');
INSERT INTO `tblprovince` VALUES ('10', '19', 'สระบุรี');
INSERT INTO `tblprovince` VALUES ('11', '20', 'ชลบุรี   ');
INSERT INTO `tblprovince` VALUES ('12', '21', 'ระยอง   ');
INSERT INTO `tblprovince` VALUES ('13', '22', 'จันทบุรี   ');
INSERT INTO `tblprovince` VALUES ('14', '23', 'ตราด   ');
INSERT INTO `tblprovince` VALUES ('15', '24', 'ฉะเชิงเทรา   ');
INSERT INTO `tblprovince` VALUES ('16', '25', 'ปราจีนบุรี   ');
INSERT INTO `tblprovince` VALUES ('17', '26', 'นครนายก   ');
INSERT INTO `tblprovince` VALUES ('18', '27', 'สระแก้ว   ');
INSERT INTO `tblprovince` VALUES ('19', '30', 'นครราชสีมา   ');
INSERT INTO `tblprovince` VALUES ('20', '31', 'บุรีรัมย์   ');
INSERT INTO `tblprovince` VALUES ('21', '32', 'สุรินทร์   ');
INSERT INTO `tblprovince` VALUES ('22', '33', 'ศรีสะเกษ   ');
INSERT INTO `tblprovince` VALUES ('23', '34', 'อุบลราชธานี   ');
INSERT INTO `tblprovince` VALUES ('24', '35', 'ยโสธร   ');
INSERT INTO `tblprovince` VALUES ('25', '36', 'ชัยภูมิ   ');
INSERT INTO `tblprovince` VALUES ('26', '37', 'อำนาจเจริญ   ');
INSERT INTO `tblprovince` VALUES ('27', '39', 'หนองบัวลำภู   ');
INSERT INTO `tblprovince` VALUES ('28', '40', 'ขอนแก่น   ');
INSERT INTO `tblprovince` VALUES ('29', '41', 'อุดรธานี   ');
INSERT INTO `tblprovince` VALUES ('30', '42', 'เลย   ');
INSERT INTO `tblprovince` VALUES ('31', '43', 'หนองคาย   ');
INSERT INTO `tblprovince` VALUES ('32', '44', 'มหาสารคาม   ');
INSERT INTO `tblprovince` VALUES ('33', '45', 'ร้อยเอ็ด   ');
INSERT INTO `tblprovince` VALUES ('34', '46', 'กาฬสินธุ์   ');
INSERT INTO `tblprovince` VALUES ('35', '47', 'สกลนคร   ');
INSERT INTO `tblprovince` VALUES ('36', '48', 'นครพนม   ');
INSERT INTO `tblprovince` VALUES ('37', '49', 'มุกดาหาร   ');
INSERT INTO `tblprovince` VALUES ('38', '50', 'เชียงใหม่   ');
INSERT INTO `tblprovince` VALUES ('39', '51', 'ลำพูน   ');
INSERT INTO `tblprovince` VALUES ('40', '52', 'ลำปาง   ');
INSERT INTO `tblprovince` VALUES ('41', '53', 'อุตรดิตถ์   ');
INSERT INTO `tblprovince` VALUES ('42', '54', 'แพร่   ');
INSERT INTO `tblprovince` VALUES ('43', '55', 'น่าน   ');
INSERT INTO `tblprovince` VALUES ('44', '56', 'พะเยา   ');
INSERT INTO `tblprovince` VALUES ('45', '57', 'เชียงราย   ');
INSERT INTO `tblprovince` VALUES ('46', '58', 'แม่ฮ่องสอน   ');
INSERT INTO `tblprovince` VALUES ('47', '60', 'นครสวรรค์   ');
INSERT INTO `tblprovince` VALUES ('48', '61', 'อุทัยธานี   ');
INSERT INTO `tblprovince` VALUES ('49', '62', 'กำแพงเพชร   ');
INSERT INTO `tblprovince` VALUES ('50', '63', 'ตาก   ');
INSERT INTO `tblprovince` VALUES ('51', '64', 'สุโขทัย   ');
INSERT INTO `tblprovince` VALUES ('52', '65', 'พิษณุโลก   ');
INSERT INTO `tblprovince` VALUES ('53', '66', 'พิจิตร   ');
INSERT INTO `tblprovince` VALUES ('54', '67', 'เพชรบูรณ์   ');
INSERT INTO `tblprovince` VALUES ('55', '70', 'ราชบุรี   ');
INSERT INTO `tblprovince` VALUES ('56', '71', 'กาญจนบุรี   ');
INSERT INTO `tblprovince` VALUES ('57', '72', 'สุพรรณบุรี   ');
INSERT INTO `tblprovince` VALUES ('58', '73', 'นครปฐม   ');
INSERT INTO `tblprovince` VALUES ('59', '74', 'สมุทรสาคร   ');
INSERT INTO `tblprovince` VALUES ('60', '75', 'สมุทรสงคราม   ');
INSERT INTO `tblprovince` VALUES ('61', '76', 'เพชรบุรี   ');
INSERT INTO `tblprovince` VALUES ('62', '77', 'ประจวบคีรีขันธ์   ');
INSERT INTO `tblprovince` VALUES ('63', '80', 'นครศรีธรรมราช   ');
INSERT INTO `tblprovince` VALUES ('64', '81', 'กระบี่   ');
INSERT INTO `tblprovince` VALUES ('65', '82', 'พังงา   ');
INSERT INTO `tblprovince` VALUES ('66', '83', 'ภูเก็ต   ');
INSERT INTO `tblprovince` VALUES ('67', '84', 'สุราษฎร์ธานี   ');
INSERT INTO `tblprovince` VALUES ('68', '85', 'ระนอง   ');
INSERT INTO `tblprovince` VALUES ('69', '86', 'ชุมพร   ');
INSERT INTO `tblprovince` VALUES ('70', '90', 'สงขลา   ');
INSERT INTO `tblprovince` VALUES ('71', '91', 'สตูล   ');
INSERT INTO `tblprovince` VALUES ('72', '92', 'ตรัง   ');
INSERT INTO `tblprovince` VALUES ('73', '93', 'พัทลุง   ');
INSERT INTO `tblprovince` VALUES ('74', '94', 'ปัตตานี   ');
INSERT INTO `tblprovince` VALUES ('75', '95', 'ยะลา   ');
INSERT INTO `tblprovince` VALUES ('76', '96', 'นราธิวาส   ');
INSERT INTO `tblprovince` VALUES ('77', '97', 'บึงกาฬ');
INSERT INTO `tblshop` VALUES ('00001', 'ร้านอาหารวังทราย', '                                ', '                                ', '', 'p00001_0.jpg', 'p00001_1.jpg', 'p00001_2.jpg', '');
INSERT INTO `tblstatus` VALUES ('1', 'จอง');
INSERT INTO `tblstatus` VALUES ('2', 'ชำระเงินเรียบร้อย');
INSERT INTO `tbltitle` VALUES ('1', 'นาย', 'นาย');
INSERT INTO `tbltitle` VALUES ('2', 'นาง', 'นาง');
INSERT INTO `tbltitle` VALUES ('3', 'นางสาว', 'น.ส.');
INSERT INTO `tbltype` VALUES ('01', 'เกียร์ธรรมดา');
INSERT INTO `tbltype` VALUES ('02', 'เกียร์อัตโนมัติ');
INSERT INTO `tbluser` VALUES ('admin', '1234', '00', 'ผู้ดูแลระบบ');
INSERT INTO `tbluser` VALUES ('smile', '1234', '01', 'สมาย คลับ');
INSERT INTO `tbluser` VALUES ('', '', '01', '');
INSERT INTO `tbluser` VALUES ('aecrent', '1234', '01', 'เออีซีเรนท์123');
INSERT INTO `tblyeehor` VALUES ('01', 'YAMAHA', null, null);
INSERT INTO `tblyeehor` VALUES ('02', 'HONDA', null, null);
