DROP DATABASE IF EXISTS ikamych1;
CREATE DATABASE IF NOT EXISTS `ikamych1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ikamych1`;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_type;
DROP TABLE IF EXISTS invoice_actual;
DROP TABLE IF EXISTS invoice_estimate;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS blacklist_ip;
DROP TABLE IF EXISTS failed_logins;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS category_1;
DROP TABLE IF EXISTS category_2;
# DROP TABLE IF EXISTS links;
# DROP TABLE IF EXISTS links_category;


DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` VARCHAR(50) NOT NULL UNIQUE,
  comment VARCHAR(50),
  INDEX (user_type),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO user_type(id, user_type) VALUES
  (1,'admin'),
  (2,'manager'),
  (3,'secretary'),
  (4,'employee');




DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11)  UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `hashed_password` VARCHAR(60) NOT NULL,
  `nom` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) DEFAULT NULL,
  `user_type` VARCHAR(60) DEFAULT NULL,
  `user_type_id` INT(11) NOT NULL,
  `first_name` VARCHAR(30) DEFAULT NULL,
  `last_name` VARCHAR(30) DEFAULT NULL,
  `reset_token` VARCHAR(70) DEFAULT NULL,
  `block_user` TINYINT(1) DEFAULT 0,
  `address` VARCHAR(100) DEFAULT NULL,
  `cp` VARCHAR(20) DEFAULT NULL,
  `city` VARCHAR(20) DEFAULT NULL,
  `country` VARCHAR(60) DEFAULT NULL,
  `phone` VARCHAR(60) DEFAULT NULL,
  `mobile` VARCHAR(60) DEFAULT NULL,
  `img` longblob,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
--
-- Dumping data for table `users`
--
#   FOREIGN KEY (`user_type_id`) REFERENCES user_type(`id`)


INSERT INTO ikamych1.users (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, reset_token, block_user, address, cp, city, country, phone, mobile, img, input_date) VALUES (1, 'admin', '$2y$10$YzYyN2U3MjBkNGQ4MTliOOYg0RfXSbg5pFOVsO1vOeEFamBhPdnYS', 'admin', 'webmaster@ikamy.ch', 'admin', 1, null, null, null, 0, null, null, null, null, null, null, null, '2015-09-18 01:10:25');
INSERT INTO ikamych1.users (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, reset_token, block_user, address, cp, city, country, phone, mobile, img, input_date) VALUES (2, 'kamy', '$2y$10$MmRhNmFlMTM0NWUxYTIwO.4NPDJDjfnCMoNb8wrye.WLXx6lX05s2', 'Kamran NAFISSPOUR', 'nafisspour@bluewin.ch', '', 1, 'Kamran', 'Nafisspour', 'cee139189723d5245d1d5c10c0445305', 0, '', '', '', '', '', '', null, '2015-09-18 01:10:25');
INSERT INTO ikamych1.users (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, reset_token, block_user, address, cp, city, country, phone, mobile, img, input_date) VALUES (4, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch', 'employee', 4, null, null, null, 0, null, null, null, null, null, null, null, '2015-09-18 01:10:25');
INSERT INTO ikamych1.users (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, reset_token, block_user, address, cp, city, country, phone, mobile, img, input_date) VALUES (5, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com', 'manager', 2, null, null, null, 0, null, null, null, null, null, null, null, '2015-09-18 01:10:25');
INSERT INTO ikamych1.users (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, reset_token, block_user, address, cp, city, country, phone, mobile, img, input_date) VALUES (7, 'gmail', '$2y$10$MWU4N2E5MDcwNDRjYjM1Mu2URCsGI9fUp9JCdmPZCX1cYOlmzeu5O', 'Kamy employee', 'kamran.nafisspour@gmail.com', 'employee', 4, null, null, null, 0, null, null, null, null, null, null, null, '2015-09-18 01:10:25');









DROP TABLE IF EXISTS clients;
CREATE TABLE clients (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  pseudo VARCHAR(50) NOT NULL UNIQUE,
  restricted_list tinyint(1) NOT NULL DEFAULT 0 ,
  company_name VARCHAR(50) DEFAULT '' ,
  web_view VARCHAR(50) DEFAULT '' ,
  last_name VARCHAR(50) ,
  first_name VARCHAR(50) ,
  email VARCHAR(50) DEFAULT '',
  website text ,
  address VARCHAR(50) DEFAULT '',
  cp VARCHAR(50) DEFAULT '' ,
  city VARCHAR(50) DEFAULT '' ,
  country VARCHAR(50) DEFAULT '' ,
  phone VARCHAR(50) DEFAULT '' ,
  mobile VARCHAR(50) DEFAULT '' ,
  comment text ,
  liste_rank int(11),
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`),
  INDEX (pseudo)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#    ALTER TABLE links ADD category_id INT(11) AFTER description;
#    ALTER TABLE clients CHANGE liste_restrictive restricted_list TINYINT(1);
#   ALTER TABLE clients DROP COLUMN input_date;

INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (4, 'COLLINE', 1, '', 'COLLINE', 'COLLINE', '', null, null, null, null, 'Gen�ve', 'Suisse', null, null, null, 1, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (5, 'AUTRES', 1, '', 'AUTRES', 'AUTRES', '', null, null, null, null, 'Gen�ve', 'Suisse', null, null, null, 1, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (6, 'Tour_Patient', 1, '', 'Tour Patient', 'comptabilit�', 'Service', null, null, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', null, null, null, 2, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (7, 'Tour_Sang', 0, '', 'Tour Sang', 'comptabilit�', 'Service', null, null, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', null, null, null, 3, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (8, 'Carouge_Sang', 0, '', 'Carouge Sang', 'comptabilit�', 'Service', null, null, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', null, null, null, 4, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (33, 'BENOIST_FILLE', 0, '', 'BENOIST St�phanie', 'BENOIST', 'St�phanie', null, null, 'C�hemin du Velours 20', '1231', 'Conches', 'Suisse', null, null, null, 200, '2015-09-25 11:49:22');
INSERT INTO ikamych1.clients (id, pseudo, restricted_list, company_name, web_view, last_name, first_name, email, website, address, cp, city, country, phone, mobile, comment, liste_rank, input_date) VALUES (34, 'BERNASCONI', 0, '', 'BERNASCONI Alexandre', 'BERNASCONI', 'Alexandre', null, null, 'Chemin des Cr�ts-de-Pregny 7A', '1218', 'le Grand-Saconnex', 'Suisse', null, null, null, 200, '2015-09-25 11:49:22');


DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  project_code VARCHAR(10) UNIQUE NOT NULL ,
  project_name VARCHAR(50),
  client_id INT(11) NOT NULL,
  pseudo VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL ,
  end_date DATE DEFAULT NULL ,
  closed TINYINT(1)DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX (project_code),
  currency_iso VARCHAR(3)DEFAULT 'CHF',
  comment text,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  INDEX (project_code,client_id),
  FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS category_1;
CREATE TABLE category_1 (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  category_1 VARCHAR(40) UNIQUE NOT NULL ,
  comment text,
  INDEX (category_1),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS category_2;
CREATE TABLE category_2 (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  category_2 VARCHAR(40)UNIQUE NOT NULL ,
  comment text,
  INDEX (category_2),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS category;
CREATE TABLE category (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  category VARCHAR(90) NOT NULL UNIQUE ,
  category_1_id INT(11) NOT NULL ,
  category_1 VARCHAR(40),
  category_2_id INT(11) NOT NULL ,
  category_2 VARCHAR(40),
  unit_price DECIMAL(10,2) DEFAULT 0,
  comment text,
  INDEX (category),
  PRIMARY KEY (category,category_1_id,category_2),
  FOREIGN KEY (`category_1_id`) REFERENCES category_1(`id`),
  FOREIGN KEY (`category_2_id`) REFERENCES category_2(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS invoice_actual;
CREATE TABLE invoice_actual (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  project_id INT(11) NOT NULL,
  project_code VARCHAR(10)DEFAULT '',
  start_date DATE NOT NULL ,
  end_date DATE DEFAULT NULL ,
  quantity INT(11)NOT NULL ,
  category_id INT(11) NOT NULL ,
  category VARCHAR(40),
  ref_upload VARCHAR(70),
  invoice_id INT(11) DEFAULT NULL ,
  invoiced TINYINT(1) DEFAULT 0,
  comment text,
  PRIMARY KEY (`id`),
  INDEX (project_id,category_id),
  FOREIGN KEY (`project_id`) REFERENCES projects(`id`),
  FOREIGN KEY (`category_id`) REFERENCES category(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS invoice_estimate;
CREATE TABLE invoice_estimate (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  estimate_no INT(11),
  project_id INT(11) NOT NULL,
  project_code VARCHAR(10)DEFAULT '',
  start_date DATE NOT NULL ,
  end_date DATE DEFAULT NULL ,
  quantity INT(11)NOT NULL ,
  category_id INT(11) NOT NULL ,
  category VARCHAR(40),
  invoice_id INT(11) NOT NULL ,
  invoiced TINYINT(1) DEFAULT 0,
  ref_upload VARCHAR(70),
  comment text,
  INDEX (project_id,category_id),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`project_id`) REFERENCES projects(`id`),
  FOREIGN KEY (`category_id`) REFERENCES category(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS failed_logins;
CREATE TABLE failed_logins (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(50) NOT NULL UNIQUE ,
  `login_attempt` int(11) NOT NULL,
  `last_time`int(11) NOT NULL,
  `ip` VARCHAR(50),
  `host` VARCHAR(80),
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`),
  INDEX (username)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS blacklist_ip;
CREATE TABLE blacklist_ip (
  id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
  ip VARCHAR(50) UNIQUE NOT NULL ,
  login_failed  int(11) NOT NULL,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`),
  INDEX (ip)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




# DROP TABLE IF EXISTS links_category;
# CREATE TABLE links_category (
#   id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
#   category varchar(50) NOT NULL UNIQUE ,
#   PRIMARY KEY (`id`),
#   INDEX (category)
# ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
#
# DROP TABLE IF EXISTS links;
# CREATE TABLE links (
#   id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
#   name varchar(50) NOT NULL ,
#   web_address text DEFAULT NULL,
#   description text DEFAULT NULL,
#   category_id INT(11) NOT NULL DEFAULT 1,
#   category varchar(50) NOT NULL DEFAULT 'Others',
#   sub_category_1 varchar(50) NULL ,
#   sub_category_2 varchar(50) NULL ,
#   privacy TINYINT(1) DEFAULT 0,
#   rank INT(11) DEFAULT 0,
#   username varchar(50) NOT NULL ,
#   PRIMARY KEY (`id`),
#   INDEX (name,category_id),
#   FOREIGN KEY (category_id) REFERENCES links_category(id)
# ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# ALTER TABLE links ADD category_id INT(11) AFTER description;


# DROP TABLE IF EXISTS test;
# CREATE TABLE z_test (
#   id int(11)  UNSIGNED NOT NULL AUTO_INCREMENT ,
#   invoiced ENUM('yes','no') DEFAULT 'no',
#   name varchar(50) NOT NULL ,
#   PRIMARY KEY (`id`),
#   INDEX (name)
# ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
