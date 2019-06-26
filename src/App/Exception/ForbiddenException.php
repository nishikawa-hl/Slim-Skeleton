<?php

namespace App\Exception;

use Exception;

class ForbiddenException extends Exception
{

    function __construct() {

        parent::__construct( 'Forbidden', 403 );

    }
    
}