/*
SQLyog Community v8.6 Beta2
MySQL - 5.1.41 : Database - diskon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`diskon` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `diskon`;

/*Table structure for table `tb_categories` */

DROP TABLE IF EXISTS `tb_categories`;

CREATE TABLE `tb_categories` (
  `categories_id` int(10) NOT NULL AUTO_INCREMENT,
  `resto_id` int(10) DEFAULT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `category_desc` text,
  `category_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_categories` */

insert  into `tb_categories`(`categories_id`,`resto_id`,`category_name`,`category_desc`,`category_type`) values (2,15001,'Sample','Sample of Category',2);

/*Table structure for table `tb_content` */

DROP TABLE IF EXISTS `tb_content`;

CREATE TABLE `tb_content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `categories_id` int(10) DEFAULT NULL,
  `content_title` varchar(150) DEFAULT NULL,
  `content_desc` text,
  `content_var1` varchar(150) DEFAULT NULL,
  `content_img` varchar(150) DEFAULT NULL,
  `content_thumb` varchar(150) DEFAULT NULL,
  `content_post` datetime DEFAULT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_content` */

insert  into `tb_content`(`content_id`,`categories_id`,`content_title`,`content_desc`,`content_var1`,`content_img`,`content_thumb`,`content_post`) values (1,2,'Greeting','<div class=\"cc\">\r\n<h2>Greeting - Menyapa</h2>\r\n<p>Dalam komik, Lena menggunakan kata Hi untuk menyapa. Kalimat sapaan dalam bahasa Inggris disebut greeting expression. Selain Hi, ada beberapa cara lain untuk menyapa baik dalam situasi formal ataupun informal.</p>\r\n\r\n<h3>Formal</h3>\r\n<table class=\"table\">\r\n<tr>\r\n<th>Ungkapan Formal</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td><strong>Good morning.</strong><br />\r\n(diucapkan antara pukul 00.01-12.00)\r\n</td>\r\n<td>Good morning</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Good afternoon.</strong><br />\r\n(diucapkan antara pukul 12.02-18.00)\r\n</td>\r\n<td>Good afternoon.</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Good evening.<br /></strong>\r\n(diucapkan antara pukul 18.01-20.00)\r\n</td>\r\n<td>Good evening.</td>\r\n</tr>\r\n<tr>\r\n<td><strong>How are you?</strong><br />\r\n(diucapkan ketika pertama kali bertemu)\r\n</td>\r\n<td>I\'m fine, thanks. And you?</td>\r\n</tr>\r\n<tr>\r\n<td><strong>How have you been?</strong><br />\r\n(diucapkan ketika sudah pernah bertemu sebelumnya)\r\n</td>\r\n<td>I\'m very well. Thank you. How about you?</td>\r\n</tr>\r\n</table>\r\n\r\n<h3>Informal</h3>\r\n<table class=\"table\">\r\n<tr>\r\n<th>Informal</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td>Hi!<br />Hello!</td>\r\n<td>Hi!<br />Hello!</td>\r\n</tr>\r\n<tr>\r\n<td>How is it going?<br /> \r\nHow are you doing?\r\n</td>\r\n<td>It\'s going well.<br />\r\nI\'m doing just fine.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>What\'s up?<br /> \r\nWhat\'s going on?\r\n</td>\r\n<td>Nothing much.<br />\r\nJust the usual.<br />\r\nNothing too exciting lately.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>How\'s your day?<br />\r\nHow\'s life?<br />\r\nHow\'s everything?<br />\r\n</td>\r\n<td>Great.<br />\r\nNot bad.<br />\r\nPretty good.<br />\r\nSo-so.<br />\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Long time no see.<br />\r\nIt\'s been a while.<br />\r\n</td>\r\n<td>Yes. It\'s been a long time.<br />\r\nYes. It\'s been a while.\r\n</td>\r\n</tr>\r\n</table>\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(1);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Menyapa','@drawable/ls1',NULL,NULL),(2,2,'Self Introduction','<div class=\"cc\">\r\n<h2>Self Introduction - Memperkenalkan Diri</h2>\r\n<p>Untuk memperkenalkan diri sendiri, kita bisa mengucapkan:\r\n<ul>\r\n<li>I\'d like to introduce myself. My name is Amy.</li>\r\n<li>Let me introduce myself. My name is Amy.</li>\r\n<li>Pleased to meet you, I am Amy.</li>\r\n<li>Nice to meet you, I am Amy.</li> \r\n<li>My name is Amy.</li>\r\n<li>I am Amy.</li>\r\n</ul>\r\n</p>\r\n<p>Setelah saling menyebutkan nama, kedua orang tersebut bisa saling mengucapkan:<br />\r\n\"Nice to meet you.\" atau \"How do you do?\"</p>\r\n\r\n<table class=\"table\">\r\n<tr>\r\n<th></th>\r\n<th>Pertanyaan</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td><strong>Name</strong></td>\r\n<td>What is your name?</td>\r\n<td>My name is Donna.<br />\r\nI am Donna.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Place of Origin</strong></td>\r\n<td>Where do you come from?<br />\r\nWhere are you from?\r\n</td>\r\n<td>I come from Washington.<br />\r\nI am from Washington.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Address</strong></td>\r\n<td>Where do you live?</td>\r\n<td>I live in Jogjakarta.</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Hobby/Interests</strong></td>\r\n<td>What is your hobby?</td>\r\n<td>My hobby is traveling.<br />\r\nI like traveling.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Occupation</strong></td>\r\n<td>What do you do?</td>\r\n<td>I work at ABC company.<br />\r\nI am a businessman.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Date of Birth</strong></td>\r\n<td>When were you born?</td>\r\n<td>I was born on March 31, 1987.</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Age</strong></td>\r\n<td>How old are you?</td>\r\n<td>I am 21 years old.</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Favorite Drink</strong></td>\r\n<td>What is your favorite drink?</td>\r\n<td>My favorite drink is lemon tea.<br />\r\nI like lemon tea.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Favorite Food</strong></td>\r\n<td>What is your favorite food?</td>\r\n<td>My favorite food is hamburger.<br />\r\nI like hamburger.\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Contact Information</strong></td>\r\n<td>May I have your phone number?</td>\r\n<td>Sure, my phone number is 657-4305.</td>\r\n</tr>\r\n</table>\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(2);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Memperkenalkan Diri','@drawable/ls2',NULL,NULL),(3,2,'Introducing Others','<div class=\"cc\">\r\n<h2>Introducing Others - Memperkenalkan Orang Lain</h2>\r\n\r\n<p>Berikut ini ungkapan-ungkapan lain yang digunakan untuk memperkenalkan seseorang.\r\n<ul>\r\n<li>Let me introduce you to my sister, Mila.</li> \r\n<li>I\'d like to introduce you to my sister, Mila.</li>\r\n<li>I\'d like you to meet my sister, Mila.</li>\r\n<li>Don, have you met my sister, Mila?</li> \r\n<li>Don, please meet Mila, my sister.</li>\r\n<li>Don, this is Mila. Mila, this is Tom.</li>\r\n</ul>\r\n</p>\r\n\r\n<p>Setelah itu, dua pihak yang saling dikenalkan biasanya berjabat tangan dan saling mengucapkan ungkapan berikut:</p>\r\n\r\n<table class=\"table\">\r\n<tr>\r\n<td>How do you do?</td>\r\n<td>dibalas dengan</td>\r\n<td>How do you do?</td>\r\n</tr>\r\n<tr>\r\n<td>Nice to meet you.</td>\r\n<td>dibalas dengan</td>\r\n<td>Nice to meet you, too.</td>\r\n</tr>\r\n<tr>\r\n<td>Nice to see you.</td>\r\n<td>dibalas dengan</td>\r\n<td>Nice to see you, too.</td>\r\n</tr>\r\n<tr>\r\n<td>Pleased to meet you.</td>\r\n<td>dibalas dengan</td>\r\n<td>Pleased to meet you, too.</td>\r\n</tr>\r\n</table>\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(3);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Memperkenalkan Orang Lain','@drawable/ls3',NULL,NULL),(4,2,'Asking and Giving Phone Number','<div class=\"cc\">\r\n<h2>Asking and Giving Phone Number - Meminta dan Memberi No Telp</h2>\r\n\r\n<p>Kalimat yang dapat digunakan untuk meminta nomor telepon adalah <em>\"May I have your phone number?\"</em> \r\nLalu kita bisa menjawab  dengan menyebutkan nomornya, misalnya.\r\n<em>\"Sure, It\'s five-five-five-four-nine-three-one-six-two-eight-seven (555-49316287).\"</em></p>\r\n\r\n<p>Berikut ini cara membaca angka:</p>\r\n<table class=\"table\">\r\n<tr>\r\n<td>0</td><td>zero</td>\r\n</tr>\r\n<tr>\r\n<td>1</td><td>one</td>\r\n</tr>\r\n<tr>\r\n<td>2</td><td>two</td>\r\n</tr>\r\n<tr>\r\n<td>3</td><td>three</td>\r\n</tr>\r\n<tr>\r\n<td>4</td><td>four</td>\r\n</tr>\r\n<tr>\r\n<td>5</td><td>five</td>\r\n</tr>\r\n<tr>\r\n<td>6</td><td>six</td>\r\n</tr>\r\n<tr>\r\n<td>7</td><td>seven</td>\r\n</tr>\r\n<tr>\r\n<td>8</td><td>eight</td>\r\n</tr>\r\n<tr>\r\n<td>9</td><td>nine</td>\r\n</tr>\r\n</table>\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(4);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Meminta dan Memberi Nomer Telpon','@drawable/ls4',NULL,NULL),(5,2,'Parting Expression','<div class=\"cc\">\r\n<h2>Parting Expression – Salam Perpisahan</h2>\r\n<p>Berikut ini ada beberapa ungkapan lain yang dapat digunakan ketika berpisah.</p>\r\n<h3>Situasi Formal</h3>\r\n<table class=\"table\">\r\n<tr>\r\n<th>Ungkapan Formal</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td>It was nice talking to you.</td>\r\n<td>Nice to talk to you, too.</td>\r\n</tr>\r\n<tr>\r\n<td>I enjoyed seeing you.</td>\r\n<td>Me, too.</td>\r\n</tr>\r\n<tr>\r\n<td>I\'m sorry. I have to go. </td>\r\n<td>See you, later.</td>\r\n</tr>\r\n<tr>\r\n<td>Have a nice day.</td>\r\n<td>You, too.</td>\r\n</tr>\r\n<tr>\r\n<td>Good night.</td>\r\n<td>Good night.</td>\r\n</tr>\r\n</table>\r\n\r\n<h3>Situasi Tidak Formal</h3>\r\n<table class=\"table\">\r\n<tr>\r\n<th>Tidak Formal</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td>Talk to you later.</td>\r\n<td>Sure, see you later.</td>\r\n</tr>\r\n<tr>\r\n<td>It\'s nice to see you.</td>\r\n<td>Nice to see you, too.</td>\r\n</tr>\r\n<tr>\r\n<td>Good bye.</td>\r\n<td>Bye.</td>\r\n</tr>\r\n<tr>\r\n<td>Take care.</td>\r\n<td>You, too.</td>\r\n</tr>\r\n<tr>\r\n<td>See you again.</td>\r\n<td>See you.</td>\r\n</tr>\r\n</table>\r\n\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(5);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Salam Perpisahan','@drawable/ls5',NULL,NULL),(6,2,'Thanking','<div class=\"cc\">\r\n<h2>Thanking – Berterima Kasih</h2>\r\n<p>Kali ini kita akan belajar tentang kata ajaib \"Thanks\" atau terima kasih.</p> \r\n<p>Mengapa ajaib? Karena jika diucapkan, kata tersebut dapat membahagiakan kita atau orang lain.<br />\r\nThanking expression atau ungkapan terima kasih umum sekali digunakan dalam percakapan. Bahkan ketika menolak sesuatu, kita mengatakan “No, thanks” untuk membuat pernyataan tersebut lebih sopan.</p>\r\n<p>Selain \"Thanks\" ada beberapa ungkapan lain untuk berterima kasih, yaitu:</p>\r\n\r\n<table class=\"table\">\r\n<tr>\r\n<th>Ungkapan</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td>\r\n<ul>\r\n<li>I appreciate your kindness/your help.</li>\r\n<li>I would like to thank you.</li>\r\n<li>I am grateful for your help.</li>\r\n<li>I can\'t thank you enough.</li>\r\n<li>Many thanks.</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<ul>\r\n<li>You\'re welcome.</li>\r\n<li>Don\'t mention it.</li>\r\n<li>Not at all.</li>\r\n<li>My pleasure.</li>\r\n<li>That\'s okay.</li>\r\n<li>Anytime.</li>\r\n</ul>\r\n</td>\r\n</table>\r\n\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(6);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Berterima Kasih','@drawable/ls6',NULL,NULL),(7,2,'Apologizing','<div class=\"cc\">\r\n<h2>Apologizing - Meminta Maaf</h2>\r\n<p>Selain ungkapan tersebut, masih ada beberapa ungkapan yang dapat digunakan untuk meminta maaf. Antara lain:</p>\r\n<table class=\"table\">\r\n<tr>\r\n<th>Ungkapan</th>\r\n<th>Respons</th>\r\n</tr>\r\n<tr>\r\n<td>\r\n<ul>\r\n<li>Please accept my apologies. It’s my fault.</li>\r\n<li>I\'d like to apologize for this trouble.</li>\r\n<li>I\'m very sorry. It’s my fault.</li>\r\n<li>Please forgive me.</li>\r\n<li>I beg your pardon.</li>\r\n<li>Please, excuse me for my mistake.</li>\r\n</ul>\r\n</td>\r\n<td>\r\n<ul>\r\n<li>I quite understand.</li>\r\n<li>That\'s all right.</li>\r\n<li>Forget it.</li>\r\n<li>That\'s OK.</li>\r\n<li>Don\'t worry about it.</li>\r\n<li>It doesn\'t matter.</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</table>\r\n\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(7);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Meminta Maaf','@drawable/ls7',NULL,NULL),(8,2,'Describing Things','<div class=\"cc\">\r\n<h2>Describing Things - Mendeskripsikan Benda</h2>\r\n<p>It\'s a brown leather wallet digunakan untuk mendeskripsikan suatu benda. \r\nWhat does it look like? Digunakan untuk menanyakan benda tersebut seperti apa.\r\n</p>\r\n<p>Untuk mendeskripsikan suatu benda, kita bisa menggunakan adjectives atau kata sifat.</p>\r\n\r\n<table class=\"table\">\r\n<tr>\r\n<td><strong>Opinion – Pendapat</strong><br />nice, delicious, cool, expensive, lovely</td>\r\n<td><strong>Color - Warna</strong><br />yellow, brown, purple, reddish, pinkish</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Size – Ukuran</strong><br />big, small, huge, tall, tiny</td>\r\n<td><strong>Pattern - Pola</strong><br />spotted, striped, checked, flowery, zigzag</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Shape – Bentuk</strong><br />square, round, oval, long, fat</td>\r\n<td><strong>Origin - Asal</strong><br />American, Turkish, Korean, Indonesian</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Condition – Kondisi</strong><br />clean, wet, rich, hungry, dirty</td>\r\n<td><strong>Material - Bahan</strong><br />silk, wool, plastic, wooden, synthetic</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Age – Usia</strong><br />old, young, new, antique</td>\r\n<td><strong>Purpose - Tujuan</strong><br />shopping, riding, cutting</td>\r\n</tr>\r\n</table>\r\n\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(8);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Mendeskripsikan Benda','@drawable/ls8',NULL,NULL),(9,2,'Describing People','<div class=\"cc\">\r\n<h2>Describing People - Menjelaskan Ciri Orang</h2>\r\n<p>Kita bisa mendeskripsikan seseorang secara fisik maupun sifat. Kalimat “What does she/he look like?” dapat digunakan untuk menanyakan ciri-ciri fisik seseorang. Untuk mendeskripsikannya, kita bisa menggunakan adjectives atau kata sifat berikut ini.</p>\r\n<ol type=\"a\">\r\n<li>Bentuk tubuh: stocky, slim, plump, fat, skinny, well-built</li>\r\n<li>Usia: young, elderly, middle-aged, teenager, in 20s, 30s, 40s</li>\r\n<li>Rambut: bald, straight, curly, spiky, wavy, blond</li>\r\n<li>Mata: big, round, small, slanted</li>\r\n<li>Hidung: flat, pointed</li>\r\n<li>Bentuk Wajah: round, oval, square</li>\r\n<li>Warna Kulit: dark, fair, tanned</li>\r\n<li>Tinggi Badan: short, tall, medium</li>\r\n<li>Pakaian: casual, shabby, tidy, messy, formal</li>\r\n<li>Keseluruhan: beautiful, handsome, good-looking, ugly</li>\r\n</ol>\r\n\r\n<script type=\"text/javascript\">\r\nfunction moveToScreenTwo() {\r\nAndroid.moveToNextScreen(9);\r\n}\r\n</script>\r\n<div>\r\n<a class=\"btn btn-large btn-success\" onclick=\"moveToScreenTwo()\">Latihan</a>\r\n</div>\r\n</div>','Menjelaskan Ciri Orang','@drawable/ls9',NULL,NULL);

/*Table structure for table `tb_feedback` */

DROP TABLE IF EXISTS `tb_feedback`;

CREATE TABLE `tb_feedback` (
  `feedback_id` int(10) NOT NULL AUTO_INCREMENT,
  `resto_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `comment` text,
  `postdate` datetime DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_feedback` */

/*Table structure for table `tb_resto` */

DROP TABLE IF EXISTS `tb_resto`;

CREATE TABLE `tb_resto` (
  `resto_id` int(10) NOT NULL AUTO_INCREMENT,
  `resto_name` varchar(150) NOT NULL,
  `resto_email` varchar(100) NOT NULL,
  `resto_password` varchar(50) NOT NULL,
  `last_log` datetime DEFAULT NULL,
  `resto_status` int(1) NOT NULL DEFAULT '1',
  `valid` datetime DEFAULT NULL,
  `resto_version` int(5) NOT NULL DEFAULT '1',
  `resto_desc` text,
  `resto_address` varchar(150) DEFAULT NULL,
  `resto_lat` double DEFAULT NULL,
  `resto_lon` double DEFAULT NULL,
  `resto_phone` varchar(50) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`resto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15003 DEFAULT CHARSET=latin1;

/*Data for the table `tb_resto` */

insert  into `tb_resto`(`resto_id`,`resto_name`,`resto_email`,`resto_password`,`last_log`,`resto_status`,`valid`,`resto_version`,`resto_desc`,`resto_address`,`resto_lat`,`resto_lon`,`resto_phone`,`reg_date`) values (15001,'My Resto','arif.laksito@gmail.com','e10adc3949ba59abbe56e057f20f883e','2015-10-10 05:39:30',1,'2015-12-10 00:00:00',3,'My Resto','Ave Street, SF',NULL,NULL,NULL,NULL),(15002,'App','ajeng.pratiwi@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
