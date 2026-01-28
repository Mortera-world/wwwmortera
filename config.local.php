<?php
// place for your configuration directives, so you can later easily update myaac
$config['installed'] = true;
$config['env'] = 'prod'; // dev or prod
$config['mail_enabled'] = true;
$config['server_path'] = 'C:\Users\adrian\Desktop\canary';
$config['mail_admin'] = 'mortera@gmail.com';
$config['mail_address'] = 'mortera@gmail.com';
$config['date_timezone'] = 'America/Chicago';
$config['client'] = '1330';
$config['session_prefix'] = 'myaac_oluvhynj_';
$config['cache_prefix'] = 'myaac_5lmsdfkt_';
$config['powerful_guilds'] = array(
   'refresh_interval' => 10 * 60, // cache query for 10 minutes (in seconds)
   'amount' => 5, // how many powerful guilds to show
   'page' => 'news' // on what pages most powerful guilds box should appear, for example 'news', or 'guilds' (blank makes it visible on every page)
);
$config['start-countdown'] = array(
               'date' => '20.12.2023 18:00:00' // time in your server timezone
        );