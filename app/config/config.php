<?php
$path = file_exists('../.env.local') ? '../.env.local' : '../.env';
$env = parse_ini_file($path);
define('BASEURL', 'http://localhost/apotek-rsstt/public');

define('DB_HOST', $env['DBHOST']);
define('DB_USER', $env['DBUSER']);
define('DB_PASS', $env['DBPASSWORD']);
define('DB_NAME', $env['DBNAME']);
