CREATE TABLE IF NOT EXISTS `saved_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` varchar(2048) NOT NULL,
  `url_hash` char(64) NOT NULL,
  `title` varchar(500) NOT NULL DEFAULT '',
  `note` text,
  `status` enum('inbox','kept','archived') NOT NULL DEFAULT 'inbox',
  `source` varchar(40) NOT NULL DEFAULT 'chrome',
  `saved_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `saved_links_user_url_hash_unique` (`user_id`, `url_hash`),
  KEY `saved_links_user_status_saved_idx` (`user_id`, `status`, `saved_at`),
  CONSTRAINT `saved_links_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `user_api_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `token_hash` char(64) NOT NULL,
  `token_prefix` varchar(12) NOT NULL,
  `abilities` varchar(255) NOT NULL DEFAULT 'saved-links:*',
  `last_used_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `revoked_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_api_tokens_token_hash_unique` (`token_hash`),
  KEY `user_api_tokens_user_id_idx` (`user_id`),
  CONSTRAINT `user_api_tokens_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
