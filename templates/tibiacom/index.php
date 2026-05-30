 <?php
 global $config, $db, $template_path, $logged, $status, $content, $hooks, $twig_loader, $title;

defined('MYAAC') or die('Direct access not allowed!');

//templates\tibiacom\config.ini
if (isset($config['boxes']))
    $config['boxes'] = explode(",", $config['boxes']);

$template_url = rtrim(BASE_URL, '/') . '/' . trim($template_path, '/');
$asset_version = '20260529';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?= template_place_holder('head_start'); ?>
    <link rel="shortcut icon" href="<?= $template_url; ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?= $template_url; ?>/images/favicon.ico" type="image/x-icon"/>
    <link href="<?= $template_url; ?>/basic.css?v=<?= $asset_version; ?>" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="<?= rtrim(BASE_URL, '/'); ?>/tools/basic.js?v=<?= $asset_version; ?>"></script>
    <script type="text/javascript" src="<?= $template_url; ?>/ticker.js?v=<?= $asset_version; ?>"></script>
    <script id="twitter-wjs" src="<?= $template_url; ?>/js/twitter.js?v=<?= $asset_version; ?>"></script>
    <script id="facebook-jssdk" async src="https://connect.facebook.net/en_US/all.js"></script>

    <link href="<?= $template_url; ?>/css/facebook.css?v=<?= $asset_version; ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?= rtrim(BASE_URL, '/'); ?>/tools/fonts/fontawesome/all.css?v=<?= $asset_version; ?>">
    <script src="<?= rtrim(BASE_URL, '/'); ?>/tools/fonts/fontawesome/all.js?v=<?= $asset_version; ?>"></script>

    <script src="<?= rtrim(BASE_URL, '/'); ?>/admin/bootstrap/jquery-3.6.0.min.js?v=<?= $asset_version; ?>"></script>
    <script src="<?= rtrim(BASE_URL, '/'); ?>/admin/bootstrap/popper.min.js?v=<?= $asset_version; ?>"></script>
    <script src="<?= rtrim(BASE_URL, '/'); ?>/admin/bootstrap/js/bootstrap.min.js?v=<?= $asset_version; ?>"></script>
    <link href="<?= rtrim(BASE_URL, '/'); ?>/admin/bootstrap/bootstrap-myaac.css?v=<?= $asset_version; ?>" rel="stylesheet" type="text/css">

    <?php if ($config['pace_load']) { ?>
        <script src="admin/bootstrap/pace/pace.js"></script>
        <link
            href="<?= rtrim(BASE_URL, '/'); ?>/admin/bootstrap/pace/themes/<?= $config['pace_color'] ?>/pace-theme-<?= $config['pace_theme'] ?>.css?v=<?= $asset_version; ?>"
            rel="stylesheet"/>
    <?php } ?>

    <script>
        function CollapseTable(a_ID) {
            $('#' + a_ID).slideToggle('slow');
            if ($('#Indicator_' + a_ID).hasClass('CircleSymbolPlus')) {
                $('#Indicator_' + a_ID).attr('class', 'CircleSymbolMinus');
                $('#Indicator_' + a_ID).css('background-image', 'url(' + IMAGES + '/global/content/circle-symbol-plus.gif)');
            } else {
                $('#Indicator_' + a_ID).css('background-image', 'url(' + IMAGES + '/global/content/circle-symbol-minus.gif)');
                $('#Indicator_' + a_ID).attr('class', 'CircleSymbolPlus');
            }
        }
    </script>

    <script type="text/javascript">
        var menus = '';
        var loginStatus = "<?= ($logged ? 'true' : 'false'); ?>";
        <?php
        if (PAGE !== 'news') {
            if (strpos(URI, 'subtopic=') !== false) {
                $tmp = escapeHtml($_REQUEST['subtopic']);
                if ($tmp === 'accountmanagement') {
                    $tmp = 'accountmanage';
                }
            } else {
                $tmp = str_replace('/', '', URI);
                $exp = explode('/', URI);
                if (URI !== 'account/create' && URI !== 'account/lost' && isset($exp[1])) {
                    if ($exp[0] === 'account') {
                        $tmp = 'accountmanage';
                    } else if ($exp[0] === 'news' && $exp[1] === 'archive') {
                        $tmp = 'newsarchive';
                    } else
                        $tmp = $exp[0];
                }
            }
        } else {
            $tmp = 'news';
        }
        ?>
        var activeSubmenuItem = "<?= $tmp; ?>";
        var IMAGES = "<?= $template_url; ?>/images";
        var LINK_ACCOUNT = "<?= BASE_URL; ?>";

        function rowOverEffect(object) {
            if (object.className == 'moduleRow') object.className = 'moduleRowOver';
        }

        function rowOutEffect(object) {
            if (object.className == 'moduleRowOver') object.className = 'moduleRow';
        }

        function InitializePage() {
            LoadLoginBox();
            LoadMenu();
        }

        // initialisation of the loginbox status by the value of the variable 'loginStatus' which is provided to the HTML-document by PHP in the file 'header.inc'
        function LoadLoginBox() {
            return true;
        }

        function LoginButtonAction() {
            window.location = "<?= getLink('account/manage'); ?>";
        }

        function LoginstatusTextAction(source) {
            if (loginStatus === "false") {
                window.location = "<?= getLink('account/create'); ?>";
            } else {
                window.location = "<?= getLink('account/logout'); ?>";
            }
        }

        var menu = [];
        menu[0] = {};
        var unloadhelper = false;

        // load the menu and set the active submenu item by using the variable 'activeSubmenuItem'
        function LoadMenu() {
            var activeItem = document.getElementById("submenu_" + activeSubmenuItem);
            if (activeItem) {
                activeItem.style.color = "white";
                activeItem.className += " ActiveSubmenuitem";
            }
            menus = localStorage.getItem('menus');
            if (!menus || menus.lastIndexOf("&") === -1) {
                menus = "news=1&account=0&community=0&library=0&forum=0<?php if ($config['gifts_system']) echo '&shops=0'; ?>&charactertrade=0&";
            }
            FillMenuArray();
            InitializeMenu();
        }

        function UpdateMenuVisuals(sourceId, isOpen) {
            var menuItem = document.getElementById(sourceId);

            if (menuItem) {
                menuItem.className = menuItem.className.replace(/\s?menuitem-open/g, '').replace(/\s?menuitem-closed/g, '');
                menuItem.className += isOpen ? ' menuitem-open' : ' menuitem-closed';
            }
        }

        function SaveMenu() {
            if (!unloadhelper) {
                SaveMenuArray();
                unloadhelper = true;
            }
        }

        // store the values of the variable 'self.name' in the array menu
        function FillMenuArray() {
            while (menus.length > 0) {
                var mark1 = menus.indexOf("=");
                var mark2 = menus.indexOf("&");
                var menuItemName = menus.substr(0, mark1);
                menu[0][menuItemName] = menus.substring(mark1 + 1, mark2);
                menus = menus.substr(mark2 + 1, menus.length);
            }
        }

        // hide or show the corresponding submenus
        function InitializeMenu() {
            for (menuItemName in menu[0]) {
                var submenu = document.getElementById(menuItemName + "_Submenu");
                if (!submenu) {
                    continue;
                }

                if (menu[0][menuItemName] == "0") {
                    submenu.style.visibility = "hidden";
                    submenu.style.display = "none";
                    UpdateMenuVisuals(menuItemName, false);
                } else {
                    submenu.style.visibility = "visible";
                    submenu.style.display = "block";
                    UpdateMenuVisuals(menuItemName, true);
                }
            }
        }


        function SaveMenuArray() {
            var stringSlices = "";
            var temp = "";

            for (menuItemName in menu[0]) {
                stringSlices = menuItemName + "=" + menu[0][menuItemName] + "&";
                temp = temp + stringSlices;
            }

            localStorage.setItem('menus', temp);
        }

        // onClick open or close submenus
        function MenuItemAction(sourceId) {
            if (menu[0][sourceId] == 1) {
                CloseMenuItem(sourceId);
            } else {
                $.each(menu[0], function (index, value) {
                    if (value == 1) {
                        CloseMenuItem(index);
                    }
                });
                OpenMenuItem(sourceId);
            }
        }

        function OpenMenuItem(sourceId) {
            menu[0][sourceId] = 1;
            document.getElementById(sourceId + "_Submenu").style.visibility = "visible";
            UpdateMenuVisuals(sourceId, true);
            $('#' + sourceId + '_Submenu').slideDown('slow');
        }

        function CloseMenuItem(sourceId) {
            menu[0][sourceId] = 0;
            UpdateMenuVisuals(sourceId, false);
            $('#' + sourceId + '_Submenu').slideUp('fast', function () {
                document.getElementById(sourceId + "_Submenu").style.visibility = "hidden";
            });
        }

        // mouse-over effects of menubuttons and submenuitems
        function MouseOverMenuItem(source) {
            return true;
        }

        function MouseOutMenuItem(source) {
            return true;
        }

        function MouseOverSubmenuItem(source) {
            if (source && source.className.indexOf('SubmenuitemHover') === -1) {
                source.className += ' SubmenuitemHover';
            }
        }

        function MouseOutSubmenuItem(source) {
            if (source) {
                source.className = source.className.replace(/\s?SubmenuitemHover/g, '');
            }
        }
    </script>
    <?= template_place_holder('head_end'); ?>
</head>
<body onBeforeUnLoad="SaveMenu();" onUnload="SaveMenu();" style="background-image:url(<?= $template_url ?><?= getImageMenuRandom('bgs') ?>?v=<?= $asset_version; ?>);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width: 100%;
    height: 100%;
         ">
<?= template_place_holder('body_start'); ?>
<?php if (!empty($config['network_facebook'])) { ?>
    <script type="text/javascript">
        window.fbAsyncInit = function () {
            FB.init({
                appId: 497232093667125, // App ID
                status: true,              // check login status
                cookie: true,              // enable cookies to allow the server to access the session
                xfbml: true               // parse XFBML
            });
            FB.Event.subscribe('auth.login', function () {
                var URLHelper = "?";
                if (window.location.search.replace("?", "").length > 0) {
                    URLHelper = "&";
                }
                if (FB_TryLogin == 1) {
                    window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
                } else if (FB_TryLogin == 2) {
                    window.location = window.location + URLHelper + "page=facebooktrylogin&wasreloaded=1";
                } else {
                    window.location = window.location + URLHelper + "wasreloaded=1";
                }
            });
            FB.Event.subscribe('auth.logout', function (a_Response) {
                if (a_Response.status !== 'connected') {
                    window.location.href = window.location.href;
                } else {
                    /* nothing to do here*/
                }
            });
            FB.Event.subscribe('auth.statusChange', function (response) {
                if (FB_ForceReload == 1 && response.status == "connected") {
                    var URLHelper = "?";
                    if (window.location.search.replace("?", "").length > 0) {
                        URLHelper = "&";
                    }
                    window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
                }
            });
        };
        (function (d) {
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
    </script>
<?php } ?>
<div id="top"></div>
<div id="ArtworkHelper">
    <div id="Bodycontainer">
        <div id="ContentRow">
            <div id="MenuColumn">
                <div id="Loginbox">
                    <div class="LoginboxTitle">ACCOUNT</div>
                    <div class="LoginboxPanel">
                        <div class="LoginPanelTop"></div>
                        <div class="LoginPanelCenter">
                            <a class="LoginActionButton LoginActionButtonPrimary" href="<?= getLink('account/manage'); ?>">
                                <span class="LoginButtonIcon LoginButtonIconAccount"></span>
                                <span><?= !$logged ? 'Login' : 'My Account'; ?></span>
                            </a>
                            <a class="LoginActionButton <?= !$logged ? 'LoginActionButtonCreate' : 'LoginActionButtonLogout'; ?>"
                               href="<?= !$logged ? getLink('account/create') : getLink('account/logout'); ?>">
                                <span class="LoginButtonIcon <?= !$logged ? 'LoginButtonIconCreate' : 'LoginButtonIconLogout'; ?>"></span>
                                <span><?= !$logged ? 'Create Account' : 'Logout'; ?></span>
                            </a>
                        </div>
                        <div class="LoginPanelBottom"></div>
                    </div>
                </div>

                <div class="SideQuickButtons">
                    <a class="LoginActionButton SideActionButton SideActionDownload" href="?subtopic=downloadclient&step=downloadagreement">
                        <span class="SideActionIcon SideActionIconDownload"></span>
                        <span>Download</span>
                    </a>
                    <a class="LoginActionButton SideActionButton SideActionWiki" href="wikia.html">
                        <span class="SideActionIcon SideActionIconWiki"></span>
                        <span>Wikia</span>
                    </a>
                </div>

                <div id='Menu'>
                    <?php
                    $menus = get_template_menus();

                    foreach ($config['menu_categories'] as $id => $cat) {
                        if (!isset($menus[$id]) || ($id == MENU_CATEGORY_SHOP && !$config['gifts_system'])) {
                            continue;
                        }
                        ?>
                        <div id='<?= $cat['id']; ?>' class='menuitem'>
                            <button type='button' class='MenuButton' onClick="MenuItemAction('<?= $cat['id']; ?>')">
                                <span class='MenuButtonLabel'><?= strtoupper($cat['name']); ?></span>
                                <span id='<?= $cat['id']; ?>_Extend' class='Extend'></span>
                            </button>
                            <div id='<?= $cat['id']; ?>_Submenu' class='Submenu'>
                                <div class='SubmenuTop'></div>
                                <div class='SubmenuCenter'>
                                <?php
                                $default_menu_color = "ffffff";

                                foreach ($menus[$id] as $category => $menu) {
                                    $link_color = '#' . (strlen($menu['color']) == 0 ? $default_menu_color : $menu['color']);
                                    ?>
                                    <a href='<?= $menu['link_full']; ?>'<?= $menu['blank'] ? ' target="_blank"' : '' ?>>
                                        <div id='submenu_<?= str_replace('/', '', $menu['link']); ?>'
                                             class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)'
                                             onMouseOut='MouseOutSubmenuItem(this)' style="color: <?= $link_color; ?>;">
                                            <span class='SubmenuArrow'></span>
                                            <span class='SubmenuitemLabel'
                                                  style="color: <?= $link_color; ?>;"><?= $menu['name']; ?></span>
                                        </div>
                                    </a>
                                    <?php
                                }
                                ?>
                                </div>
                                <div class='SubmenuBottom'></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                     <script type="text/javascript">
                        InitializePage();
                    </script>
                </div>
            </div>
            <div id="ContentColumn">
                <div class="Content">

                    <div id="ContentHelper">
                        <div id="TopbarModule">
                            <div class="TopbarModuleLinks">
                                <a href="<?= $config['whatsapp_link'] ?: "#"; ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                                <a href="<?= $config['discord_link'] ?: "#"; ?>" target="_blank" rel="noopener noreferrer">Discord</a>
                                <a href="<?= $config['client_link'] ?: "?subtopic=downloadclient&step=downloadagreement"; ?>" target="_blank" rel="noopener noreferrer">Download</a>
                            </div>
                            <div class="TopbarModuleStatus">
                                <span class="TopbarModuleOnlineCount"><?= (int)($status['players'] ?? 0); ?></span>
                                <span class="TopbarModuleOnlineText">online</span>
                            </div>
                        </div>
                        <?= tickers(); ?>
                        <div id="<?= PAGE; ?>" class="Box">
                            <div class="Corner-tl"
                                 style="background-image:url(<?= $template_url; ?>/images/content/corner-tl.gif);"></div>
                            <div class="Corner-tr"
                                 style="background-image:url(<?= $template_url; ?>/images/content/corner-tr.gif);"></div>
                            <div class="Border_1"
                                 style="background-image:url(<?= $template_url; ?>/images/content/border-1.gif);"></div>
                            <div class="BorderTitleText"
                                 style="background-image:url(<?= $template_url; ?>/images/global/content/haderfornews.png);">
                                <span class="PageTitleText"><?= escapeHtml(ucfirst($title)); ?></span>
                            </div>
                            <div class="Border_2">
                                <div class="Border_3">
                                    <?php $hooks->trigger(HOOK_TIBIACOM_BORDER_3); ?>
                                    <div class="BoxContent">
                                        <?= template_place_holder('center_top') . $content; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="Border_1"
                                 style="background-image:url(<?= $template_url; ?>/images/content/border-1.gif);"></div>

                            <div class="CornerWrapper-b">
                                <div class="Corner-bl"
                                     style="background-image:url(<?= $template_url; ?>/images/content/corner-bl.gif);"></div>
                            </div>
                            <div class="CornerWrapper-b">
                                <div class="Corner-br"
                                     style="background-image:url(<?= $template_url; ?>/images/content/corner-br.gif);"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Footer"><?= template_footer(); ?></div>
            </div>

            <div id="ThemeboxesColumn">
                <?php
                $creaturequery = $db->query("SELECT `boostname`, `looktype`, `lookfeet` , `looklegs` , `lookhead` , `lookbody` , `lookaddons` , `lookmount`   FROM `boosted_creature`")->fetch();
                $creaturename = $creaturequery["boostname"];
                $creaturetype = $creaturequery["looktype"];
                $creaturefeet = $creaturequery["lookfeet"];
                $creaturelegs = $creaturequery["looklegs"];
                $creaturehead = $creaturequery["lookhead"];
                $creaturebody = $creaturequery["lookbody"];
                $creatureaddons = $creaturequery["lookaddons"];
                $creaturemount = $creaturequery["lookmount"];
                ?>

                <?php
                $bossquery = $db->query("SELECT `boostname`, `looktypeEx`, `looktype`, `lookfeet` , `looklegs` , `lookhead` , `lookbody` , `lookaddons` , `lookmount`   FROM `boosted_boss`")->fetch();
                $bossname = $bossquery["boostname"];
                $bosstypeEx = $bossquery["looktypeEx"];
                $bosstype = $bossquery["looktype"];
                $bossfeet = $bossquery["lookfeet"];
                $bosslegs = $bossquery["looklegs"];
                $bosshead = $bossquery["lookhead"];
                $bossbody = $bossquery["lookbody"];
                $bossaddons = $bossquery["lookaddons"];
                $bossmount = $bossquery["lookmount"];
                ?>
                <div id="Themeboxes">
                    <?php
                    $boostedCreatureName = ucwords(strtolower(trim($creaturename)));
                    $boostedBossName = ucwords(strtolower(trim($bossname)));
                    $boostedCreatureImage = $config['outfit_images_url'] . '?id=' . $creaturetype . '&addons=' . $creatureaddons . '&head=' . $creaturehead . '&body=' . $creaturebody . '&legs=' . $creaturelegs . '&feet=' . $creaturefeet . '&mount=' . $creaturemount;
                    $boostedBossImage = $bosstypeEx != 0
                        ? $config['item_images_url'] . $bosstypeEx . '.gif'
                        : $config['outfit_images_url'] . '?id=' . $bosstype . '&addons=' . $bossaddons . '&head=' . $bosshead . '&body=' . $bossbody . '&legs=' . $bosslegs . '&feet=' . $bossfeet . '&mount=' . $bossmount;

                    $topResets = $db->query('SELECT players.name, player_storage.value, players.looktype, players.lookaddons, players.lookhead, players.lookbody, players.looklegs, players.lookfeet
                        FROM players
                        JOIN player_storage ON players.id = player_storage.player_id
                        WHERE player_storage.key = 500 AND players.group_id < 3
                        ORDER BY CAST(player_storage.value AS DECIMAL) DESC
                        LIMIT 5')->fetchAll();

                    $topAscensions = $db->query('SELECT players.name, player_storage.value, players.looktype, players.lookaddons, players.lookhead, players.lookbody, players.looklegs, players.lookfeet
                        FROM players
                        JOIN player_storage ON players.id = player_storage.player_id
                        WHERE player_storage.key = 501 AND players.group_id < 3
                        ORDER BY CAST(player_storage.value AS DECIMAL) DESC
                        LIMIT 5')->fetchAll();
                    ?>

                    <div class="ThemeboxPanel ThemeboxStore">
                        <div class="ThemeboxTitle">STORE</div>
                        <div class="ThemeboxFrame">
                            <div class="ThemeboxPanelTop"></div>
                            <div class="ThemeboxPanelCenter">
                                <img class="ThemeboxCoins" src="<?= $template_url; ?>/images/themeboxes/donate/coins.gif" alt="Mortera Coins">
                                <a class="ThemeboxButton ThemeboxButtonOrange" href="<?= getLink('points'); ?>">Obtener Mortera Coins</a>
                            </div>
                            <div class="ThemeboxPanelBottom"></div>
                        </div>
                    </div>

                    <div class="ThemeboxPanel ThemeboxBoosted">
                        <div class="ThemeboxTitle">BOOSTED</div>
                        <div class="ThemeboxFrame">
                            <div class="ThemeboxPanelTop"></div>
                            <div class="ThemeboxPanelCenter">
                                <div class="BoostedCards">
                                    <div class="BoostedCard">
                                        <div class="BoostedImageWrap">
                                            <img src="<?= $boostedCreatureImage; ?>" alt="<?= escapeHtml($boostedCreatureName); ?>">
                                        </div>
                                        <span><?= escapeHtml($boostedCreatureName); ?></span>
                                    </div>
                                    <div class="BoostedCard">
                                        <div class="BoostedImageWrap">
                                            <img src="<?= $boostedBossImage; ?>" alt="<?= escapeHtml($boostedBossName); ?>">
                                        </div>
                                        <span><?= escapeHtml($boostedBossName); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ThemeboxPanelBottom"></div>
                        </div>
                    </div>

                    <div class="ThemeboxPanel ThemeboxDiscord">
                        <div class="ThemeboxTitle">DISCORD</div>
                        <div class="ThemeboxFrame">
                            <div class="ThemeboxPanelTop"></div>
                            <div class="ThemeboxPanelCenter">
                                <a class="ThemeboxButton ThemeboxButtonDiscord" href="<?= $config['discord_link'] ?: '#'; ?>" target="_blank" rel="noopener noreferrer">Join Discord</a>
                            </div>
                            <div class="ThemeboxPanelBottom"></div>
                        </div>
                    </div>

                    <div class="ThemeboxPanel ThemeboxRanking">
                        <div class="ThemeboxTitle">TOP RESETS</div>
                        <div class="ThemeboxFrame">
                            <div class="ThemeboxPanelTop"></div>
                            <div class="ThemeboxPanelCenter">
                                <div class="ThemeboxRankingList">
                                    <?php foreach ($topResets as $player):
                                        $playerOutfit = $config['outfit_images_url'] . '?id=' . $player['looktype'] . (!empty($player['lookaddons']) ? '&addons=' . $player['lookaddons'] : '') . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'];
                                        ?>
                                        <a class="ThemeboxRankingPlayer" href="<?= getPlayerLink($player['name'], false); ?>">
                                            <span class="ThemeboxRankingOutfit" style="background-image:url('<?= $playerOutfit; ?>');"></span>
                                            <span class="ThemeboxRankingText">
                                                <strong><?= escapeHtml($player['name']); ?></strong>
                                                <small>Resets: <?= (int)$player['value']; ?></small>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="ThemeboxPanelBottom"></div>
                        </div>
                    </div>

                    <div class="ThemeboxPanel ThemeboxRanking">
                        <div class="ThemeboxTitle">TOP ASCENSIONS</div>
                        <div class="ThemeboxFrame">
                            <div class="ThemeboxPanelTop"></div>
                            <div class="ThemeboxPanelCenter">
                                <div class="ThemeboxRankingList">
                                    <?php foreach ($topAscensions as $player):
                                        $playerOutfit = $config['outfit_images_url'] . '?id=' . $player['looktype'] . (!empty($player['lookaddons']) ? '&addons=' . $player['lookaddons'] : '') . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'];
                                        ?>
                                        <a class="ThemeboxRankingPlayer" href="<?= getPlayerLink($player['name'], false); ?>">
                                            <span class="ThemeboxRankingOutfit" style="background-image:url('<?= $playerOutfit; ?>');"></span>
                                            <span class="ThemeboxRankingText">
                                                <strong><?= escapeHtml($player['name']); ?></strong>
                                                <small>Ascensions: <?= (int)$player['value']; ?></small>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="ThemeboxPanelBottom"></div>
                        </div>
                    </div>

                    <?php
                    if ($config['template_allow_change'])
                        echo '<span style="color: white">Template:</span><br/>' . template_form();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= template_place_holder('body_end'); ?>

<style>
    .scrollToTop {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        color: #444;
        text-decoration: none;
        position: fixed;
        bottom: 10px;
        right: 12px;
        display: none;
        z-index: 50000;
        cursor: pointer;
    }

    .scrollToTop img {
        width: 42px;
        height: auto;
    }
</style>
<script>
    $(document).ready(function () {
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
        //Click event to scroll to top
        $('.scrollToTop').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    });
</script>
<script>
    $(document).ready(function () {
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.TopButton').fadeIn();
            }
        });
        //Click event to scroll to top
        $('.TopButton').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    });
</script>
<div class="scrollToTop" title="Voltar ao Topo">
    <img alt style="border:0;" src="<?= $template_url; ?>/images/global/content/back-to-top.gif">
</div>

<script src="<?= $template_url; ?>/js/generic.js?v=<?= $asset_version; ?>"></script>
<div id="HelperDivContainer"
     style="background-image: url(<?= $template_url; ?>/images/global/content/scroll.gif);">
    <div class="HelperDivArrow"
         style="background-image: url(<?= $template_url; ?>/images/global/content/helper-div-arrow.png);"></div>
    <div id="HelperDivHeadline"></div>
    <div id="HelperDivText"></div>
    <center><img class="Ornament" src="<?= $template_url; ?>/images/global/content/ornament.gif"></center>
    <br>
</div>

</body>
</html>
<?php

/**
 * @param $menu
 * @return string
 */
function getImageMenuRandom($menu): string
{
    global $config;
    if (!$config['allow_menu_animated']) {
        return $menu === 'bgs' ? "/images/header/{$config['background_image']}" : "/images/menu/icon-{$menu}.gif";
    }

    $images = [
        'bgs'            => ['00.png'],
        'news'           => ['icon-news01.gif', 'icon-news02.gif', 'icon-news03.gif', 'icon-news04.gif', 'icon-news05.gif', 'icon-news06.gif'],
        'community'      => ['icon-community01.gif', 'icon-community02.gif', 'icon-community03.gif', 'icon-community04.gif', 'icon-community05.gif', 'icon-community06.gif', 'icon-community07.gif', 'icon-community08.gif'],
        'forum'          => ['icon-forum01.gif', 'icon-forum02.gif', 'icon-forum03.gif', 'icon-forum04.gif', 'icon-forum05.gif', 'icon-forum06.gif', 'icon-forum07.gif', 'icon-forum08.gif', 'icon-forum09.gif', 'icon-forum10.gif'],
        'account'        => ['icon-account01.gif', 'icon-account02.gif', 'icon-account03.gif', 'icon-account04.gif', 'icon-account05.gif'],
        'library'        => ['icon-library01.gif', 'icon-library02.gif', 'icon-library03.gif', 'icon-library04.gif', 'icon-library05.gif'],
        'wars'           => ['icon-wars01.gif', 'icon-wars02.gif', 'icon-wars03.gif', 'icon-wars04.gif', 'icon-wars05.gif', 'icon-wars06.gif', 'icon-wars07.gif', 'icon-wars08.gif', 'icon-wars09.gif', 'icon-wars10.gif', 'icon-wars11.gif', 'icon-wars12.gif', 'icon-wars13.gif', 'icon-wars14.gif'],
        'events'         => ['icon-events01.gif', 'icon-events02.gif', 'icon-events03.gif', 'icon-events04.gif', 'icon-events05.gif', 'icon-events06.gif', 'icon-events07.gif', 'icon-events08.gif', 'icon-events09.gif', 'icon-events10.gif', 'icon-events11.gif', 'icon-events12.gif', 'icon-events13.gif'],
        'support'        => ['icon-support01.gif', 'icon-support02.gif', 'icon-support03.gif', 'icon-support04.gif', 'icon-support05.gif', 'icon-support06.gif', 'icon-support07.gif', 'icon-support08.gif', 'icon-support09.gif', 'icon-support10.gif', 'icon-support11.gif'],
        'shops'          => ['icon-shops01.gif', 'icon-shops02.gif', 'icon-shops03.gif', 'icon-shops04.gif'],
        'charactertrade' => ['icon-bazaar01.gif', 'icon-bazaar02.gif'],
    ];
    if (!$images[$menu]) {
        return "/images/menu/icon-{$menu}.gif";
    }

    // generate random number size of the array
    $img = $images[$menu][rand(0, count($images[$menu]) - 1)];
    return $menu !== 'bgs' ? "/images/menu/anim/{$img}" : "/images/header/bgs/{$img}";
}
