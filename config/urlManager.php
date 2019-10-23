<?php

return [
    'enablePrettyUrl' => true,
    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'admin/index',
        '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
        '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
        '<controller>/<action>/<id:\w+>' => '<controller>/<action>',
        ['class' => 'yii\rest\UrlRule', 'controller' => 'admin'],
    ],
];