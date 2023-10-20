<?php

$path = file_exists('../.env.local') ? '../.env.local' : '../.env';
$env = parse_ini_file($path);
require_once 'core/App.php';
require_once 'core/Controller.php';