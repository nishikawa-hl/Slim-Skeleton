<?php

namespace App\Exception;

use Exception;

class BadRequestException extends Exception
{

    function __construct() {

        parent::__construct( 'BadRequest', 400 );

    }
    
}