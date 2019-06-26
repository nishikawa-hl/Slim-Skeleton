<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    $container = $app->getContainer();

    if ( getenv('ENV') != 'admin' ) {

        // API
        $app->group( '/api', function ( $app ) {

        } );

        $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
            // Sample log message
            $container->get('logger')->info("Slim-Skeleton '/' route");

            // Render index view
            return $container->get('renderer')->render($response, 'index.phtml', $args);
        });

    }

    if ( getenv('ENV') == 'admin' ) {

        // Admin
        $app->group( '/admin', function ( $app ) {

            $app->get( '/users/list', \App\Controller\UserController::class . ':list' )->setName( 'UserList' );

        /* Access Limit
        })->add( function ( $request, $response, $next ) {

            $route = $request->getAttribute( 'route' );
            $routeName = $route->getName();
            $groups = $route->getGroups();
            $methods = $route->getMethods();
            $arguments = $route->getArguments();

            $publicRoute = [
                'UserList',
            ];

            if ( !isset( $_SESSION[ 'user' ] ) && !in_array( $routeName, $publicRoute ) ) {

                $response = $response->withRedirect( '/admin/login' );

            } else {

                $response = $next( $request, $response );

            }

            return $response;
        */
            
        } );

    }

};
