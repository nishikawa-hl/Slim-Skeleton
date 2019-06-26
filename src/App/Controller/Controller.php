<?php

namespace App\Controller;

use \Psr\Container\ContainerInterface;
use \Slim\Views\Twig;

abstract class Controller
{

    protected $view;

    public function __construct( ContainerInterface $container ) {

        $this->router = $container->router;
        $this->view = $container[ 'view' ];

    }

}