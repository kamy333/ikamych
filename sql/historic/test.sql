# SELECT sum(quantity * unit_price) FROM invoice_actual  WHERE project_id='4' and invoiced=0;
#
# SELECT project_id,invoice_id,invoiced FROM invoice_actual;
#
# INSERT INTO invoice_send
#  (project_id,amount,vat)
# VALUES
# (4,  1000,0)  ;
#
# UPDATE invoice_actual
# SET
#   invoice_id=1001,
#   invoiced=1
# WHERE project_id=4 AND invoiced=0;

DROP TABLE IF EXISTS invoice_send;
DROP TABLE IF EXISTS mycigarette;
DROP TABLE IF EXISTS myexpense;



DROP TABLE IF EXISTS invoice_send;
CREATE TABLE IF NOT EXISTS `invoice_send` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `project_id` INT(11) NOT NULL,
    `project_code` varchar(10) DEFAULT '',
    invoice_date  DATE NOT NULL ,
    `gross_amount` DECIMAL(10,2) NOT NULL DEFAULT '0' ,
    `vat` DECIMAL(10,2) NOT NULL DEFAULT '0',
     amount DECIMAL(10,2) NOT NULL DEFAULT '0' ,
    canceled enum('Yes','No') NOT NULL DEFAULT 'No',
    `status` enum('prepared','send','paid','partially_paid'),
   payment_date DATE not null ,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;

ALTER TABLE `invoice_send`
ADD CONSTRAINT `invoice_send_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

DROP TABLE IF EXISTS mycigarette;
CREATE TABLE IF NOT EXISTS mycigarette (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `number_cig` INT(11) NOT NULL DEFAULT 1,
  `cig_date` DATE   NOT NULL ,
  `cig_date_time` DATETIME   NOT NULL ,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS myexpense;
CREATE TABLE IF NOT EXISTS myexpense (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(10,2) NOT NULL DEFAULT '0' ,
  `person_name` VARCHAR(50),
  `expense_type` VARCHAR(50),
   expense_date DATE not null ,
  `comment` text,
  `modification_time` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS myexpense_person;
CREATE TABLE IF NOT EXISTS myexpense_person (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `person_name` VARCHAR(50),
  `rank` int(11) UNSIGNED DEFAULT 1,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS myexpense_type;
CREATE TABLE IF NOT EXISTS myexpense_type (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `expense_type` VARCHAR(50),
  `rank` int(11) UNSIGNED DEFAULT 1,
  `comment` text,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP VIEW IF EXISTS mycigarette_view;
CREATE VIEW mycigarette_view AS (
  SELECT
    monthname(cig_date), cig_date,sum(number_cig)

  FROM mycigarette
  GROUP BY  cig_date
);


SELECT * FROM mycigarette_view;

CREATE TABLE user_setting (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL ,
   canvas enum('Yes','No') NOT NULL DEFAULT 'No',
   tables enum('static','data','foo','jqGrid') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS chat;
CREATE TABLE chat (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL ,
  `to_user_id` VARCHAR(255),
  `message` VARCHAR(255),
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `chat`
ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


INSERT INTO chat (user_id,to_user_id,message)VALUE (20,1,'hi from gva');

DROP TABLE IF EXISTS notifications;
CREATE TABLE notifications (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL ,
  `message` VARCHAR(255),
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `notifications`
ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

INSERT INTO chat (user_id,message)VALUE (20,'hi from gva');
