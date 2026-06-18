CREATE TABLE IF NOT EXISTS `links_quick_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(120) NOT NULL,
  `name` varchar(180) NOT NULL,
  `web_address` text NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 10,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `username` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_rank` (`section`, `rank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
