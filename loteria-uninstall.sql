-- ATENCION: elimina permanentemente salas, cartas, historial, ganadores y auditoria.
DELETE FROM `myaac_menu` WHERE `link` = 'loteria';

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `loteria_coin_ledger`;
DROP TABLE IF EXISTS `loteria_winner_history`;
DROP TABLE IF EXISTS `loteria_game_history`;
DROP TABLE IF EXISTS `loteria_winners`;
DROP TABLE IF EXISTS `loteria_drawn_cards`;
DROP TABLE IF EXISTS `loteria_player_cards`;
DROP TABLE IF EXISTS `loteria_card_offers`;
DROP TABLE IF EXISTS `loteria_room_presence`;
DROP TABLE IF EXISTS `loteria_room_players`;
DROP TABLE IF EXISTS `loteria_rooms`;
SET FOREIGN_KEY_CHECKS = 1;
