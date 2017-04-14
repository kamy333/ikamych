DROP TABLE IF EXISTS currency;
CREATE TABLE IF NOT EXISTS currency (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency` VARCHAR(3),
  `currency_country` VARCHAR(50),
  `rate` DECIMAL(10,5),
  `date`  DATE NOT NULL ,
  `rank` int(11) UNSIGNED DEFAULT 1,
  `comment` text,
 `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


# SELECT current_date();