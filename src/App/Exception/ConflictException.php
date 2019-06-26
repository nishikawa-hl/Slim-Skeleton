<?php

namespace App\Exception;

use Exception;

class ConflictException extends Exception
{

    function __construct() {

        parent::__construct( 'Conflict', 409 );

    }
    
}