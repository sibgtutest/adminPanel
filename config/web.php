<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$user = require __DIR__ . '/user.php';
$config = require __DIR__ . '/basic.php';

$config['components']['user'] = $user;
$config['components']['db'] = $db;
$config['params'] = $params;

return $config;
