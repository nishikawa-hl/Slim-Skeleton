<?php

namespace App\Exception;

use Exception;

class UnauthorizedException extends Exception
{

    function __construct() {

        parent::__construct( 'Unauthorized', 401 );

    }
    
}