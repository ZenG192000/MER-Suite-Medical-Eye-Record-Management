/*
SQLyog Professional v12.4.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - mersuitedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mersuitedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mersuitedb`;

/*Table structure for table `mertbl` */

DROP TABLE IF EXISTS `mertbl`;

CREATE TABLE `mertbl` (
  `MerID` int(11) NOT NULL AUTO_INCREMENT,
  `PirID` int(11) DEFAULT NULL,
  `PatientName` text DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `SPH_OD` int(11) DEFAULT NULL,
  `SPH_OS` int(11) DEFAULT NULL,
  `CYL_OD` int(11) DEFAULT NULL,
  `CYL_OS` int(11) DEFAULT NULL,
  `AXIS_OD` text DEFAULT NULL,
  `AXIS_OS` text DEFAULT NULL,
  `ADD_OD` int(11) DEFAULT NULL,
  `ADD_OS` int(11) DEFAULT NULL,
  `PD` text DEFAULT NULL,
  `Lens` text DEFAULT NULL,
  `RecordedBy` text DEFAULT NULL,
  `Status` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `ArchiveDate` datetime DEFAULT NULL,
  `ExpirationNumber` int(11) DEFAULT 30,
  `DateCreated` datetime DEFAULT NULL,
  `DateEdited` datetime DEFAULT NULL,
  `Is_Deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`MerID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mertbl` */

insert  into `mertbl`(`MerID`,`PirID`,`PatientName`,`Date`,`SPH_OD`,`SPH_OS`,`CYL_OD`,`CYL_OS`,`AXIS_OD`,`AXIS_OS`,`ADD_OD`,`ADD_OS`,`PD`,`Lens`,`RecordedBy`,`Status`,`Comments`,`ArchiveDate`,`ExpirationNumber`,`DateCreated`,`DateEdited`,`Is_Deleted`) values 
(1,1000,'Kristina Shane Ilao Tepace','0000-00-00',-25,-4,-27,-37,'safsaf','dsafasdf',150,150,'fsafasfsa','Bifocal (regular)','Opto Sheeyn','Approved','',NULL,30,'2023-08-16 09:02:04','2023-11-04 00:00:00',0),
(2,1002,'Jude Daroya Maagad','2023-09-13',-20,-16,-34,-36,'fgdsgfs','dsgsdg',100,225,'fsafsafsa','Bifocal (multicoated)','Secretary Mayhem','Pending','','2023-10-11 14:49:18',30,'2023-08-16 09:02:04','2023-10-08 00:00:00',0),
(3,1001,'Sheena Acquin Rañon','2023-09-13',-19,-14,-31,-38,'gdgfsg','sdgsd',200,175,'gsfdgsdf','Progressive','Opto Sheeyn','Pending',NULL,NULL,30,'2023-08-16 09:02:04',NULL,0),
(4,1002,'Jude Daroya Maagad','2023-11-04',-24,-21,-31,-27,'123','342',150,100,'fsafsafsa','Single Vision','Optometrist Sheeyn Tepace','Pending','','2023-11-14 14:59:59',30,NULL,'2023-11-04 00:00:00',0),
(5,1002,'Jude Daroya Maagad','2023-12-10',-20,-22,-30,-28,'14','121',200,175,'454','Single Vision','Secretary Mayhem','Approved','',NULL,30,'2023-12-10 01:21:28','2023-12-10 01:52:06',0);

/*Table structure for table `pirtbl` */

DROP TABLE IF EXISTS `pirtbl`;

CREATE TABLE `pirtbl` (
  `PirID` int(11) NOT NULL AUTO_INCREMENT,
  `PirNo` text DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `LastName` text DEFAULT NULL,
  `FirstName` text DEFAULT NULL,
  `MiddleName` text DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` text DEFAULT NULL,
  `DateOfBirth` text DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Contact` text DEFAULT NULL,
  `RecordedBy` text DEFAULT NULL,
  `Status` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `ArchiveDate` datetime DEFAULT NULL,
  `ExpirationNumber` int(11) DEFAULT 30,
  `DateEdited` datetime DEFAULT NULL,
  `Is_Deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`PirID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pirtbl` */

insert  into `pirtbl`(`PirID`,`PirNo`,`Date`,`LastName`,`FirstName`,`MiddleName`,`Age`,`Sex`,`DateOfBirth`,`Address`,`Contact`,`RecordedBy`,`Status`,`Comments`,`DateCreated`,`ArchiveDate`,`ExpirationNumber`,`DateEdited`,`Is_Deleted`) values 
(1,'1000','2023-08-16','Tepace','Kristina Shane','Ilao',21,'Female','10/21/2001','Bagong Barrio, Pandi, Bulacan','09563103390','Optometrist Sheeyn Tepace','Pending',NULL,'2023-08-16 09:02:04',NULL,30,'2023-11-03 04:09:11',0),
(2,'1001','2023-08-16','Rañon','Sheena','Acquin',22,'Female','10/24/2000','Caypombo, Sta. Maria, Bulacan','09123456789','Opto Sheeyn','Pending',NULL,'2023-08-16 09:18:17',NULL,30,'2023-09-08 04:03:15',0),
(3,'1002','0000-00-00','Maagad Jr.','Jude','Daroya',21,'Male','08/04/2002','Mag Asawang Sapa','0918237465','Optometrist Sheeyn Tepace','Pending',NULL,'2023-09-12 05:22:52',NULL,30,'2023-12-10 02:03:29',0),
(4,'1003','2023-09-18','dmjsdkajdas','jsdhksjs','dmsdklsd',64,'Female','01/15/1959','Adaada','090866554','Optometrist Sheeyn Tepace','Pending',NULL,'2023-09-18 06:33:45','2023-10-11 14:32:19',30,'2023-10-10 10:49:29',0),
(5,'1004','2023-11-03','TEST','TEST','TEST',24,'Male','04/08/1999','TEST TEST TEST','09164646584','Optometrist Sheeyn Tepace','Pending',NULL,'2023-11-03 03:49:29','2023-11-14 14:59:50',30,NULL,0);

/*Table structure for table `usertbl` */

DROP TABLE IF EXISTS `usertbl`;

CREATE TABLE `usertbl` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text DEFAULT NULL,
  `Username` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Password` text DEFAULT NULL,
  `Image` text DEFAULT NULL,
  `AccessType` text DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateEdited` datetime DEFAULT NULL,
  `attempts` int(1) DEFAULT 0,
  `last_attempt_time` datetime DEFAULT NULL,
  `DateCpass` datetime DEFAULT NULL,
  `isFirstLogin` int(1) DEFAULT 1,
  `Theme` text DEFAULT NULL,
  `Is_Deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usertbl` */

insert  into `usertbl`(`UserID`,`Name`,`Username`,`Email`,`Password`,`Image`,`AccessType`,`DateCreated`,`DateEdited`,`attempts`,`last_attempt_time`,`DateCpass`,`isFirstLogin`,`Theme`,`Is_Deleted`) values 
(1,'Administrator Yappy','Yappy',NULL,'1836c5c3e91f2e86b8e8591bfd8842b8','default.jpg\r\n','Administrator','2023-08-02 10:58:20','2023-10-06 05:45:58',0,NULL,'2023-10-10 06:50:09',0,'dark',0),
(2,'Optometrist Sheeyn Tepace','Sheeyn','shanetepace21@gmail.com','493837704a64304bb0fe1cfeb201b214','letter-s-logo-design-for-business-and-company-identity-with-luxury-concept-free-vector.jpg','Optometrist','2023-08-16 12:28:58','2023-12-04 10:24:45',2,'2023-12-10 14:02:40','2023-10-21 08:10:22',0,'dark',0),
(3,'Optometrist Toni Fowler','ToniFowler',NULL,'f14b701d21c7559807f2d98c3064ef49','default.jpg','Optometrist','2023-08-16 02:42:17','2023-10-06 05:45:26',0,NULL,NULL,1,'light',0),
(4,'Secretary Mayhem','Mayhem',NULL,'b50868a523856f97e9d785db0ee1c9ed','default.jpg','Secretary','2023-08-31 09:31:56','2023-10-06 05:40:12',1,'2023-11-22 14:22:42','2023-10-09 05:15:22',0,'light',0),
(5,'Administrator Kwak','Kwakwak',NULL,'f14b701d21c7559807f2d98c3064ef49','default.jpg','Administrator','2023-09-10 12:25:51','2023-10-06 05:46:15',0,NULL,NULL,1,'light',0),
(6,'Administrator DADA','dasdaa',NULL,'f14b701d21c7559807f2d98c3064ef49','default.jpg','Administrator','2023-09-12 05:24:30','2023-11-14 02:09:08',3,'2023-10-10 11:17:06',NULL,1,'light',1),
(7,'Optometrist Alfie','Alfie',NULL,'f14b701d21c7559807f2d98c3064ef49','default.jpg','Optometrist','2023-09-28 06:23:57','2023-10-06 05:46:28',0,NULL,NULL,1,'light',0),
(8,'Administrator Tester Ako','Tester',NULL,'f14b701d21c7559807f2d98c3064ef49','default.jpg','Administrator','2023-11-03 02:03:35',NULL,0,NULL,NULL,1,'light',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
