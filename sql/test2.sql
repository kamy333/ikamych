SELECT *
FROM clients;

SELECT *
FROM transport_programming_model
  JOIN clients;

SHOW DATABASES;

DESC clients;
DESCRIBE clients;

USE hhbz_ikamych2;

SHOW ENGINES;
SHOW TABLE STATUS;

DROP TABLE IF EXISTS article;

CREATE TABLE IF NOT EXISTS `article` (
  `id`         INT(11)   NOT NULL,
  `subject`    VARCHAR(255)       DEFAULT 'Others',
  `link`       VARCHAR(255)       DEFAULT 'Others',
  `photo`      VARCHAR(255)       DEFAULT NULL,
  `article`    TEXT,
  `likes`      INT(10)   NOT NULL DEFAULT 0,
  `comment`    VARCHAR(255)       DEFAULT NULL,
  `input_date` TIMESTAMP NULL     DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;