-- Actualiza una instalacion de la primera version del modulo.
-- No usar en instalaciones nuevas: loteria-install.sql ya contiene estos cambios.

SET @schema_name = DATABASE();

SET @sql = IF(
  EXISTS(SELECT 1 FROM information_schema.COLUMNS
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_rooms' AS BINARY)
           AND CAST(COLUMN_NAME AS BINARY) = CAST('victory_mode' AS BINARY)),
  'SELECT 1',
  'ALTER TABLE `loteria_rooms` ADD COLUMN `victory_mode` ENUM(''traditional'',''square'',''four_corners'',''full_card'') NOT NULL DEFAULT ''full_card'' AFTER `max_players`'
);
PREPARE loteria_stmt FROM @sql; EXECUTE loteria_stmt; DEALLOCATE PREPARE loteria_stmt;

SET @sql = IF(
  EXISTS(SELECT 1 FROM information_schema.COLUMNS
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_rooms' AS BINARY)
           AND CAST(COLUMN_NAME AS BINARY) = CAST('empty_since' AS BINARY)),
  'SELECT 1',
  'ALTER TABLE `loteria_rooms` ADD COLUMN `empty_since` DATETIME(6) NULL DEFAULT CURRENT_TIMESTAMP(6) AFTER `finished_reason`'
);
PREPARE loteria_stmt FROM @sql; EXECUTE loteria_stmt; DEALLOCATE PREPARE loteria_stmt;

-- El libro de monedas se conserva como auditoria aun cuando la sala temporal desaparece.
SET @sql = IF(
  EXISTS(SELECT 1 FROM information_schema.REFERENTIAL_CONSTRAINTS
         WHERE CAST(CONSTRAINT_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_coin_ledger' AS BINARY)
           AND CAST(CONSTRAINT_NAME AS BINARY) = CAST('fk_loteria_ledger_room' AS BINARY)),
  'ALTER TABLE `loteria_coin_ledger` DROP FOREIGN KEY `fk_loteria_ledger_room`',
  'SELECT 1'
);
PREPARE loteria_stmt FROM @sql; EXECUTE loteria_stmt; DEALLOCATE PREPARE loteria_stmt;

-- Permite limpiar las cartas temporales despues de copiar los ganadores al historial.
SET @sql = IF(
  EXISTS(SELECT 1 FROM information_schema.REFERENTIAL_CONSTRAINTS
         WHERE CAST(CONSTRAINT_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_winners' AS BINARY)
           AND CAST(CONSTRAINT_NAME AS BINARY) = CAST('fk_loteria_winner_card' AS BINARY)),
  'ALTER TABLE `loteria_winners` DROP FOREIGN KEY `fk_loteria_winner_card`',
  'SELECT 1'
);
PREPARE loteria_stmt FROM @sql; EXECUTE loteria_stmt; DEALLOCATE PREPARE loteria_stmt;

ALTER TABLE `loteria_winners`
  ADD CONSTRAINT `fk_loteria_winner_card`
  FOREIGN KEY (`player_card_id`) REFERENCES `loteria_player_cards` (`id`) ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS `loteria_room_presence` (
  `room_id` BIGINT UNSIGNED NOT NULL,
  `account_id` INT UNSIGNED NOT NULL,
  `last_seen_at` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`room_id`, `account_id`),
  KEY `idx_loteria_presence_seen` (`last_seen_at`),
  CONSTRAINT `fk_loteria_presence_room` FOREIGN KEY (`room_id`) REFERENCES `loteria_rooms` (`id`) ON DELETE CASCADE
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

-- Debe devolver cinco columnas con valor 1.
SELECT
  EXISTS(SELECT 1 FROM information_schema.COLUMNS
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_rooms' AS BINARY)
           AND CAST(COLUMN_NAME AS BINARY) = CAST('victory_mode' AS BINARY)) AS `victory_mode_ok`,
  EXISTS(SELECT 1 FROM information_schema.COLUMNS
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_rooms' AS BINARY)
           AND CAST(COLUMN_NAME AS BINARY) = CAST('empty_since' AS BINARY)) AS `empty_since_ok`,
  EXISTS(SELECT 1 FROM information_schema.TABLES
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_room_presence' AS BINARY)) AS `presence_table_ok`,
  EXISTS(SELECT 1 FROM information_schema.TABLES
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_game_history' AS BINARY)) AS `game_history_table_ok`,
  EXISTS(SELECT 1 FROM information_schema.TABLES
         WHERE CAST(TABLE_SCHEMA AS BINARY) = CAST(@schema_name AS BINARY)
           AND CAST(TABLE_NAME AS BINARY) = CAST('loteria_winner_history' AS BINARY)) AS `winner_history_table_ok`;
