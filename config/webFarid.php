<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/dbFarid.php';
$config = require __DIR__ . '/basic.php';

$config['components']['db'] = $db;
$config['params'] = $params;

return $config;