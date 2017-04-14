
 DROP TABLE IF EXISTS links;
 DROP TABLE IF EXISTS links_category;

 CREATE TABLE IF NOT EXISTS `links_category` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `category` varchar(50) NOT NULL,
   `rank` int(10) unsigned NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   UNIQUE KEY `category` (`category`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

 CREATE TABLE IF NOT EXISTS `links` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(50) NOT NULL,
   `web_address` text,
   `description` text,
   `category_id` int(11) NOT NULL DEFAULT '1',
   `category` varchar(50) NOT NULL DEFAULT 'Others',
   `sub_category_1` varchar(50) DEFAULT NULL,
   `sub_category_2` varchar(50) DEFAULT NULL,
   `privacy` tinyint(1) DEFAULT '0',
   `rank` int(11) DEFAULT '0',
   `username` varchar(50) NOT NULL,
   PRIMARY KEY (`id`),
   KEY `category_id` (`category_id`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;


 --
 -- Constraints for table `links`
 --
 ALTER TABLE `links`
ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `links_category` (`id`);
