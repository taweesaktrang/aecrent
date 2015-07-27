/*
MySQL Data Transfer
Source Host: localhost
Source Database: dbrent
Target Host: localhost
Target Database: dbrent
Date: 27/6/2015 10:59:07
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tb_province
-- ----------------------------
DROP TABLE IF EXISTS `tb_province`;
CREATE TABLE `tb_province` (
  `provinceid` int(5) NOT NULL auto_increment,
  `provincecode` varchar(2) collate utf8_unicode_ci NOT NULL,
  `provincename` varchar(150) collate utf8_unicode_ci NOT NULL,
  `geoid` int(5) NOT NULL default '0',
  PRIMARY KEY  (`provinceid`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

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
INSERT INTO `tb_province` VALUES ('1', '10', 'กรุงเทพมหานคร   ', '2');
INSERT INTO `tb_province` VALUES ('2', '11', 'สมุทรปราการ   ', '2');
INSERT INTO `tb_province` VALUES ('3', '12', 'นนทบุรี   ', '2');
INSERT INTO `tb_province` VALUES ('4', '13', 'ปทุมธานี   ', '2');
INSERT INTO `tb_province` VALUES ('5', '14', 'พระนครศรีอยุธยา   ', '2');
INSERT INTO `tb_province` VALUES ('6', '15', 'อ่างทอง   ', '2');
INSERT INTO `tb_province` VALUES ('7', '16', 'ลพบุรี   ', '2');
INSERT INTO `tb_province` VALUES ('8', '17', 'สิงห์บุรี   ', '2');
INSERT INTO `tb_province` VALUES ('9', '18', 'ชัยนาท   ', '2');
INSERT INTO `tb_province` VALUES ('10', '19', 'สระบุรี', '2');
INSERT INTO `tb_province` VALUES ('11', '20', 'ชลบุรี   ', '5');
INSERT INTO `tb_province` VALUES ('12', '21', 'ระยอง   ', '5');
INSERT INTO `tb_province` VALUES ('13', '22', 'จันทบุรี   ', '5');
INSERT INTO `tb_province` VALUES ('14', '23', 'ตราด   ', '5');
INSERT INTO `tb_province` VALUES ('15', '24', 'ฉะเชิงเทรา   ', '5');
INSERT INTO `tb_province` VALUES ('16', '25', 'ปราจีนบุรี   ', '5');
INSERT INTO `tb_province` VALUES ('17', '26', 'นครนายก   ', '2');
INSERT INTO `tb_province` VALUES ('18', '27', 'สระแก้ว   ', '5');
INSERT INTO `tb_province` VALUES ('19', '30', 'นครราชสีมา   ', '3');
INSERT INTO `tb_province` VALUES ('20', '31', 'บุรีรัมย์   ', '3');
INSERT INTO `tb_province` VALUES ('21', '32', 'สุรินทร์   ', '3');
INSERT INTO `tb_province` VALUES ('22', '33', 'ศรีสะเกษ   ', '3');
INSERT INTO `tb_province` VALUES ('23', '34', 'อุบลราชธานี   ', '3');
INSERT INTO `tb_province` VALUES ('24', '35', 'ยโสธร   ', '3');
INSERT INTO `tb_province` VALUES ('25', '36', 'ชัยภูมิ   ', '3');
INSERT INTO `tb_province` VALUES ('26', '37', 'อำนาจเจริญ   ', '3');
INSERT INTO `tb_province` VALUES ('27', '39', 'หนองบัวลำภู   ', '3');
INSERT INTO `tb_province` VALUES ('28', '40', 'ขอนแก่น   ', '3');
INSERT INTO `tb_province` VALUES ('29', '41', 'อุดรธานี   ', '3');
INSERT INTO `tb_province` VALUES ('30', '42', 'เลย   ', '3');
INSERT INTO `tb_province` VALUES ('31', '43', 'หนองคาย   ', '3');
INSERT INTO `tb_province` VALUES ('32', '44', 'มหาสารคาม   ', '3');
INSERT INTO `tb_province` VALUES ('33', '45', 'ร้อยเอ็ด   ', '3');
INSERT INTO `tb_province` VALUES ('34', '46', 'กาฬสินธุ์   ', '3');
INSERT INTO `tb_province` VALUES ('35', '47', 'สกลนคร   ', '3');
INSERT INTO `tb_province` VALUES ('36', '48', 'นครพนม   ', '3');
INSERT INTO `tb_province` VALUES ('37', '49', 'มุกดาหาร   ', '3');
INSERT INTO `tb_province` VALUES ('38', '50', 'เชียงใหม่   ', '1');
INSERT INTO `tb_province` VALUES ('39', '51', 'ลำพูน   ', '1');
INSERT INTO `tb_province` VALUES ('40', '52', 'ลำปาง   ', '1');
INSERT INTO `tb_province` VALUES ('41', '53', 'อุตรดิตถ์   ', '1');
INSERT INTO `tb_province` VALUES ('42', '54', 'แพร่   ', '1');
INSERT INTO `tb_province` VALUES ('43', '55', 'น่าน   ', '1');
INSERT INTO `tb_province` VALUES ('44', '56', 'พะเยา   ', '1');
INSERT INTO `tb_province` VALUES ('45', '57', 'เชียงราย   ', '1');
INSERT INTO `tb_province` VALUES ('46', '58', 'แม่ฮ่องสอน   ', '1');
INSERT INTO `tb_province` VALUES ('47', '60', 'นครสวรรค์   ', '2');
INSERT INTO `tb_province` VALUES ('48', '61', 'อุทัยธานี   ', '2');
INSERT INTO `tb_province` VALUES ('49', '62', 'กำแพงเพชร   ', '2');
INSERT INTO `tb_province` VALUES ('50', '63', 'ตาก   ', '4');
INSERT INTO `tb_province` VALUES ('51', '64', 'สุโขทัย   ', '2');
INSERT INTO `tb_province` VALUES ('52', '65', 'พิษณุโลก   ', '2');
INSERT INTO `tb_province` VALUES ('53', '66', 'พิจิตร   ', '2');
INSERT INTO `tb_province` VALUES ('54', '67', 'เพชรบูรณ์   ', '2');
INSERT INTO `tb_province` VALUES ('55', '70', 'ราชบุรี   ', '4');
INSERT INTO `tb_province` VALUES ('56', '71', 'กาญจนบุรี   ', '4');
INSERT INTO `tb_province` VALUES ('57', '72', 'สุพรรณบุรี   ', '2');
INSERT INTO `tb_province` VALUES ('58', '73', 'นครปฐม   ', '2');
INSERT INTO `tb_province` VALUES ('59', '74', 'สมุทรสาคร   ', '2');
INSERT INTO `tb_province` VALUES ('60', '75', 'สมุทรสงคราม   ', '2');
INSERT INTO `tb_province` VALUES ('61', '76', 'เพชรบุรี   ', '4');
INSERT INTO `tb_province` VALUES ('62', '77', 'ประจวบคีรีขันธ์   ', '4');
INSERT INTO `tb_province` VALUES ('63', '80', 'นครศรีธรรมราช   ', '6');
INSERT INTO `tb_province` VALUES ('64', '81', 'กระบี่   ', '6');
INSERT INTO `tb_province` VALUES ('65', '82', 'พังงา   ', '6');
INSERT INTO `tb_province` VALUES ('66', '83', 'ภูเก็ต   ', '6');
INSERT INTO `tb_province` VALUES ('67', '84', 'สุราษฎร์ธานี   ', '6');
INSERT INTO `tb_province` VALUES ('68', '85', 'ระนอง   ', '6');
INSERT INTO `tb_province` VALUES ('69', '86', 'ชุมพร   ', '6');
INSERT INTO `tb_province` VALUES ('70', '90', 'สงขลา   ', '6');
INSERT INTO `tb_province` VALUES ('71', '91', 'สตูล   ', '6');
INSERT INTO `tb_province` VALUES ('72', '92', 'ตรัง   ', '6');
INSERT INTO `tb_province` VALUES ('73', '93', 'พัทลุง   ', '6');
INSERT INTO `tb_province` VALUES ('74', '94', 'ปัตตานี   ', '6');
INSERT INTO `tb_province` VALUES ('75', '95', 'ยะลา   ', '6');
INSERT INTO `tb_province` VALUES ('76', '96', 'นราธิวาส   ', '6');
INSERT INTO `tb_province` VALUES ('77', '97', 'บึงกาฬ', '3');
INSERT INTO `tblbank` VALUES ('9030198702', 'นายธนาคาร', 'ธนาคารกรุงไทย', 'KTB');
INSERT INTO `tblbank` VALUES ('4012534578', 'นายแบงค์', 'ธนาคารกรุงไทย', '');
INSERT INTO `tblbooking` VALUES ('23', '26', '004', '23-02-2015', '04-03-2015', '10', '250', '2500', '2', null);
INSERT INTO `tblbooking` VALUES ('24', '26', '001', '26-05-2015', '27-05-2015', '1', '250', '250', '2', null);
INSERT INTO `tblbooking` VALUES ('25', '0', '004', '31-05-2015', '04-06-2015', '5', '250', '1250', null, null);
INSERT INTO `tblbooking` VALUES ('26', '0', '001', '31-05-2015', '04-06-2015', '5', '250', '1250', null, null);
INSERT INTO `tblbooking` VALUES ('27', '0', '003', '08-06-2015', '11-06-2015', '4', '250', '1000', '1', null);
INSERT INTO `tblbooking` VALUES ('28', '0', '001', '08-06-2015', '12-06-2015', '5', '250', '1250', '1', null);
INSERT INTO `tblbooking` VALUES ('29', '30', '001', '08-06-2015', '17-06-2015', '10', '250', '2500', '2', null);
INSERT INTO `tblbooking` VALUES ('30', '31', '004', '18-06-2015', '27-06-2015', '10', '250', '250', '1', 'M');
INSERT INTO `tblbooking` VALUES ('31', '31', '004', '18-06-2015', '27-06-2015', '10', '250', '250', '1', 'M');
INSERT INTO `tblbooking` VALUES ('32', '31', '010', '18-06-2015', '19-06-2015', '1', '300', '300', '1', 'W');
INSERT INTO `tblbooking` VALUES ('33', '30', '008', '22-06-2015', '26-06-2015', '5', '250', '250', '1', 'M');
INSERT INTO `tblbooking` VALUES ('34', '30', '008', '22-06-2015', '23-06-2015', '2', '250', '250', '1', 'M');
INSERT INTO `tblcc` VALUES ('01', '100');
INSERT INTO `tblcc` VALUES ('02', '125');
INSERT INTO `tblcc` VALUES ('03', '150');
INSERT INTO `tblcolor` VALUES ('01', 'สีขาว');
INSERT INTO `tblcolor` VALUES ('02', 'สีแดง');
INSERT INTO `tblcolor` VALUES ('03', 'สีดำ');
INSERT INTO `tblcolor` VALUES ('04', 'สีน้ำเงิน');
INSERT INTO `tblmember` VALUES ('26', 'นาย', 'เออีซีเรนท์123', '', '64', '0801258468', '92000', 'a@hotmail.com', 'aecrent');
INSERT INTO `tblmember` VALUES ('28', 'นางสาว', 'สมาย คลับ', '', '64', '', '', '', 'smile');
INSERT INTO `tblmember` VALUES ('29', 'นางสาว', 'วารุณี  แซ่อุ่ย', '132/41', '75', '0849677852', '95000', 'dark_demon_ii@hotmail.com', 'วารุณี ');
INSERT INTO `tblmember` VALUES ('30', 'นางสาว', 'วารุณี  แซ่อุ่ย', '132/41 อ.เมือง จ.ยะลา', '75', '0612301031', '95000', 'dark_demon_ii@hotmail.com', 'aon');
INSERT INTO `tblmember` VALUES ('31', '', 'ปนัดดา ศิริบุญ', '21/1', '0', '0612301025', '80170', 'siriboonbrink@gmail.com', 'bank');
INSERT INTO `tblmodel` VALUES ('002', 'Yamaha Filano', '01', '250', 'มอเตอร์ไซค์ Yamaha Filano หัวฉีด ใหม่', 'model002_0.jpg', 'model002_1.jpg', 'm002_2.jpg', 'm002_3.jpg', '', '');
INSERT INTO `tblmodel` VALUES ('003', 'Nouvo SX GP Edition', '01', '250', '', 'model003_0.jpg', 'model003_1.jpg', 'm003_2.jpg', '', '', '');
INSERT INTO `tblmodel` VALUES ('004', 'ZoomerX ', '02', '250', 'NEW HONDA Zoomer-X Life Unblocked แสบสรรค์ มันส์นอกกรอบ\r\nเนื้อสีสันสุดแสบ รวมกับ Gadget สุดซี๊ด เรื่องจี๊ดๆ มันส์…ก็เกิด!!! Zoomer-X ใหม่ Naked A.T. ไอเดียเจ็บ ที่มาพร้อมกับสีแสบๆ แบบสะท้อนแสง สะท้อนความ FUN ในตัวคุณให้โลกได้รู้ อยากใส่อะไรก็ใส่กับช่อง Free Space ศิลป์กว่าเดิมกับ X-Meter ดีไซน์ใหม่ พร้อมโช๊กหัวกลับ แม็ก 12 นิ้ว ยางโตแบบจุ๊บเลส ได้เวลาโลดแล่นออกจากโลกใบเก่าไปกับความแสบ…แบบสร้างสรรค์ ให้ชีวิตมันนอกกรอบ!!!', 'model004_0.jpg', 'model004_1.jpg', 'model004_2.jpg', 'm004_3.jpeg', '', '');
INSERT INTO `tblmodel` VALUES ('005', ' HONDA Wave110i Eco', '02', '250', 'ประหยัดขั้นเทพ Wave ฟันธง !!', 'model005_0.jpg', 'model005_1.jpg', '', '', '', '');
INSERT INTO `tblmodel` VALUES ('006', 'Scoopy i vivid me', '02', '250', '', 'model006_0.jpg', 'model006_1.jpg', 'model006_2.jpg', '', '', '');
INSERT INTO `tblmodel` VALUES ('007', 'HONDA FORZA ', '02', '0', '', 'model007_0.jpg', '', '', '', '', '');
INSERT INTO `tblmodel` VALUES ('008', 'SUZUKI SMASH 2013', '03', '250', '', 'model008_0.jpg', '', '', '', '', '');
INSERT INTO `tblmodel` VALUES ('009', 'VANVAN', '03', '0', '', 'model009_0.jpg', '', '', '', '', '');
INSERT INTO `tblmodel` VALUES ('010', 'KSR', '04', '300', '', 'model010_0.jpg', 'model010_1.jpg', '', '', '', '');
INSERT INTO `tblmotorcy` VALUES ('1', 'กข 183', 'M7826453', 'S1789561', '01', '003', '01', '01', '125', 'iiii                                                            ', 'N', '0');
INSERT INTO `tblmotorcy` VALUES ('3', 'กจ 4467', 'JF361E-0054032', 'MLHJF3615C5054032', '01', '003', '01', '02', '125', '                                                                                                                        ', null, '0');
INSERT INTO `tblpayment` VALUES ('35', '23', '24-02-2015', '4012534578', '3000', 'dgdfgdfg');
INSERT INTO `tblpayment` VALUES ('36', '23', '24-02-2015', '4012534578', '2500', 'เออีซีเรนท์123');
INSERT INTO `tblpayment` VALUES ('37', '23', '26-02-2015', '4012534578', '2500', 'เออีซีเรนท์123');
INSERT INTO `tblpayment` VALUES ('38', '29', '09-06-2015', '4012534578', '2500', 'วารุณี  แซ่อุ่ย');
INSERT INTO `tblplace` VALUES ('00004', 'ทะเลแหวก ', '“ทะเลแหวก” แหล่งท่องเที่ยวทางธรรมชาติของ จ.กระบี่ ที่ถูกขนานนามให้เป็นUnseen Thailand ที่มีชื่อเสียงโด่งดังไปทั่วโลกอันเนื่องมาจากความมหัศจรรย์ของธรรมชาติใน ยามน้ำลดที่พัดพาเอาเม็ดทรายมาบรรจบกันไว้ณจุดนี้จนทำให้เกิดปรากฎการณ์ที่ เรียกว่า“ทะเลแหวก” ขึ้นและเผยให้เห็นส่วนของสันทรายขาวละเอียดทอดตัวเป็นแนวยาวเชื่อมต่อถึงกัน ได้ระหว่างเกาะ 3 เกาะคือ เกาะไก่ เกาะหม้อ และ เกาะทับ และแนวสันทรายนี้จะค่อยๆจมหายไปใต้ผืนน้ำเมื่อเข้าสู่ช่วงเวลาน้ำขึ้นของแต่ละวัน\r\nหากนักท่องเที่ยวท่านใดที่ไปไม่ตรงในช่วงเวลาน้ำลดจนอดเห็นสันทรายขาว ละเอียดนี้แล้วล่ะก็ คุณยังสามารถเดินเล่นไป-มาระหว่างเกาะทั้งสามนี้ได้เช่นกันแต่อาจจะต้องยอม เปียกกันหน่อยและด้วยความขาวละเอียดของเม็ดทรายบวกกับผืนน้ำใสๆของทะเลแหวก บริเวณนี้จึงเป็นแหล่งเล่นน้ำที่ดีที่สุดอีกแห่งหนึ่งของท้องทะเลจ.กระบี่\r\n                       ', 'ทะเลแหวกอยู่ห่างจังหวัดกระบี่ประมาณ 20 กิโลเมตรให้ใช้ทางหลวงหมายเลข 4034 แล้วเลี้ยวซ้ายไปตามทางหลวงหมายเลข 4202 ไปอ่าวนางและจากอ่าวนางจะมีเรือหางยาวให้เช่าเหมาลำพานักท่องเที่ยวไปเที่ยว ชมทะเลแหวกหรือหมู่เกาะปอดะ ในราคาประมาณ 2,200 บาทต่อลำ หรือนักท่องเที่ยวสามารถเลือกซื้อทัวร์ 4 เกาะ จากบริษัททัวร์ในจังหวัดกระบี่ก็ได้                                 ', '', 'p00004_0.jpg', 'p00004_1.jpg', 'p00004_2.jpg', 'p00004_3.jpg');
INSERT INTO `tblplace` VALUES ('00002', ' สระมรกต', ' สระมรกต สระน้ำสวยใสกลางใจป่า กำเนิดมาจากธารน้ำอุ่นในผืนป่าที่ราบต่ำภาคใต้ แหล่งสุดท้ายที่พบ นกแต้วแร้วท้องดำ ซึ่งเคยสูญพันธ์ไปนานเกือบ 100 ปี ใครจะรู้บ้างไหมว่า ใจกลางป่าผืนนี้มีทั้งสระน้ำสวยใส และนกหายากอยู่รวมกัน\r\nการเดินทางจากจังหวัดกระบี่ใช้ทางหลวงหมายเลข 4 สู่อำเภอคลองท่อม แยกซ้ายมือทางหลวง หมายเลข 4038 มุ่งหน้าอำเภอลำทับ ระหว่างทางมีทางแยกขวามือเป็นทางย่อยแยก เข้าสู่น้ำตกร้อน และสระมรกตที่มีป้ายบอกทางชัดเจน\r\n                                                                                               ', '   อยู่ห่างจากอำเภอเมืองกระบี่ตามถนนเพชรเกษม (กระบี่-ตรัง) ประมาณ 45 กิโลเมตรจากนั้นแยกเข้า ถนนสุขาภิบาล 2 สังเกตจากป้ายบอกทาง ตรงที่ว่าการอำเภอคลองท่อมไปอีกประมาณ 15ไปตามทางหลวง หมายเลข 4038 แล้วเลี้ยวขวาไปตามถนนรพช. และตามป้ายบอกทางไปจะพบน้ำตกร้อน และสระมรกต                                                                                            ', '', 'p00002_0.jpg', 'p00002_1.jpg', '', '');
INSERT INTO `tblplace` VALUES ('00003', 'สุสานหอย 45 ล้านปี', '\"สุสานหอย 45 ล้านปี\" ตั้งอยู่ในเขต อุทยานแห่งชาติหาดนพรัตน์ธารา-หมู่เกาะพีพี บริเวณชายทะเลบ้านแหลมโพธิ์ทางด้านทิศตะวันออกเฉียงเหนือของพื้นที่อุทยานแห่งชาติ มีซากดึกดำบรรพ์ของหอยน้ำจืดชนิดต่างๆ ส่วนใหญ่เป็นหอยขม มีขนาดยาวประมาณ 2 เซนติเมตร ซากหอยเหล่านี้ได้ทับถมกันโดยมีน้ำประสานธาตุปูนจับตัวให้กลายเป็นหินแข็งทับอยู่ชั้นหินลิกไนท์ และหินดินดาน นับเป็นสิ่งมหัศจรรย์ทางธรรมชาติ และเป็นหลักฐานทางโบราณคดีที่สำคัญอีกแห่งหนึ่งของโลก ช่วงแรกประมาณกันว่าสุสานหอยแห่งนี้เกิดขึ้นเมื่อ 75 ล้านปีมาแล้ว ต่อมาความก้าวหน้าทางเทคโนโลยีและการค้นพบหลักฐานด้านธรณีวิทยามีมากขึ้น จึงกำหนดอายุของสุสานหอยใหม่เหลือประมาณ 40-20 ล้านปี                                ', 'สถานที่ตั้ง\r\nตั้งอยู่บริเวณชายทะเลบ้านแหลมโพธิ์ หมู่ที่ 6 ต.ไสไทย อ.เมือง จ.กระบี่ อยู่ห่างจากตัวเมือง\r\nประมาณ 17 กม. หรือตามเส้นทางถนนสายกระบี่-หาดนพรัตน์ธารา ประมาณ 20 กม.\r\n', '', 'p00003_0.jpg', 'p00003_1.jpg', '', '');
INSERT INTO `tblplace` VALUES ('00001', 'อ่าวมาหยา  ', 'อ่าวมาหยา  เกิดขึ้นด้วยกระบวนการเดียวกันกับอ่าวปิเละ แต่ส่วนหนึ่งของหน้าผาที่โอบล้อมพังทลายกลายเป็นช่องเปิดขนาดใหญ่เชื่อมต่อกับทะเลภายนอก น้ำทะเลไหลเวียนเข้าออกได้ดี เกาะหินปูนแห่งนี้ยังตั้งอยู่ห่างชายฝั่งหลายสิบกิโลเมตร ตะกอนที่มาจากอ่าวพังงามีอิทธิพลน้อยมาก น้ำทะเลใสช่วยให้แสงส่องผ่านในระดับเหมาะสม ตัวอ่อนของปะการังที่ล่องลอยอยู่ทั่วบริเวณพากันลงเกาะบนหินที่ทับถมอยู่กลางอ่าว เมื่อยึดที่มั่นได้ แต่ละตัวสืบพันธุ์แบบไม่อาศัยเพศแบ่งตัวจากหนึ่งเป็นสอง...สองเป็นสี่ เวลาผ่านไปหลายพันปี แนวปะการังขยายขนาดปกคลุมทั่วอ่าวมาหยา ในเวลาเดียวกับที่ทะเลมีการเปลี่ยนแปลง กระบวนการของธรรมชาติยังเกิดขึ้นบนชายฝั่ง ตะกอนทรายตกทับถมรวมกันกลายเป็นหาด ผลของพืชชายทะเลที่ล่องลอยมากับน้ำบ้าง มากับสัตว์ต่างๆ บ้าง เจริญงอกงามกลายเป็นป่าชายหาด กินพื้นที่ตอนในของอ่าวประมาณ ๕๐ ไร่                                                                                                ', 'จากท่าเรือเจ้าฟ้าในตัวเมืองกระบี่ มีเรือโดยสารออกจากกระบี่ไปเกาะพีพี วันละ2 เที่ยว เวลา 10.00 น. และ 14.30 น. และจากเกาะพีพีกลับกระบี่ เรือออกเวลา 09.00 น. และ 13.00 น. ค่าโดยสารคนละ 150 บาท ใช้เวลาเดินทางประมาณ 2 ชั่วโมงครึ่ง เมื่อมาถึงเกาะพีพี นักท่องเที่ยวสามารถเช่าเรือหางยาวไปท่องเที่ยวตามจุดต่างๆ ของเกาะพีพี บริเวณอ่าวต้นไทร เกาะพีพีดอน มีเรือหางยาวให้เช่าไปเที่ยวตามชายหาด                                                                                                ', '', 'p00001_0.jpg', 'p00001_1.gif', '', '');
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
INSERT INTO `tblshop` VALUES ('00002', 'ร้านอาหารมะหญิง ', 'ร้านอาหารมะหญิง เกาะกลาง อำเภอเมืองกระบี่ ร้านนี้ตั้งอยู่ที่เกาะกลาง เป็นร้านอาหารที่ตั้งอยู่บนกระชังปลาของตัวเอง และมะหญิง เจ้าของร้านชาวมุสลิม เป็นแม่ครัวลงมือทำอาหารและดูแลลูกค้าด้วยตัวเอง มาที่นี่นอกจากลูกค้าจะได้ชมปลาหลากหลายชนิดที่ทางร้านเลี้ยงไว้ปรุงอาหารแล้ว เช่น ปลากะพง ปลาเก๋า ฯลฯ ลูกค้ายังสามารถเลือกปลาจากกระชังได้ว่า อยากได้ปลาแบบไหน ไปปรุงอาหารอะไร ซึ่งต้องบอกว่ารสชาติหวานสดอร่อยถูกใจนักชิมอย่างแน่นอน เมนูแนะนำเด็ดๆ ของร้านมะหญิง อาทิ ปลากะพงทอดน้ำปลา กุ้งซอสมะขาม หอยหวานผัดพริกเผา ปูผัดพริกไทยดำ น้ำพริกกุ้ง แกงส้มปลาเก๋า ฯลฯ เอาเป็นว่าหากใครชอบกินอาหารทะเลสดๆ ใหม่ๆ ท่ามกลางบรรยากาศริมน้ำชิลล์ๆ เชิญต้องมาร้านนี้                                                          ', '               ตามชิมไปร้านอาหารมะหญิง อำเภอเมือง\r\nที่ตั้ง : บ้านเกาะกลาง อำเภอเมืองกระบี่ จังหวัดกระบี่ (ลูกค้าสามารถนั่งเรือได้จากท่าเรือเจ้าฟ้า ราคาเหมาะลำเที่ยวละ 100 บาท นั่งได้ประมาณ 6- 8 คน)\r\nเปิดปิดเวลา: ทุกวัน 09.00-21.00 น.\r\nโทร. 08 1271 6102\r\n                                                 ', '', 'p00002_0.jpg', '', '', '');
INSERT INTO `tblshop` VALUES ('00001', 'ร้านอาหารเรือนไม้ ', '   ร้านอาหารเรือนไม้ (Ruenmai Krabi Boutique Restuarrent) อำเภอเมืองกระบี่ เป็นร้านพื้นบ้านปักษ์ใต้ที่มีรสชาติความอร่อยเป็นเอกลักษณ์ไม้ซ้ำที่ไหน ด้วยเจ้าของร้านคือ โก้เลี้ยง เป็นนักชิมตัวยงที่มีประสบการณ์ในแวดวงอาหารมานานกว่า 25 ปี เมนูอาหารของร้านเรือนไม้แต่ละเมนูที่คิดค้นและเสิร์ฟออกมา จึงล้วนคัดสรรและปรุงขึ้นจากวัตถุดิบชั้นดี จานเด็ดที่ลูกค้าชื่นชอบ อาทิ น้ำพริกกุ้งสด ใบเหลียงผัดไข่ ปลาอินทรีย์ทอดน้ำปลา หมูผัดกะปิ แกงส้มปลากะพง สะตอกะปิผัดกุ้ง ฯลฯ นอกจากลิ้มลองอาหารอร่อยๆ แล้ว ร้านนี้ยังโดดเด่นด้วยตัวร้านที่เป็นทรงไทยประยุกต์ บรรยากาศแบบเปิดโล่งรับลมเย็นสบาย เหมาะสำหรับมากินข้าวกับครอบครัว หรือคนรู้ใจมากๆ                                                                                             ', '                 ตามไปชิม ร้านอาหารเรือนไม้ (Ruenmai Krabi Boutique Restuarrent) อำเภอเมืองกระบี่\r\nที่ตั้ง:117 หมู่ 3 อำเภอเมืองกระบี่ จังหวัดกระบี่\r\nเปิดปิดเวลา: ทุกวัน 10.30-15.00 น. และ 17.00-22.00 น.\r\nโทร.08 9288 3232\r\n                                                                               ', '', 'p00001_0.jpg', '', '', '');
INSERT INTO `tblshop` VALUES ('00003', 'ร้านไอศกรีมเจ๊ไหม ', 'ร้านไอศกรีมเจ๊ไหม สะพานเจ้าฟ้า อำเภอเมืองกระบี่ ร้านไอศกรีมเจ้าเด็ดบริเวณท่าเรือเจ้าฟ้า ที่คิดค้นสูตรความอร่อยด้วยตัวเอง และเปิดขายมานานกว่า 40 ปี ไอศกรีมร้านเจ๊ไหมมีให้เลือกชิม 2 รสชาติ คือ ไอศกรีมกะทิสด รสชาติหวานมัน กับช็อกโกแล็ตหอมหวานชื่นใจ อีกทั้งมีเครื่องให้เลือกใส่หลายชนิด อาทิ ขนมปัง ข้าวโพด ลูกชิด ฯลฯ หากเพื่อนๆ มาแวะมาแถวตัวเมืองกระบี่แล้วกำลังมองหาขนมหวานเติมความสดชื่น อย่าลืมแวะมาที่ร้านเจ๊ไหมได้ ขายถ้วยละ 25-30 บาท เท่านั้น บอกได้เลยว่ากินแล่วจะติดใจจนต้องกลับมาชิมอีกแน่นอน                                                                ', 'ร้านไอศกรีมเจ๊ไหม สะพานเจ้าฟ้า อำเภอเมืองกระบี่\r\nที่ตั้ง: 11/10 ถนนเหมทานนท์ อำเภอเมืองกระบี่ จังหวัดกระบี่\r\nเปิดปิดเวลา: ทุกวัน 10.00-22.00 น.\r\nโทร. 08 1535 6884, 08 1719 6244\r\n                                                                ', '', 'p00003_0.jpg', '', '', '');
INSERT INTO `tblshop` VALUES ('00004', 'ร้านขนมโตเกียว ตลาดโต้รุ่งท่าเจ้าฟ้า', 'ร้านขนมโตเกียว ตลาดโต้รุ่งท่าเจ้าฟ้า เป็นตลาดโตรุ่งขนาดใหญ่ บรรยากาศคึกคัก มีร้านอาหารต่างๆ นับสิบร้านตั้งเรียงรายไปตามถนนคงคา ฝั่งท่าเรือเจ้าฟ้า คนกระบี่และนักท่องเที่ยวนิยมมากินอาหารเย็นกันที่นี่ สำหรับร้านขนมโตเกียว เจ้าอร่อยนี้เปิดขายมานานกว่า 30 ปีแล้ว โดยคุณลุงเจ้าของร้านเริ่มต้นขายตั้งแต่ชิ้นละบาท ปัจจุบัน ขาย 6 ชิ้น 20 บาท เคล็ดลับความอร่อยอยู่ที่เนื้อแป้ง ที่บาง นุ่ม รสชาติหวานหอม มีไส้ให้เลือก 2 ชนิด คือ ไส้เผือก และไส้สังขยา ซึ่งถ้าใครชอบกินหวานแนะนำให้สั่งไส้สังขยา นอกจากนี้ยังมีขนมเบื้องอร่อยๆ ฝีมือภรรยาคุณลุงให้สั่งชิมเพิ่มอีกด้วย แอบกระซิบนิดนึงว่า ขนมโตเกียวเจ้านี้ เจ้าของร้านเฮี๊ยบ ถ้าใครสั่งหลายกล่องจะไม่ขาย จะขายให้แค่คนละกล่องหรือสองกล่องเท่านั้น ลุงบอกว่าต้องแบ่งให้ลูกค้าคนอื่นๆ ได้ชิมบ้าง                                                                ', ' ตามไปชิมขนมโตเกียว ตลาดโต้รุ่งท่าเจ้าฟ้า\r\nที่ตั้ง: ตลาดโต้รุ่งท่าเจ้าฟ้า อำเภอเมืองกระบี่ จังหวัดกระบี่\r\nเปิดปิดเวลา : 17.30-22.00 น.\r\n                                                               ', '', 'p00004_0.jpg', '', '', '');
INSERT INTO `tblstatus` VALUES ('1', 'จอง');
INSERT INTO `tblstatus` VALUES ('2', 'ชำระเงินเรียบร้อย');
INSERT INTO `tbltitle` VALUES ('1', 'นาย', 'นาย');
INSERT INTO `tbltitle` VALUES ('2', 'นาง', 'นาง');
INSERT INTO `tbltitle` VALUES ('3', 'นางสาว', 'น.ส.');
INSERT INTO `tbltype` VALUES ('01', 'เกียร์ธรรมดา');
INSERT INTO `tbltype` VALUES ('02', 'เกียร์อัตโนมัติ');
INSERT INTO `tbluser` VALUES ('admin', '1234', '00', 'ผู้ดูแลระบบ');
INSERT INTO `tbluser` VALUES ('smile', '1234', '01', 'สมาย คลับ');
INSERT INTO `tbluser` VALUES ('aecrent', '1234', '01', 'เออีซีเรนท์123');
INSERT INTO `tbluser` VALUES ('วารุณี ', 'ๅ/-ภถ', '01', 'วารุณี  แซ่อุ่ย');
INSERT INTO `tbluser` VALUES ('aon', '0612301031', '01', 'วารุณี  แซ่อุ่ย');
INSERT INTO `tbluser` VALUES ('bank', '0612301025', '01', 'ปนัดดา ศิริบุญ');
INSERT INTO `tblyeehor` VALUES ('01', 'YAMAHA', null, null);
INSERT INTO `tblyeehor` VALUES ('02', 'HONDA', null, null);
INSERT INTO `tblyeehor` VALUES ('04', 'KAWASAKI', '', null);
INSERT INTO `tblyeehor` VALUES ('03', 'SUZUKI', '', null);
