DROP VIEW IF EXISTS modele_pivot;
DROP VIEW IF EXISTS modele;
DROP VIEW IF EXISTS modele_pivot_visible_no;
DROP VIEW IF EXISTS modele_visible_no;
DROP VIEW IF EXISTS modele_pivot_visible_yes;
DROP VIEW IF EXISTS modele_visible_yes;
DROP VIEW IF EXISTS summary_by_course_date_program;
DROP TABLE IF EXISTS programmed_courses_modele;
DROP TABLE IF EXISTS programmed_courses;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS chauffeurs;
DROP TABLE IF EXISTS user_type;
DROP TABLE IF EXISTS clients;


DROP TABLE IF EXISTS clients;
CREATE TABLE clients (
  id int(11) NOT NULL AUTO_INCREMENT ,
  pseudo varchar(50) NOT NULL UNIQUE,
  liste_restrictive tinyint(1) NOT NULL DEFAULT 0 ,
  web_view varchar(50) DEFAULT NULL ,
  last_name varchar(50) ,
  first_name varchar(50) ,
  address varchar(50) DEFAULT NULL,
  cp varchar(50) DEFAULT NULL ,
  city varchar(50) DEFAULT NULL ,
  country varchar(50) DEFAULT NULL ,
  default_price decimal(10,2) DEFAULT '0.00',
  default_aller VARCHAR(70)DEFAULT NULL ,
  default_arrivee VARCHAR(70)DEFAULT NULL,
  liste_rank int(11),
  PRIMARY KEY (`id`),
  INDEX (pseudo)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




--
-- Table structure for table `courses`
--


DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  id int(11) NOT NULL AUTO_INCREMENT,
  validated tinyint(1) NOT NULL DEFAULT 0 ,
  programed tinyint(1) NOT NULL DEFAULT 0 ,
  invoiced tinyint(1) NOT NULL DEFAULT 0 ,
  invoice_id int(11)  DEFAULT NULL ,
  course_date date NOT NULL,
  client_id INT(11),
  pseudo varchar(50) NOT NULL,
  pseudo_autres varchar(50) ,
  heure varchar(5) NOT NULL,
  aller_retour VARCHAR(20) NOT NULL DEFAULT 'AllerSimple', -- to check with course form
  aller_retour1 tinyint(1) NOT NULL DEFAULT 0, -- to check with course form
  retour_booked tinyint(1) NOT NULL DEFAULT 0,
  heure_retour varchar(5) ,
  chauffeur varchar(50) ,  -- id
  depart varchar(70) NOT NULL,
  arrivee varchar(70) NOT NULL,
  type_transport varchar(50) NOT NULL,
  autres_prestations varchar(50) ,
  prix_course DECIMAL(10,2) DEFAULT 0,
  nom_patient varchar(60) ,
  bon_no varchar(60),
  remarque text,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  year YEAR,
--  month VARCHAR(11),
  username VARCHAR(50),
  user_id INT (11),
  user_fullname VARCHAR (70),
  username_validation VARCHAR(50)DEFAULT NULL ,
  date_validation DATETIME DEFAULT NULL,
  Annulation_course TINYINT(1)DEFAULT 0,
  export_course TINYINT(1)DEFAULT 0,
  PRIMARY KEY (`id`),
 FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS chauffeurs;
CREATE TABLE chauffeurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  chauffeur_name VARCHAR(70) UNIQUE DEFAULT NULL ,
  initial VARCHAR(3) UNIQUE DEFAULT NULL ,
  company VARCHAR(70),
  PRIMARY KEY (`id`),
  INDEX (chauffeur_name)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO chauffeurs (id, chauffeur_name,initial,company) VALUES
  (1,'Pablo ARZA','PAB','Transmed'),
  (2,'Luan HAZIRI','LUA','Transmed'),
  (3,'Djamila AMRANI','DJA','Transmed'),
  (4,'Pierre-Alain BONFILS','PIA','Transmed'),
  (5,'Vincent DUBOULOZ','VCT', 'Transmed'),
  (6,'Autres','AUT','Transmed'),
  (7,'Kamran NAFISSPOUR','KNA','Transmed');



--  program course
DROP TABLE IF EXISTS programmed_courses_modele;
CREATE TABLE programmed_courses_modele (
  id int(11) NOT NULL AUTO_INCREMENT,
  visible TINYINT(1) NOT NULL DEFAULT 1,
  week_day_rank TINYINT(1)NOT NULL ,
  client_habituel TINYINT(1)DEFAULT 1,
  client_id INT(11)NOT NULL ,
  heure varchar(5) NOT NULL,
  inverse_addresse TINYINT(1)NOT NULL DEFAULT 0,
  depart varchar(70)  DEFAULT NULL,
  arrivee varchar(70)  DEFAULT NULL ,
  prix_course decimal(10,2) DEFAULT '0.00',
  chauffeur VARCHAR(50)DEFAULT NULL,
  remarque text DEFAULT NULL,
  type_transport varchar(50) DEFAULT NULL ,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  username VARCHAR(70) ,
  PRIMARY KEY (`id`),
  INDEX (week_day_rank,client_id),
  FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS programmed_courses;
CREATE TABLE programmed_courses (
  id int(11) NOT NULL AUTO_INCREMENT,
 /* week_day_rank tinyint(1) NOT NULL ,*/
  validated_chauffeur tinyint(1) NOT NULL DEFAULT 0,
  validated_mgr tinyint(1) NOT NULL DEFAULT 0,
  validated_final tinyint(1) NOT NULL DEFAULT 0,
  course_date date  DEFAULT NULL ,
  modele_id int(11)  ,
  client_id int(11),
  pseudo varchar(50) DEFAULT NULL,
  pseudo_autres varchar(50) DEFAULT NULL,
  heure varchar(5) NOT NULL,
  aller_retour VARCHAR(20) NOT NULL DEFAULT 'AllerSimple', -- to check with course form
  chauffeur varchar(50) DEFAULT NULL,  -- id or no
  depart varchar(70) DEFAULT NULL,
  arrivee varchar(70) DEFAULT NULL,
  type_transport varchar(50) DEFAULT NULL ,
  nom_patient varchar(60) DEFAULT NULL ,
  bon_no varchar(60) DEFAULT NULL,
  prix_course decimal(10,2) DEFAULT '0.00',
  remarque text DEFAULT NULL,
  input_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  username VARCHAR(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX (pseudo,course_date),
  FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



DROP VIEW IF EXISTS modele_pivot;
DROP VIEW IF EXISTS modele;

DROP VIEW IF EXISTS modele_pivot_visible_no;
DROP VIEW IF EXISTS modele_visible_no;

DROP VIEW IF EXISTS modele_pivot_visible_yes;
DROP VIEW IF EXISTS modele_visible_yes;


CREATE VIEW  modele AS
  SELECT CONCAT_WS('-',p.heure,c.pseudo,c.id) AS PrimaryKey,p.heure,p.week_day_rank AS jour , p.client_id, c.pseudo ,c.liste_restrictive,c.liste_rank AS client_sort, c.web_view, p.id AS modele_id, p.inverse_addresse, p.depart, p.arrivee ,p.prix_course, c.default_aller ,c.default_arrivee,c.default_price,p.remarque,p.chauffeur,p.client_habituel,

         case when week_day_rank = 1 then p.id  end as Lundi,
         case when week_day_rank = 2 then p.id  end as Mardi,
         case when week_day_rank = 3 then p.id  end as Mercredi,
         case when week_day_rank = 4 then p.id  end as Jeudi,
         case when week_day_rank = 5 then p.id  end as Vendredi,
         case when week_day_rank = 6 then p.id  end as Samedi,
         case when week_day_rank = 7 then p.id  end as Dimanche

  FROM clients AS c
    INNER JOIN
    programmed_courses_modele AS p
      ON c.id = p.client_id
  ORDER BY p.heure, jour, client_sort  ;



CREATE VIEW  modele_visible_yes AS
  SELECT CONCAT_WS('-',p.heure,c.pseudo,c.id) AS PrimaryKey,p.heure,p.week_day_rank AS jour , p.client_id, c.pseudo ,c.liste_restrictive,c.liste_rank AS client_sort, c.web_view, p.id AS modele_id, p.inverse_addresse, p.depart, p.arrivee ,p.prix_course, c.default_aller ,c.default_arrivee,c.default_price,p.remarque,p.chauffeur,p.client_habituel,

         case when week_day_rank = 1 then p.id  end as Lundi,
         case when week_day_rank = 2 then p.id  end as Mardi,
         case when week_day_rank = 3 then p.id  end as Mercredi,
         case when week_day_rank = 4 then p.id  end as Jeudi,
         case when week_day_rank = 5 then p.id  end as Vendredi,
         case when week_day_rank = 6 then p.id  end as Samedi,
         case when week_day_rank = 7 then p.id  end as Dimanche

  FROM clients AS c
    INNER JOIN
    programmed_courses_modele AS p
      ON c.id = p.client_id
    WHERE p.visible=1
  ORDER BY p.heure, jour, client_sort  ;


CREATE VIEW  modele_visible_no AS
  SELECT CONCAT_WS('-',p.heure,c.pseudo,c.id) AS PrimaryKey,p.heure,p.week_day_rank AS jour , p.client_id, c.pseudo ,c.liste_restrictive,c.liste_rank AS client_sort, c.web_view, p.id AS modele_id, p.inverse_addresse, p.depart, p.arrivee ,p.prix_course, c.default_aller ,c.default_arrivee,c.default_price,p.remarque,p.chauffeur,p.client_habituel,

         case when week_day_rank = 1 then p.id  end as Lundi,
         case when week_day_rank = 2 then p.id  end as Mardi,
         case when week_day_rank = 3 then p.id  end as Mercredi,
         case when week_day_rank = 4 then p.id  end as Jeudi,
         case when week_day_rank = 5 then p.id  end as Vendredi,
         case when week_day_rank = 6 then p.id  end as Samedi,
         case when week_day_rank = 7 then p.id  end as Dimanche

  FROM clients AS c
    INNER JOIN
    programmed_courses_modele AS p
      ON c.id = p.client_id
  WHERE visible=0
  ORDER BY p.heure, jour, client_sort;



CREATE VIEW modele_pivot AS (
  SELECT
    heure,pseudo,web_view,client_id,
    max(Lundi) as Lundi,
    max(Mardi) as Mardi,
    max(Mercredi) as Mercredi,
    max(Jeudi) as Jeudi,
    max(Vendredi) as Vendredi,
    max(Samedi) as Samedi,
    max(Dimanche) as Dimanche
  FROM modele
  GROUP BY  heure,pseudo,web_view,client_id
);


CREATE VIEW modele_pivot_visible_yes AS (
  SELECT
    heure,pseudo,web_view,client_id,
    max(Lundi) as Lundi,
    max(Mardi) as Mardi,
    max(Mercredi) as Mercredi,
    max(Jeudi) as Jeudi,
    max(Vendredi) as Vendredi,
    max(Samedi) as Samedi,
    max(Dimanche) as Dimanche
  FROM modele_visible_yes
  GROUP BY  heure,pseudo,web_view,client_id
);


CREATE VIEW modele_pivot_visible_no AS (
  SELECT
    heure,pseudo,web_view,client_id,
    max(Lundi) as Lundi,
    max(Mardi) as Mardi,
    max(Mercredi) as Mercredi,
    max(Jeudi) as Jeudi,
    max(Vendredi) as Vendredi,
    max(Samedi) as Samedi,
    max(Dimanche) as Dimanche
  FROM modele_visible_no
  GROUP BY  heure,pseudo,web_view,client_id
);







DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL UNIQUE,
  comment VARCHAR(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO user_type(id, user_type) VALUES
  (1,'admin'),
  (2,'manager'),
  (3,'secretary'),
  (4,'employee');

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
--
-- Dumping data for table `admins`
--

INSERT INTO ikamych.admins (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, address, cp, city, country, phone, mobile, img) VALUES (1, 'admin', '$2y$10$YzYyN2U3MjBkNGQ4MTliOOYg0RfXSbg5pFOVsO1vOeEFamBhPdnYS', 'admin', 'webmaster@ikamy.ch', 'admin', 1, null, null, null, null, null, null, null, null, null);
INSERT INTO ikamych.admins (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, address, cp, city, country, phone, mobile, img) VALUES (2, 'kamy', '$2y$10$MmY3YTUwNTA4MzZjYWZiOORpVvLvjpsyBJ1a0p/vVfQLUNGu1e76W', 'Kamran NAFISSPOUR', 'nafisspour@bluewin.ch', 'admin', 1, 'Kamran', 'Nafisspour', '68 rue des Vollandes', '1207', 'Genève', 'Suisse', '+41 (22) 7350120', '+41 (79) 350 21 32', null);
INSERT INTO ikamych.admins (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, address, cp, city, country, phone, mobile, img) VALUES (4, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch', 'employee', 4, null, null, null, null, null, null, null, null, null);
INSERT INTO ikamych.admins (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, address, cp, city, country, phone, mobile, img) VALUES (5, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com', 'manager', 2, null, null, null, null, null, null, null, null, null);
INSERT INTO ikamych.admins (id, username, hashed_password, nom, email, user_type, user_type_id, first_name, last_name, address, cp, city, country, phone, mobile, img) VALUES (7, 'gmail', '$2y$10$MWU4N2E5MDcwNDRjYjM1Mu2URCsGI9fUp9JCdmPZCX1cYOlmzeu5O', 'Kamy employee', 'kamran.nafisspour@gmail.com', 'employee', 4, null, null, null, null, null, null, null, null, null);

# DROP VIEW IF EXISTS summary_by_course_date_program;
DROP VIEW IF EXISTS summary_by_course_date_program;

CREATE VIEW  summary_by_course_date_program AS
  SELECT DISTINCT course_date as course_date
    ,  DATE_SUB(course_date, INTERVAL 1 DAY) AS day_before
    , DATE_ADD(course_date, INTERVAL 1 DAY) AS day_after
    , unix_timestamp(course_date)AS date_unix ,DATE(now()) AS today
    ,  DATEDIFF (course_date,now()) AS diff
    , CASE
      WHEN DATEDIFF (course_date,now()) = -1 then 'yesterday'
      WHEN DATEDIFF (course_date,now()) = 1 then 'tomorrow'
      WHEN DATEDIFF (course_date,now()) < 0 then CONCAT(DATEDIFF (course_date,now()), ' day')
      WHEN DATEDIFF (course_date,now()) > 0 then CONCAT('+', DATEDIFF (course_date,now()), ' day')
      WHEN DATEDIFF (course_date,now()) = 0 then 'now'
      ELSE 'now'
      END as str_time
    ,  CASE
       WHEN DATEDIFF (course_date,now()) = -1 then 'hier'
       WHEN DATEDIFF (course_date,now()) = 1 then 'demain'
       WHEN DATEDIFF (course_date,now()) < 0 then CONCAT('il y a ', -DATEDIFF (course_date,now()), ' jours')
       WHEN DATEDIFF (course_date,now()) > 0 then CONCAT('dans ', DATEDIFF (course_date,now()), ' jours')
       WHEN DATEDIFF (course_date,now()) = 0 then 'aujourd\'hui'
       ELSE 'now'
       END as str_time_fr
    ,DATE_FORMAT(course_date,GET_FORMAT(DATE,'EUR')) AS date_format
    , SEC_TO_TIME((TIME_TO_SEC(now()) DIV 900) * 900) AS now_round_time
    , replace( SUBSTRING(SEC_TO_TIME((TIME_TO_SEC(now()) DIV 900) * 900),1,5),':','h') AS now_time_transmed
    ,  monthname(course_date) AS monthname
    , year(course_date) AS year
    , week (course_date) AS week
    , count(course_date) AS total_course
    , SUM(IF(validated_chauffeur=0, 1, 0)) AS valid_chauf_0
    , SUM(IF(validated_chauffeur=1, 1, 0)) AS valid_chauf_1
    , SUM(IF(validated_chauffeur=2, 1, 0)) AS valid_chauf_2
    , SUM(IF(validated_mgr=0, 1, 0)) AS valid_mgr_0
    , SUM(IF(validated_mgr=1, 1, 0)) AS valid_mgr_1
    , SUM(IF(validated_final=0, 1, 0)) AS valid_fina1_0
    , SUM(IF(validated_final=1, 1, 0)) AS valid_fina1_1
    , SUM(IF(prix_course=0, 1, 0)) AS prix_course_0
    ,sum( chauffeur='' OR chauffeur IS NULL ) AS erreur_chauffeur
    , sum(  (((depart='' OR depart is NULL OR arrivee='' OR arrivee is NULL) )))as erreur_address
    , sum(( pseudo='autres' OR pseudo='colline' AND (pseudo_autres='' OR pseudo_autres IS NULL)))as erreur_autres
    , sum(((pseudo='tour_patient' OR pseudo='tag' OR pseudo= 'partners' OR pseudo='mines_icbl' OR pseudo='cash' or pseudo= 'aude' or pseudo= 'aloha')
           AND (nom_patient='' OR nom_patient IS NULL)))as erreur_patients
    , sum((pseudo='tour_sang' OR pseudo='carouge_sang' AND (bon_no='' OR bon_no IS NULL)))as erreur_sang
    , sum(
         (((depart='' OR depart is NULL OR arrivee='' OR arrivee is NULL) ))
         OR ((pseudo='tour_patient' OR pseudo='tag' OR pseudo= 'partners' OR pseudo='mines_icbl' OR pseudo='cash' or pseudo= 'aude' or pseudo= 'aloha')
             AND (nom_patient='' OR nom_patient IS NULL))
         OR ( pseudo='autres' OR pseudo='colline' AND (pseudo_autres='' OR pseudo_autres IS NULL))
         OR (pseudo='tour_sang' OR pseudo='carouge_sang' AND (bon_no='' OR bon_no IS NULL)) ) AS erreur_general
  FROM programmed_courses GROUP BY course_date ORDER BY course_date  DESC;


DROP TABLE IF EXISTS links;
DROP TABLE IF EXISTS links_category;



CREATE TABLE links_category (
  id int(11) NOT NULL AUTO_INCREMENT ,
  category varchar(50) NOT NULL UNIQUE ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



CREATE TABLE links (
  id int(11) NOT NULL AUTO_INCREMENT ,
  name varchar(50) NOT NULL ,
  web_address text DEFAULT NULL,
  description text DEFAULT NULL,
  category varchar(50) NOT NULL DEFAULT 'Others',
  sub_category_1 varchar(50) NULL ,
  sub_category_2 varchar(50) NULL ,
  privacy TINYINT(1) DEFAULT 0,
  rank INT(11) DEFAULT 0,
  username varchar(50) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;









