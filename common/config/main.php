<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'timeZone' => 'Asia/Shanghai',
    'components' => [
        'db' => [
			'tablePrefix' => 'dzoo_',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
