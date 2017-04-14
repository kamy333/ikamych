DROP TABLE IF EXISTS chat_friend;
CREATE TABLE IF NOT EXISTS `chat_friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` TEXT DEFAULT NULL,
  `date` timestamp  DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chat_friend`
--

INSERT INTO `chat_friend` (`id`, `user_id`, `name`, `message`, `date`, `read`) VALUES
  (1, '2', 'Kamy', 'hi beautiful :)', '2016-06-21 03:03:29', 0),
  (2, '28', 'Bralia', 'hi kamy', '2016-06-21 03:03:35', 0);


ALTER TABLE `chat_friend`
  ADD CONSTRAINT `chat_friend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
