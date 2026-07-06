-- Loteria Mexicana Online para MyAAC 0.8.x
-- Compatible con MySQL 5.7+/8.x y MariaDB 10.2+
-- Ejecutar una sola vez sobre la misma base de datos de MyAAC/TFS.

CREATE TABLE IF NOT EXISTS `loteria_rooms` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `creator_account_id` INT UNSIGNED NOT NULL,
  `creator_name` VARCHAR(80) NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `card_price` BIGINT UNSIGNED NOT NULL,
  `speed_seconds` SMALLINT UNSIGNED NOT NULL,
  `max_players` SMALLINT UNSIGNED NOT NULL DEFAULT 20,
  `victory_mode` ENUM('traditional','square','four_corners','full_card') NOT NULL DEFAULT 'full_card',
  `status` ENUM('waiting','playing','finished') NOT NULL DEFAULT 'waiting',
  `prize_pool` BIGINT UNSIGNED NOT NULL DEFAULT 0,
  `rules_json` JSON NOT NULL,
  `draw_order` JSON NULL,
  `draw_position` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `current_card_id` TINYINT UNSIGNED NULL,
  `next_draw_at` DATETIME(6) NULL,
  `winners_paid` TINYINT(1) NOT NULL DEFAULT 0,
  `finished_reason` VARCHAR(40) NULL,
  `empty_since` DATETIME(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `started_at` DATETIME(6) NULL,
  `ended_at` DATETIME(6) NULL,
  PRIMARY KEY (`id`),
  KEY `idx_loteria_rooms_status` (`status`, `created_at`),
  KEY `idx_loteria_rooms_creator` (`creator_account_id`, `status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_room_players` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `display_name` VARCHAR(80) NOT NULL,
  `cards_bought` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `total_paid` BIGINT UNSIGNED NOT NULL DEFAULT 0,
  `joined_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_player_room_account` (`room_id`, `account_id`),
  KEY `idx_loteria_player_account` (`account_id`),
  CONSTRAINT `fk_loteria_player_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_room_presence` (
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `last_seen_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`room_id`, `account_id`),
  KEY `idx_loteria_presence_seen` (`last_seen_at`),
  CONSTRAINT `fk_loteria_presence_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_card_offers` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `batch_token` CHAR(64) NOT NULL,
  `offer_token` CHAR(64) NOT NULL,
  `card_data` JSON NOT NULL,
  `expires_at` DATETIME NOT NULL,
  `purchased_at` DATETIME NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_offer_token` (`offer_token`),
  KEY `idx_loteria_offer_lookup` (`room_id`, `account_id`, `purchased_at`, `expires_at`),
  CONSTRAINT `fk_loteria_offer_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_player_cards` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `card_data` JSON NOT NULL,
  `marked_data` JSON NOT NULL,
  `is_completed` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `completed_at` DATETIME(6) NULL,
  PRIMARY KEY (`id`),
  KEY `idx_loteria_cards_owner` (`room_id`, `account_id`),
  CONSTRAINT `fk_loteria_card_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_drawn_cards` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `card_id` TINYINT UNSIGNED NOT NULL,
  `card_name` VARCHAR(50) NOT NULL,
  `drawn_order` TINYINT UNSIGNED NOT NULL,
  `drawn_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_draw_card` (`room_id`, `card_id`),
  UNIQUE KEY `uq_loteria_draw_order` (`room_id`, `drawn_order`),
  CONSTRAINT `fk_loteria_draw_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_winners` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `player_card_id` BIGINT UNSIGNED NOT NULL,
  `player_name` VARCHAR(80) NOT NULL,
  `place` TINYINT UNSIGNED NOT NULL,
  `prize_amount` BIGINT UNSIGNED NOT NULL DEFAULT 0,
  `paid_at` DATETIME(6) NULL,
  `created_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_winner_place` (`room_id`, `place`),
  UNIQUE KEY `uq_loteria_winner_card` (`player_card_id`),
  KEY `idx_loteria_winner_account` (`room_id`, `account_id`),
  CONSTRAINT `fk_loteria_winner_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_loteria_winner_card` FOREIGN KEY (`player_card_id`) REFERENCES `loteria_player_cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_coin_ledger` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `movement_type` ENUM('purchase','prize','refund') NOT NULL,
  `amount` BIGINT NOT NULL,
  `reference_key` VARCHAR(160) NOT NULL,
  `balance_after` BIGINT UNSIGNED NOT NULL,
  `created_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_ledger_reference` (`reference_key`),
  KEY `idx_loteria_ledger_room` (`room_id`, `created_at`),
  KEY `idx_loteria_ledger_account` (`account_id`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_game_history` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `original_room_id` BIGINT UNSIGNED NOT NULL,
  `creator_account_id` INT UNSIGNED NOT NULL,
  `creator_name` VARCHAR(80) NOT NULL,
  `room_name` VARCHAR(60) NOT NULL,
  `card_price` BIGINT UNSIGNED NOT NULL,
  `speed_seconds` SMALLINT UNSIGNED NOT NULL,
  `max_players` SMALLINT UNSIGNED NOT NULL,
  `victory_mode` ENUM('traditional','square','four_corners','full_card') NOT NULL,
  `prize_pool` BIGINT UNSIGNED NOT NULL,
  `player_count` SMALLINT UNSIGNED NOT NULL,
  `rules_json` JSON NOT NULL,
  `players_json` JSON NOT NULL,
  `drawn_json` JSON NOT NULL,
  `started_at` DATETIME(6) NULL,
  `ended_at` DATETIME(6) NOT NULL,
  `created_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_history_room` (`original_room_id`),
  KEY `idx_loteria_history_ended` (`ended_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `loteria_winner_history` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `history_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `player_name` VARCHAR(80) NOT NULL,
  `place` TINYINT UNSIGNED NOT NULL,
  `prize_amount` BIGINT UNSIGNED NOT NULL,
  `created_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_loteria_history_place` (`history_id`, `place`),
  CONSTRAINT `fk_loteria_winner_history_game` FOREIGN KEY (`history_id`) REFERENCES `loteria_game_history` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Enlace de menu para los dos temas incluidos por MyAAC. Se evita duplicarlo.
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `blank`, `color`, `category`, `ordering`, `enabled`)
SELECT 'tibiacom', 'Loteria Mexicana', 'loteria', 0, '', 3, 99, 1
WHERE NOT EXISTS (
  SELECT 1 FROM `myaac_menu` WHERE `template` = 'tibiacom' AND `link` = 'loteria'
);

INSERT INTO `myaac_menu` (`template`, `name`, `link`, `blank`, `color`, `category`, `ordering`, `enabled`)
SELECT 'kathrine', 'Loteria Mexicana', 'loteria', 0, '', 3, 99, 1
WHERE NOT EXISTS (
  SELECT 1 FROM `myaac_menu` WHERE `template` = 'kathrine' AND `link` = 'loteria'
);
