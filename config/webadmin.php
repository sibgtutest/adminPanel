<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$user = require __DIR__ . '/admin.php';
$config = require __DIR__ . '/basic.php';
$urlManager = require __DIR__ . '/urlManager.php';

$config['components']['user'] = $user;
$config['components']['db'] = $db;
$config['params'] = $params;
$config['components']['urlManager'] = $urlManager;

return $config;
