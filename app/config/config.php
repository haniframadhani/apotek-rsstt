<?php
$path = file_exists('../.env.local') ? '../.env.local' : '../.env';
$env = parse_ini_file($path);
$host = ($_SERVER['SERVER_NAME'] === 'localhost') ? '/apotek-rsstt/public' : '/public';
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $host;

define('BASEURL', $url);

define('DB_HOST', $env['DBHOST']);
define('DB_USER', $env['DBUSER']);
define('DB_PASS', $env['DBPASSWORD']);
define('DB_NAME', $env['DBNAME']);
