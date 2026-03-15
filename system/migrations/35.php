<?php
$db->exec('CREATE TABLE IF NOT EXISTS `lost_account_requests` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `account_id` INT UNSIGNED NOT NULL,
    `character_name` VARCHAR(255) NOT NULL,
    `requested_account_name` VARCHAR(255) NOT NULL,
    `requested_email` VARCHAR(255) NOT NULL,
    `requested_real_name` VARCHAR(255) NOT NULL,
    `status` VARCHAR(20) NOT NULL DEFAULT "pending",
    `admin_comment` TEXT NULL,
    `generated_password` VARCHAR(255) NULL,
    `resolved_by` INT UNSIGNED NULL,
    `created_at` INT UNSIGNED NOT NULL,
    `resolved_at` INT UNSIGNED NULL,
    PRIMARY KEY (`id`),
    KEY `idx_lost_account_requests_status` (`status`),
    KEY `idx_lost_account_requests_account` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
