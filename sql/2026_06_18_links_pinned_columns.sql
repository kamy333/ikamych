CREATE TABLE IF NOT EXISTS `links_pinned_columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_field` varchar(40) NOT NULL DEFAULT 'category',
  `source_value` varchar(120) NOT NULL,
  `label` varchar(120) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 10,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `username` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source_value_unique` (`source_field`, `source_value`),
  KEY `rank` (`rank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
