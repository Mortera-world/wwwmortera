<style>
    .reset{
        width: 180px;
        max-height: 360px;
    }
    .reset_header{
		backdrop-filter: blur(2px);
        height: 31px;
        width: 180px;
        background-image: url('templates/tibiacom/images/themeboxes/header-bg.png');
        font-family: Verdana;
        font-weight: bold;
        color: #fc3;
		text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.5);
        line-height: 34px;
    }
    .reset_bottom{
        height: 13px;
        width: 200px;
        margin-top: -1px;
        background-image: url('templates/tibiacom/images/themeboxes/box-bottom.gif');
    }
    .reset_content {
    padding: 0px 10px;
    backdrop-filter: blur(2px);
    width: 160px;
    max-height: 290px;
	background-position: 7px 0px; /* Ajusta estos valores según sea necesario */
    background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
    background-size: 92% auto; /* Ajusta el ancho al 100% del contenedor y la altura automáticamente */
}
    .reset_player{
        font-family: Verdana;
        color: white;
		text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.5);
        text-align: left;
        display: flex;
        align-items: center;
        padding: 10px 5px;
    }
    .reset_outfit{
        position: absolute;
        width: 64px;
        height: 64px;
        background-position: bottom right;
        left: -15px;
        margin-top: -30px;
    }
    .reset_text{
        margin-left: 45px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .reset_text a {
    text-decoration: none;
    color: #fc3;
    text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.5);
}
    .reset_button{
        height: 30px;
        width: 148px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
    }
    .reset_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
</style>
<div class="reset">
    <div class="reset_header">Top Resets</div>
    <div class="reset_content">
        <?php
        $storage_number = 500;
        $values = $SQL->query('SELECT players.name, players.level, player_storage.value, players.looktype, players.lookaddons, players.lookhead, players.lookbody, players.looklegs, players.lookfeet, players.vocation
                       FROM players
                       JOIN player_storage ON players.id = player_storage.player_id
                       WHERE player_storage.key = '.$storage_number.' AND players.group_id < 3
                       ORDER BY CAST(player_storage.value AS DECIMAL) DESC
                       LIMIT 5');
        foreach($values as $player){
    $outfit_url = '';
    if ($config['online_outfit']){
        $outfit_url = $config['outfit_images_url'] . '?id=' . $player['looktype'] . ( !empty( $player['lookaddons'] ) ? '&addons=' . $player['lookaddons'] : '' ) . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'];
        $player['outfit'] = $outfit_url;
    }
    $player_voc = isset($player['vocation']) ? $config['vocations'][$player['vocation']] : 'Unknown';
?>
<div class="reset_player">
    <div class="reset_outfit" style="background-image: url('<?php echo $player['outfit'] ?>')"></div>
    <div class="reset_text">
        <a href="<?php echo getPlayerLink($player['name'], false) ?>"><b><?php echo $player['name'] ?></b></a><br>
        <!-- Mostrar el valor del almacenamiento -->
        <small>Resets: <?php echo $player['value'] ?></small>
    </div>
</div>
<?php } ?>
    </div>
    <div class="reset_bottom"></div>
</div>

