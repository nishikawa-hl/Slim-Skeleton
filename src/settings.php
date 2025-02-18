<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Twig settings
        'view' => [
            'template_path' => __DIR__ . '/../templates/',
            'twig' => [
                'cache' => false,
                'debug' => true,
                'auto_reload' => true,
            ],
            'extension' => [
                \Twig_Extension_Debug::class
            ],
        ],

        // DB
        'db' => [
            'production' => [
                'dsn' => 'mysql:host=127.0.0.1;dbname=database;charset=utf8mb4',
                'user' => 'user',
                'password' => 'password',
            ],
            'develop' => [
                'dsn' => 'mysql:host=127.0.0.1;dbname=database;charset=utf8mb4',
                'user' => 'user',
                'password' => 'password',
            ],
        ],
    ],
];
