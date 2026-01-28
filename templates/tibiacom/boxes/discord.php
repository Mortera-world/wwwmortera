<style>
    .discord{
        width: 180px;
        height: 110px;
    }
    .discord_header{
        height: 31px;
        width: 180px;
		backdrop-filter: blur(2px);
        background-image: url('templates/tibiacom/images/themeboxes/header-bg.png');
        font-family: Verdana;
        font-weight: bold;
        color: #fff;
		text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.5);
        line-height: 37px;
    }
    .discord_bottom{
        height: 18px;
        width: 180px;
        margin-top: -2px;
        background-image: url('templates/tibiacom/images/themeboxes/box-bottom.gif');
    }
    .discord_content{
        padding: 0px 15px;
        width: 159px;
        height: 58px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
		backdrop-filter: blur(4px);
		background-position: 5px 0px; /* Ajusta estos valores según sea necesario */
        background-size: 90% auto; /* Ajusta el ancho al 100% del contenedor y la altura automáticamente */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .discord_button{
        height: 41px;
        width: 160px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/discord_button_hover.png');
        font-family: Verdana;
        font-weight: 100;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
		text-indent: -11px;
		background-repeat: no-repeat;
		background-position: 4px 4px;
    }
    .discord_button:hover{
        background: url('templates/tibiacom/images/themeboxes/discord_button.png');
        color: #fff;
		background-repeat: no-repeat;
		background-position: 4px 4px;
    }
</style>
<div class="discord">
    <div class="discord_header">Discord</div>
    <div class="discord_content">
        <a href="<?php echo $config['discord_link']; ?>" target="new">
            <button type="button" class="discord_button">Join Discord</button>
        </a>
    </div>
    <div class="discord_bottom"></div>
</div>