CREATE TABLE `authors` (
  `id`       INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)     NOT NULL DEFAULT '',
  `created`  TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `authors_titles` (
  `id`        BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` INT(10) UNSIGNED    NOT NULL,
  `title_id`  INT(11) UNSIGNED    NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_id` (`title_id`, `author_id`),
  UNIQUE KEY `author_id` (`author_id`, `title_id`),
  CONSTRAINT `authors_titles__title_id` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `categories` (
  `id`       INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)     NOT NULL DEFAULT '',
  `created`  TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `projects` (
  `id`       INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)     NOT NULL DEFAULT '',
  `created`  TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `publishers` (
  `id`       INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)     NOT NULL DEFAULT '',
  `created`  TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `titles` (
  `id`           INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id`   INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_id`  INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `publisher_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `name`         VARCHAR(255)     NOT NULL DEFAULT '',
  `subtitle`     VARCHAR(255)     NOT NULL DEFAULT '',
  `url`          VARCHAR(1000)    NOT NULL DEFAULT '',
  `note`         VARCHAR(2000)    NOT NULL DEFAULT '',
  `created`      TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified`     TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `category_id` (`category_id`),
  KEY `publisher_id` (`publisher_id`),
  CONSTRAINT `titles__category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `titles__project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `titles__publisher_id` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
