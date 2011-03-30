/*
SQLyog Community- MySQL GUI v8.21 
MySQL - 5.1.41 : Database - glanworkflow
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`glanworkflow` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `glanworkflow`;

/*Table structure for table `authassignment` */

DROP TABLE IF EXISTS `authassignment`;

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authassignment` */

insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('RbacAssignmentViewer','2','',''),('registered','3','',''),('SuperAdmin','1','','');

/*Table structure for table `authitem` */

DROP TABLE IF EXISTS `authitem`;

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authitem` */

insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('create',2,'create something','',''),('RbacAdmin',2,'','',''),('RbacAssignmentEditor',1,'','',''),('RbacAssignmentViewer',0,'','',''),('RbacEditor',1,'','',''),('RbacViewer',0,'','',''),('registered',2,'Default role by Yii-conf','return !Yii::app()->user->isGuest;',''),('SuperAdmin',2,'','','');

/*Table structure for table `authitemchild` */

DROP TABLE IF EXISTS `authitemchild`;

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authitemchild` */

insert  into `authitemchild`(`parent`,`child`) values ('SuperAdmin','RbacAdmin'),('RbacAdmin','RbacAssignmentEditor'),('RbacAssignmentEditor','RbacAssignmentViewer'),('RbacAdmin','RbacEditor'),('RbacEditor','RbacViewer');

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_story` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

insert  into `comment`(`comment_id`,`user_id`,`comment`,`comment_date`,`comment_story`) values (1,1,'asdf','2011-03-29 11:53:52',2),(2,1,'test add comment','2011-03-29 11:55:47',2),(3,1,'ádf','2011-03-29 11:57:08',2),(4,1,'sdt','2011-03-29 11:59:34',2),(5,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ','2011-03-29 12:02:57',2),(6,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ','2011-03-29 12:03:06',2),(7,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ','2011-03-29 12:03:16',2),(8,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ','2011-03-29 12:03:23',2),(9,2,'test comment','2011-03-29 12:16:54',1),(10,2,'User Demo test add comment function.','2011-03-29 12:17:48',2),(11,1,'adsf asdf ','2011-03-29 14:42:36',2),(12,1,'sdsg','2011-03-29 14:42:51',2),(13,1,'test ','2011-03-29 14:43:26',2),(14,1,'abc','2011-03-29 14:43:46',2),(15,1,'Documentation Overview\r\n\r\n    New Page\r\n    Edit Page\r\n    Page History\r\n\r\nBasic plugin information\r\n\r\n    Demo page (and Demo implementation information).\r\n    How to Setup the plugin on your website.\r\n    List of all available Options for this plugin (API listing).\r\n    Style Guide with explanations for the provided CSS code.\r\n    Performance Optimizations to speed up page load times.\r\n    List of Known Issues.\r\n    Frequently Asked Questions (FAQ)\r\n','2011-03-30 08:47:06',2);

/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `mime_type` varchar(45) NOT NULL,
  `size` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `file` */

insert  into `file`(`file_id`,`name`,`mime_type`,`size`,`story_id`) values (1,'1301459037','image/jpeg',105542,4);

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profiles` */

insert  into `profiles`(`user_id`,`lastname`,`firstname`,`birthday`) values (1,'Admin','Administrator','0000-00-00'),(2,'Demo','Demo','0000-00-00'),(3,'nguyen','van','2011-03-10');

/*Table structure for table `profiles_fields` */

DROP TABLE IF EXISTS `profiles_fields`;

CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `profiles_fields` */

insert  into `profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),(2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),(3,'birthday','Birthday','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2);

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_owner` int(11) DEFAULT NULL,
  `project_name` varchar(128) NOT NULL,
  `project_description` varchar(1000) DEFAULT NULL,
  `project_status` tinyint(1) NOT NULL COMMENT '0: Started, 1: Pending, 3: Resleased\n',
  `date_start` int(11) DEFAULT '0',
  `end` int(11) DEFAULT '0',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`project_id`,`project_owner`,`project_name`,`project_description`,`project_status`,`date_start`,`end`) values (4,1,'Glandore  Systems Workflow.','Project management',0,1300899600,1303488000),(5,2,'project 2','test select sprint of project (ajax)',0,1300899600,1302710400);

/*Table structure for table `project_user` */

DROP TABLE IF EXISTS `project_user`;

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `project_user` */

insert  into `project_user`(`id`,`project_id`,`user_id`) values (16,4,1),(17,4,2),(18,5,3);

/*Table structure for table `projectuserrole` */

DROP TABLE IF EXISTS `projectuserrole`;

CREATE TABLE `projectuserrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `projectuserrole` */

insert  into `projectuserrole`(`id`,`project_id`,`user_id`,`role`) values (9,4,1,'admin'),(10,4,2,'admin');

/*Table structure for table `sprint` */

DROP TABLE IF EXISTS `sprint`;

CREATE TABLE `sprint` (
  `sprint_id` int(11) NOT NULL AUTO_INCREMENT,
  `sprint_name` varchar(45) NOT NULL,
  `sprint_description` varchar(1000) DEFAULT NULL,
  `sprint_project` int(11) NOT NULL,
  `sprint_status` int(11) NOT NULL COMMENT 'Done/In progress',
  PRIMARY KEY (`sprint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `sprint` */

insert  into `sprint`(`sprint_id`,`sprint_name`,`sprint_description`,`sprint_project`,`sprint_status`) values (1,'sprint1','',4,1),(2,'Sprint 2','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n',5,0),(3,'print 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ',4,0),(4,'sprint test','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ',4,0);

/*Table structure for table `story` */

DROP TABLE IF EXISTS `story`;

CREATE TABLE `story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `story_code` varchar(45) NOT NULL,
  `story_description` varchar(1000) DEFAULT NULL,
  `story_project` int(11) NOT NULL,
  `story_sprint` int(11) DEFAULT NULL,
  `story_priority` int(11) NOT NULL COMMENT '0: Must have, ',
  `story_point` int(11) NOT NULL,
  `story_status` varchar(45) NOT NULL COMMENT '0: Started, 1: Pending, 2: Done\n',
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `story` */

insert  into `story`(`story_id`,`story_code`,`story_description`,`story_project`,`story_sprint`,`story_priority`,`story_point`,`story_status`) values (1,'Design database','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase',4,1,0,12,'0'),(2,'New story','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',4,1,0,1,'0'),(3,'test','',4,1,1,4,'0');

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_code` varchar(45) NOT NULL,
  `task_user` int(11) DEFAULT NULL,
  `story_id` int(11) NOT NULL,
  `task_hours` int(11) NOT NULL,
  `task_description` varchar(1000) NOT NULL,
  `task_status` int(11) NOT NULL COMMENT '0: To do, 1: In Progress, 2: Tobe verify, 3: Done',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `task` */

insert  into `task`(`task_id`,`task_code`,`task_user`,`story_id`,`task_hours`,`task_description`,`task_status`) values (1,'task 1',3,3,10,'Nullam interdum bibendum mollis. Maecenas suscipit turpis id nulla imperdiet aliquam gravida est auctor. Donec id enim lorem. Praesent et justo vitae dolor congue dictum. Etiam a augue sapien, nec iaculis urna. Phasellus sed justo tellus, in consequat orci. Donec semper aliquet arcu at consectetur. Cras a dui elit. Pellentesque dignissim, velit quis mollis ornare, neque lacus elementum eros, nec interdum dolor lectus vitae nisl. Vestibulum posuere convallis libero, sed venenatis lectus mattis a. Etiam scelerisque tempor metus, a pretium orci consectetur nec. Curabitur ultricies, orci eu vestibulum ornare, massa diam sollicitudin mi, vitae rutrum turpis justo eu nisl. Ut accumsan vestibulum sem. Integer vitae nulla massa. Duis at elit non quam interdum imperdiet. Nulla ut tortor odio. Sed eget sapien in dolor tincidunt suscipit in ac massa. Nullam posuere auctor feugiat. Nam placerat diam quis neque porta aliquam. ',0),(2,'task 2 1',2,1,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui lorem, hendrerit vitae viverra ut, pharetra in urna. Duis in lorem et lectus viverra suscipit. Aliquam a enim id neque rutrum facilisis. Curabitur a mi sagittis felis semper congue. Curabitur molestie, risus id bibendum malesuada, ligula sapien gravida nunc, at tempus metus erat tempus elit. In hac habitasse platea dictumst. Suspendisse semper vulputate dui eu volutpat. Suspendisse potenti. Donec luctus, dui quis egestas auctor, lacus lectus luctus nulla, vehicula cursus turpis ante id risus. Phasellus suscipit egestas augue, quis vulputate libero facilisis et. Pellentesque lacus lectus, vulputate eu faucibus facilisis, egestas quis arcu. Vivamus nec felis eget magna volutpat elementum. Cras ante magna, congue et aliquam et, aliquet sed quam. Ut porttitor dapibus lectus sed pulvinar. Integer luctus nulla quis elit faucibus consectetur. Curabitur tellus ligula, lobortis nec viverra sit amet, consequat vitae velit. ',2);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1301372298,1,1),(2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,1301372268,0,1),(3,'vansunny12','e10adc3949ba59abbe56e057f20f883e','vannguyen@kinsale.vn','1d4639db4642b782f5992a5f963c2b0f',1301215948,1301215948,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
