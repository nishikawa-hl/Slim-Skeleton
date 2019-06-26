<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // Twig View
    $container[ 'view' ] = function ( $c ) {

        $settings = $c->get( 'settings' )[ 'view' ];
        $view = new \Slim\Views\Twig( $settings[ 'template_path' ], $settings[ 'twig' ] );

        foreach ( $settings[ 'extension' ] as $extension ) {

            $view->addExtension( new $extension );

        }

        $router = $c->get( 'router' );
        $uri = \Slim\Http\Uri::createFromEnvironment( new \Slim\Http\Environment( $_SERVER ) );
        $view->addExtension( new \Slim\Views\TwigExtension( $router, $uri ) );

        return $view;

    };
    
};
