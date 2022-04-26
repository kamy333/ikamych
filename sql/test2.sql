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

CREATE TABLE IF NOT EXISTS `article`
(
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

CREATE TABLE IF NOT EXISTS `task`
(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name`    VARCHAR(255)  NOT NULL  ,
    `priority` INT DEFAULT NULL  ,
    `is_completed` BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id),
    INDEX (name)
     );

CREATE TABLE  IF NOT EXISTS  user(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128)  NOT NULL,
    `username` VARCHAR(128)  NOT NULL,
    `password_hash` VARCHAR(255)  NOT NULL,
    `api_key` VARCHAR(32)  NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (username),
    UNIQUE (api_key)

);